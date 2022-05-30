<?php

namespace App\Models;

use Carbon\Carbon;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Translation\HasLocalePreference;

class User extends Authenticatable implements HasLocalePreference
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'admin',
        'name',
        'email',
        'password',
        'locale',
        'login_window_starts_at',
        'login_window_ends_at',
        'suspended_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'login_window_starts_at' => 'datetime',
        'login_window_ends_at' => 'datetime',
        'suspended_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Encrypts the password automagicly.
     *
     * @param string $value
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * Determine the user is admin.
     *
     * @return boolean
     */
    public function isAdmin()
    {
        return $this->admin;
    }

    /**
     * Determines when the user is suspended.
     *
     * @return boolean
     */
    public function isSuspended(): bool
    {
        return filled($this->suspended_at);
    }

    /**
     * Determines when the user login window is expired.
     *
     * @return boolean
     */
    public function loginWindowExpired(): bool
    {
        return !$this->loginWindowActive();
    }

    /**
     * Determines when the user has an active login window
     *
     * @return boolean
     */
    public function loginWindowActive(): bool
    {
        if (empty($this->login_window_starts_at) || empty($this->login_window_ends_at)) {
            return true;
        }

        return Carbon::now()->isAfter($this->login_window_starts_at) && Carbon::now()->isBefore($this->login_window_ends_at);
    }

    /**
     * Get the preferred locale of the entity.
     *
     * @return string
     */
    public function preferredLocale()
    {
        return $this->locale ?? 'en';
    }
}
