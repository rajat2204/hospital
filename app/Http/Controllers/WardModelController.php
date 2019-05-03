<?php

namespace App\Http\Controllers;

use App\Model\WardModel;
use Illuminate\Http\Request;
use Validator;
use DataTables;
class WardModelController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hms.management.ward');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function wardList()
    {
       $wardData = WardModel::all();

        return DataTables::of($wardData)
            ->addColumn('action', function($data){
                return sprintf('<div class="btn-group btn-sm">
                       
             <button data-toggle="tooltip modal" data-name="%s" data-url="%s" data-placement="top" title="%s" data-id="%s" class="btn-sm %s btn btn-success ">%s</button>  
             <button data-toggle="tooltip modal" data-placement="top" title="%s" data-id="%s" class="btn-sm %s btn btn-danger ">%s</button></div>',
             $data['name'],route('ward.update',['id'=>$data['id']]),"update",$data['id'],'wardedit','<i class="fa fa-pencil"></i>',
             "delete", $data['id'],'ward-delete','<i class="fa fa-trash"></i>');
                  
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
                    'name' => 'required|unique:ward_models,name',
       ]);
        if($validator->fails()) {
                return response()->json([
                    'errors'=>$validator->errors()->all(),
                    'status'=>false,
                ]);
            }
         
        $ward = new WardModel();
        $ward->name = $request->name;

        if($ward->save()) {
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
     * @param  \App\Model\WardModel  $WardModel
     * @return \Illuminate\Http\Response
     */
    public function show(WardModel $wardModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\WardModel  $WardModel
     * @return \Illuminate\Http\Response
     */
    public function edit(WardModel $wardModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\WardModel  $WardModel
     * @return \Illuminate\Http\Response
     */
    public function updateward(Request $request)
    {
        //return $request->all();
            $validator = Validator::make($request->all(),[
                    'name' => 'required|unique:ward_models,name,'.$request->id,
            ]);
            if($validator->fails()) {
                    return response()->json([
                        'errors'=>$validator->errors()->all(),
                        'status'=>false,
                    ]);
                }
            $updateward = WardModel::where('id',$request->id)->first();
            $updateward->name = $request->name;

             if( $updateward->save()) {
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
     * @param  \App\Model\WardModel  $WardModel
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $wardDelete = WardModel::where('id',$request->id)->delete();
         return response()->json([

                    'status'=>true,
                    'titlee'=>'Delete',
                    'msg'=>' Data  Delete Successfully',
                    'typee'=>'warning'

                ],200);
    }
}
