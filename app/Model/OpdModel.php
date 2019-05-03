<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\DepartmentModel;
use App\Model\OpdTreatmentModel;
use App\Model\IpdTreatmentModel;
use App\Model\IpdModel;
use App\Model\DoctorModel;
use App\Model\MedicineModel;
use App\Model\BloodExaminationModel;
use App\Model\EcgExaminationModel;
use App\Model\SemeneExaminationModel;
use App\Model\StoolExaminationModel;
use App\Model\UrineExaminationModel;
use App\Model\SerumOfWidalModel;
use App\Model\OtModel;

class OpdModel extends Model
{ use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function PatientTreatmentDetails() {
    	return $this->hasMany(OpdTreatmentModel::class,'patientId');
    }
    public function IpdTreatmentDetails() {
    	return $this->hasMany(IpdTreatmentModel::class,'patientId');
    }
    public function IpdData() {
    	return $this->hasOne(IpdModel::class,'patientId');
    }
     public function OtData() {
        return $this->hasOne(OtModel::class,'patientId');
    }
    public function getConsultant() {
    	return $this->hasOne(DoctorModel::class,'id','consultant');
    }
    public function getMedicine() {
    	return $this->hasOne(MedicineModel::class,'id','medicine');
    }
    public function getDepartment() {
        return $this->hasOne(DepartmentModel::class,'id','department');
    }
    public function bloodExamData() {
        return $this->hasOne(BloodExaminationModel::class,'patientId');
    }
    public function ecgExamData() {
        return $this->hasOne(EcgExaminationModel::class,'patientId');
    }
    public function semeneExamData() {
        return $this->hasOne(SemeneExaminationModel::class,'patientId');
    }
    public function stoolExamData() {
        return $this->hasOne(StoolExaminationModel::class,'patientId');
    }
    public function urineExamData() {
        return $this->hasOne(UrineExaminationModel::class,'patientId');
    }
    public function serunExamData() {
        return $this->hasOne(SerumOfWidalModel::class,'patientId');
    }
    public function opdtreatment() {
        return $this->hasOne(OpdTreatmentModel::class,'patientId');
    }public function ipdtreatment() {
        return $this->hasOne(IpdTreatmentModel::class,'patientId');
    }
}
