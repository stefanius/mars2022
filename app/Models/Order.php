<?php

namespace App\Models;

use Carbon\Carbon;
use App\Events\OrderPaid;
use App\Events\OrderCreated;
use App\Events\PaymentFailed;
use Mollie\Api\Resources\Payment;
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
        'organization',
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

        self::creating(function (Model $model) {
            $previousValue = (int) Order::query()->max('order_number');

            $newValue = $previousValue + 1;

            $model->order_number = sprintf("%'.05d\n", $newValue);
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
    public function scopeActiveSeason(Builder $query)
    {
        return $query->whereHas('season', function ($query) {
            return $query->where('year', '=', Carbon::now()->year);
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderLines()
    {
        return $this->hasMany(OrderLine::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function day()
    {
        return $this->belongsTo(Day::class);
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
        return "€ " . number_format($this->grandTotal, 2, ',', '.');
    }

    /**
     * @return bool
     */
    public function isPaid()
    {
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
}
