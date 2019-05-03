<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\DiseaseModel;

class YogaListModel extends Model
{
    protected $fillable = ['disease','exersise'];

    public function diseaseName(){
    	return $this->hasOne(DiseaseModel::class,'id','disease');
    }

    protected $table ='yoga_list_models';
}
