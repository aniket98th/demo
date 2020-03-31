<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model {
   protected $table = 'site.lessons';
   protected $primaryKey = "id";
   protected $fillable = [
      'subject_module_map_id',
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

