<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class jobs extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'jobtit',
        'jobdes',
        'qualification',
        'exreq',
        'special',
        'mimsal',
        'maxsal',
        'typerole',
        'postlev',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'jobtit',
        'jobdes',
        'qualification',
        'exreq',
        'special',
        'mimsal',
        'maxsal',
        'typerole',
        'postlev',
    ];
}
