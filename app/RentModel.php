<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\http\Request;

class RentModel extends Model
{
   protected $table = 'rent'; //nama table yang kita buat lewat migration adalah todo
   protected $dates = ['date_rent','date_return'];
   public $timestamps = false;
}