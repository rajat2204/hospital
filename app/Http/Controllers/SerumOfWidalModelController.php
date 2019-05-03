<?php

namespace App\Http\Controllers;

use App\Model\SerumOfWidalModel;
use App\Model\OpdModel;
use Illuminate\Http\Request;
use DataTables;

class SerumOfWidalModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hms.testReport.serun.serun');
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
     * @param  \App\Model\SerumOfWidalModel   $serumOfWidalModel
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           $this->validate($request,[

            'patientId'=>'required',
       
        ]);
         $serunExamData = SerumOfWidalModel::create($request->all());
         $request->session()->flash('success_message','Data Save Successfully !!');
         return redirect(route('serunexam.filter'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\SerumOfWidalModel  $serumOfWidalModel
     * @return \Illuminate\Http\Response
     */
    public function show(SerumOfWidalModel $serumOfWidalModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\SerumOfWidalModel   $serumOfWidalModel
     * @return \Illuminate\Http\Response
     */
   public function edit(SerumOfWidalModel $serumOfWidalModel,$id)
    {
        $serunexamData = SerumOfWidalModel::where('id',$id)->first();
        return view('hms.testReport.serun.serunexam-edit',compact('serunexamData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\SerumOfWidalModel  $serumOfWidalModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SerumOfWidalModel $serumOfWidalModel,$id)
    {
         $this->validate($request,[

            'patientId'=>'required',
       
        ]);
        $serunexamUpdate = SerumOfWidalModel::findOrFail($id)->first();
        if(!empty($serunexamUpdate)) {
            $serunexamUpdate->update($request->all());
        }
        else{
              return abort(404);
        }

        $request->session()->flash('success_message','Data Updated Successfully !!');
            return redirect(route('serunexam.filter'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\SerumOfWidalModel  $serumOfWidalModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(SerumOfWidalModel $serumOfWidalModel,$id)
    {
        $bloodDataDelete = SerumOfWidalModel::where('id',$id)->delete();
        //$request->session()->flash('error_message','Data Delete Successfully !!');
        return response()->json(['status'=>true]);
    }
    public function serunExamFilter(Request $request){
        return view('hms.testReport.serun.serunexam-filter');

    }

    public function serunExamData(Request $request) {

        $bloodFilterData =SerumOfWidalModel::select('serum_of_widal_models.id as id','serum_of_widal_models.patientId as patientId','serum_of_widal_models.date as date','serum_of_widal_models.referredBy as referredBy','opd_models.patientName as patientName','opd_models.age as age','opd_models.regDate as regDate')
            ->join('opd_models', 'opd_models.id', '=', 'serum_of_widal_models.patientId')
            ->get();
             return DataTables::of($bloodFilterData)
            ->editColumn('regDate', function ($data){
                return \Carbon\Carbon::parse($data->regDate)->format('d/m/Y') ;})

            ->editColumn('date', function ($data){

                return \Carbon\Carbon::parse($data->date)->format('d/m/Y') ;})
             
            ->addColumn('action', function($data){

                return sprintf('<div class="btn-group"><button data-id="%s" class="serunexamView  btn-sm btn btn-success">%s</button><a href="%s">%s</a>   
                               <button data-id="%s" class="serunexamDelete btn-sm btn btn-danger" >%s</button></div>',
                               $data['id'],'<i class=" fa fa-eye"></i>',
                                route('serun.edit',['id'=>$data['id']]),'<i class="  btn-sm btn btn-info fa fa-pencil"></i>',
                                $data['id'],'<i class=" fa fa-trash" ></i>');
              
            })->addColumn('sn',function($data){
                static $i=1;
                return $i++;
            })->make(true);  
            
    }
    public function serunExamReportView(Request $request){
            $id=$request->id;
            $data =SerumOfWidalModel::where('id',$id)->first();
            $content =\View::make('hms.testReport.serun.serunexam-view',compact('data'));
            
           $content = $content->render();
            return response()->json([
                'html'=> $content,
                'status'=>true
            ],200);
        }
}
