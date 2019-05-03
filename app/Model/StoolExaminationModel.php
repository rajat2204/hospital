<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class StoolExaminationModel extends Model
{
   protected $fillable =['patientId','referredBy','age','investigationAdvised','date','colour','consistency','mucus','blood','pusCells','rbcs','vegetableMatter','cysts','giardia','eHistolytica','eCoil','ova','worms','occultBlood','reducingSubstances','other',
	];

	public function getPatientDetails(){
    	return $this->belongsTo(OpdModel::class,'patientId','id');
    }
}
