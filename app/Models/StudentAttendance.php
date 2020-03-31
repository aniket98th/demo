<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentAttendance extends Model {
   protected $table = 'site.class_attendance';
   protected $primaryKey = "id";
   protected $fillable = [
      'class_id',
      'student_id',
      'attendance'
   ];
   public $dates = [
      'created_at',
      'updated_at'
   ];
}

