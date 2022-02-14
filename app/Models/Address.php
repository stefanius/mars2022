<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;

class Address extends Model
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
        'email',
        'street_address',
        'postal_code',
        'city',
        'send_poster',
        'send_email',
        'address_type_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function addressType()
    {
        return $this->belongsTo(AddressType::class);
    }

    /**
     * @return string
     */
    public function getTypeAttribute()
    {
        return $this->addressType->name ?? '';
    }
}
