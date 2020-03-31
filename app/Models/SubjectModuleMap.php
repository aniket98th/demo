<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubjectModuleMap extends Model {
   protected $table = 'site.subject_module_map';
   protected $primaryKey = "id";
   public $dates = [
      'created_at',
      'updated_at'
   ];
   protected $fillable = [
      'subject_id',
      'module_id',
      'promo_enabled',
      'appointment_enabled',
      'enrollment_enabled',
      'zoho_pricing_12wk_plan',
      'zoho_pricing_4wk_plan'
   ];
}