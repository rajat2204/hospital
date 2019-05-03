<?php

namespace App\Http\Controllers;

use App\Model\InvestigationModel;
use Illuminate\Http\Request;
use Validator;
use DataTables;
class InvestigationModelController  extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hms.management.investigation');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function investigationList()
    {
       $investigationData = InvestigationModel::all();

        return DataTables::of($investigationData)
            ->addColumn('action', function($data){
                return sprintf('<div class="btn-group btn-sm">
                       
             <button data-toggle="tooltip modal" data-name="%s" data-url="%s" data-placement="top" title="%s" data-id="%s" class="btn-sm %s btn btn-success ">%s</button>  
             <button data-toggle="tooltip modal" data-placement="top" title="%s" data-id="%s" class="btn-sm %s btn btn-danger ">%s</button></div>',
             $data['name'],route('investigation.update',['id'=>$data['id']]),"update",$data['id'],'investigationedit','<i class="fa fa-pencil"></i>',
             "delete", $data['id'],'investigation-delete','<i class="fa fa-trash"></i>');
                  
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
       $validator = Validator::make($request->all(),[
                    'name' => 'required|unique:investigation_models,name',
       ]);
        if($validator->fails()) {
                return response()->json([
                    'errors'=>$validator->errors()->all(),
                    'status'=>false,
                ]);
            }
         
        $investigation = new InvestigationModel();
        $investigation->name = $request->name;

        if($investigation->save()) {
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
     * @param  \App\Model\InvestigationModel  $investigationModel
     * @return \Illuminate\Http\Response
     */
    public function show(InvestigationModel $investigationModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\InvestigationModel  $investigationModel
     * @return \Illuminate\Http\Response
     */
    public function edit(InvestigationModel $investigationModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\InvestigationModel  $investigationModel
     * @return \Illuminate\Http\Response
     */
    public function updateinvestigation(Request $request)
    {
        //return $request->all();
            $validator = Validator::make($request->all(),[
                    'name' => 'required|unique:investigation_models,name,'.$request->id,
            ]);
            if($validator->fails()) {
                    return response()->json([
                        'errors'=>$validator->errors()->all(),
                        'status'=>false,
                    ]);
                }
            $updateinvestigation = InvestigationModel::where('id',$request->id)->first();
            $updateinvestigation->name = $request->name;

             if( $updateinvestigation->save()) {
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
     * @param  \App\Model\InvestigationModel  $investigationModel
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $investigationDelete = InvestigationModel::where('id',$request->id)->delete();
         return response()->json([

                    'status'=>true,
                    'titlee'=>'Delete',
                    'msg'=>' Data  Delete Successfully',
                    'typee'=>'warning'

                ],200);
    }
}

