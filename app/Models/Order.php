<?php

namespace App\Models;

use Str;
use Carbon\Carbon;
use App\Events\OrderPaid;
use App\Events\OrderCreated;
use App\Events\PaymentFailed;
use Mollie\Api\Resources\Payment;
use Illuminate\Support\Facades\DB;
use Mollie\Api\Types\PaymentStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Contracts\Translation\HasLocalePreference;

class Order extends Model implements HasLocalePreference
{
    use HasTimestamps;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'hash',
        'organisation',
        'phone',
        'order_number',
        'mollie_payment_id',
        'mollie_payment_status',
        'paid_at',
        'started_at',
        'finished_at',
        'printed_at',
        'season_id',
        'distance_id',
        'day_id',
        'locale',
        'agreed_terms_of_service',
        'mail_consent',
    ];

    /**
     *
     */
    protected $dates =[
        'paid_at',
        'started_at',
        'finished_at',
        'printed_at',
    ];

    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => OrderCreated::class,
    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        self::creating(function (Order $order) {
            // Generete new ordernumber
            $previousValue = (int) Order::query()->max('order_number');
            $newValue = $previousValue + 1;
            $order->order_number = sprintf("%05d", $newValue);
            $order->hash = Str::uuid()->toString();
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function season()
    {
        return $this->belongsTo(Season::class);
    }

    /**
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopePaid(Builder $query)
    {
        return $query->whereNotNull('paid_at');
    }

    /**
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeUnpaid(Builder $query)
    {
        return $query->whereNull('paid_at');
    }

    /**
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeStarted(Builder $query)
    {
        return $query->whereNotNull('started_at');
    }

    /**
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeStartedToday(Builder $query)
    {
        return $query->whereNotNull('started_at')->where('started_at', '>', Carbon::today()->startOfDay())->where('started_at', '<', Carbon::today()->endOfDay());
    }

    public function molliePaymentOpen()
    {
        return $this->mollie_payment_status === PaymentStatus::STATUS_OPEN;
    }

    public function molliePaymentExpired()
    {
        return $this->mollie_payment_status === PaymentStatus::STATUS_EXPIRED;
    }

    public function molliePaymentFailed()
    {
        return $this->mollie_payment_status === PaymentStatus::STATUS_FAILED;
    }

    public function molliePaymentCanceled()
    {
        return $this->mollie_payment_status === PaymentStatus::STATUS_CANCELED;
    }

    /**
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeNotStarted(Builder $query)
    {
        return $query->whereNull('started_at');
    }

    /**
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeFinished(Builder $query)
    {
        return $query->whereNotNull('finished_at');
    }

    /**
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeNotFinished(Builder $query)
    {
        return $query->whereNull('finished_at');
    }

    /**
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeNotPrinted(Builder $query)
    {
        return $query->whereNull('printed_at');
    }

    /**
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopePreOrder(Builder $query)
    {
        return $query->whereNotNull('mollie_payment_id');
    }

    /**
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeOnlyGroups(Builder $query)
    {
        return $query->whereHas('orderLines', function (Builder $query) {
            return $query
                ->select(DB::raw('SUM(quantity) as sum_quantity'))
                ->groupBy('order_lines.id')
                ->having('sum_quantity', '>', (string) Season::activeSeason()->minimum_group);
        });
    }

    /**
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeActiveSeason(Builder $query)
    {
        return $query->where('season_id', '=', Season::activeSeason()->id);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderLines()
    {
        return $this->hasMany(OrderLine::class)->orderBy('ticket_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function distance()
    {
        return $this->belongsTo(Distance::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function day()
    {
        return $this->belongsTo(Day::class);
    }

    public function eventDate()
    {
        if ($this->day->isSaturday()) {
            return $this->season->saturday_date;
        }

        if ($this->day->isSunday()) {
            return $this->season->sunday_date;
        }

        return '';
    }

    /**
     * @return mixed
     */
    public function getGrandTotalAttribute()
    {
        return $this->orderLines->sum('TotalAmount');
    }

    /**
     * @return string
     */
    public function getGrandTotalCurrencyAttribute()
    {
        return "??? " . number_format($this->grandTotal, 2, ',', '.');
    }

    /**
     * @return bool
     */
    public function isPaid()
    {
        if (filled($this->mollie_payment_id)) {
            return filled($this->paid_at) && $this->mollie_payment_status === PaymentStatus::STATUS_PAID;
        }

        return filled($this->paid_at);
    }

    /**
     * @return bool
     */
    public function isStarted()
    {
        return filled($this->started_at);
    }

    /**
     * @return bool
     */
    public function isFinished()
    {
        return filled($this->finished_at);
    }

    public function markAsPrinted()
    {
        $this->update(['printed_at' => Carbon::now()]);

        return $this->fresh();
    }

    public function markAsPaid(Payment $payment = null)
    {
        if ($payment) {
            $this->update([
                'paid_at' => Carbon::now(),
                'mollie_payment_id' => $payment->id,
                'mollie_payment_status' => $payment->status,
            ]);
        }

        $this->update(['paid_at' => Carbon::now()]);

        event(new OrderPaid($this));

        return $this->fresh();
    }

    public function paymentFailed(Payment $payment)
    {
        $this->update([
            'mollie_payment_id' => $payment->id,
            'mollie_payment_status' => $payment->status,
        ]);

        event(new PaymentFailed($this));

        return $this->fresh();
    }

    /**
     * Determine if there was an email.
     *
     * @return bool
     */
    public function hasEmail()
    {
        return filled($this->email);
    }

    /**
     * Get the preferred locale of the entity.
     *
     * @return string|null
     */
    public function preferredLocale()
    {
        return $this->locale ?? 'en';
    }

    public function numberOfAttendees()
    {
        return $this->orderLines->sum('quantity');
    }

    public function numberOfMedals()
    {
        return $this->orderLines->filter(function (OrderLine $orderLine) {
            return $orderLine->ticket->with_medal;
        })->sum('quantity');
    }

    public function isGroup()
    {
        return $this->numberOfAttendees() >= $this->season->minimum_group;
    }
}
