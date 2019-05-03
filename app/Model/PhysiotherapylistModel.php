<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\TherapyDiseaseModel;

class PhysiotherapylistModel extends Model
{
   protected $fillable = ['disease','therapy'];


   public function diseaseName(){
   		return $this->belongsTo(TherapyDiseaseModel::class,'disease','id');
   }
}
