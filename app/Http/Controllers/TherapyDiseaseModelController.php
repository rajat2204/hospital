<?php

namespace App\Http\Controllers;

use App\Model\TherapyDiseaseModel;
use Illuminate\Http\Request;
use DataTables;
use Validator;
class TherapyDiseaseModelController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hms.management.therapy-disease');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function therapyDiseaseList()
    {
       $therapyDiseaseData = TherapyDiseaseModel::all();

        return DataTables::of($therapyDiseaseData)
            ->addColumn('action', function($data){
                return sprintf('<div class="btn-group btn-sm">
                       
             <button data-toggle="tooltip modal" data-name="%s" data-url="%s" data-placement="top" title="%s" data-id="%s" class="btn-sm %s btn btn-success ">%s</button>  
             <button data-toggle="tooltip modal" data-placement="top" title="%s" data-id="%s" class="btn-sm %s btn btn-danger ">%s</button></div>',
             $data['therapy_disease'],route('therapyDisease.update',['id'=>$data['id']]),"update",$data['id'],'therapyDisease-edit','<i class="fa fa-pencil"></i>',
             "delete", $data['id'],'therapyDisease-delete','<i class="fa fa-trash"></i>');
                  
                })->addColumn('id',function($data){
                        static $j=1;
                        return $j++;

                })->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
       $validator = Validator::make($request->all(),[
                     'therapy_disease' => 'required|unique:therapy_disease_models,therapy_disease',
       ]);
        if($validator->fails()) {
                return response()->json([
                    'errors'=>$validator->errors()->all(),
                    'status'=>false,
                ]);
            }
         
        $therapyDisease = new TherapyDiseaseModel();
        $therapyDisease->therapy_disease = $request->therapy_disease;

        if($therapyDisease->save()) {
            return response()->json([

                'status'=>true,
                'titlee'=>'Save',
                'msg'=>'Data Save Successfully',
                'typee'=>'success'

            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\DiseaseModel  $diseaseModel
     * @return \Illuminate\Http\Response
     */
    public function show(TherapyDiseaseModel $therapyDiseaseModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\DiseaseModel  $diseaseModel
     * @return \Illuminate\Http\Response
     */
    public function edit(TherapyDiseaseModel $therapyDiseaseModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\DiseaseModel  $diseaseModel
     * @return \Illuminate\Http\Response
     */
    public function updatetherapyDisease(Request $request)
    {
        //return $request->all();
            $validator = Validator::make($request->all(),[
                    'therapy_disease' => 'required|unique:therapy_disease_models,therapy_disease,'.$request->id,
            ]);
            if($validator->fails()) {
                    return response()->json([
                        'errors'=>$validator->errors()->all(),
                        'status'=>false,
                    ]);
                }
            $updatedisease = TherapyDiseaseModel::where('id',$request->id)->first();
            $updatedisease->therapy_disease = $request->therapy_disease;

             if( $updatedisease->save()) {
                     return response()->json([

                    'status'=>true,
                    'titlee'=>'Update',
                    'msg'=>'Update Data Successfully',
                    'typee'=>'success'

                ],200);
             }
        }  
    public function delete(Request $request) {
        $diseaseDelete = TherapyDiseaseModel::where('id',$request->id)->delete();
         return response()->json([
                    'status'=>true,
                    'titlee'=>'Delete',
                    'msg'=>' Data  Delete Successfully',
                    'typee'=>'warning'

                ],200);
    }    
} 
