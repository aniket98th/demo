<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model {
   protected $table = 'site.users';
   protected $primaryKey = "id";
   protected $fillable = [
      'name',
      'email',
      'email_verified_at',
      'password',
      'remember_token'
   ];
   public $dates = [
      'created_at',
      'updated_at',
      'disabled_dt'
   ];
}
