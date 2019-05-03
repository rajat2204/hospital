<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EcgExaminationModel extends Model
{
    protected $fillable =['patientId','referredBy','age','date','remark'];

	public function getPatientDetails(){
    	return $this->belongsTo(OpdModel::class,'patientId','id');
    }
}
