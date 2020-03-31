<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeacherSubjectModuleMap extends Model {
   protected $table = 'site.teacher_subject_module_map';
   protected $primaryKey = "id";
   protected $fillable = [
      'teacher_id',
      'subject_module_id'
   ];
   public $dates = [
      'created_at',
      'updated_at'
   ];
}