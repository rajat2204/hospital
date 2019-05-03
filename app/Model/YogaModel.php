<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\YogaModel;
use App\Model\IpdModel;
use App\Model\OpdModel;
class YogaModel extends Model {
    protected $fillable = ['patientId','referredBy','age','investigationAdvised','yogadate','disease','exersise','other','remark'];


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