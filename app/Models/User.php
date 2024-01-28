<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Http\Traits\CheckRoles;
use App\Models\User\AdminDes;
use App\Models\User\AdminKec;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    const ADMIN_KAB = 1;
    const ADMIN_KEC = 2;
    const ADMIN_DES = 3;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function setFillableAttributes()
    {
        if ($this->hasRole('ADMIN_KEC')) {
            $this->fillable[] = 'email_verified_at';
            $this->fillable[] = 'remember_token';
        }
    }

    public function adminKec()
    {
        return $this->hasOne(AdminKec::class, 'user_id');
    }

    public function adminDes()
    {
        return $this->hasOne(AdminDes::class, 'user_id');
    }
}
