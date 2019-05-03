<?php

namespace App\Http\Controllers;

use App\Model\DietPlanModel;
use Illuminate\Http\Request;
use Validator;
use DataTables;
class DietPlanModelController  extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hms.management.dietplan');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dietplanList()
    {
       $dietplanData = DietPlanModel::all();

        return DataTables::of($dietplanData)
            ->addColumn('action', function($data){
                return sprintf('<div class="btn-group btn-sm">
                       
             <button data-toggle="tooltip modal" data-name="%s" data-url="%s" data-placement="top" title="%s" data-id="%s" class="btn-sm %s btn btn-success ">%s</button>  
             <button data-toggle="tooltip modal" data-placement="top" title="%s" data-id="%s" class="btn-sm %s btn btn-danger ">%s</button></div>',
             $data['name'],route('dietplan.update',['id'=>$data['id']]),"update",$data['id'],'dietplanedit','<i class="fa fa-pencil"></i>',
             "delete", $data['id'],'dietplan-delete','<i class="fa fa-trash"></i>');
                  
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
                    'name' => 'required|unique:diet_plan_models,name',
       ]);
        if($validator->fails()) {
                return response()->json([
                    'errors'=>$validator->errors()->all(),
                    'status'=>false,
                ]);
            }
         
        $dietplan = new DietPlanModel();
        $dietplan->name = $request->name;

        if($dietplan->save()) {
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
     * @param  \App\Model\DietPlanModel  $dietPlanModel
     * @return \Illuminate\Http\Response
     */
    public function show(DietPlanModel $dietPlanModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\DietPlanModel  $dietPlanModel
     * @return \Illuminate\Http\Response
     */
    public function edit(DietPlanModel $dietPlanModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\DietPlanModel  $dietPlanModel
     * @return \Illuminate\Http\Response
     */
    public function updatedietplan(Request $request)
    {
        //return $request->all();
            $validator = Validator::make($request->all(),[
                    'name' => 'required|unique:diet_plan_models,name,'.$request->id,
            ]);
            if($validator->fails()) {
                    return response()->json([
                        'errors'=>$validator->errors()->all(),
                        'status'=>false,
                    ]);
                }
            $updatedietplan = DietPlanModel::where('id',$request->id)->first();
            $updatedietplan->name = $request->name;

             if( $updatedietplan->save()) {
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
     * @param  \App\Model\DietPlanModel  $dietPlanModel
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $dietplanDelete = DietPlanModel::where('id',$request->id)->delete();
         return response()->json([

                    'status'=>true,
                    'titlee'=>'Delete',
                    'msg'=>' Data  Delete Successfully',
                    'typee'=>'warning'

                ],200);
    }
}

