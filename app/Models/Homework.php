<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Homework extends Model {
   protected $table = 'site.homeworks';
   protected $primaryKey = "id";
   protected $fillable = [
      'subject_module_map_id',
      'type',
      'code',
      'description',
      'link'
   ];
   public $dates = [
      'created_at',
      'updated_at',
      'disabled_dt'
   ];
}

