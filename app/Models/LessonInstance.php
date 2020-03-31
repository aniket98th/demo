<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LessonInstance extends Model {
   protected $table = 'site.lessons_instance';
   protected $primaryKey = "id";
   protected $fillable = [
      'event_id',
      'sequence',
      'code',
      'title',
      'description',
      'student_resource_link',
      'teacher_resource_link'
   ];
   public $dates = [
      'created_at',
      'updated_at',
      'disabled_dt'
   ];
}
