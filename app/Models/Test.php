<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model {
   protected $table = 'site.tests';
   protected $primaryKey = "id";
   protected $fillable = [
      'subject_module_map_id',
      'type',
      'title',
      'description',
      'link'
   ];
   public $dates = [
      'created_at',
      'updated_at',
      'disabled_dt'
   ];
}

