<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ultraSoundModel extends Model
{

	protected $fillable =['patientId','referredBy','age','date','remark','ultrasound_type','amount','created_at','updated_at'
];
	
    public function getPatientDetails(){
    	return $this->belongsTo(OpdModel::class,'patientId','id');
    }
}
