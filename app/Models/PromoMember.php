<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PromoMember extends Model {
   protected $table = 'site.class_promo_members';
   protected $primaryKey = "id";
   protected $fillable = [
      'student_id',
      'class_id',
      'promo_id',
      'promo_for_subject_id',
      'promo_for_subject_module_id'
   ];
   public $dates = [
      'created_at',
      'updated_at',
      'disabled_dt'
   ];
}