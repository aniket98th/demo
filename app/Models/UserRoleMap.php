<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRoleMap extends Model {
   protected $table = 'site.user_role_map';
   protected $primaryKey = "id";
   protected $fillable = [
      'user_id',
      'role_id'
   ];
   public $dates = [
      'created_at',
      'updated_at',
      'disabled_dt'
   ];
}
