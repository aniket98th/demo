<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompensationPlan extends Model {
   protected $table = 'site.compensation_plans';
   protected $primaryKey = "id";
   protected $fillable = [
      'code',
      'salary_payable_plan',  // (M)onthly, (B)i-weekly
      'version',
      'currency_code'
   ];
   public $dates = [
      'created_at',
      'updated_at'
   ];
}