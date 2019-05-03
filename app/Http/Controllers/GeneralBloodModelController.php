<?php

namespace App\Http\Controllers;

use App\Model\GeneralBloodModel;
use App\Model\OpdModel;
use Illuminate\Http\Request;
use DataTables;
class GeneralBloodModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('hms.testReport.generalblood.generalblood');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request,[

            'patientId'=>'required',
            
        ]);
       $generalBlood = GeneralBloodModel::create($request->all());
       $request->session()->flash('success_message','Data Save Successfully !!');
        return redirect(route('generalblood.filter'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\GeneralBloodModel  $generalBloodModel
     * @return \Illuminate\Http\Response
     */
    public function show(GeneralBloodModel $generalBloodModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\GeneralBloodModel  $generalBloodModel
     * @return \Illuminate\Http\Response
     */
    public function edit(GeneralBloodModel $generalBloodModel,$id) {
        $generalBloodData = GeneralBloodModel::where('id',$id)->first();
        return view('hms.testReport.generalblood.generalblood-edit',compact('generalBloodData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\GeneralBloodModel  $generalBloodModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GeneralBloodModel $generalBloodModel,$id) {
        $this->validate($request,[

            'patientId'=>'required',
            
        ]);
        $generalBloodUpdate = GeneralBloodModel::findOrFail($id)->first();
        if(!empty($generalBloodUpdate)) {
            $generalBloodUpdate->update($request->all());
        }
        else{
              return abort(404);
        }

        $request->session()->flash('success_message','Data Updated Successfully !!');
       return redirect(route('generalblood.filter'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\GeneralBloodModel  $generalBloodModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(GeneralBloodModel $generalBloodModel,$id)
    {
        $bloodDataDelete = GeneralBloodModel::where('id',$id)->delete();
        //$request->session()->flash('error_message','Data Delete Successfully !!');
        return response()->json(['status'=>true]);
    }
    public function generalBloodFilter(Request $request){
        return view('hms.testReport.generalblood.generalblood-filter');

    }

    public function generalBloodData(Request $request) {

        $bloodFilterData =GeneralBloodModel::select('general_blood_models.id as id','general_blood_models.patientId as patientId','general_blood_models.date as date','general_blood_models.referredBy as referredBy','general_blood_models.investigationAdvised as investigationAdvised','opd_models.patientName as patientName','opd_models.age as age','opd_models.regDate as regDate')
            ->join('opd_models', 'opd_models.id', '=', 'general_blood_models.patientId')
            ->get();
             return DataTables::of($bloodFilterData)
            ->editColumn('regDate', function ($data){
                return \Carbon\Carbon::parse($data->regDate)->format('d/m/Y') ;})

            ->editColumn('date', function ($data){

                return \Carbon\Carbon::parse($data->date)->format('d/m/Y') ;})
             
            ->addColumn('action', function($data){

                return sprintf('<div class="btn-group"><button data-id="%s" class="generalbloodView btn-sm btn btn-success">%s</button> 
                                <a href="%s">%s</a>   
                               <button data-id="%s" class="generalbloodDelete btn-sm btn btn-danger" >%s</button> </div>',
                               $data['id'],'<i class=" fa fa-eye"></i>',
                                route('general-blood.edit',['id'=>$data['id']]),'<i class=" btn-sm btn btn-info fa fa-pencil"></i>',
                                $data['id'],'<i class=" fa fa-trash" ></i>');
              
            })->addColumn('sn',function($data){
                static $i=1;
                return $i++;
            })->make(true);  
            
    }
    public function generalBloodReportView(Request $request){
            $id=$request->id;
            $data =GeneralBloodModel::where('id',$id)->first();
            $content =\View::make('hms.testReport.generalblood.generalblood-view',compact('data'));
            
           $content = $content->render();
            return response()->json([
                'html'=> $content,
                'status'=>true
            ],200);
        }

}
