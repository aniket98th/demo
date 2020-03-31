<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentClasses extends Model {
   protected $table = 'site.classes';
   protected $primaryKey = "id";
   protected $fillable = [
      'event_id',
      'dt',
      'teacher_join_ts',
      'class_end_ts',
      'is_class_recorded',
      'recording_link',
      'finished_status',
      'type',
      'teacher_id',
      'lesson_instance_id'
   ];
   public $dates = [
      'created_at',
      'updated_at',
      'disabled_dt'
   ];
}
