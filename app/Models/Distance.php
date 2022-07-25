<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;

class Distance extends Model
{
    use HasTimestamps;
    use HasFactory;

    public const DISTANCE_5_KM = 1;
    public const DISTANCE_10_KM = 2;
    public const DISTANCE_15_KM = 3;
    public const DISTANCE_25_KM = 4;
    public const DISTANCE_40_KM = 5;
    public const DISTANCE_70_KM = 6;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'check_in_window_starts_at',
        'check_in_window_ends_at',
        'weekend',

    ];

    /**
     * Determines if the distance is spread over the weekend.
     *
     * @return boolean
     */
    public function isWeekend(): bool
    {
        return $this->weekend;
    }

    public function checkInTimeWindow()
    {
        return "{$this->check_in_window_starts_at} - {$this->check_in_window_ends_at}";
    }
}
