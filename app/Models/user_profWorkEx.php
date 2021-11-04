<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class user_profWorkEx extends Model
{   use HasApiTokens, HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'postit',
        'comname',
        'durationfrom',
        'durationto',
        'specialization',
        'role',
        'country',
        'positionlevel',
        'salary',
        'additional',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'user_id',
        'postit',
        'comname',
        'durationfrom',
        'durationto',
        'specialization',
        'role',
        'country',
        'positionlevel',
        'salary',
        'additional',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        //
    ];
}
