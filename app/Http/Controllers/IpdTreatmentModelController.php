<?php

namespace App\Http\Controllers;

use App\Model\IpdTreatmentModel;
use App\Model\IpdModel;
use App\Model\DoctorModel;
use App\Model\MedicineModel;
use App\Model\PotencyModel;
use App\Model\InvestigationModel;
use Illuminate\Http\Request;

class IpdTreatmentModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $input = $request->all();
        $doctorList=DoctorModel::all()->pluck('name','id');
        $medicineList=MedicineModel::all()->pluck('name','id');
        $potencyList=PotencyModel::all()->pluck('name','id');
        $investigationList=InvestigationModel::all()->pluck('name','id');

        $id = $input['id'];
        $data = IpdModel::where('id',$id)->first();
        $content = \View::make('hms.ipd.ipd-treatment-add',compact('data','doctorList','medicineList','potencyList','investigationList'));
        $content = $content->render();
        return response()->json([
            'html'=> $content,
            'status'=>true
        ],200);
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
            $formData = $request->all();
            $validator = \Validator::make( $formData,[
                'patientId'=>'required',
                'ipdId'=>'required',
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
               // return  $formData;
           $opdTreatmentData = new IpdTreatmentModel();
           $opdTreatmentData->patientId=$formData['patientId'];
           $opdTreatmentData->ipdId=$formData['ipdId'];
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

            return response()->json(['status'=>true,'message'=>'data save successfully !!'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\IpdTreatmentModel  $ipdTreatmentModel
     * @return \Illuminate\Http\Response
     */
    public function show(IpdTreatmentModel $ipdTreatmentModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\IpdTreatmentModel  $ipdTreatmentModel
     * @return \Illuminate\Http\Response
     */
    public function edit(IpdTreatmentModel $ipdTreatmentModel,$id)
    {
       
        $doctorList = DoctorModel::all()->pluck('name','id');
        $medicineList = MedicineModel::all()->pluck('name','id');
        $potencyList = PotencyModel::all()->pluck('name','id');
        $investigationList = InvestigationModel::all()->pluck('name','id');
        $data = IpdTreatmentModel::where('id',$id)->first();
        $checkbox = explode(",",$data->refTo);
        $content = \View::make('hms.ipd.ipd-treatment-edit',compact('data','doctorList','medicineList','potencyList','investigationList'));
        $content = $content->render();
        return response()->json(['html'=> $content,'data'=>$checkbox,'status'=>true],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\IpdTreatmentModel  $ipdTreatmentModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IpdTreatmentModel $ipdTreatmentModel,$id)
    {
            $formData=$request->all();   
            //return $formData;
            $validator = \Validator::make( $formData,[
                'patientId'=>'required',
                'ipdId'=>'required',
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
                    return response()->json(['errors'=>$validator->errors(),'status'=>false]);
               }    
            $ipdUpdate=IpdTreatmentModel::where('id',$id)->update([

                'patientId'=>$formData['patientId'],
                'ipdId'=>$formData['ipdId'],
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
     * @param  \App\Model\IpdTreatmentModel  $ipdTreatmentModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(IpdTreatmentModel $ipdTreatmentModel,$id) {

        IpdTreatmentModel::where('id',$id)->delete();
        return response()->json(['status'=>true],200);
    }
}
