<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\OpdModel;
use App\Model\IpdModel;
use App\Model\OpdTreatmentModel;
use App\Model\DepartmentModel;
use App\Model\YogaModel;
use App\Model\WardModel;
use DataTables;
use Carbon\Carbon;
use Log;
use DB;
class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function opdDateWiseView() {
        $departmentList = DepartmentModel::all()->pluck('name','id');
        return view('hms.reports.opddate-wise',compact('departmentList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function opdDateWiseFilter(Request $request) {
       $input = $request->all();
       $department =  $input['department'];
       if( $department == null) {
        $opdDateWiseData = opdModel::whereBetween('regDate', [ $input['fromDate'],$input['toDate']])->get();

            $data = DB::table("opd_models")
                        ->whereBetween('regDate', [ $input['fromDate'],$input['toDate']])
                        ->select(DB::raw("SUM(IF(gender='Male Adult',1,0)) as maleAdult,SUM(IF(gender='FeMale Adult',1,0)) as FemaleAdult,SUM(IF(gender='Male Child',1,0)) as malechild,SUM(IF(gender='FeMale Child',1,0)) as femalechild,opd_models.regDate as regDate"))
                        ->orderBy("regDate")
                        ->groupBy('opd_models.regDate')
                        ->get();
                        //->toArray();
            return DataTables::of($data)
                   ->addColumn('id',function($data){
                        static $i=1;
                        return $i++;
                   })->addColumn('total',function($data){
                        $total = $data->maleAdult+$data->FemaleAdult+$data->femalechild+$data->malechild;
                        return $total;
                   })->editColumn('regDate', function ($data){
                    return \Carbon\Carbon::parse($data->regDate)->format('d/m/Y') ;})->make(true);
       }
       else{

                //$opdDateWiseData = opdModel::whereBetween('regDate', [ $input['fromDate'],$input['toDate']])->get();

            $data = DB::table("opd_models")
                        ->whereBetween('regDate', [ $input['fromDate'],$input['toDate']])
                        ->where('department',$department)
                        ->select(DB::raw("SUM(IF(gender='Male Adult',1,0)) as maleAdult,SUM(IF(gender='FeMale Adult',1,0)) as FemaleAdult,SUM(IF(gender='Male Child',1,0)) as malechild,SUM(IF(gender='FeMale Child',1,0)) as femalechild,opd_models.regDate as regDate"))
                        ->orderBy("regDate")
                        ->groupBy('opd_models.regDate')
                        ->get();
                        ///->toArray();
            return DataTables::of($data)
                   ->addColumn('id',function($data){
                        static $i=1;
                        return $i++;
                   })->addColumn('total',function($data){
                        $total = $data->maleAdult+$data->FemaleAdult+$data->femalechild+$data->malechild;
                        return $total;
                   })->editColumn('regDate', function ($data){
                    return \Carbon\Carbon::parse($data->regDate)->format('d/m/Y') ;})->make(true);
       }

    }
    public function ipdDateWiseView() {
        $wardList = WardModel::all()->pluck('name','id');
        return view('hms.reports.ipddate-wise',compact('wardList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ipdDateWiseFilter(Request $request) {
       $input = $request->all();
       $wardName =  $input['wardName'];
       if( $wardName == null) {
       // $opdDateWiseData = IpdModel::whereBetween('ipdRegDate', [ $input['fromDate'],$input['toDate']])->get();

            $data = DB::table("ipd_models")
                        ->whereBetween('ipdRegDate', [ $input['fromDate'],$input['toDate']])
                        ->select('ipdRegDate',DB::raw("count(*) as count"))
                        ->orderBy("ipdRegDate")
                        ->groupBy('ipd_models.ipdRegDate')
                        ->get();
                        //->toArray();
            return DataTables::of($data)
                   ->addColumn('id',function($data){
                        static $i=1;
                        return $i++;
                   })->addColumn('total',function($data){
                             static $sum=0;    
                             $sum+=$data->count;                        
                        return $sum;
                   })->editColumn('ipdRegDate', function ($data){
                    return \Carbon\Carbon::parse($data->ipdRegDate)->format('d/m/Y') ;})->make(true);
       }
       else{

                //$opdDateWiseData = opdModel::whereBetween('regDate', [ $input['fromDate'],$input['toDate']])->get();

            $data = DB::table("ipd_models")
                        ->whereBetween('ipdRegDate', [ $input['fromDate'],$input['toDate']])
                        ->where('wardName',$wardName)
                        ->whereBetween('ipdRegDate', [ $input['fromDate'],$input['toDate']])
                        ->select('ipdRegDate',DB::raw("count(*) as count"))
                        ->orderBy("ipdRegDate")
                        ->groupBy('ipd_models.ipdRegDate')
                        ->get();
                        ///->toArray();
            return DataTables::of($data)
                   ->addColumn('id',function($data){
                        static $i=1;
                        return $i++;
                   })->addColumn('total',function($data){
                             static $sum=0;    
                             $sum+=$data->count;                        
                        return $sum;
                   })->editColumn('ipdRegDate', function ($data){
                    return \Carbon\Carbon::parse($data->ipdRegDate)->format('d/m/Y') ;})->make(true);
       }

    }


     public function opdReport(Request $request) {
         $departmentList = DepartmentModel::all()->pluck('name','id');
        return view('hms.reports.opdmonth-wise',compact('departmentList'));
    }
    public function opdReportSearch(Request $request) { 
      
         if( $request->department == null) {
          $fromMonth = date("m", strtotime($request->fromDate));   
                  $toMonth = date("m", strtotime($request->toDate));
                     $opdMonthData = DB::table('opd_models')
                     ->whereRaw("MONTH(regDate) BETWEEN '".$fromMonth."' AND '".$toMonth."' ")
                                      
                     ->select('regDate',DB::raw('MONTHNAME(regDate) as month'),DB::raw('YEAR(regDate) as year'), DB::raw('count(*) as count'),DB::raw("SUM(IF(gender='Male Adult',1,0)) as maleAdult,SUM(IF(gender='FeMale Adult',1,0)) as FemaleAdult,SUM(IF(gender='Male Child',1,0)) as malechild,SUM(IF(gender='FeMale Child',1,0)) as femalechild,opd_models.regDate as regDate"))                     
                     ->groupBy(DB::raw("MONTH(regDate)"))  
                     ->get(); 

                 return DataTables::of($opdMonthData)
                    ->addColumn('sn',function($data) { 
                            static $i=1;                      
                         return $i++;                    
                     })
                    ->addColumn('total',function($data){                         
                       $total = $data->maleAdult+$data->FemaleAdult+$data->femalechild+$data->malechild;
                        return $total;                   
                    })->addColumn('fullmonth',function($data) { 
                       return sprintf(" %s / %s" ,$data->month,$data->year);              
                     })->make(true);

         } else {
                 $fromMonth = date("m", strtotime($request->fromDate));   
                  $toMonth = date("m", strtotime($request->toDate));
                     $opdMonthData = DB::table('opd_models')
                     ->whereRaw("MONTH(regDate) BETWEEN '".$fromMonth."' AND '".$toMonth."' ")
                      ->where('department',$request->department)                 
                     ->select('regDate',DB::raw('MONTHNAME(regDate) as month'),DB::raw('YEAR(regDate) as year'), DB::raw('count(*) as count'),DB::raw("SUM(IF(gender='Male Adult',1,0)) as maleAdult,SUM(IF(gender='FeMale Adult',1,0)) as FemaleAdult,SUM(IF(gender='Male Child',1,0)) as malechild,SUM(IF(gender='FeMale Child',1,0)) as femalechild,opd_models.regDate as regDate"))                     
                     ->groupBy(DB::raw("MONTH(regDate)"))  
                     ->get(); 

                 return DataTables::of($opdMonthData)
                    ->addColumn('sn',function($data) { 
                            static $i=1;                      
                         return $i++;                    
                     })
                    ->addColumn('total',function($data){                         
                       $total = $data->maleAdult+$data->FemaleAdult+$data->femalechild+$data->malechild;
                        return $total;                   
                    })->addColumn('fullmonth',function($data) { 
                       return sprintf(" %s / %s" ,$data->month,$data->year);              
                     })->make(true);
         }
    }
    public function ipdReport(Request $request) {
         $wardList = WardModel::all()->pluck('name','id');
        return view('hms.reports.ipdmonth-wise',compact('wardList'));
    }
    public function ipdReportSearch(Request $request) { 

         if( $request->wardName == null) {
                    $fromMonth = date("m", strtotime($request->fromDate));   
                    $toMonth = date("m", strtotime($request->toDate));
                     $ipdMonthData = DB::table('ipd_models')
                     //->whereRaw("MONTH(dod) BETWEEN '".$fromMonth."' AND '".$toMonth."' ")
                    ->select('ipdRegDate','dod',DB::raw('MONTHNAME(ipdRegDate) as month'),DB::raw('YEAR(ipdRegDate) as year'), DB::raw('count(ipdRegDate) as count'),DB::raw('count(dod) as dodcount')) 
                    ->whereRaw("MONTH(ipdRegDate) BETWEEN '".$fromMonth."' AND '".$toMonth."' ")    
                    ->orderBy('month')                 
                    ->groupBy('month')  
                    ->get(); 


            // $from = date('Y-m',strtotime($request->fromDate));
            // $to = date('Y-m',strtotime($request->toDate));

            // $ipdMonthData = IpdModel::select(DB::raw("DATE_FORMAT(ipdRegDate, '%M - %Y')as month"),DB::raw("count(ipdRegDate) as admit"),DB::raw("count(dod) as discharge"))
            // ->whereBetween(DB::raw('DATE_FORMAT(ipdRegDate,"%Y-%m")'),array($from,$to))
            // ->where('dltStatus','=','N')
            // ->orderby('ipdRegDate')
            // ->groupBy('month')
            // ->get();





            return $ipdMonthData;
                 return DataTables::of($ipdMonthData)
                    ->addColumn('sn',function($data) { 
                            static $i=1;                      
                         return $i++;                    
                     })
                    ->addColumn('fullmonth',function($data) { 
                       return sprintf(" %s / %s" ,$data->month,$data->year);              
                     })->addColumn('carryfarward',function($data) { 
                           $carryfarward = $data->count-$data->dodcount;  
                           return  $carryfarward;         
                         })->make(true);
         } else {
                     $fromMonth = date("m", strtotime($request->fromDate));   
                      $toMonth = date("m", strtotime($request->toDate));
                         $ipdMonthData = DB::table('ipd_models')
                        ->where('wardName',$request->wardName)
                         ->whereRaw("MONTH(ipdRegDate) BETWEEN '".$fromMonth."' AND '".$toMonth."' ")
                         ->select('ipdRegDate',DB::raw('MONTHNAME(ipdRegDate) as month'),DB::raw('YEAR(ipdRegDate) as year'), DB::raw('count(*) as count'),DB::raw('count(dod) as dod'))                    
                         ->groupBy(DB::raw("MONTH(ipdRegDate)"))  
                         ->get(); 
                     return DataTables::of($ipdMonthData)
                        ->addColumn('sn',function($data) { 
                                static $i=1;                      
                             return $i++;                    
                         })->addColumn('fullmonth',function($data) { 
                           return sprintf(" %s / %s" ,$data->month,$data->year);              
                         })->addColumn('carryfarward',function($data) { 
                           $carryfarward = $data->count-$data->dod;  
                           return  $carryfarward;         
                         })->make(true);
                }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function opdTreatmentView(Request $request)
    {
       return view('hms.reports.opdtreatment-list');
    }
    public function opdTreatmentListFilter(Request $request){
        $input =$request->all();
       
        
        $opdTreamentList = OpdTreatmentModel::whereBetween('treatment_date', [ $input['fromDate'],$input['toDate']])
        ->select('opd_treatment_models.id as opdtreatId','opd_treatment_models.patientId as patientId','opd_models.patientName as patientName','opd_models.regNum as regNum','opd_treatment_models.treatment_date as treatment_date','opd_treatment_models.consultant as consultant','opd_models.gender as gender','opd_models.regDate','opd_models.address')
        ->join('opd_models','opd_treatment_models.patientId','=','opd_models.id')
        ->groupBy('opd_treatment_models.patientId')
        ->get();

            return DataTables::of($opdTreamentList)
                  ->editColumn('consultant',function($data) {

                        return $data->getConsultant->name;})
                   ->addColumn('id',function($data){
                        static $k=1;
                        return $k++;})
                   ->addColumn('action',function($data){
                    return sprintf('<button data-toggle="modal tooltip" data-placement="top" title="view" data-id="%s" class=" btn-sm %s btn btn-info  ">%s</button>',$data['patientId'],'treatmentView','<i class=" fa fa-eye"></i>');

                   })->make(true);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function treatmentView(Request $request) {
         $input = $request->all();
         if(isset($input['treatment_id'])) {
            $treatment_id = $input['treatment_id'];
            $data = OpdTreatmentModel::where('patientId',$treatment_id)->first();
            $treatmentData = OpdTreatmentModel::where('patientId',$treatment_id)->get();
            Log::info('opd treatmentData=='.print_r($treatmentData,true));
            $content = \View::make('hms.reports.treatmentlist-view',compact('data','treatment_id','treatmentData'));

            $content = $content->render();
            return response()->json(['html'=> $content,'status'=>true],200);
        }
        
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

    public function yogaReport(Request $request) {
        $departmentList = DepartmentModel::all()->pluck('name','id');
        return view('hms.reports.yoga-report',compact('departmentList'));
    }


     public function yogaReportSearch(Request $request) {
       
            $fromMonth = date("m", strtotime($request->fromDate));
            $toMonth = date("m", strtotime($request->toDate));
             $yogaData = DB::table('yoga_models')
                       ->whereRaw("MONTH(yogadate) BETWEEN '".$fromMonth."' AND '".$toMonth."' ")
                      //->whereRaw('MONTH(yogadate) = ?',[$nmonth])
                      ->select('yogadate',DB::raw('MONTHNAME(yogadate) as month'),DB::raw('YEAR(yogadate) as year'), DB::raw('count(*) as count'))

                      ->groupBy(DB::raw("MONTH(yogadate)"))
                      ->get();
                    if(count($yogaData) < 1) {

                        return response()->json(['yoga'=>'no data availabe','status'=>'nodata']); 
                    }
                return response()->json(['yoga'=>$yogaData,'status'=>true]); 
        
        }
    public function ecgReport(Request $request) {
        $departmentList = DepartmentModel::all()->pluck('name','id');
        return view('hms.reports.ecg-report',compact('departmentList'));
        
    }

    public function ecgReportSearch(Request $request) { 

          $fromMonth = date("m", strtotime($request->fromDate));   
                  $toMonth = date("m", strtotime($request->toDate));
                             $yogaData = DB::table('ecg_examination_models')
                             ->whereRaw("MONTH(date) BETWEEN '".$fromMonth."' AND '".$toMonth."' ")
                                              
                             ->select('date','remark',DB::raw('MONTHNAME(date) as month'),DB::raw('YEAR(date) as year'), DB::raw('count(*) as count'))                     
                             ->groupBy(DB::raw("MONTH(date)"))  
                             ->get(); 
                    return DataTables::of($yogaData)
                            ->addColumn('sn',function($data) { 
                                static $i=1;                      
                                 return $i++;                    
                             })
                            ->addColumn('total',function($data){                         
                                static $sum=0;    
                                $sum+=$data->count;                        
                            return $sum;                     
                            })->addColumn('fullmonth',function($data) { 
                       return sprintf(" %s / %s" ,$data->month,$data->year);              
                     })->make(true);
         }
    public function urineReport(Request $request) {
        //$departmentList = DepartmentModel::all()->pluck('name','id');
        return view('hms.reports.urineexam-report');
        
    }

    public function urineReportSearch(Request $request) { 

          $fromMonth = date("m", strtotime($request->fromDate));   
                  $toMonth = date("m", strtotime($request->toDate));
                             $yogaData = DB::table('urine_examination_models')
                             ->whereRaw("MONTH(date) BETWEEN '".$fromMonth."' AND '".$toMonth."' ")
                                              
                             ->select('date',DB::raw('MONTHNAME(date) as month'),DB::raw('YEAR(date) as year'), DB::raw('count(*) as count'))                     
                             ->groupBy(DB::raw("MONTH(date)"))  
                             ->get(); 
                    return DataTables::of($yogaData)
                            ->addColumn('sn',function($data) { 
                                static $i=1;                      
                                 return $i++;                    
                             })->addColumn('remark',function($data) { 
                                               
                                 return 'remark';                 
                             })
                            ->addColumn('total',function($data){                         
                                static $sum=0;    
                                $sum+=$data->count;                        
                            return $sum;                     
                            })->addColumn('fullmonth',function($data) { 
                       return sprintf(" %s / %s" ,$data->month,$data->year);              
                     })->make(true);
         }

    public function stoolReport(Request $request) {
        return view('hms.reports.stoolexam-report');
    }
    public function stoolReportSearch(Request $request) { 

          $fromMonth = date("m", strtotime($request->fromDate));   
                  $toMonth = date("m", strtotime($request->toDate));
                     $yogaData = DB::table('stool_examination_models')
                     ->whereRaw("MONTH(date) BETWEEN '".$fromMonth."' AND '".$toMonth."' ")
                                      
                     ->select('date',DB::raw('MONTHNAME(date) as month'),DB::raw('YEAR(date) as year'), DB::raw('count(*) as count'))                     
                     ->groupBy(DB::raw("MONTH(date)"))  
                     ->get(); 
                 return DataTables::of($yogaData)
                    ->addColumn('sn',function($data) { 
                            static $i=1;                      
                         return $i++;                    
                     })->addColumn('remark',function($data) { 
                         return 'remark';                 
                     })
                    ->addColumn('total',function($data){                         
                        static $sum=0;    
                        $sum+=$data->count;                        
                    return $sum;                     
                    })->addColumn('fullmonth',function($data) { 
                       return sprintf(" %s / %s" ,$data->month,$data->year);              
                     })->make(true);
        }

    
    public function serunReport(Request $request) {
        return view('hms.reports.serunexam-report');
    }
    public function serunReportSearch(Request $request) { 

          $fromMonth = date("m", strtotime($request->fromDate));   
                  $toMonth = date("m", strtotime($request->toDate));
                     $yogaData = DB::table('serum_of_widal_models')
                     ->whereRaw("MONTH(date) BETWEEN '".$fromMonth."' AND '".$toMonth."' ")
                                      
                     ->select('date',DB::raw('MONTHNAME(date) as month'),DB::raw('YEAR(date) as year'), DB::raw('count(*) as count'))                     
                     ->groupBy(DB::raw("MONTH(date)"))  
                     ->get(); 
                 return DataTables::of($yogaData)
                    ->addColumn('sn',function($data) { 
                            static $i=1;                      
                         return $i++;                    
                     })->addColumn('remark',function($data) { 
                         return '';                 
                     })
                    ->addColumn('total',function($data){                         
                        static $sum=0;    
                        $sum+=$data->count;                        
                    return $sum;                     
                    })->addColumn('fullmonth',function($data) { 
                       return sprintf(" %s / %s" ,$data->month,$data->year);              
                     })->make(true);
         }

    public function semeneReport(Request $request) {
        return view('hms.reports.semeneexam-report');
    }
    public function semeneReportSearch(Request $request) { 

          $fromMonth = date("m", strtotime($request->fromDate));   
                  $toMonth = date("m", strtotime($request->toDate));
                     $yogaData = DB::table('serum_of_widal_models')
                     ->whereRaw("MONTH(date) BETWEEN '".$fromMonth."' AND '".$toMonth."' ")
                                      
                     ->select('date',DB::raw('MONTHNAME(date) as month'),DB::raw('YEAR(date) as year'), DB::raw('count(*) as count'))                     
                     ->groupBy(DB::raw("MONTH(date)"))  
                     ->get(); 
                 return DataTables::of($yogaData)
                    ->addColumn('sn',function($data) { 
                            static $i=1;                      
                         return $i++;                    
                     })->addColumn('remark',function($data) { 
                         return '';                 
                     })
                    ->addColumn('total',function($data){                         
                        static $sum=0;    
                        $sum+=$data->count;                        
                    return $sum;                     
                    })->addColumn('fullmonth',function($data) { 
                       return sprintf(" %s / %s" ,$data->month,$data->year);              
                     })->make(true);
         }

    public function generalbloodReport(Request $request) {
        return view('hms.reports.generalblood-report');
    }
    public function generalbloodReportSearch(Request $request) { 

          $fromMonth = date("m", strtotime($request->fromDate));   
                  $toMonth = date("m", strtotime($request->toDate));
                     $yogaData = DB::table('general_blood_models')
                     ->whereRaw("MONTH(date) BETWEEN '".$fromMonth."' AND '".$toMonth."' ")
                                      
                     ->select('date',DB::raw('MONTHNAME(date) as month'),DB::raw('YEAR(date) as year'), DB::raw('count(*) as count'))                     
                     ->groupBy(DB::raw("MONTH(date)"))  
                     ->get(); 
                 return DataTables::of($yogaData)
                    ->addColumn('sn',function($data) { 
                            static $i=1;                      
                         return $i++;                    
                     })->addColumn('remark',function($data) { 
                         return '';                 
                     })
                    ->addColumn('total',function($data){                         
                        static $sum=0;    
                        $sum+=$data->count;                        
                    return $sum;                     
                    })->addColumn('fullmonth',function($data) { 
                       return sprintf(" %s / %s" ,$data->month,$data->year);              
                     })->make(true);
         }
    public function bloodReport(Request $request) {
        return view('hms.reports.bloodexam-report');
    }
    public function bloodReportSearch(Request $request) { 

          $fromMonth = date("m", strtotime($request->fromDate));   
                  $toMonth = date("m", strtotime($request->toDate));
                     $yogaData = DB::table('blood_examination_models')
                     ->whereRaw("MONTH(date) BETWEEN '".$fromMonth."' AND '".$toMonth."' ")
                                      
                     ->select('date',DB::raw('MONTHNAME(date) as month'),DB::raw('YEAR(date) as year'), DB::raw('count(*) as count'))                     
                     ->groupBy(DB::raw("MONTH(date)"))  
                     ->get(); 
                 return DataTables::of($yogaData)
                    ->addColumn('sn',function($data) { 
                            static $i=1;                      
                         return $i++;                    
                     })->addColumn('remark',function($data) { 
                         return 'remark';                 
                     })
                    ->addColumn('total',function($data){                         
                        static $sum=0;    
                        $sum+=$data->count;                        
                    return $sum;                     
                    })->addColumn('fullmonth',function($data) { 
                       return sprintf(" %s / %s" ,$data->month,$data->year);              
                     })->make(true);
         }

    public function xrayReport(Request $request) {
        return view('hms.reports.xrayexam-report');
    }
    public function xrayReportSearch(Request $request) { 

          $fromMonth = date("m", strtotime($request->fromDate));   
                  $toMonth = date("m", strtotime($request->toDate));
                     $yogaData = DB::table('x_ray_models')
                     ->whereRaw("MONTH(date) BETWEEN '".$fromMonth."' AND '".$toMonth."' ")
                                      
                     ->select('date',DB::raw('MONTHNAME(date) as month'),DB::raw('YEAR(date) as year'), DB::raw('count(*) as count'))                     
                     ->groupBy(DB::raw("MONTH(date)"))  
                     ->get(); 
                 return DataTables::of($yogaData)
                    ->addColumn('sn',function($data) { 
                            static $i=1;                      
                         return $i++;                    
                     })->addColumn('remark',function($data) { 
                         return 'remark';                 
                     })
                    ->addColumn('total',function($data){                         
                        static $sum=0;    
                        $sum+=$data->count;                        
                    return $sum;                     
                    })->addColumn('fullmonth',function($data) { 
                       return sprintf(" %s / %s" ,$data->month,$data->year);              
                     })->make(true);
         }
 }