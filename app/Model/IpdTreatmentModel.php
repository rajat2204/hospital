<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class IpdTreatmentModel extends Model
{
    public function IpdData(){
    	return $this->belongsTo('App\Model\IpdModel','ipdId','id');
    }

    public function getPatientName(){
		return $this->belongsTo('App\Model\OpdModel','patientId','id');
    }
     public function getConsultant() {
    	return $this->hasOne(DoctorModel::class,'id');
    }
    public function getMedicine(){
        return $this->hasOne(MedicineModel::class,'id','medicine');
    }
	public function getPotency(){
	        return $this->hasOne(PotencyModel::class,'id','potency');
	    }
	public function getInvestigation(){
	        return $this->hasOne(InvestigationModel::class,'id','advice');
    }
    public function getMedicine1(){
        return $this->hasOne(MedicineModel::class,'id','medicine1')->withDefault([
        'medicine1' => 'Comliflam'
         ]);
    }
    public function getMedicine2(){
        return $this->hasOne(MedicineModel::class,'id','medicine2')->withDefault([
        'medicine2' => 'Comliflam'
         ]);
    }
    public function getMedicine3(){
        return $this->hasOne(MedicineModel::class,'id','medicine3')->withDefault([
        'medicine3' => 'Comliflam'
         ]);
    }
    public function getPotency1(){
        return $this->hasOne(PotencyModel::class,'id','potency1')->withDefault([
        'potency1' => '2M'
         ]);
    }
    public function getPotency2(){
        return $this->hasOne(PotencyModel::class,'id','potency2')->withDefault([
        'potency2' => '2M'
         ]);
    }
    public function getPotency3(){
        return $this->hasOne(PotencyModel::class,'id','potency3')->withDefault([
        'potency3' => '2M'
         ]);
    }
    public function getInvestigation1(){
        return $this->hasOne(InvestigationModel::class,'id','investigation1')->withDefault([
        'investigation1' => 'Stomach Pain'
         ]);
    }
    public function getInvestigation2(){
        return $this->hasOne(InvestigationModel::class,'id','investigation2')->withDefault([
        'investigation2' => 'Stomach Pain'
         ]);
    }
    public function getInvestigation3(){
        return $this->hasOne(InvestigationModel::class,'id','investigation3')->withDefault([
        'investigation3' => 'Stomach Pain'
         ]);

    }
    public function getDietPlan1(){
      
        return $this->hasOne(DietPlanModel::class,'id','dietPlan1')->withDefault([
        'dietPlan1' => 'Low Sugar'
         ]);
    }
    public function getDietPlan2(){
        return $this->hasOne(DietPlanModel::class,'id','dietPlan2')->withDefault([
        'dietPlan2' => 'Low Sugar'
         ]);
    }
}
