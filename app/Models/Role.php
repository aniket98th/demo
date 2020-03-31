<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRoleMap extends Model {
   protected $table = 'site.roles';
   protected $primaryKey = "id";
   protected $fillable = [
      'name',
      'slug',
      'description',
      'level'
   ];
   public $dates = [
      'created_at',
      'updated_at',
      'disabled_dt'
   ];
}
