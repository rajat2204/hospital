<?php

namespace App\Http\Controllers;

use App\Model\EcgExaminationModel;
use Illuminate\Http\Request;
use App\Model\OpdModel;
use DataTables;
class EcgExaminationModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('hms.testReport.ecg.ecg');
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
    public function store(Request $request)
    {
        $this->validate($request,[

            'patientId'=>'required',
            'remark'=>'required'
        ]);
         $ecgExamData = EcgExaminationModel::create($request->all());
         $request->session()->flash('success_message','Data Save Successfully !!');
         return redirect(route('ecgexam.filter'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\EcgExaminationModel $ecgExaminationModel
     * @return \Illuminate\Http\Response
     */
    public function show(EcgExaminationModel$ecgExaminationModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\EcgExaminationModel  $ecgExaminationModel
     * @return \Illuminate\Http\Response
     */
    public function edit(EcgExaminationModel$ecgExaminationModel,$id) {
        $ecgexamData = EcgExaminationModel::where('id',$id)->first();
        return view('hms.testReport.ecg.ecgexam-edit',compact('ecgexamData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\EcgExaminationModel $ecgExaminationModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EcgExaminationModel$ecgExaminationModel,$id) {
        $this->validate($request,[

            'patientId'=>'required',
            'remark'=>'required'
        ]);
        $ecgexamUpdate = EcgExaminationModel::findOrFail($id)->first();
        if(!empty($ecgexamUpdate)) {
            $ecgexamUpdate->update($request->all());
        }
        else{
              return abort(404);
        }

        $request->session()->flash('success_message','Data Updated Successfully !!');
        return redirect(route('ecgexam.filter'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\EcgExaminationModel $ecgExaminationModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(EcgExaminationModel$ecgExaminationModel,$id) {
        $bloodDataDelete = EcgExaminationModel::where('id',$id)->delete();
        //$request->session()->flash('error_message','Data Delete Successfully !!');
        return response()->json(['status'=>true]);
    }

    public function ecgExamFilter(Request $request) {
        return view('hms.testReport.ecg.ecgexam-filter');

    }

    public function ecgExamData(Request $request) {

        $bloodFilterData =EcgExaminationModel::select('ecg_examination_models.id as id','ecg_examination_models.patientId as patientId','ecg_examination_models.date as date','ecg_examination_models.referredBy as referredBy','opd_models.patientName as patientName','opd_models.age as age','opd_models.regDate as regDate')
            ->join('opd_models', 'opd_models.id', '=', 'ecg_examination_models.patientId')
            ->get();
             return DataTables::of($bloodFilterData)
            ->editColumn('regDate', function ($data) {
                return \Carbon\Carbon::parse($data->regDate)->format('d/m/Y') ;})

            ->editColumn('date', function ($data) {

                return \Carbon\Carbon::parse($data->date)->format('d/m/Y') ;})
             
            ->addColumn('action', function($data) {
                return sprintf('<div class="btn-group"><button data-id="%s" class="ecgexamView btn-sm btn btn-success">%s</button> 
                                <a href="%s">%s</a>   
                               <button data-id="%s" class="ecgexamDelete btn-sm btn btn-danger" >%s</button> </div>',
                               $data['id'],'<i class=" fa fa-eye"></i>',
                                route('ecg-examination.edit',['id'=>$data['id']]),'<i class=" btn-sm btn btn-info fa fa-pencil"></i>',
                                $data['id'],'<i class=" fa fa-trash"></i>');
              
            })->addColumn('sn',function($data){
                static $i=1;
                return $i++;
            })->make(true);  
            
    }
    public function ecgExamReportView(Request $request) {
            $id=$request->id;
            $data =EcgExaminationModel::where('id',$id)->first();
            $content =\View::make('hms.testReport.ecg.ecgexam-view',compact('data'));
            $content = $content->render();
            return response()->json(['html'=> $content,'status'=>true],200);
        }
}
