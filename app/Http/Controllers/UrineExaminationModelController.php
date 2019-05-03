<?php

namespace App\Http\Controllers;

use App\Model\UrineExaminationModel;
use Illuminate\Http\Request;
use App\Model\OpdModel;
use DataTables;
class UrineExaminationModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hms.testReport.urine.urine');
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
    public function store(Request $request) {
        $this->validate($request,[

            'patientId'=>'required',
       
        ]);
        $urineExaminationData = UrineExaminationModel::create($request->all());
        $request->session()->flash('success_message','Data Save Successfully');
        return redirect(route('urineexam.filter'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\UrineExaminationModel  $UrineExaminationModel
     * @return \Illuminate\Http\Response
     */
    public function show(UrineExaminationModel $urineExaminationModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\UrineExaminationModel  $UrineExaminationModel
     * @return \Illuminate\Http\Response
     */
    public function edit(UrineExaminationModel $urineExaminationModel,$id)
    {
        $urineExamData = UrineExaminationModel::where('id',$id)->first();
        return view('hms.testReport.urine.urineexam-edit',compact('urineExamData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\UrineExaminationModel  $UrineExaminationModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UrineExaminationModel $urineExaminationModel,$id) {
        $this->validate($request,[

            'patientId'=>'required',
       
        ]);
        $urineExamDataUpdate = UrineExaminationModel::findOrFail($id)->first();
        if(!empty($urineExamDataUpdate)) {
            $urineExamDataUpdate->update($request->all());
        }
        else{
              return abort(404);
        }

        $request->session()->flash('success_message','Data Updated Successfully !!');
        return redirect(route('urineexam.filter'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\UrineExaminationModel  $UrineExaminationModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,UrineExaminationModel $urineExaminationModel,$id) {
       $urineExamDataDelete = UrineExaminationModel::where('id',$id)->delete();
      
       return response()->json(['status'=>true]);
    }

    public function urineExamFilter(Request $request) {

       
        return view('hms.testReport.urine.urineexam-filter');

    }
    public function urineExamData(Request $request) {

        $bloodFilterData =UrineExaminationModel::select('urine_examination_models.id as id','urine_examination_models.patientId as patientId','urine_examination_models.date as date','urine_examination_models.referredBy as referredBy','urine_examination_models.investigationAdvised as investigationAdvised','opd_models.patientName as patientName','opd_models.age as age','opd_models.regDate as regDate')
            ->join('opd_models', 'opd_models.id', '=', 'urine_examination_models.patientId')
            ->get();
             return DataTables::of($bloodFilterData)
            ->editColumn('regDate', function ($data){
                return \Carbon\Carbon::parse($data->regDate)->format('d/m/Y') ;})

            ->editColumn('date', function ($data){

                return \Carbon\Carbon::parse($data->date)->format('d/m/Y') ;})
             
            ->addColumn('action', function($data){

                return sprintf('<div class="btn-group"><button data-id="%s" class="urineexamView btn-sm btn btn-success">%s</button> 
                                <a href="%s">%s</a>   
                               <button data-id="%s" class="urineexamDelete  btn-sm btn btn-danger">%s</button></div>',
                               $data['id'],'<i class=" fa fa-eye"></i>',
                                route('urine-examination.edit',['id'=>$data['id']]),'<i class="btn-sm btn btn-info fa fa-pencil"></i>',
                                $data['id'],'<i class=" fa fa-trash"></i>');
              
            })->addColumn('sn',function($data){
                static $i=1;
                return $i++;
            })->make(true);  
            
    }
    public function urineExamReportView(Request $request){
            $id=$request->id;
            $data =UrineExaminationModel::where('id',$id)->first();
            $content =\View::make('hms.testReport.urine.urineexam-view',compact('data'));
            
           $content = $content->render();
            return response()->json([
                'html'=> $content,
                'status'=>true
            ],200);
        }
}
