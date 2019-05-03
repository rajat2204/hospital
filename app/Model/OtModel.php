<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\OpdModel;
use App\Model\DoctorModel;
use App\Model\MedicineModel;
class OtModel extends Model
{
    protected $fillable=[  "patientId","opdDate","ipdRegNum","ipdRegDate","otDate","dignosis","otProcessure"                  ,"consultant","otherConsultant","adviceTreatment","medicine1","medicine2",
                          "medicine3","Remark",'referby'
                        ];

    public function patientDetails() {
      return $this->belongsTo(OpdModel::class,'patientId','id');
    }

    public function getConsultant(){
    	return $this->hasOne(DoctorModel::class,'id','consultant');
    }

    public function getMedicine1(){
    	return $this->hasOne(MedicineModel::class,'id','medicine1');
    }

    public function getMedicine2(){
    	return $this->hasOne(MedicineModel::class,'id','medicine2');
    }
    
    public function getMedicine3(){
    	return $this->hasOne(MedicineModel::class,'id','medicine3');
    }
}
