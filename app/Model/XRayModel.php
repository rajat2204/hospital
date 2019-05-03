<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\OpdModel;

class XRayModel extends Model
{
    protected $fillable = ['patientId','referredBy','age','investigationAdvised','date','description','remark',];

     public function getPatientDetails(){
    	return $this->belongsTo(OpdModel::class,'patientId','id');
    }
}
