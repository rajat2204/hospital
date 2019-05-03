<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class BloodExaminationModel extends Model
{
	 use SoftDeletes;
    protected $fillable=[

					 'patientId','referredBy','age','investigationAdvised','date','haemoglobin','totalRBCCount','totalWBCCount','polymorphs','lymphocytes','eosinophils','monocytes','basophils','ers','plateletCount','reticulocytes','pcv','mcv','mch','mchc','bleedingTime','clottingTime','malarialParasite','remark','created_at','updated_at',
                   ];
protected $dates = ['deleted_at'];
    public function getPatientDetails(){
    	return $this->belongsTo('App\Model\OpdModel','patientId','id');
    }
}
