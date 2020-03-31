<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentParent extends Model {
   protected $table = 'site.parents';
   protected $primaryKey = "id";
   protected $fillable = [
      'first_name',
      'last_name',
      'email',
      'phone'
   ];
   public $dates = [
      'created_at',
      'updated_at',
      'disabled_dt'
   ];
   public function student_parents() {
      return $this->hasMany('App\ParentStudentMap');
   }
}
