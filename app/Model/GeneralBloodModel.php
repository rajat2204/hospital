<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\OpdModel;
class GeneralBloodModel extends Model
{
     protected $fillable = ['id','patientId','referredBy','age','investigationAdvised','date','bloodFasting','bloodRandom','bloodPP','urea','creatinine','uricAcid','totalBilirubin','directBilirubin','sgptAlt','sgotAst','alkPhosphatase','totalProtein','albumin','agRatio',

     ];
     
     public function getPatientDetails() {
    	return $this->belongsTo(OpdModel::class,'patientId','id');
    }
}
