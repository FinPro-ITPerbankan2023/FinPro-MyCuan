<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;


class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function userDetail(): HasOne
    {

        return $this->hasOne(UserDetail::class,);

    }
    public function userIdentity(): HasOne
    {

        return $this->hasOne(UserIdentity::class,);

    }

    public function Business(): HasOne
    {

        return $this->hasOne(Business::class,);

    }
    public function Loans(): HasMany
    {

        return $this->hasMany(Loans::class,);

    }

    public function BankDetail(): HasOne
    {

        return $this->hasOne(BankDetail::class,);

    }

    public function HistoryTransaction(): HasMany
    {

        return $this->hasMany(HistoryTransaction::class,);

    }


    public function canAccessPanel(Panel|\Filament\Panel $panel): bool
    {
        return match ($panel->getId()) {
            'admin' => $this->role_id === 3,
            'borrower' => $this->role_id === 2,
            'lender' => $this->role_id === 1,
            default => true,
        };
    }

}
