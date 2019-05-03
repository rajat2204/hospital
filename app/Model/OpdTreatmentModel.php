<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\DoctorModel;
use App\Model\MedicineModel;
use App\Model\OpdModel;
use App\Model\PotencyModel;
use App\Model\InvestigationModel;
class OpdTreatmentModel extends Model
{

	protected $fillable = ['patientId','refTo','complaint','treatment_date','treatment','medicine','potency','nod','advice','remark','consultant'];

    public function OpdData() {
    	return $this->belongsTo(OpdModel::class,'patientId','id');
    }
    
    public function getConsultant() {
    	return $this->hasOne(DoctorModel::class,'id','consultant');
    }
 	public function getMedicine() {
    	return $this->hasOne(MedicineModel::class,'id','medicine');
    }
    public function getPotency() {
    	return $this->hasOne(PotencyModel::class,'id','potency');
    }
    public function getInvestigation() {
    	return $this->hasOne(InvestigationModel::class,'id','advice');
    }
    public function getDepartment() {
        return $this->hasOne(DepartmentModel::class,'id','department');
    }
}
