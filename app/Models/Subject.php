<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model {
   protected $table = 'site.subjects';
   protected $primaryKey = "id";
   public $dates = [
      'created_at',
      'updated_at'
   ];
   protected $fillable = [
      'subject'
   ];
   public function modules() {
      return $this->hasMany('App\Models\SubjectModuleMap');
   }
}