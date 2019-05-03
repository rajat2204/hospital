<?php

namespace App\Http\Controllers;

use App\Model\DoctorModel;
use Illuminate\Http\Request;
use Validator;
use DataTables;
class DoctorModelController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hms.management.doctor');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function doctorList()
    {
       $doctorData = DoctorModel::all();

        return DataTables::of($doctorData)
            ->addColumn('action', function($data){
                return sprintf('<div class="btn-group btn-sm">
                       
             <button data-toggle="tooltip modal" data-name="%s" data-url="%s" data-placement="top" title="%s" data-id="%s" class="btn-sm %s btn btn-success ">%s</button>  
             <button data-toggle="tooltip modal" data-placement="top" title="%s" data-id="%s" class="btn-sm %s btn btn-danger ">%s</button></div>',
             $data['name'],route('doctor.update',['id'=>$data['id']]),"update",$data['id'],'doctoredit','<i class="fa fa-pencil"></i>',
             "delete", $data['id'],'doctor-delete','<i class="fa fa-trash"></i>');
                  
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
                    'name' => 'required|unique:doctor_models,name',
       ]);
        if($validator->fails()) {
                return response()->json([
                    'errors'=>$validator->errors()->all(),
                    'status'=>false,
                ]);
            }
         
        $doctor = new DoctorModel();
        $doctor->name = $request->name;

        if($doctor->save()) {
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
     * @param  \App\Model\DoctorModel  $doctorModel
     * @return \Illuminate\Http\Response
     */
    public function show(DoctorModel $doctorModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\DoctorModel  $doctorModel
     * @return \Illuminate\Http\Response
     */
    public function edit(DoctorModel $doctorModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\DoctorModel  $doctorModel
     * @return \Illuminate\Http\Response
     */
    public function updateDoctor(Request $request)
    {
        //return $request->all();
            $validator = Validator::make($request->all(),[
                    'name' => 'required|unique:doctor_models,name,'.$request->id,
            ]);
            if($validator->fails()) {
                    return response()->json([
                        'errors'=>$validator->errors()->all(),
                        'status'=>false,
                    ]);
                }
            $updateDoctor = DoctorModel::where('id',$request->id)->first();
            $updateDoctor->name = $request->name;

             if( $updateDoctor->save()) {
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
     * @param  \App\Model\DoctorModel  $doctorModel
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $doctorDelete = DoctorModel::where('id',$request->id)->delete();
         return response()->json([

                    'status'=>true,
                    'titlee'=>'Delete',
                    'msg'=>' Data  Delete Successfully',
                    'typee'=>'warning'

                ],200);
    }
}
