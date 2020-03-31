<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherAdminMap extends Model {
   protected $table = 'site.teacher_admin_map';
   protected $primaryKey = "id";
   protected $fillable = [
      'teacher_id',
      'teacher_admin_id'
   ];
   public $dates = [
      'created_at',
      'updated_at',
      'disabled_dt'
   ];
}
