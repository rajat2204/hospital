<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\MedicineModel;
use App\Model\DoctorModel;
use App\Model\IpdTreatmentModel;
use App\Model\InvestigationModel;
use App\Model\WardModel;
use App\Model\OpdModel;

class IpdModel extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [

    	'patientId' ,'opdDate' ,'ipdRegNum' ,'ipdRegDate' ,'consultant' ,'otherConsultant' ,'prefixName' ,'refName' ,'wardName' ,'bedNum' ,'dod' ,'provisionalDiagnosis' ,'chiefComplaints' ,'pastHistory' ,'fh_maternal' ,'fh_paternal' ,'fh_other' ,'ge_gc' ,'ge_anaemla' ,'ge_bowel' ,'ge_pulse' ,'ge_jvp' ,'ge_sleep' ,'ge_temp' ,'ge_oedema' ,'ge_allergies' ,'ge_resp' ,'ge_cyanosis' ,'ge_skin' ,'ge_bp' ,'ge_appetite' ,'ge_thirst' ,'ge_tongue' ,'ge_lymph' ,'ge_addictions' ,'ge_conjective' ,'ge_throat' ,'ge_diet' ,'ecgTest' ,'respiratorySystem' ,'gastroIntestinalSystem' ,'cardioVascularSystem' ,'centralNervousSystem' ,'localExamination' ,'investigation1' ,'investigation2' ,'investigation3' ,'medicine1' ,'potency1' ,'medicine2' ,'potency2' ,'medicine3' ,'potency3' ,'dietPlan1' ,'diet1Text' ,'dietPlan2' ,'diet2Text' ,'yoga' ,'physiotherapy' ,'remark' ,'Status' ,
    ];

    public function getPatientDetails() { 
    	return $this->belongsTo(OpdModel::class,'patientId','id'); //in belongsTo condition there is PatientId is foriegn key and id is local key
    }
    public function getConsultant() {
    	return $this->hasOne(DoctorModel::class,'id')->withDefault([
        'consultant' => 'Dr. Chadda'
         ]);
    }
    public function getPatientTreatmentDetails() {
    	return $this->hasMany(IpdTreatmentModel::class,'ipdId');
    }
    public function getWardName() {
        return $this->hasOne(WardModel::class,'id','wardName')->withDefault([
        'wardName' => 'General Ward'
         ]);
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
