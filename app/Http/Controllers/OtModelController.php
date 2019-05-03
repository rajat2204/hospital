<?php

namespace App\Http\Controllers;

use App\Model\OtModel;
use App\Model\DoctorModel;
use App\Model\OpdModel;
use App\Model\IpdModel;
use App\Model\MedicineModel;
use Illuminate\Http\Request;
use Validator;
use Log;
use DataTables;
use \Carbon\Carbon;
class OtModelController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $medicineList=MedicineModel::all()->pluck('name','id');
        $doctorList=DoctorModel::all()->pluck('name','id');
        return view('hms.ot.ot',compact('doctorList','medicineList'));
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

        $input = $request->all();
        $validator = Validator::make( $input,[
                       
                        'patientId'=>'required|unique:ot_models,patientId',
                        "opdDate" =>'required', 
                        "ipdRegNum" =>'required',
                        "ipdRegDate" =>'required', 
                        "otDate" =>'required', 
                        "dignosis" =>'required',
                        "otProcessure" =>'required', 
                        "consultant" =>'required', 
                        "otherConsultant" =>'required',
                        "adviceTreatment" =>'required', 
                        "medicine1" =>'required', 
                        "Remark" =>'required',
                        'referby'=>'required'

         ]);
           if($validator->fails()) {
              return redirect()->back()->withErrors($validator)->withInput();
           }
            $OtInfo = OtModel::create($input);
            return redirect(route('otFilter'))->with('success_message','Data Save Successfully !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\OtModel  $otModel
     * @return \Illuminate\Http\Response
     */
    public function show(OtModel $otModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\OtModel  $otModel
     * @return \Illuminate\Http\Response
     */
    public function edit(OtModel $otModel,$id) {

        $medicineList = MedicineModel::all()->pluck('name','id');
        $doctorList = DoctorModel::all()->pluck('name','id');
        $data = OtModel::where('id',$id)->first();
        return view('hms.ot.ot-edit',compact('data','medicineList','doctorList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\OtModel  $otModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OtModel $otModel,$id) {

          $otData = $request->all();
          OtModel::find($id)->update($otData);
          $request->session()->flash('success_message','data updated Successfully!!');
         return redirect(route('otFilter'))->with('success_message','Data Updated Successfully !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\OtModel  $otModel
     * @return \Illuminate\Http\Response
     */
    public function delete(OtModel $otModel,$id) {

        OtModel::where('id',$id)->update(['dltStatus'=>'Y']);
        return back()->with('error_message','Data Deleted Successfully !!');;

    }
    public function otFilter(Request $request) {

        return view('hms.ot.ot-filter');
    }

    public function otFilterData(Request $request) {

         $otFilterData =otModel::select('ot_models.id as id','ot_models.patientId as patientId','ot_models.opdDate as opdDate','ot_models.otDate as otDate','ot_models.consultant as consultant','opd_models.patientName as patientName')
            ->join('opd_models', 'opd_models.id', '=', 'ot_models.patientId')
            ->where('ot_models.dltStatus','=','N')
            ->get();
             return DataTables::of($otFilterData)
            ->editColumn('otDate', function ($data) {
                return \Carbon\Carbon::parse($data->otDate)->format('d/m/Y') ;})
            ->editColumn('opdDate', function ($data) {
                return \Carbon\Carbon::parse($data->opdDate)->format('d/m/Y') ;})
            ->addColumn('action', function($data) {
                return sprintf('<div class="btn-group"><button data-id="%s" data-toggle="tooltip" class="otView btn-sm btn btn-success" title="View">%s</button> 
                    <a href="%s" data-toggle="tooltip" data-placement="top" title="update" class="btn-sm btn btn-info" >%s</a>   
                    <a href="%s" class="btn-sm btn btn-danger" data-toggle="tooltip" title="Delete">%s</a> </div>',
                $data['id'],'<i class=" fa fa-eye"></i>',
                route('ot.edit',['id'=>$data['id']]),'<i class=" fa fa-pencil"></i>',
                route('ot.delete',['id'=>$data['id']]),'<i class=" fa fa-trash"></i>');
            })->editColumn('sn',function($data){
                static $i=1;
                return $i++;
            })->editColumn('consultant',function($data) {
                return $data->getConsultant->name;
            })->make(true);  
           
    }
    public function otValue(Request $request) {
            $input = $request->all();
            $query=$input['query'];
            $query1 = explode('/',$query);
            ///return  $query1;
             if(!empty($query)) {
                  $opdValue=OpdModel::leftJoin('ipd_models','opd_models.id','=','ipd_models.patientId')
                  ->where('opd_models.id','=',$query1[1])
                  ->orWhere('opd_models.patientName','=',$query1[0])
                  ->first();
                  $name = $opdValue->getConsultant->name;
                  return response()->json(['ot'=>$opdValue,'status'=>true,'consultant'=>$name]);
             }
    }
    public function otView(Request $request) {

        $id=$request->id;
        $data =OtModel::where('id',$id)->first();
        $content =\View::make('hms.ot.ot-view',compact('data'));
        $content = $content->render();
        return response()->json(['html'=> $content,'status'=>true],200);
    }


}
