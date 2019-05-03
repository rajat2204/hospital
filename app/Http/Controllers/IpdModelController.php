<?php

namespace App\Http\Controllers;

use App\Model\IpdModel;
use Illuminate\Http\Request;
use App\Model\DoctorModel;
use App\Model\OpdModel;
use App\Model\WardModel;
use App\Model\MedicineModel;
use App\Model\InvestigationModel;
use App\Model\DietPlanModel;
use App\Model\PotencyModel;
use Validator;
use DB;
use DataTables;
class IpdModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $doctorList=DoctorModel::all()->pluck('name','id');
        $medicineList=MedicineModel::all()->pluck('name','id');
        $investigationList=InvestigationModel::all()->pluck('name','id');
        $potencyList=PotencyModel::all()->pluck('name','id');
        $dietPlanList=DietPlanModel::all()->pluck('name','id');
        $wardList=WardModel::all()->pluck('name','id');
       
        return view('hms.ipd.ipd',compact('doctorList','medicineList','wardList','investigationList','potencyList','dietPlanList'));
    }

    public function ipdFilter() {
        return view('hms.ipd.ipd-filter');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
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
        // dd($input);
        $validator = Validator::make( $input,[
                    'ipdRegNum'=>'required|unique:ipd_models,ipdRegNum',
                    'patientId'=>'required',
                    'wardName'=>'required',
                    'prefixName'=>'required',
                    'bedNum'=>'required',
                    'consultant'=>'required',
                    'otherConsultant'=>'required',
                    'wardName'=>'required',
                    'dod'=>'required',
                    'remark'=>'required'
               ]);
               if($validator->fails()) {
                  return redirect()->back()->withErrors($validator)->withInput();
               }
                if(!empty($request->patientId)) {
                          $patientAvailbilityCheck = IpdModel::where('patientId',$request->patientId)->get();
                    foreach ($patientAvailbilityCheck  as $key => $value) {
                                   if( $value->bedNum != 'BedFree')
                            return back()->with('error_message','Patient Is Already Available In Ipd');
                    }  

                    IpdModel::create($input);

                    $wardList=WardModel::where('id',$request->wardName)->first();
                    // dd($wardList->name);

                    $username="AMREESH@25"; 
                    $password="AMREESH@25";
                    $sender="AMRESH";

                    $message="Your Patient has been admitted in the IPD whose registration number is ". $request->ipdRegNum ." at bed number " .$request->bedNum." in ".$wardList->name. ".";

                    $pingurl = "skycon.bulksms5.com/sendmessage.php";

                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $pingurl);
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, 'user=' . $username . '&password=' . $password . '&mobile=' . $request->contactNum . '&message=' . urlencode($message) . '&sender=' . $sender . '&type=3');
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $result = curl_exec($ch);
                   
                    curl_close($ch);

                    $request->session()->flash('success_message','Data Save Successfully');
                     return redirect(route('ipd.filter'));
                }
                
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\IpdModel  $ipdModel
     * @return \Illuminate\Http\Response
     */
    public function show(IpdModel $ipdModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\IpdModel  $ipdModel
     * @return \Illuminate\Http\Response
     */
    public function edit(IpdModel $ipdModel,$ipd) {
          
        $data =IpdModel::where('id',$ipd)->first();
        $doctorList=DoctorModel::all()->pluck('name','id');
        $medicineList=MedicineModel::all()->pluck('name','id');
        $investigationList=InvestigationModel::all()->pluck('name','id');
        $potencyList=PotencyModel::all()->pluck('name','id');
        $dietPlanList=DietPlanModel::all()->pluck('name','id');
        $wardList=WardModel::all()->pluck('name','id');
 
        return view('hms.ipd.ipd-edit',compact('data','doctorList','medicineList','investigationList','potencyList','dietPlanList','wardList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\IpdModel  $ipdModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IpdModel $ipdModel,$id) {

              $ipdData = $request->all();
               $validator = Validator::make($ipdData,[
                    'ipdRegNum'=>'required|unique:ipd_models,ipdRegNum,'.$id,
                    'patientId'=>'required',
                    'wardName'=>'required',
                    'consultant'=>'required',
                    'otherConsultant'=>'required',
                    'wardName'=>'required',
                    'dod'=>'required',
                    'remark'=>'required'
               ]);
               if($validator->fails()) {
                  return redirect()->back()->withErrors($validator)->withInput();
               }
              IpdModel::find($id)->update($ipdData);
              $request->session()->flash('success_message','data updated Successfully!!');
              return redirect(route('ipd.filter'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\IpdModel  $ipdModel
     * @return \Illuminate\Http\Response
     */
     public function destroy(IpdModel $ipdModel) {
            
    }
    public function delete(Request $request) {
            
           $ipd= IpdModel::where('id',$request->id)->first();
         // return $ipd->getPatientDetails->semeneExamData;
            if(!empty($ipd->getPatientDetails->ipdtreatment||$ipd->getPatientDetails->OtData||$ipd->getPatientDetails->ecgExamData||$ipd->getPatientDetails->semeneExamData||$ipd->getPatientDetails->stoolExamData||$ipd->getPatientDetails->urineExamData||$ipd->getPatientDetails->serunExamData )) {
                return response()->json(['status'=>false],200);
            }
            IpdModel::where('id',$request->id)->update(['dltStatus'=>'Y']);
            return response()->json(['status'=>true],200);
    }

    public function ipdFilterData(Request $request) {

        $ipdFilterData = IpdModel::select('ipd_models.id as id','ipd_models.ipdRegNum as ipdRegNum','ipd_models.ipdRegDate as ipdRegDate','ipd_models.wardName as wardName','ipd_models.bedNum as bedNum','ipd_models.consultant as consultant','ipd_models.prefixName','ipd_models.refName','opd_models.RegNum as RegNum','opd_models.patientName as patientName')
            ->join('opd_models', 'ipd_models.patientId', '=', 'opd_models.regNum')
            ->where('ipd_models.dltStatus','=','N')
            ->get();
        return DataTables::of($ipdFilterData)
            ->rawColumns(['fullname', 'action'])
            ->addColumn('fullname', function($data){

            return sprintf('%s <b> %s </b> %s',$data['patientName'],$data['prefixName'],$data['refName']);              
            })->addColumn('sn',function($data){
                        static $i=1;
                        return $i++;
                })->editColumn('consultant',function($data) {
                    return $data->getConsultant->name;
                })->editColumn('ipdRegDate',function($data){
                     return \Carbon\Carbon::parse($data->ipdRegDate)->format('d/m/Y') ;
                })->editColumn('wardName',function($data) {
                        return $data->getwardName->name;
                })->addColumn('action', function($data) {

                if($data->bedNum=='BedFree') {
                     return sprintf('<div class="btn-group btn-sm"><button data-toggle="modal tooltip" data-placement="top" title="View" data-id="%s" class="%s btn-sm btn btn-info  ">%s</button> 
                 
             <a href="%s" class="btn-sm btn btn-success"  data-placement="top" title="Edit" >%s</a> 
             
             <button data-toggle="modal tooltip" data-id="%s" class="%s btn-sm btn btn-danger"  data-placement="top" title="Delete" >%s</button> </div>',
             $data['id'],'ipdView','<i class=" fa fa-eye"></i>',
             route('ipd.edit',['id'=>$data['id']]),'<i class=" fa fa-pencil"></i>',
            $data['id'],'ipd-delete','<i class=" fa fa-trash"></i>');
            }else{
                 return sprintf('<div class="btn-group btn-sm"><button data-toggle="modal tooltip" data-placement="top" title="View" data-id="%s" class="%s btn-sm btn btn-info  ">%s</button> 
             <button data-toggle="modal tooltip" data-id="%s" class="%s btn-sm btn btn-warning" data-placement="top" title="Discharge" >%s</button>    
             <a href="%s" class="btn-sm btn btn-success"  data-placement="top" title="Edit" >%s</a> 
             <button data-toggle="modal tooltip" data-id="%s" class="%s btn-sm btn"  data-placement="top" title="Add" >%s</button>
             <button data-toggle="modal tooltip" data-id="%s" class="%s btn-sm btn btn-danger"  data-placement="top" title="Delete" >%s</button> </div>',
             $data['id'],'ipdView','<i class=" fa fa-eye"></i>',
             $data['id'],'ipdDischarge','<i class=" fa fa-clock-o"></i>',
             route('ipd.edit',['id'=>$data['id']]),'<i class=" fa fa-pencil"></i>',
             $data['id'],'ipd-addtreatment','<i class=" fa fa-plus"></i>', $data['id'],'ipd-delete','<i class=" fa fa-trash"></i>');
                  
               
            }
             })->make(true);
    }

    public function ipdView(Request $request) {
        $id=$request->id;
        $data =IpdModel::where('id',$id)->first();
        $content =\View::make('hms.ipd.ipd-view',compact('data'));
        
       $content = $content->render();
        return response()->json([
            'html'=> $content,
            'status'=>true
        ],200);
    }
    public function ipdDischarge(Request $request) {

        $id=$request->id;
        $data =IpdModel::where('id',$id)->first();
        $content =\View::make('hms.ipd.ipd-discharge',compact('data'));
        $content = $content->render();
        return response()->json([
            'html'=> $content,
            'status'=>true
        ],200);
    }

     public function IpdRegCheck(Request $request) {

        $input = $request->all();
        $regNumCheck = IpdModel::where('ipdRegNum',$input['ipdCheck'])
                                //->where('ipdRegNum',$input['ipdCheck'])
                                ->get();
        if(count($regNumCheck)>0) {
            return response()->json(['msg'=>'Registration Number Already Exists','status'=>true,'class'=>'error']);
        }else{
            return response()->json(['msg'=>'Registration Number Available','status'=>false,'class'=>'green']);
        }
    }
    
    public function bedAvailableCheck(Request $request) {
        
        $bedAvailabilityCheck = IpdModel::where('bedNum',$request->bedNum)
                                        ->where('wardName',$request->wardName)
                                        ->first();

            if(!empty($bedAvailabilityCheck) && $bedAvailabilityCheck->id==$request->id) {
                return response()->json(['status'=>false,'msg'=>'Current Room Booked For This Patient','class'=>'warning']);
            } else if(empty($bedAvailabilityCheck)) {
                return response()->json(['status'=>true,'msg'=>'Room Is Available','class'=>'green']);
            }else if($bedAvailabilityCheck->id!=$request->id){
                return response()->json(['status'=>false,'msg'=>'Room Already Booked','class'=>'error']);
            }
    }
}
