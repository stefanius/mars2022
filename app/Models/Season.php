<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;

class Season extends Model
{
    use HasTimestamps;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'edition',
        'minimum_group',
        'pre_order_starts_at',
        'pre_order_ends_at',
        'saturday_date',
        'sunday_date',
        'read_only_since',
        'year',
    ];

    protected $dates = [
        'pre_order_starts_at',
        'pre_order_ends_at',
        'saturday_date',
        'sunday_date',
    ];

    /**
     * @return Season
     */
    public static function activeSeason()
    {
        return self::whereNull('read_only_since')->first();
    }

    /**
     *
     */
    public static function deactivateSeasons()
    {
        return self::whereNull('read_only_since')->update(['read_only_since' => Carbon::now()]);
    }

    /**
     * Determines pre-order section is closed.
     *
     * @return boolean
     */
    public function isPreOrderClosed(): bool
    {
        return !$this->isPreOrderOpen();
    }

    /**
     * Determines the pre-order opening.
     *
     * @return boolean
     */
    public function isPreOrderOpen(): bool
    {
        return Carbon::now()->isAfter($this->pre_order_starts_at) && Carbon::now()->isBefore($this->pre_order_ends_at);
    }

    /**
     * Determines order section is closed.
     *
     * @return boolean
     */
    public function isOrderClosed(): bool
    {
        return !$this->isOrderOpen();
    }

    /**
     * Determines the order opening.
     *
     * @return boolean
     */
    public function isOrderOpen(): bool
    {
        return $this->saturday_date->isToday() || $this->sunday_date->isToday();
    }
}
