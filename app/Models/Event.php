<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Teacher;

class Event extends Model {
   protected $table = 'site.events';
   protected $primaryKey = "id";
   protected $fillable = [
      'name',
      /*'teacher_id',*/
      //'subject_module_map_id',
      'start_tm',
      'duration',
      'recurrence',
      'meeting_link',
      'backup_meeting_link',
      'start_dt',
      'end_dt',
      'actual_start_dt',
      'actual_end_dt',
      'visibility',
      'capacity',
      'lesson_event_instance_map_id'
   ];
   public $dates = [
      'created_at',
      'updated_at'
   ];

    public function members(){
        return $this->hasMany('App\Models\EventMember');
    }
    
    public function teacher(){
        return $this->hasMany('App\Models\EventTeacherMap');
    }

    /*public function teacher(){
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }*/
}
