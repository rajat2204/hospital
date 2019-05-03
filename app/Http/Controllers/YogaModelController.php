<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\YogaModel;
use App\Model\DoctorModel;
use App\Model\DiseaseModel;
use App\Model\YogaListModel;
use DataTables;

class YogaModelController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diseaseList=DiseaseModel::all()->pluck('name','id');
        return view('hms.yoga.yoga',compact('diseaseList'));
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
        $yogalist = YogaModel::create($request->all());
        return redirect(route('yogaFilter'))->with('success_message','Data Save SuccessFully !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\YogaModel  $yogaModel
     * @return \Illuminate\Http\Response
     */
    public function show(YogaModel $yogaModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\YogaModel  $yogaModel
     * @return \Illuminate\Http\Response
     */
    public function edit(YogaModel $yogaModel,$id) {
        $diseaseList=DiseaseModel::all()->pluck('name','id');
        $yogaData = YogaModel::where('id',$id)->first();
        return view('hms.yoga.yoga-edit',compact('yogaData','diseaseList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\YogaModel  $yogaModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, YogaModel $yogaModel,$id) {
        $this->validate($request,[

            'patientId'=>'required',
            
        ]);
        $yogaUpdate = YogaModel::findOrFail($id)->first();
        if(!empty($yogaUpdate)) {
            $yogaUpdate->update($request->all());
        }
        else {
              return abort(404);
        }

        return redirect(route('yogaFilter'))->with('success_message','Data Updated SuccessFully !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\YogaModel  $yogaModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(YogaModel $yogaModel,$id) {
        $yogaDelete = YogaModel::where('id',$id)->delete();
        return response()->json(['status'=>true]);
    }

    public function yogaFilter() {
        return view('hms.yoga.yoga-filter');
    }

    public function yogaValue(Request $request) {
        
       $yogalist = YogaListModel::where('disease',$request->disease_id)->pluck('exersise','id')->toArray();
       $exersise = implode(",",$yogalist);
       return response()->json(['exersise'=> $exersise,'status'=>true]);
    }

     public function yogaFilterData(Request $request) {

        $yogaFilterData =yogaModel::all();
         
             return DataTables::of($yogaFilterData)
            ->editColumn('yogadate', function ($data) {
                return \Carbon\Carbon::parse($data->yogadate)->format('d/m/Y') ;})

            ->addColumn('regDate', function ($data) {

                return \Carbon\Carbon::parse($data->opdData->regDate)->format('d/m/Y') ;})
             ->addColumn('patientName', function ($data) {

                return $data->opdData->patientName;})
            ->addColumn('action', function($data) {

                return sprintf('<div class="btn-group"><button data-id="%s" class="yogaView btn-sm btn btn-success">%s</button> 
                                <a href="%s">%s</a>   
                               <button data-id="%s" class="yogaDelete btn-sm btn btn-danger" >%s</button> </div>',
                               $data['id'],'<i class=" fa fa-eye"></i>',
                                route('yoga.edit',['id'=>$data['id']]),'<i class=" btn-sm btn btn-info fa fa-pencil"></i>',
                                $data['id'],'<i class=" fa fa-trash" ></i>');
              
            })->addColumn('sn',function($data){
                static $i=1;
                return $i++;
            })->make(true);  
            
    }
    public function yogaReportView(Request $request) {
            $id=$request->id;
            $data =yogaModel::where('id',$id)->first();
            $content =\View::make('hms.yoga.yoga-view',compact('data'));
            $content = $content->render();
            return response()->json(['html'=> $content,'status'=>true],200);
        }

}
