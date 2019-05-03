<?php

namespace App\Http\Controllers;

use App\Model\MedicineModel;
use Illuminate\Http\Request;
use DataTables;
use Validator;
class MedicineModelController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hms.management.medicine');
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
    public function medicineList()
    {
       $medicineData = MedicineModel::all();

        return DataTables::of($medicineData)
            ->addColumn('action', function($data){
                return sprintf('<div class="btn-group btn-sm">
                       
             <button data-toggle="tooltip modal" data-name="%s" data-url="%s" data-placement="top" title="%s" data-id="%s" class="btn-sm %s btn btn-success ">%s</button>  
             <button data-toggle="tooltip modal" data-placement="top" title="%s" data-id="%s" class="btn-sm %s btn btn-danger ">%s</button></div>',
             $data['name'],route('medicine.update',['id'=>$data['id']]),"update",$data['id'],'medicineedit','<i class="fa fa-pencil"></i>',
             "delete", $data['id'],'medicine-delete','<i class="fa fa-trash"></i>');
                  
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
                    'name' => 'required|unique:medicine_models,name',
       ]);
        if($validator->fails()) {
                return response()->json([
                    'errors'=>$validator->errors()->all(),
                    'status'=>false,
                ]);
            }
         
        $medicine = new MedicineModel();
        $medicine->name = $request->name;

        if($medicine->save()) {
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
     * @param  \App\Model\MedicineModel  $medicineModel
     * @return \Illuminate\Http\Response
     */
    public function show(MedicineModel $medicineModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\MedicineModel  $medicineModel
     * @return \Illuminate\Http\Response
     */
    public function edit(MedicineModel $medicineModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\MedicineModel  $medicineModel
     * @return \Illuminate\Http\Response
     */
    public function updatemedicine(Request $request)
    {
        //return $request->all();
            $validator = Validator::make($request->all(),[
                    'name' => 'required|unique:medicine_models,name,'.$request->id,
            ]);
            if($validator->fails()) {
                    return response()->json([
                        'errors'=>$validator->errors()->all(),
                        'status'=>false,
                    ]);
                }
            $updatemedicine = MedicineModel::where('id',$request->id)->first();
            $updatemedicine->name = $request->name;

             if( $updatemedicine->save()) {
                     return response()->json([

                    'status'=>true,
                    'titlee'=>'Update',
                    'msg'=>'Update Data Successfully',
                    'typee'=>'success'

                ],200);
             }
        }  
    public function delete(Request $request) {
        $medicineDelete = MedicineModel::where('id',$request->id)->delete();
         return response()->json([
                    'status'=>true,
                    'titlee'=>'Delete',
                    'msg'=>' Data  Delete Successfully',
                    'typee'=>'warning'

                ],200);
    }    
} 
