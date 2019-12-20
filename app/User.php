<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Spatie\Permission\Traits\HasRoles;
//use App\Notifications\MailResetPasswordToken;

class User extends Authenticatable
{
    use HasApiTokens, UsesTenantConnection, Notifiable, HasRoles;
//    use Notifiable, UsesTenantConnection, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'email_verified', 'account_status', 'role', 'activation_code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $with = ['userCategories'];
    /**
     * Roles relation.
     */
    public function userRole()
    {
        return $this->hasOne(Role::class, 'id', 'role');
    }

    /**
     * Categories relation.
     */
    public function userCategories()
    {
        return $this->hasOne(UserCategory::class, 'user_id');
    }

    //user categories filter
    public function scopeFilterCategory($query, $category_id)
    {
        return $query->whereHas('userCategories', function($q) use ($category_id) {
            $q->where('category_id', $category_id);
        });
    }

    /**
     * Send a password reset email to the user
     */
//    public function sendPasswordResetNotification($token)
//    {
//        $this->notify(new MailResetPasswordToken($token));
//    }

}
