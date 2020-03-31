<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeworkInstance extends Model {
   protected $table = 'site.homeworks_instance';
   protected $primaryKey = "id";
   protected $fillable = [
      'event_id',
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