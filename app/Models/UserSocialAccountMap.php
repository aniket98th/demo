<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSocialAccountMap extends Model {
   protected $table = 'site.user_social_account_map';
   protected $primaryKey = "id";
   protected $fillable = [
      'user_id',
      'provider_name',
      'provider_user_id',
   ];
   public $dates = [
      'created_at',
      'updated_at'
   ];
   public function user() {
      return $this->belongsTo('App\User');
   }
}