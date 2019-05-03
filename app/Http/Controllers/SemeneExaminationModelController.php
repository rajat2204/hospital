<?php

namespace App\Http\Controllers;

use App\Model\SemeneExaminationModel;
use App\Model\OpdModel;
use Illuminate\Http\Request;
use DataTables;
class SemeneExaminationModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hms.testReport.semene.semene');
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
            'patientId'=>'required'
        ]);
        $semeneExaminationData = SemeneExaminationModel::create($request->all());
        $request->session()->flash('success_message','Data Save Successfully');
        return redirect(route('semeneexam.filter'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\SemeneExaminationModel  $semeneExaminationModel
     * @return \Illuminate\Http\Response
     */
    public function show(SemeneExaminationModel $semeneExaminationModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\SemeneExaminationModel  $semeneExaminationModel
     * @return \Illuminate\Http\Response
     */
    public function edit(SemeneExaminationModel $semeneExaminationModel,$id) {
        
        $semeneExamData = SemeneExaminationModel::where('id',$id)->first();
        return view('hms.testReport.semene.semene-edit',compact('semeneExamData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\SemeneExaminationModel  $semeneExaminationModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SemeneExaminationModel $semeneExaminationModel,$id) {
         $this->validate($request,[
            'patientId'=>'required'
        ]);
        $semeneExamDataUpdate = SemeneExaminationModel::findOrFail($id)->first();
        if(!empty($semeneExamDataUpdate)) {
            $semeneExamDataUpdate->update($request->all());
        }
        else{
              return abort(404);
        }
        $request->session()->flash('success_message','Data Updated Successfully !!');
        return redirect(route('semeneexam.filter'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\SemeneExaminationModel  $semeneExaminationModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,SemeneExaminationModel $semeneExaminationModel,$id)
    {
       $semeneExamDataDelete = SemeneExaminationModel::where('id',$id)->delete();
      // $request->session()->flash('error_message','Data Delete Successfully !!');
       return response()->json(['status'=>true]);
    }

    public function semeneExamFilter(Request $request) {

       
        return view('hms.testReport.semene.semeneexam-filter');

    }
    public function semeneExamData(Request $request) {

        $bloodFilterData =SemeneExaminationModel::select('semene_examination_models.id as id','semene_examination_models.patientId as patientId','semene_examination_models.date as date','semene_examination_models.referredBy as referredBy','semene_examination_models.investigationAdvised as investigationAdvised','opd_models.patientName as patientName','opd_models.age as age','opd_models.regDate as regDate')
            ->join('opd_models', 'opd_models.id', '=', 'semene_examination_models.patientId')
            ->get();
             return DataTables::of($bloodFilterData)
            ->editColumn('regDate', function ($data){
                return \Carbon\Carbon::parse($data->regDate)->format('d/m/Y') ;})

            ->editColumn('date', function ($data){

                return \Carbon\Carbon::parse($data->date)->format('d/m/Y') ;})
             
            ->addColumn('action', function($data){

                return sprintf('<div class="btn-group "><button data-id="%s" class="semeneexamView btn-sm btn btn-success">%s</button> 
                                <a href="%s">%s</a>   
                               <button data-id="%s" class="semeneexamDelete btn-sm btn btn-danger">%s</button></div>',
                               $data['id'],'<i class=" fa fa-eye"></i>',
                                route('semene-examination.edit',['id'=>$data['id']]),'<i class=" btn-sm btn btn-info fa fa-pencil"></i>',
                                $data['id'],'<i class=" fa fa-trash"></i>');
              
            })->addColumn('sn',function($data){
                static $i=1;
                return $i++;
            })->make(true);  
            
    }
    public function semeneExamReportView(Request $request){
            $id=$request->id;
            $data =SemeneExaminationModel::where('id',$id)->first();
            $content =\View::make('hms.testReport.semene.semeneexam-view',compact('data'));
            
           $content = $content->render();
            return response()->json([
                'html'=> $content,
                'status'=>true
            ],200);
        }
}
