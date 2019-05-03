<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\OpdModel;
use App\Model\BloodExaminationModel;
use App\Model\EcgExaminationModel;
use App\Model\SemeneExaminationModel;
use App\Model\StoolExaminationModel;
use App\Model\UrineExaminationModel;
use App\Model\SerumOfWidalModel;
use DataTables;

class PatientHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hms.patienthistory.patient-list');
    } 

    public function AllPatientData()
    {
        return DataTables::of(OpdModel::select('id','patientName','regNum','gender','regDate','address','orderId'))
            ->addColumn('action', function($data){
                  return sprintf('<button data-toggle="tooltip modal" data-placement="top" title="%s" data-id="%s" class="btn-sm patienthistory-view btn btn-info ">%s</button>','View',$data['orderId'],'<i class="fa fa-eye"></i>');
                  
                })->addColumn('sn',function($data){
                    static $i=1;
                    return $i++;
                })->make(true);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function patientHistoryView(Request $request) {
            $input = $request->all();
            $id = $input['id'];
            $data = OpdModel::where('orderId',$id)->first();
            $bloodData = BloodExaminationModel::where('patientId',$data->id)->get();
            $ecgData = EcgExaminationModel::where('patientId',$data->id)->get();
            $semeneData = SemeneExaminationModel::where('patientId',$data->id)->get();
            $stoolData = StoolExaminationModel::where('patientId',$data->id)->get();
            $urineData = UrineExaminationModel::where('patientId',$data->id)->get();
            $serunData = SerumOfWidalModel::where('patientId',$data->id)->get();
           
            $content = \View::make('hms.patienthistory.patienthistory-view',compact('data','bloodData','ecgData','semeneData','stoolData','urineData','serunData'));
            $content = $content->render();
            return response()->json(['html'=> $content,'status'=>true],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
