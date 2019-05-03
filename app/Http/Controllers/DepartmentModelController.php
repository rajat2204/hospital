<?php

namespace App\Http\Controllers;

use App\Model\DepartmentModel;
use Illuminate\Http\Request;
use Validator;
use DataTables;
class DepartmentModelController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hms.management.department');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function departmentList()
    {
       $departmentData = DepartmentModel::all();

        return DataTables::of($departmentData)
            ->addColumn('action', function($data){
                return sprintf('<div class="btn-group btn-sm">
                       
             <button data-toggle="tooltip modal" data-name="%s" data-url="%s" data-placement="top" title="%s" data-id="%s" class="btn-sm %s btn btn-success ">%s</button>  
             <button data-toggle="tooltip modal" data-placement="top" title="%s" data-id="%s" class="btn-sm %s btn btn-danger ">%s</button></div>',
             $data['name'],route('department.update',['id'=>$data['id']]),"update",$data['id'],'departmentedit','<i class="fa fa-pencil"></i>',
             "delete", $data['id'],'department-delete','<i class="fa fa-trash"></i>');
                  
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
                    'name' => 'required|unique:department_models,name',
       ]);
        if($validator->fails()) {
                return response()->json([
                    'errors'=>$validator->errors()->all(),
                    'status'=>false,
                ]);
            }
         
        $department = new DepartmentModel();
        $department->name = $request->name;

        if($department->save()) {
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
     * @param  \App\Model\DepartmentModel  $departmentModel
     * @return \Illuminate\Http\Response
     */
    public function show(DepartmentModel $departmentModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\DepartmentModel  $departmentModel
     * @return \Illuminate\Http\Response
     */
    public function edit(DepartmentModel $departmentModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\DepartmentModel  $departmentModel
     * @return \Illuminate\Http\Response
     */
    public function updateDepartment(Request $request)
    {
        //return $request->all();
            $validator = Validator::make($request->all(),[
                    'name' => 'required|unique:department_models,name,'.$request->id,
            ]);
            if($validator->fails()) {
                    return response()->json([
                        'errors'=>$validator->errors()->all(),
                        'status'=>false,
                    ]);
                }
            $updatedepartment = DepartmentModel::where('id',$request->id)->first();
            $updatedepartment->name = $request->name;

             if( $updatedepartment->save()) {
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
     * @param  \App\Model\DepartmentModel  $departmentModel
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $departmentDelete = DepartmentModel::where('id',$request->id)->delete();
         return response()->json([

                    'status'=>true,
                    'titlee'=>'Delete',
                    'msg'=>' Data  Delete Successfully',
                    'typee'=>'warning'

                ],200);
    }
}
