<?php

namespace App\Http\Controllers;

use App\Model\OpdModel;
use Illuminate\Http\Request;
use App\Model\DoctorModel;
use App\Model\MedicineModel;
use App\Model\DepartmentModel;
use App\Model\PotencyModel;
use App\Model\OpdTreatmentModel;
use App\Model\InvestigationModel;
use App\Http\Requests\OpdRequest;
use Response;
use Validator;
use Log;
use DB;
use DataTables;
class OpdModelController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        
        $doctorList=DoctorModel::all()->pluck('name','id');
        $departmentList = DepartmentModel::all()->pluck('name','id');
        return view('hms.opd.opd',compact('doctorList','departmentList'));
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
    public function store(OpdRequest $request)
    {
               //dd($request->all());
                $this->validate($request, [
                    'regNum'=>'required|unique:opd_models,id,regNum',

                ]);

               $opdInfo=new OpdModel();
               $opdInfo->patientTitle =$request->patientTitle;
               $opdInfo->patientName =$request->patientName;
               $opdInfo->id=$request->regNum;
               $opdInfo->regNum=$request->regNum;
               $opdInfo->regDate =$request->regDate;
               $opdInfo->address =$request->address;
               $opdInfo->Age =$request->Age;
               $opdInfo->gender =$request->gender;
               $opdInfo->contactNum =$request->contactNum;
               $opdInfo->regAmount =$request->regAmount;
               $opdInfo->consultant =$request->consultant;
               $opdInfo->otherConsultant =$request->otherConsultant;
               $opdInfo->department =$request->department;

               $opdInfo->save();
               //$request->session()->flash('success_message','Patient Register Successfully');
               return redirect(route('opd.filter'))->with('success_message','Data Save Successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\OpdModel  $opdModel
     * @return \Illuminate\Http\Response
     */
    public function show(OpdModel $opdModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\OpdModel  $opdModel
     * @return \Illuminate\Http\Response
     */
    public function edit(OpdModel $opdModel,$opd){
       
         $doctorList=DoctorModel::all()->pluck('name','id');
         $departmentList = DepartmentModel::all()->pluck('name','id');
         $data =OpdModel::where('orderId',$opd)->first();
         return view('hms.opd.opd-edit',compact('data','doctorList','departmentList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\OpdModel  $opdModel
     * @return \Illuminate\Http\Response
     */
    public function update(OpdRequest $request, OpdModel $opdModel,$id) {
       
       $opdUpdate = OpdModel::where('orderId',$id)
                            ->update([

                            'patientTitle'  =>$request->patientTitle,
                            'patientName'   =>$request->patientName,
                            'id'            =>$request->regNum,
                            'regNum'        =>$request->regNum,
                            'regDate'       =>$request->regDate,
                            'address'       =>$request->address,
                            'Age'           =>$request->Age,
                            'gender'        =>$request->gender,
                            'consultant'    =>$request->consultant,
                            'otherConsultant'=>$request->otherConsultant,
                            'department'    =>$request->department,

                            ]);
          //  $request->session()->flash('success_message','data Updated Successfully!!');
            return redirect(route('opd.filter'))->with('success_message','data Updated Successfully!!');
    }
    public function search(Request $request){
         $input=$request->all();
         $query=$input['query'];
         if(!empty($query)) {
    
              $data = OpdModel::
              where('id', 'LIKE', '%' . $query . '%')
                       // where('patientName','LIKE','%'.$query.'%')
                       ->where('dltStatus','=','N')
                       ->get();
              // dd($data);
                       $output = '<ul class="dropdown-menu form-control" style="display:block;
                        max-height: 150px;overflow: auto; position:relative">';
                        foreach($data as $row)
                        {
                           $output .= '
                           <li class="list-group-item select"><a>'.$row->patientName. "/".$row->id. '</a></li>
                           ';
                        }
                           $output .= '</ul>';
                          echo $output;
         }
    }
     public function opd(Request $request) {

       //Log::info('OpdModelController@value search value Info'.print_r($request->all(),true));
         $input = $request->all();
         $query = $input['query'];
        $query1 = explode('/',$query);
       
         if(!empty($query)) {

                 $opdValue = OpdModel::where('id','=',$query1[1])->orWhere('patientName','=',$query1[0])->where('dltStatus','=','N')->first();
                 $name = $opdValue->getConsultant->name;
                
                return response()->json(['opd'=>$opdValue,'consultantName'=>$name,'status'=>true,]);
         }
          
     }

    public function opdFilter() {
       
        return view('hms.opd.opd-filter');
        
     }
    public function opdFilterSearch(Request $request) {
          
           $input=$request->all();
          
            //Log::info('opdFilter Input OpdModelController@opdFilterSearch='.print_r($request->all(),true));

            if(empty($request->gender)) {
                  $articles = opdModel::whereBetween('regDate', [ $input['fromDate'], $input['toDate']])
                                     //->where('gender',$request->gender)
                                     ->select('orderId','patientName','regNum','consultant','gender','regDate','address')
                                     ->where('dltStatus','=','N')
                                     ->get();
           
                return DataTables::of($articles)
                                   ->editColumn('consultant',function($data){
                                        return $data->getConsultant->name;})
                                   ->editColumn('regDate', function ($data){
                                        return \Carbon\Carbon::parse($data->regDate)->format('d/m/Y') ;})
                                   ->addColumn('action', function($data){

                return sprintf('<div class="btn-group btn-sm">
                    <button data-toggle="tooltip modal" data-placement="top" title="%s" data-order_id="%s" class="btn-sm %s btn btn-info ">%s</button>     
             <a href="%s"data-toggle="tooltip" data-placement="top" title="update" class="btn-sm btn-success">%s</a> 
            <button data-toggle="tooltip modal" data-placement="top" title="%s" data-order_id="%s" class="btn-sm %s btn  ">%s</button>
             <button data-toggle="tooltip modal" data-placement="top" title="%s" data-order_id="%s" class="btn-sm %s btn btn-danger " onclick="confirm()">%s</button></div>',
             "view",$data['orderId'],'opdview','<i class="fa fa-eye"></i>',
             route('opd.edit',['id'=>$data['orderId']]),'<i class="fa fa-pencil"></i>',
             "add",$data['orderId'],'addpatient','<i class="fa fa-plus"></i>',
             "delete", $data['orderId'],'opd-delete','<i class="fa fa-trash"></i>');
                  
                })->addColumn('id',function($data){
                        static $j=1;
                        return $j++;

                })->make(true);
            }
            $articles = opdModel::whereBetween('regDate', [ $input['fromDate'],$input['toDate']])
                                 ->where('gender',$input['gender'])
                                 ->where('dltStatus','=','N')
                                 ->select('orderId','patientName','regNum','consultant','gender','regDate','address')
                                 ->get();
           
            return DataTables::of($articles)
                            ->editColumn('consultant', function($articles) {
                                return $articles->getConsultant->name;
                            })->addColumn('action', function($data){

            return sprintf(' <div class="btn-group btn-sm">
                    <button data-toggle="tooltip modal" data-placement="top" title="%s" data-order_id="%s" class="btn-sm %s btn btn-info ">%s</button>     
             <a href="%s"data-toggle="tooltip" data-placement="top" title="update" class="btn-sm btn-success">%s</a> 
            <button data-toggle="tooltip modal" data-placement="top" title="%s" data-order_id="%s" class="btn-sm %s btn  ">%s</button>
             <button data-toggle="tooltip modal" data-placement="top" title="%s" data-order_id="%s" class="btn-sm %s btn btn-danger " onclick="confirm()">%s</button></div>',
             "view",$data['orderId'],'opdview','<i class="fa fa-eye"></i>',
             route('opd.edit',['id'=>$data['orderId']]),'<i class="fa fa-pencil"></i>',
             "add",$data['orderId'],'addpatient','<i class="fa fa-plus"></i>',
             "delete", $data['orderId'],'opd-delete','<i class="fa fa-trash"></i>');
                  
                })->addColumn('consultant',function($data){
                    return $data->getConsultant->name;
                })->editColumn('regDate', function ($data){
                    return \Carbon\Carbon::parse($data->regDate)->format('d/m/Y') ;})
                ->addColumn('id',function($data){
                        static $k=1;
                        return $k++;

                })->make(true);
                   
     }

     public function opdAllPatient(OpdModel $request){

                                                        
            return DataTables::of(OpdModel::select('orderId','patientName','regNum','consultant','gender','regDate','address')->where('dltStatus','=','N'))
            ->addColumn('action', function($data){
            return sprintf(' <div class="btn-group btn-sm">
                    <button data-toggle="tooltip modal" data-placement="top" title="%s" data-order_id="%s" class="btn-sm %s btn btn-info btn-group  ">%s</button>     
             <a href="%s"data-toggle="tooltip" data-placement="auto" title="update" class="btn-sm btn-success">%s</a> 
            <button data-toggle="tooltip modal" data-placement="auto" title="%s" data-order_id="%s" class="btn-sm %s btn  ">%s</button>
             <button data-toggle="tooltip modal" data-placement="auto" title="%s" data-order_id="%s" class="btn-sm %s btn btn-danger" >%s</button></div>',
             "view",$data['orderId'],'opdview','<i class="fa fa-eye"></i>',
             route('opd.edit',['id'=>$data['orderId']]),'<i class="fa fa-pencil"></i>',
             "add",$data['orderId'],'addpatient','<i class="fa fa-plus"></i>',
             "delete", $data['orderId'],'opd-delete','<i class="fa fa-trash"></i>');
                  
                })->addColumn('id',function($data){
                        static $i=1;
                        return $i++;

                })->editColumn('consultant',function($data){
                    return $data->getConsultant->name;
                })->filterColumn('consultant', function($q, $keyword) {
                    $q->whereHas('getConsultant',function($q) use ($keyword) {
                        $q->where('name','LIKE',["%{$keyword}%"]);
                    });
                })->editColumn('regDate', function ($data){
                    return \Carbon\Carbon::parse($data->regDate)->format('d/m/Y') ;})

            ->make(true);
            

     }

    public function opdPatientDetails(Request $request) {

        $input = $request->all();
        $orderId = $input['order_id'];
        $data = OpdModel::where('orderId',$orderId)->first();
        $content = \View::make('hms.opd.opd-view',compact('data','ipdData'));
        
        $content = $content->render();
        return response()->json(['html'=> $content,'status'=>true],200);
    }
    public function opdAddTreatment(Request $request) {

        $input = $request->all();
        
        $doctorList=DoctorModel::all()->pluck('name','id');
        $potencyList=PotencyModel::all()->pluck('name','id');
        $medicineList=MedicineModel::all()->pluck('name','id');
        $investigationList=InvestigationModel::all()->pluck('name','id');
        $orderId = $input['order_id'];
        $data = OpdModel::where('orderId',$orderId)->first();
        $content = \View::make('hms.opd.opd-treatment',compact('data','doctorList','medicineList','potencyList','investigationList'));
        $content = $content->render();
        return response()->json([
            'html'=> $content,
            'status'=>true
        ],200);
    }

    public function opdCheck(Request $request) {

        $input = $request->all();
        $regNumCheck = OpdModel::where('id',$input['opdCheck'])
                                ->where('regNum',$input['opdCheck'])
                                ->get();
        if(count($regNumCheck)>0) {
            return response()->json(['msg'=>'Registration Number Already Exists','status'=>true,'class'=>'error']);
        }else{
            return response()->json(['msg'=>'Registration Number Available','status'=>false,'class'=>'green']);
        }
    }
    public function delete(Request $request) {
       $order_id = $request->order_id;
       $opd = OpdModel::where('orderId',$order_id)->first();
       if(!empty($opd->IpdData)) {

            return response()->json(['status'=>false,],200);
        
        }
            OpdModel::where('orderId',$order_id)->update(['dltStatus'=>'Y']);
            return response()->json(['status'=>true,],200);
    }
      
}
