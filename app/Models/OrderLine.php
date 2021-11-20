<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;

class OrderLine extends Model
{
    use HasTimestamps;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'ticket_type_id',
        'half_price',
        'quantity',
        'amount',
        'total_amount',
    ];

    /**
     * @return float
     */
    public function getAmountAttribute()
    {
        return (float) $this->attributes['amount'] / 100;
    }

    /**
     * @return float
     */
    public function getTotalAmountAttribute()
    {
        return (float) $this->attributes['total_amount'] / 100;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ticket()
    {
        return $this->belongsTo(TicketType::class, 'ticket_type_id');
    }
}
