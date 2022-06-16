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
        'distance_type_id',
    ];

    /**
     * Determines if the distance is short.
     *
     * @return boolean
     */
    public function isShortDistance(): bool
    {
        return $this->distance_type_id === DistanceType::SHORT;
    }

    /**
     * Determines if the distance is long.
     *
     * @return boolean
     */
    public function isLongDistance(): bool
    {
        return $this->distance_type_id === DistanceType::LONG;
    }

    /**
     * Determines if the distance is spread over the weekend.
     *
     * @return boolean
     */
    public function isWeekendDistance(): bool
    {
        return $this->distance_type_id === DistanceType::WEEKEND;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo(DistanceType::class);
    }
}
