<?php

namespace App\Http\Controllers;

use App\Model\PotencyModel;
use Illuminate\Http\Request;
use DataTables;
use Validator;
class PotencyModelController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hms.management.potency');
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
    public function potencyList()
    {
       $potencyData = PotencyModel::all();

        return DataTables::of($potencyData)
            ->addColumn('action', function($data){
                return sprintf('<div class="btn-group btn-sm">
                       
             <button data-toggle="tooltip modal" data-name="%s" data-url="%s" data-placement="top" title="%s" data-id="%s" class="btn-sm %s btn btn-success ">%s</button>  
             <button data-toggle="tooltip modal" data-placement="top" title="%s" data-id="%s" class="btn-sm %s btn btn-danger ">%s</button></div>',
             $data['name'],route('update.potency',['id'=>$data['id']]),"update",$data['id'],'potencyedit','<i class="fa fa-pencil"></i>',
             "delete", $data['id'],'potency-delete','<i class="fa fa-trash"></i>');
                  
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
                    'name' => 'required|unique:potency_models,name',
       ]);
        if($validator->fails()) {
                return response()->json([
                    'errors'=>$validator->errors()->all(),
                    'status'=>false,
                ]);
            }
         
        $potency = new PotencyModel();
        $potency->name = $request->name;

        if($potency->save()) {
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
     * @param  \App\Model\PotencyModel  $potencyModel
     * @return \Illuminate\Http\Response
     */
    public function show(PotencyModel $potencyModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\PotencyModel  $potencyModel
     * @return \Illuminate\Http\Response
     */
    public function edit(PotencyModel $potencyModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\PotencyModel  $potencyModel
     * @return \Illuminate\Http\Response
     */
    public function updatePotency(Request $request)
    {
        //return $request->all();
            $validator = Validator::make($request->all(),[
                    'name' => 'required|unique:potency_models,name,'.$request->id,
            ]);
            if($validator->fails()) {
                    return response()->json([
                        'errors'=>$validator->errors()->all(),
                        'status'=>false,
                    ]);
                }
            $updatepotency = PotencyModel::where('id',$request->id)->first();
            $updatepotency->name = $request->name;

             if( $updatepotency->save()) {
                     return response()->json([

                    'status'=>true,
                    'titlee'=>'Update',
                    'msg'=>'Update Data Successfully',
                    'typee'=>'success'

                ],200);
             }
        }  
    public function delete(Request $request) {
        $potencyDelete = PotencyModel::where('id',$request->id)->delete();
         return response()->json([
                    'status'=>true,
                    'titlee'=>'Delete',
                    'msg'=>' Data  Delete Successfully',
                    'typee'=>'warning'

                ],200);
    }    
}
