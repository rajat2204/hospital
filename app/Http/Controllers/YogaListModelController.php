<?php

namespace App\Http\Controllers;

use App\Model\YogaListModel;
use App\Model\DiseaseModel;
use Illuminate\Http\Request;
use DataTables;
use Validator;
class YogaListModelController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $diseaseList = DiseaseModel::all()->pluck('name','id');
        return view('hms.management.yogalist',compact('diseaseList'));
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
    public function yogalistList() {
       $yogalistData = YogaListModel::select('id','disease','exersise');
        return DataTables::of($yogalistData)
            ->addColumn('action', function($data){
                return sprintf('<div class="btn-group btn-sm">
             <button data-toggle="tooltip modal" data-name="%s" data-url="%s" data-placement="top" title="%s" data-id="%s" class="btn-sm %s btn btn-success ">%s</button>  
             <button data-toggle="tooltip modal" data-placement="top" title="%s" data-id="%s" class="btn-sm %s btn btn-danger ">%s</button></div>',
             $data['name'],route('yogalist.update',['id'=>$data['id']]),"update",$data['id'],'yogalistedit','<i class="fa fa-pencil"></i>',
             "delete", $data['id'],'yogalist-delete','<i class="fa fa-trash"></i>');
                  
                })->addColumn('reg',function($data){
                        static $j=1;
                        return $j++;
                })->editColumn('disease',function($data){
                    return $data->diseaseName->name;
                })->filterColumn('disease', function($q, $keyword) {
                    $q->whereHas('diseaseName',function($q) use ($keyword) {
                        $q->where('name','LIKE',["%{$keyword}%"]);
                    });
                })->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
      
       $validator = Validator::make($request->all(),[
                    'disease' => 'required|',
                     'exersise'=>'required|unique:yoga_list_models,exersise',
       ]);
        if($validator->fails()) {
                return response()->json([
                    'errors'=>$validator->errors()->all(),
                    'status'=>false,
                ]);
            }
        $yogalist = new YogaListModel();
        $yogalist->disease = $request->disease;
        $yogalist->exersise = $request->exersise;

        if($yogalist->save()) {
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
     * @param  \App\Model\YogaListModel  $yogaListModel
     * @return \Illuminate\Http\Response
     */
    public function show(YogaListModel $yogaListModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\YogaListModel  $yogaListModel
     * @return \Illuminate\Http\Response
     */
    public function edit(YogaListModel $yogaListModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\YogaListModel  $yogaListModel
     * @return \Illuminate\Http\Response
     */
    public function updateyogalist(Request $request)
    {
        //return $request->all();
            $validator = Validator::make($request->all(),[
                    'disease' => 'required',
                    'exersise'=>'required|unique:yoga_list_models,exersise,'.$request->id,
            ]);
            if($validator->fails()) {
                    return response()->json([
                        'errors'=>$validator->errors()->all(),
                        'status'=>false,
                    ]);
                }
            $updateyogalist = YogaListModel::where('id',$request->id)->first();
            $updateyogalist->disease = $request->disease;
             $yogalist->exersise = $request->exersise;

             if( $updateyogalist->save()) {
                     return response()->json([

                    'status'=>true,
                    'titlee'=>'Update',
                    'msg'=>'Update Data Successfully',
                    'typee'=>'success'

                ],200);
             }
        }  
    public function delete(Request $request) {
        $yogalistDelete = YogaListModel::where('id',$request->id)->delete();
         return response()->json([
                    'status'=>true,
                    'titlee'=>'Delete',
                    'msg'=>' Data  Delete Successfully',
                    'typee'=>'warning'

                ],200);
    }    
} 
