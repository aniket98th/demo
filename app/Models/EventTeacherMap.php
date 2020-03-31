<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventTeacherMap extends Model {
   protected $table = 'site.event_teacher_map';
   protected $primaryKey = "id";
   protected $fillable = [
      'event_id',
      'teacher_id'
   ];
   public $dates = [
      'created_at',
      'updated_at'
   ];
}
