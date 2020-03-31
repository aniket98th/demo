<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventMember extends Model {
   protected $table = 'site.event_members';
   protected $primaryKey = "id";
   protected $fillable = [
      'event_id',
      'student_id',
      'enroll_dt',
      'disenroll_dt',
      're_enroll_dt'
   ];
   public $dates = [
      'created_at',
      'updated_at'
   ];
}
