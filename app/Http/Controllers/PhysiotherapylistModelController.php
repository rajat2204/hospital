<?php

namespace App\Http\Controllers;

use App\Model\PhysiotherapylistModel;
use App\Model\DiseaseModel;
use App\Model\TherapyDiseaseModel;
use Illuminate\Http\Request;
use Validator;
use DataTables;
class PhysiotherapylistModelController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

 public function index() {
        $therapyDiseaseList=TherapyDiseaseModel::all()->pluck('therapy_disease','id');
        return view('hms.management.physiotherpy',compact('therapyDiseaseList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function physiotherpyList()
    {
       $physiotherpyData = PhysiotherapylistModel::select('id','disease','therapy')->orderBy('id','DESC')->get();

        return DataTables::of($physiotherpyData)
            ->addColumn('action', function($data){
                return sprintf('<div class="btn-group btn-sm">
                       
             <button data-toggle="tooltip modal" data-disease="%s"  data-therapy="%s"  data-url="%s" data-placement="top" title="%s" data-id="%s" class="btn-sm %s btn btn-success ">%s</button>  
             <button data-toggle="tooltip modal" data-placement="top" title="%s" data-id="%s" class="btn-sm %s btn btn-danger ">%s</button></div>',
             $data['disease'],$data['therapy'],route('physiotherpy.update',['id'=>$data['id']]),"update",$data['id'],'physiotherpyedit','<i class="fa fa-pencil"></i>',
             "delete", $data['id'],'physiotherpy-delete','<i class="fa fa-trash"></i>');
                  
                })->addColumn('reg',function($data){
                        static $j=1;
                        return $j++;

                })->editColumn('disease',function($data) {
                        return $data->diseaseName->therapy_disease;

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
       $validator = Validator::make($request->all(),[
                    'disease' => 'required|unique:physiotherapylist_models,disease,',
                    'therapy' => 'required',
       ]);
        if($validator->fails()) {
                return response()->json(['errors'=>$validator->errors(),'status'=>false,]);
            }
         
        $physiotherpy = new PhysiotherapylistModel();
        $physiotherpy->disease = $request->disease;
        $physiotherpy->therapy = $request->therapy;

        if($physiotherpy->save()) {
            return response()->json(['status'=>true,'titlee'=>'Save','msg'=>'Data Save Successfully','typee'=>'success']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\PhysiotherapylistModel  $physiotherapylistModel
     * @return \Illuminate\Http\Response
     */
    public function show(PhysiotherapylistModel $physiotherapylistModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\PhysiotherapylistModel  $physiotherapylistModel
     * @return \Illuminate\Http\Response
     */
    public function edit(PhysiotherapylistModel $physiotherapylistModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\PhysiotherapylistModel  $physiotherapylistModel
     * @return \Illuminate\Http\Response
     */
    public function updatephysiotherpy(Request $request)
    {
        //return $request->all();
            $validator = Validator::make($request->all(),[
                    'disease' => 'required|unique:physiotherapylist_models,disease,'.$request->id,
                    'therapy' => 'required',
            ]);
            if($validator->fails()) {
                    return response()->json([
                        'errors'=>$validator->errors(),
                        'status'=>false,
                    ]);
                }
            $updatephysiotherpy = PhysiotherapylistModel::where('id',$request->id)->first();
          
            $updatephysiotherpy->disease = $request->disease;
            $updatephysiotherpy->therapy = $request->therapy;

             if( $updatephysiotherpy->save()) {
                     return response()->json([

                    'status'=>true,
                    'titlee'=>'Update',
                    'msg'=>'Update Data Successfully',
                    'typee'=>'success'

                ],200);
             }      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\PhysiotherapylistModel  $physiotherapylistModel
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $physiotherpyDelete = PhysiotherapylistModel::where('id',$request->id)->delete();
         return response()->json([

                    'status'=>true,
                    'titlee'=>'Delete',
                    'msg'=>' Data  Delete Successfully',
                    'typee'=>'warning'

                ],200);
    }
}