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
}
