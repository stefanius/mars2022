<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;

class Order extends Model
{
    use HasTimestamps;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'organization',
        'phone',
        'order_number',
        'paid_at',
        'started_at',
        'finished_at',
        'printed_at',
        'season_id',
        'distance_id',
        'day_id',
    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        self::created(function (Model $model) {
            $model->update([
                'order_number' => sprintf("%'.05d\n", $model->getAttribute('id')),
            ]);
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
}
