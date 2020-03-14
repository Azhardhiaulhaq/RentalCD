<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\http\Request;

class UserModel extends Model
{
   protected $table = 'rental_user'; //nama table yang kita buat lewat migration adalah todo
   public $timestamps = false;
}