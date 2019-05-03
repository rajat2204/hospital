<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\PhysiotherapyModel;
use App\Model\physiotherapyListModel;
use App\Model\DiseaseModel;
use App\Model\TherapyDiseaseModel;
use DataTables;

 class PhysiotherapyModelController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $therapyDiseaseList=TherapyDiseaseModel::all()->pluck('therapy_disease','id');
        return view('hms.physiotherapy.physiotherapy',compact('therapyDiseaseList'));
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
      // dd($request->all());
        $this->validate($request,[
                'patientId'=>'required',
        ]);
        $physiotherapylist = PhysiotherapyModel::create($request->all());
        return redirect(route('phyiotherapyFilter'))->with('success_message','Data Save SuccessFully !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\PhysiotherapyModel  $physiotherapyModel
     * @return \Illuminate\Http\Response
     */
    public function show(PhysiotherapyModel $physiotherapyModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\PhysiotherapyModel  $physiotherapyModel
     * @return \Illuminate\Http\Response
     */
    public function edit(PhysiotherapyModel $physiotherapyModel,$id) {
        $therapyDiseaseList=TherapyDiseaseModel::all()->pluck('therapy_disease','id');
        $physiotherapyData = PhysiotherapyModel::where('id',$id)->first();
        return view('hms.physiotherapy.physiotherapy-edit',compact('physiotherapyData','therapyDiseaseList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\PhysiotherapyModel  $physiotherapyModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PhysiotherapyModel $physiotherapyModel,$id) {
        $this->validate($request,[

            'patientId'=>'required',
            
        ]);
        $physiotherapyUpdate = PhysiotherapyModel::findOrFail($id)->first();
        if(!empty($physiotherapyUpdate)) {
            $physiotherapyUpdate->update($request->all());
        }
        else {
              return abort(404);
        }

        return redirect(route('phyiotherapyFilter'))->with('success_message','Data Updated SuccessFully !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\PhysiotherapyModel  $physiotherapyModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(PhysiotherapyModel $physiotherapyModel,$id) {
        $physiotherapyDelete = PhysiotherapyModel::where('id',$id)->delete();
        return response()->json(['status'=>true]);
    }

    public function phyiotherapyFilter() {
        return view('hms.physiotherapy.physiotherapy-filter');
    }

    public function phyiotherapyValue(Request $request) {
        
       $therapylist = physiotherapyListModel::where('disease',$request->disease_id)->pluck('therapy')->toArray();
  
       return response()->json(['therapy'=> $therapylist,'status'=>true]);
    }

     public function phyiotherapyFilterData(Request $request) {

        $physiotherapyFilterData =PhysiotherapyModel::all();
         
             return DataTables::of($physiotherapyFilterData)
            ->editColumn('phyadate', function ($data) {
                return \Carbon\Carbon::parse($data->phyadate)->format('d/m/Y') ;})

            ->addColumn('regDate', function ($data) {

                return \Carbon\Carbon::parse($data->opdData->regDate)->format('d/m/Y') ;})
             ->addColumn('patientName', function ($data) {

                return $data->opdData->patientName;})
            ->addColumn('action', function($data) {

                return sprintf('<div class="btn-group"><button data-id="%s" class="physiotherapyView btn-sm btn btn-success">%s</button> 
                                <a href="%s">%s</a>   
                               <button data-id="%s" class="physiotherapyDelete btn-sm btn btn-danger" >%s</button> </div>',
                               $data['id'],'<i class=" fa fa-eye"></i>',
                                route('phyiotherapy.edit',['id'=>$data['id']]),'<i class=" btn-sm btn btn-info fa fa-pencil"></i>',
                                $data['id'],'<i class=" fa fa-trash" ></i>');
              
            })->addColumn('sn',function($data) {
                static $i=1;
                return $i++;
            })->make(true);  
            
    }
    public function phyiotherapyReportView(Request $request) {
            $id=$request->id;
            $data =PhysiotherapyModel::where('id',$id)->first();
            $content =\View::make('hms.physiotherapy.physiotherapy-view',compact('data'));
            $content = $content->render();
            return response()->json(['html'=> $content,'status'=>true],200);
        }

}