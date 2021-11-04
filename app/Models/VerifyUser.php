<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifyUser extends Model
{
    use HasFactory;

   protected $fillable = [
       'code',
       'user_email',
       'user_id',
   ];

   /**
    * The attributes that should be hidden for serialization.
    *
    * @var array
    */
   protected $hidden = [
    'code',
    'user_email',
    'user_id',
   ];
}
