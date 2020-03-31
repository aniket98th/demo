<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model {
   protected $table = 'site.modules';
   protected $primaryKey = "id";
   public $dates = [
      'created_at',
      'updated_at'
   ];
   protected $fillable = [
      'module'
   ];
}