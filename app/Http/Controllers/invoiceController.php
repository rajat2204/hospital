<?php

namespace App\Http\Controllers;

use App\Model\invoiceModel;
use Illuminate\Http\Request;
use App\Model\OpdModel;
use DataTables;

class invoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hms.invoice.invoice');
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
               //dd($request->all());
                $this->validate($request, [
                    'patientId'=>'required',
                    'report_name'=>'required',
                    'amount'=>'required',

                ]);

               $invoiceData = invoiceModel::create($request->all());
               $request->session()->flash('success_message','Data Save Successfully !!');
               return redirect(route('invoice.filter'));
    }

    public function invoiceFilter() {
       
        return view('hms.invoice.invoice-filter');
        
     }

     public function invoiceData(Request $request) {

        $bloodFilterData =invoiceModel::select('invoice_models.id as id','invoice_models.patientId as patientId','invoice_models.date as date','invoice_models.referredBy as referredBy','opd_models.patientName as patientName','opd_models.age as age','opd_models.regDate as regDate')
            ->join('opd_models', 'opd_models.id', '=', 'invoice_models.patientId')
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
    public function edit(invoiceModel $invoicemodel,$id) {
        $invoiceData = invoiceModel::where('id',$id)->first();
        return view('hms.invoice.invoice-edit',compact('invoiceData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, invoiceModel $invoicemodel,$id) {
        $this->validate($request,[

            'patientId'=>'required',
            'report_name'=>'required',
            'amount'=>'required',
        ]);
        $invoiceUpdate = invoiceModel::findOrFail($id)->first();
        if(!empty($invoiceUpdate)) {
            $invoiceUpdate->update($request->all());
        }
        else{
              return abort(404);
        }

        $request->session()->flash('success_message','Data Updated Successfully !!');
        return redirect(route('invoice.filter'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(invoiceModel $invoicemodel,$id) {
        $bloodDataDelete = invoiceModel::where('id',$id)->delete();
        return response()->json(['status'=>true]);
    }
}
