<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Teacher extends Model {
   protected $table = 'site.teachers';
   protected $primaryKey = "id";
   protected $fillable = [
      'short_name',
      'first_name',
      'last_name',
      'work_email',
      'personal_email',
      'phone',
      'timezone',
      'compensation_plan_id',
      'avatar_img_link',
      'disabled_dt'
   ];
   public $dates = [
      'created_at',
      'updated_at',
      'disabled_dt'
   ];
   public function subjects() {
      return $this->hasMany('App\TeacherSubjectModuleMap');
   }

   public function getFullNameAttribute($value)
    {
       return ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
    }

}
