<?php

namespace App\Models;

use App\Models\Day as ModelsDay;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Day extends Model
{
    use HasFactory;

    public const SATURDAY = 6;
    public const SUNDAY = 7;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'show_on_pre_order',
    ];

    public function isSaturday()
    {
        return $this->id === Day::SATURDAY;
    }

    public function isSunday()
    {
        return $this->id === Day::SUNDAY;
    }
}
