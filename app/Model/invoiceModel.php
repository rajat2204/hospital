<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class invoiceModel extends Model
{
    protected $fillable =['patientId','age','referredBy','date','report_name','amount','created_at','updated_at'];

	public function getPatientDetails(){
    	return $this->belongsTo(OpdModel::class,'patientId','id');
    }
}
