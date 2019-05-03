<?php

namespace App\Http\Controllers;

use App\Model\StoolExaminationModel;
use App\Model\OpdModel;
use Illuminate\Http\Request;
use DataTables;
class StoolExaminationModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hms.testReport.stool.stool');
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
        $stoolExaminationData = StoolExaminationModel::create($request->all());
        $request->session()->flash('success_message','Data Save Successfully');
        return redirect(route('stoolexam.filter'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\StoolExaminationModel  $StoolExaminationModel
     * @return \Illuminate\Http\Response
     */
    public function show(StoolExaminationModel $stoolExaminationModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\StoolExaminationModel  $StoolExaminationModel
     * @return \Illuminate\Http\Response
     */
    public function edit(StoolExaminationModel $stoolExaminationModel,$id)
    {
        $stoolExamData = StoolExaminationModel::where('id',$id)->first();
        return view('hms.testReport.stool.stoolexam-edit',compact('stoolExamData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\StoolExaminationModel  $StoolExaminationModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StoolExaminationModel $stoolExaminationModel,$id) {
        $this->validate($request,[
            'patientId'=>'required',
        ]);
        $stoolExamDataUpdate = StoolExaminationModel::findOrFail($id)->first();
        if(!empty($stoolExamDataUpdate)) {
            $stoolExamDataUpdate->update($request->all());
        }
        else{
              return abort(404);
        }

        $request->session()->flash('success_message','Data Updated Successfully !!');
        return redirect(route('stoolexam.filter'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\StoolExaminationModel  $StoolExaminationModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,StoolExaminationModel $stoolExaminationModel,$id)
    {
       $stoolExamDataDelete = StoolExaminationModel::where('id',$id)->delete();
      // $request->session()->flash('error_message','Data Delete Successfully !!');
       return response()->json(['status'=>true]);
    }

    public function stoolExamFilter(Request $request) {

       
        return view('hms.testReport.stool.stoolexam-filter');

    }
    public function stoolExamData(Request $request) {

        $bloodFilterData =StoolExaminationModel::select('stool_examination_models.id as id','stool_examination_models.patientId as patientId','stool_examination_models.date as date','stool_examination_models.referredBy as referredBy','stool_examination_models.investigationAdvised as investigationAdvised','opd_models.patientName as patientName','opd_models.age as age','opd_models.regDate as regDate')
            ->join('opd_models', 'opd_models.id', '=', 'stool_examination_models.patientId')
            ->get();
             return DataTables::of($bloodFilterData)
            ->editColumn('regDate', function ($data){
                return \Carbon\Carbon::parse($data->regDate)->format('d/m/Y') ;})

            ->editColumn('date', function ($data){

                return \Carbon\Carbon::parse($data->date)->format('d/m/Y') ;})
             
            ->addColumn('action', function($data){

                return sprintf('<div class="btn-group"><button data-id="%s" class="stoolexamView btn-sm btn btn-success">%s</button> 
                                <a href="%s">%s</a>   
                               <button data-id="%s" class="stoolexamDelete btn-sm btn btn-danger">%s</button></div>',
                               $data['id'],'<i class=" fa fa-eye"></i>',
                                route('stool-examination.edit',['id'=>$data['id']]),'<i class=" btn-sm btn btn-info fa fa-pencil"></i>',
                                $data['id'],'<i class=" fa fa-trash"></i>');
              
            })->addColumn('sn',function($data){
                static $i=1;
                return $i++;
            })->make(true);  
            
    }
    public function stoolExamReportView(Request $request){
            $id=$request->id;
            $data =StoolExaminationModel::where('id',$id)->first();
            $content =\View::make('hms.testReport.stool.stoolexam-view',compact('data'));
            
           $content = $content->render();
            return response()->json([
                'html'=> $content,
                'status'=>true
            ],200);
        }
}
