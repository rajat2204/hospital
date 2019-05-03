<?php

namespace App\Http\Controllers;

use App\Model\BloodExaminationModel;
use Illuminate\Http\Request;
use Log;
use DataTables;
use \Carbon\Carbon;
class BloodExaminationModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('hms.testReport.bloodexamination.bloodexamination');
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
        //dd($request->all());
        $bloodExaminationData = BloodExaminationModel::create($request->all());
        $request->session()->flash('success_message','Data Save Successfully');
        return redirect(route('blood.filter'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\BloodExaminationModel  $bloodExaminationModel
     * @return \Illuminate\Http\Response
     */
    public function show(BloodExaminationModel $bloodExaminationModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\BloodExaminationModel  $bloodExaminationModel
     * @return \Illuminate\Http\Response
     */
    public function edit(BloodExaminationModel $bloodExaminationModel,$id) {
        $bloodExamData = BloodExaminationModel::where('id',$id)->first();
        return view('hms.testReport.bloodexamination.bloodexam-edit',compact('bloodExamData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\BloodExaminationModel  $bloodExaminationModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BloodExaminationModel $bloodExaminationModel,$id) {
        $bloodDataUpdate = BloodExaminationModel::findOrFail($id)->first();
        if(!empty($bloodDataUpdate)) {
            $bloodDataUpdate->update($request->all());
        }
        else{
              return abort(404);
        }
        $request->session()->flash('success_message','Data Updated Successfully !!');
        return redirect(route('blood.filter'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\BloodExaminationModel  $bloodExaminationModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,BloodExaminationModel $bloodExaminationModel,$id) {
       $bloodDataDelete = BloodExaminationModel::where('id',$id)->delete();
       $request->session()->flash('error_message','Data Delete Successfully !!');
       return response()->json(['status'=>true],200);
    }

    public function filter(Request $request) {
        return view('hms.testReport.bloodexamination.filter');
    }
    public function bloodData(Request $request) {

        $bloodFilterData = BloodExaminationModel::select('blood_examination_models.id as id','blood_examination_models.patientId as patientId','blood_examination_models.date as date','blood_examination_models.referredBy as referredBy','blood_examination_models.investigationAdvised as investigationAdvised','opd_models.patientName as patientName','opd_models.age as age','opd_models.regDate as regDate')
            ->join('opd_models', 'opd_models.id', '=', 'blood_examination_models.patientId')
            ->get();
             return DataTables::of($bloodFilterData)
            ->editColumn('regDate', function ($data) {
                return \Carbon\Carbon::parse($data->regDate)->format('d/m/Y') ;})

            ->editColumn('date', function ($data) {

                return \Carbon\Carbon::parse($data->date)->format('d/m/Y') ;})
             
            ->addColumn('action', function($data) {
                return sprintf('<div class="btn-group"><button data-id="%s" data-toggle="tooltip" class="bloodexamView btn-sm btn btn-success"  data-placement="top" title="View">%s</button> 
                                <a href="%s" data-toggle="tooltip" data-placement="top" title="Edit">%s</a>   
                               <button data-id="%s" class="bloodexamDelete btn-sm btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete">%s</button></div>',
                               $data['id'],'<i class=" fa fa-eye"></i>',
                                route('blood-examination.edit',['id'=>$data['id']]),'<i class=" btn-sm btn btn-info fa fa-pencil"></i>',
                                $data['id'],'<i class=" fa fa-trash"></i>');
              
            })->addColumn('sn',function($data){
                static $i=1;
                return $i++;
            })->make(true);  
            
    }
    public function reportView(Request $request) {
            $id=$request->id;
            $data =BloodExaminationModel::where('id',$id)->first();
            $content =\View::make('hms.testReport.bloodexamination.bloodreport-view',compact('data'));
            $content = $content->render();
            return response()->json(['html'=> $content,'status'=>true],200);
        }

}
