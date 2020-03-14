<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\http\Request;

class CDModel extends Model
{
   protected $table = 'rental_cd'; //nama table yang kita buat lewat migration adalah todo
   public $timestamps = false;
}