<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
class User extends Authenticatable
{
    use HasFactory, Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'name',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeIsCustomer($query)
    {
        $query->where('type', 'customer');
    }
    public function scopeIsProvider($query)
    {
        $query->where('type', 'provider');
    }

    /**
     * Get addresses of the user
     */
    public function addresses() {
      return $this->hasMany(Address::class, 'user_id');
    }

    /**
     * test whether the user is a customer or a provider
     */
    public function customer() {
      return $this->type == 'customer';
    }
    public function provider() {
      return $this->type == 'provider';
    }
}
