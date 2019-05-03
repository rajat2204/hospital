<?php

namespace App\Http\Controllers;

use App\Model\XRayModel;
use App\Model\OpdModel;
use Illuminate\Http\Request;
use DataTables;


class XRayModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('hms.testReport.xray.xray');
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
   

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\XRayModel   $xRayModel
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request) {
         $this->validate($request,[
            'patientId'=>'required',
       
            ]);

         $xrayExamData = XRayModel::create($request->all());
         $request->session()->flash('success_message','Data Save Successfully !!');
          
         return redirect(route('xrayexam.filter'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\XRayModel  $xRayModel
     * @return \Illuminate\Http\Response
     */
    public function show(XRayModel $xRayModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\XRayModel   $xRayModel
     * @return \Illuminate\Http\Response
     */
   public function edit(XRayModel $xRayModel,$id)
    {
        $xrayexamData = XRayModel::where('id',$id)->first();
        return view('hms.testReport.xray.xrayexam-edit',compact('xrayexamData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\XRayModel  $xRayModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, XRayModel $xRayModel,$id) {
         $this->validate($request,[

            'patientId'=>'required',
       
        ]);
        $xrayexamUpdate = XRayModel::findOrFail($id)->first();
        if(!empty($xrayexamUpdate)) {
            $xrayexamUpdate->update($request->all());
        }
        else{
              return abort(404);
        }

        $request->session()->flash('success_message','Data Updated Successfully !!');
       return redirect(route('xrayexam.filter'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\XRayModel  $xRayModel
     * @return \Illuminate\Http\Responses
     */
    public function destroy(XRayModel $xRayModel,$id)
    {
        $xrayDataDelete = XRayModel::where('id',$id)->delete();
        //$request->session()->flash('error_message','Data Delete Successfully !!');
        return response()->json(['status'=>true]);
    }
    public function xrayExamFilter(Request $request){
        return view('hms.testReport.xray.xrayexam-filter');

    }

    public function xrayExamData(Request $request) {

        $bloodFilterData =XRayModel::select('x_ray_models.id as id','x_ray_models.patientId as patientId','x_ray_models.date as date','x_ray_models.referredBy as referredBy','opd_models.patientName as patientName','opd_models.age as age','opd_models.regDate as regDate','x_ray_models.investigationAdvised as investigationAdvised')
            ->join('opd_models', 'opd_models.id', '=', 'x_ray_models.patientId')
            ->get();
             return DataTables::of($bloodFilterData)
            ->editColumn('regDate', function ($data){
                return \Carbon\Carbon::parse($data->regDate)->format('d/m/Y') ;})

            ->editColumn('date', function ($data){

                return \Carbon\Carbon::parse($data->date)->format('d/m/Y') ;})
             
            ->addColumn('action', function($data){

                return sprintf('<div class="btn-group"><button data-id="%s" class="xrayexamView btn-sm btn btn-success">%s</button> 
                                <a href="%s">%s</a>   
                               <button data-id="%s" class="xrayexamDelete btn-sm btn btn-danger" >%s</button></div>',
                               $data['id'],'<i class=" fa fa-eye"></i>',
                                route('x-ray.edit',['id'=>$data['id']]),'<i class=" btn-sm btn btn-info fa fa-pencil"></i>',
                                $data['id'],'<i class=" fa fa-trash" ></i>');
              
            })->addColumn('sn',function($data){
                static $i=1;
                return $i++;
            })->make(true);  
            
    }
    public function xrayExamReportView(Request $request){
            $id=$request->id;
            $data =XRayModel::where('id',$id)->first();
            $content =\View::make('hms.testReport.xray.xrayexam-view',compact('data'));
            
           $content = $content->render();
            return response()->json([
                'html'=> $content,
                'status'=>true
            ],200);
        }
}
