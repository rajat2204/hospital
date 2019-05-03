@extends('layout.app') @section('content')
 <div class="app-content  my-3 my-md-5">
        <div class="side-app">
            <div class="page-header">
                <h4 class="page-title">Dashboard</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        EDIT OT DETAILS
                    </li>
                </ol>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="col-md-12 col-sm-6 col-xs-12">
                                    <span class="pull-left">
                                            OT-EDIT PATIENT DETAILS
                                    </span>
                                    <span class="pull-right">
                                          <a href="{{ route('otFilter') }}">
                                            <span class="pull-right btn-success ">
                                                <i class="fa fa-list"></i> SHOW/SEARCH OLD PATIENT</span>
                                            </a>
                                    </span>
                                </div>
                            </div>
                            <div class="card-body">
                                {!! Form::open(array('route'
                                =>['ot.update',$data->id],'files'=>'true','id'=>'profile-form','autocomplete'=>'off','method'=>'PUT'))
                                !!}
                             
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('name', 'OPD Registration Number:*') !!}
                                                {!! Form::text('patientId',$data->patientId,[ 'class' => 'form-control opd',
                                                'placeholder' => 'Enter OPD Registration Number','id'=>'id-opd-regnum',
                                                'readonly'=>true, ])
                                                !!}
                                                <div id="opd-reg-list"></div>
                                                <div class="error">{{ $errors->first('patientId') }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('opdDate', 'OPD Date:*') !!}

                                                {!! Form::text('opdDate',$data->opdDate,['class' =>'form-control','id'=>'id-opddate','name'=>'opdDate','placeholder'=>'OPD date','readonly'=>true]) 
                                                !!}
                                                <div class="error">{{ $errors->first('opdDate') }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('patientName','PatientName:*') !!}
                                                {!!Form::text('patientName',$data->patientDetails->patientName,
                                                ['class' =>'form-control','name'=>'patientName','id'=>'patientName','readonly'=>true,'placeholder'=>'Enter Patient Name']) 
                                                !!}
                                                <div class="error">{{ $errors->first('patientName') }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('ipdRegNum', 'IPD Number:*')!!}
                                                {!! Form::text('ipdRegNum',$data->ipdRegNum,['class' =>'form-control','id'=>'ipdRegNum','name'=>'ipdRegNum','placeholder'=>'IPD Registration number','readonly'=>true]) !!}
                                                <div class="error">{{ $errors->first('ipdRegNum') }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('ipdRegNUM', 'IPD Date:*')!!}
                                         
                                                {!!Form::text('ipdRegDate',$data->ipdRegDate,['class' =>'form-control','id'=>'ipdRegDate','name'=>'ipdRegDate','placeholder'=>'IPD date','readonly'=>true]) 
                                                !!}
                                                <div class="error">{{ $errors->first('ipdRegDate') }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('age', 'AGE:*') !!}
                                                {!! Form::text('age',$data->patientDetails->age,['class' =>'form-control','id'=>'age','name'=>'age','placeholder'=>'AGE','readonly'=>true])
                                                !!}
                                                <div class="error">{{ $errors->first('age') }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('gender', 'GENDER:*') !!}
                                          
                                                {!!Form::text('gender',$data->patientDetails->gender,['class' =>
                                                'form-control','id'=>'gender','name'=>'gender','placeholder'=>'GENDER','readonly'=>true]) !!}
                                                <div class="error">{{ $errors->first('gender') }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('address', 'Address:*') !!}
                                                {!! Form::text('address',$data->patientDetails->address,['class' =>'form-control','id'=>'address','readonly'=>true,'placeholder'=>'Enter Address']) 
                                                !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('referby', 'ReferedBy:') !!}
                                                {!!Form::text('referby',$data->referby,['class' =>'form-control','id'=>'referby','readonly'=>true,'placeholder'=>'Enter Refered By']) 
                                                !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('otDate', 'Ot Date:*') !!}
                                                {!! Form::date('otDate',$data->otDate,['class' =>'form-control',
                                                    'id'=>'otDate','name'=>'otDate'])
                                                !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('dignosis', 'Diagnosis:*')!!}
                                                {!! Form::textarea('dignosis',$data->dignosis,['class'=>'form-control','id'=>'dignosis','name'=>'dignosis','rows'=> 3, 'cols' =>40,'placeholder'=>'diagnosis']) 
                                                !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('otProcessure', 'OT Processure:*') !!}
                                                {!! Form::textarea('otProcessure',$data->dignosis,['class'=>'form-control',
                                                'id'=>'otProcessure','name'=>'otProcessure','rows'=> 3,'cols' =>40,'placeholder'=>'otprocessre']) 
                                                !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('Consultant','Consultant:*') !!}
                                                {!! Form::select('consultant',$doctorList,$data->consultant, [ 'class' =>
                                                'form-control', 'id'=>'consultant','placeholder' => '--Select Consultant Name--' ]) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('otherConsultant', 'Other Consultant') !!}
                                                {!! Form::text('otherConsultant',$data->otherConsultant,['class' =>'form-control','id'=>'otherConsultant','name'=>'otherConsultant'])
                                                !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('adviceTreatment', 'Advice & Treatment:*') !!}
                                                {!! Form::textarea('adviceTreatment',$data->adviceTreatment,['class'=>'form-control','id'=>'adviceTreatment','name'=>'adviceTreatment','rows'=>3,'cols'=>40,'placeholder'=>'adviceTreatment']) 
                                                !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('medicine1', 'Medicine <span class="badge badge-danger control-label">1</span>',[],false) !!}
                                                {!!Form::select('medicine1',$medicineList,$data->medicine1,[ 'class' => 'form-control','id'=>'medicine1','placeholder'=>'--Select Medicine--' ]) 
                                                !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('medicine2', 'Medicine <span class="badge badge-danger control-label">2</span>',[],false)  !!}
                                                {!! Form::select('medicine2',$medicineList,$data->medicine2,['class' =>'form-control','id'=>'medicine2','placeholder'=>'--Select Medicine--' ]) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('medicine3', 'Medicine <span class="badge badge-danger control-label">3</span>',[],false)!!}
                                          
                                                {!! Form::select('medicine3',$medicineList,$data->medicine3,['class'=>'form-control','id'=>'medicine3','placeholder'=>'--Select Medicine--' ]) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                {!! Form::label('Remark', 'Remark:*') !!}
                                                {!! Form::textarea('Remark',$data->remark,['class'=>'form-control','id'=>'Remark','rows'=>3,'cols'=>40,'placeholder'=>'Remark','name'=>'Remark'])!!}
                                            </div>
                                        </div>
                                    </div>
                                    <center>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                {!! Form::submit('Submit', ['class'=>'btn btn-info','id'=>'id-opdfilter']) !!}
                                                {!! Form::reset('Cancel', ['class'=>'btn btn-danger']) !!}
                                            </div>
                                        </div>
                                    </center>
                                    {!! Form::close() !!}
                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
@push('script')
<script type="text/javascript">
    
</script>

@endpush
