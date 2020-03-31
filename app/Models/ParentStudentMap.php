<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParentStudentMap extends Model {
   protected $table = 'site.parent_student_map';
   protected $primaryKey = "id";
   protected $fillable = [
      'parent_id',
      'student_id'
   ];
   public $dates = [
      'created_at',
      'updated_at',
      'disabled_dt'
   ];
}
