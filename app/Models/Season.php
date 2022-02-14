<?php

namespace App\Models;

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
        'name',
        'pre_order_starts_at',
        'pre_order_ends_at',
        'saturday_date',
        'sunday_date',
        'year',
    ];

    /**
     * @return Season
     */
    public static function activeSeason()
    {
        return self::where('year', '=', now()->year)->first();
    }
}
