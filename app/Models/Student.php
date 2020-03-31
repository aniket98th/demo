<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model {
   protected $table = 'site.students';
   protected $primaryKey = "id";
   public $dates = [
      'created_at',
      'updated_at'
   ];
   protected $fillable = [
      'first_name',
      'last_name',
      'email',
      'timezone',
      'enroll_dt',
      'school_year',
      'subjects_interested',
      'avatar_img_link',
      'dob',
      'hobbies',
      'about_yourself'
   ];
}