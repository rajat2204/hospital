<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\OpdModel;

class SerumOfWidalModel extends Model
{
    protected $fillable = ['patientId','referredBy','age','investigationAdvised','date','sTyphiO','sTyphiH','sTyphiAH','sTyphiBH','impression',];

    public function getPatientDetails(){
    	return $this->belongsTo(OpdModel::class,'patientId','id');
    }

}
