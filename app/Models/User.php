<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\user_profEB;
use App\Models\user_profSkills;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'fname',
        'lname',
        'email',
        'password',
        'cpassword',
        'prof_name',
        'prof_path',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'fname',
        'lname',
        'email',
        'password',
        'cpassword',
        'prof_name',
        'prof_path',
        'remember_token',
    ];

    public function user_profEB()
    {
        return $this->hasMany(user_profEB::class);
    }

    public function user_profSkills()
    {
        return $this->hasMany(user_profSkills::class);
    }
}
