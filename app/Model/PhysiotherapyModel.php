<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PhysiotherapyModel extends Model
{
    protected $fillable = ['patientId','referredBy','age','investigationAdvised','phyadate','disease','therapy','other','remark','created_at','updated_at'];

    public function opdData() {
		return $this->belongsTo(OpdModel::class,'patientId','id');
	}
	public function ipdData() {
		return $this->belongsTo(IpdModel::class,'patientId','patientId');
	}
	public function diseaseName(){
   		return $this->belongsTo(DiseaseModel::class,'disease','id');
   }
}
