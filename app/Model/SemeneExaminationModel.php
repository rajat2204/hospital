<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\OpdModel;
class SemeneExaminationModel extends Model
{
   
   protected $fillable = ['patientId','referredBy','age','investigationAdvised','date','placeOfCollection','timeOfCollectionInLab','quantity','consistency','colour','ph','liquficationTime','viscocity','count','motility','abnormalForms','pusCells','epithelialCells','rbcs','fructoseTest','other',

   ];

    public function getPatientDetails(){
    	return $this->belongsTo(OpdModel::class,'patientId','id');
    }

}
