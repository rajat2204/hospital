<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\OpdModel;
class UrineExaminationModel extends Model
{
     protected $fillable =['patientId','referredBy','age','investigationAdvised','date','sample','quantity','colour','spGravity','reaction','albumin','suger','bileSalts','bilePigments','acetone','benceJonesProteins','pusCells','epithellalCells','crystals','rbs','bacteria','cast','others',
	];

	public function getPatientDetails(){
    	return $this->belongsTo(OpdModel::class,'patientId','id');
    }
}
