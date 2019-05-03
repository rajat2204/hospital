<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\OpdTreatmentModel;
use App\Model\MedicineModel;
use App\Model\DoctorModel;
use App\Model\OpdModel;
use App\Model\PotencyModel;
use App\Model\InvestigationModel;

class OpdTreatmentModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request){

           $formData = $request->all();
           $validator = \Validator::make( $formData,[
            
            'patientId'=>'required',
            'complaint'=>'required',
            'treatment'=>'required',
            'treatment_date'=>'required',
            'medicine'=>'required',
            'potency'=>'required',
            'advice'=>'required',
            'nod'=>'required',
            'consultant'=>'required',
            'remark'=>'required',
            'refTo'=>'required',

        ]);
           if($validator->fails()) {

                return response()->json(['error'=>$validator->errors(),'status'=>false]);
                
           }

               $opdTreatmentData=new OpdTreatmentModel();
               $opdTreatmentData->patientId=$formData['patientId'];
               $opdTreatmentData->complaint=$formData['complaint'];
               $opdTreatmentData->treatment=$formData['treatment'];
               $opdTreatmentData->treatment_date=$formData['treatment_date'];
               $opdTreatmentData->medicine=$formData['medicine'];
               $opdTreatmentData->potency=$formData['potency'];
               $opdTreatmentData->advice=$formData['advice'];
               $opdTreatmentData->nod=$formData['nod'];
               $opdTreatmentData->consultant=$formData['consultant'];
               $opdTreatmentData->remark=$formData['remark'];
               $opdTreatmentData->refTo =implode(",",$formData['refTo']);

               $opdTreatmentData->save();

              return response()->json(['staus'=>true, 'message'=>'data save successfully !!'],200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\OpdTreatmentModel  $opdTreatmentModel
     * @return \Illuminate\Http\Response
     */
    public function show(OpdTreatmentModel $opdTreatmentModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\OpdTreatmentModel  $opdTreatmentModel
     * @return \Illuminate\Http\Response
     */
    public function edit(OpdTreatmentModel $opdTreatmentModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\OpdTreatmentModel  $opdTreatmentModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OpdTreatmentModel $opdTreatmentModel,$id)
    {
                    $formData=$request->all();
                    //return $formData;
                    $validator = \Validator::make($formData,[
                            'patientId'=>'required',
                            'complaint'=>'required',
                            'treatment'=>'required',
                            'treatment_date'=>'required',
                            'medicine'=>'required',
                            'potency'=>'required',
                            'advice'=>'required',
                            'nod'=>'required',
                            'consultant'=>'required',
                            'remark'=>'required',
                            'refTo'=>'required',
                        ]);
           if($validator->fails()) {
                return response()->json(['error'=>$validator->errors(),'status'=>false]);
           }
                    $ipdUpdate=OpdTreatmentModel::where('id',$id)->update([
                    'patientId'=>$formData['patientId'],
                    'complaint'=>$formData['complaint'],
                    'treatment_date'=>$formData['treatment_date'],
                    'treatment'=>$formData['treatment'],
                    'medicine'=>$formData['medicine'],
                    'potency'=>$formData['potency'],
                    'advice'=>$formData['advice'],
                    'nod'=>$formData['nod'],
                    'consultant'=>$formData['consultant'],
                    'remark'=>$formData['remark'], 
                    'refTo' =>implode(",",$formData['refTo']),     

           ]);
              return response()->json(['status'=>true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\OpdTreatmentModel  $opdTreatmentModel
     * @return \Illuminate\Http\Response
     */
    public function des(Request $request) {
        $id = $request->id;
        OpdTreatmentModel::where('id',$id)->delete();
        return response()->json(['status'=>true,'message'=>'data delete successfully'],200);

    }
    public function opdAddTreatment(Request $request) {

        $input = $request->all();
        $doctorList=DoctorModel::all()->pluck('name','id');
        $medicineList=MedicineModel::all()->pluck('name','id');
        $orderId = $input['order_id'];
        $data = OpdModel::where('orderId',$orderId)->first();
        $content = \View::make('hms.opd.opd-treatment',compact('data','doctorList','medicineList'));
        $content = $content->render();
        return response()->json(['html'=> $content,'status'=>true],200);
    }

     public function opdEditTreatment(Request $request) {

        $input = $request->all();
        $doctorList=DoctorModel::all()->pluck('name','id');
        $medicineList=MedicineModel::all()->pluck('name','id');
        $id = $input['id'];
        $data=OpdTreatmentModel::where('id',$id)->first();
        $potencyList=PotencyModel::all()->pluck('name','id');
        $investigationList=InvestigationModel::all()->pluck('name','id');
        $checkbox=explode(",",$data->refTo);
        $content = \View::make('hms.opd.treatment-edit',compact('data','doctorList','medicineList','potencyList','investigationList'));
        $content = $content->render();
        return response()->json(['html'=> $content,'data'=>$checkbox,'status'=>true],200);
    }
}
