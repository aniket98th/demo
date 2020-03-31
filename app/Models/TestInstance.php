<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestInstance extends Model {
   protected $table = 'site.tests_instance';
   protected $primaryKey = "id";
   protected $fillable = [
      'event_id',
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