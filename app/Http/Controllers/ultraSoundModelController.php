<?php

namespace App\Http\Controllers;

use DataTables;
use App\Model\OpdModel;
use Illuminate\Http\Request;
use App\Model\ultraSoundModel;

class ultraSoundModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hms.testReport.ultrasound.ultrasound');
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
            'remark'=>'required',
            'ultrasound_type'=>'required',
            'amount'=>'required|integer',
        ]);
        $ultrasoundData = ultraSoundModel::create($request->all());
        $request->session()->flash('success_message','Data Save Successfully !!');
        return redirect(route('ultrasound.filter'));

    }

    public function ultraSoundFilter() {
       
        return view('hms.testReport.ultrasound.ultrasound-filter');
        
     }

     public function ultraSoundFilterData(Request $request) {

        $bloodFilterData =ultraSoundModel::select('ultra_sound_models.id as id','ultra_sound_models.patientId as patientId','ultra_sound_models.date as date','ultra_sound_models.referredBy as referredBy','opd_models.patientName as patientName','opd_models.age as age','opd_models.regDate as regDate','opd_models.ultrasound_type as ultrasound_type')
            ->join('opd_models', 'opd_models.id', '=', 'ultra_sound_models.patientId')
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
                                route('invoice.edit',['id'=>$data['id']]),'<i class=" btn-sm btn btn-info fa fa-pencil"></i>',
                                $data['id'],'<i class=" fa fa-trash"></i>');
              
            })->addColumn('sn',function($data){
                static $i=1;
                return $i++;
            })->make(true);  
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
