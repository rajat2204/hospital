@extends('layout.app') @section('title') Admin Dashboard @endsection
@section('content')
<div class="app-content  my-3 my-md-5">
    <div class="side-app">
        <div class="page-header">
                <h5 class="page-title">EDIT BLOOD EXAMINATION DETAILS</h5>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Test Report</li>
                <li class="breadcrumb-item active" aria-current="page">Blood Examination</li>
            </ol>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-md-12 col-sm-6 col-xs-12">
                               {{--  <span class="pull-left">
                                        OT -PATIENT REGISTRATION
                                </span> --}}
                                <span class="pull-right">
                                      <a href="{{ route('blood.filter') }}">
                                        <span class="pull-right btn btn-success ">
                                            <i class="fa fa-list"></i> SHOW/SEARCH OLD PATIENT</span>
                                        </a>
                                </span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                {!!Form::open(array('route'=>['blood-examination.update',$bloodExamData->id],'method'=>'PUT','files'=>'true','id'=>'blood-examination-form','autocomplete'=>'off')) !!} 
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('name', 'OPD
                                            Registration Number') !!} {!!
                                            Form::text('patientId',$bloodExamData->patientId,[ 'class' => 'form-control dynamic_opd', 'placeholder' =>'Enter Registration Number','id'=>'id-opd-regnum','readonly'=>true ]) !!}
                                            <div id="opd-reg-list"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('name', 'Patient
                                            Name') !!} {!!
                                            Form::text('patientName',$bloodExamData->getPatientDetails->patientName,
                                            ['class' =>
                                            'form-control','placeholder' =>
                                            'Enter Patient
                                            Name','id'=>'patientName','readonly'=>true])
                                            !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('name',
                                            'Registration Date') !!} {!!
                                            Form::date('opdDate',$bloodExamData->getPatientDetails->regDate,
                                            ['class' =>
                                            'form-control','placeholder' =>
                                            'Enter Registration
                                            Date','id'=>'id-opddate','readonly'=>true])
                                            !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('name', 'Age') !!}
                                            {!!
                                            Form::text('age',$bloodExamData->age,
                                            ['class' =>
                                            'form-control','placeholder' =>
                                            'Enter
                                            Age','id'=>'age','readonly'=>true,])
                                            !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('name', 'Address')
                                            !!} {!!
                                            Form::text('address',$bloodExamData->getPatientDetails->address,
                                            ['class' =>
                                            'form-control','placeholder' =>
                                            'Enter
                                            Address','id'=>'address','readonly'=>true])
                                            !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('name', 'Referred
                                            By') !!} {!!
                                            Form::text('referredBy',$bloodExamData->referredBy,
                                            ['class' =>
                                            'form-control','placeholder' =>
                                            'Enter Referred
                                            By','id'=>'consultant','readonly'=>true])
                                            !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('name',
                                            'Investigation Advised') !!} {!!
                                            Form::text('investigationAdvised',$bloodExamData->investigationAdvised,
                                            ['class' =>
                                            'form-control','placeholder' =>
                                            'Enter Investigation
                                            Advised','id'=>'investigationAdvised',])
                                            !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('name', 'Test Date')
                                            !!} {!!
                                            Form::date('date',$bloodExamData->date,
                                            ['class' =>
                                            'form-control','placeholder' =>
                                            'Enter OT Date']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('name',
                                            'Haemoglobin') !!} {!!
                                            Form::text('haemoglobin',$bloodExamData->haemoglobin,
                                            ['class' =>
                                            'form-control','placeholder' =>
                                            'Enter Haemoglobin']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('name', 'Total RBC
                                            Count') !!} {!!
                                            Form::text('totalRBCCount',$bloodExamData->totalRBCCount,
                                            ['class' =>
                                            'form-control','placeholder' =>
                                            'Enter Total RBC Count']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('name', 'Total WBC
                                            Count') !!} {!!
                                            Form::text('totalWBCCount',$bloodExamData->totalWBCCount,
                                            ['class' =>
                                            'form-control','placeholder' =>
                                            'Enter Total WBC Count']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('name',
                                            'Polymorphs') !!} {!!
                                            Form::text('polymorphs',$bloodExamData->polymorphs,
                                            ['class' =>
                                            'form-control','placeholder' =>
                                            'Enter Polymorphs']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('name',
                                            'Lymphocytes') !!} {!!
                                            Form::text('lymphocytes',$bloodExamData->lymphocytes,
                                            ['class' =>
                                            'form-control','placeholder' =>
                                            'Enter Lymphocytes']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('name',
                                            'Eosinophils') !!} {!!
                                            Form::text('eosinophils',$bloodExamData->eosinophils,
                                            ['class' =>
                                            'form-control','placeholder' =>
                                            'Enter Eosinophils']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('name', 'Monocytes')
                                            !!} {!!
                                            Form::text('monocytes',$bloodExamData->monocytes,
                                            ['class' =>
                                            'form-control','placeholder' =>
                                            'Enter Monocytes']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('name', 'Basophils')
                                            !!} {!!
                                            Form::text('basophils',$bloodExamData->basophils,
                                            ['class' =>
                                            'form-control','placeholder' =>
                                            'Enter Basophils']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('name', 'ERS') !!}
                                            {!!
                                            Form::text('ers',$bloodExamData->ers,
                                            ['class' =>
                                            'form-control','placeholder' =>
                                            'Enter ERS']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('name', 'Platelet
                                            Count') !!} {!!
                                            Form::text('plateletCount',$bloodExamData->plateletCount,
                                            ['class' =>
                                            'form-control','placeholder' =>
                                            'Enter Platelet Count']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('name',
                                            'Reticulocytes') !!} {!!
                                            Form::text('reticulocytes',$bloodExamData->reticulocytes,
                                            ['class' =>
                                            'form-control','placeholder' =>
                                            'Enter Reticulocytes']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('name', 'PCV') !!}
                                            {!!
                                            Form::text('pcv',$bloodExamData->pcv,
                                            ['class' =>
                                            'form-control','placeholder' =>
                                            'Enter PCV']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('name', 'MCV') !!}
                                            {!!
                                            Form::text('mcv',$bloodExamData->mcv,
                                            ['class' =>
                                            'form-control','placeholder' =>
                                            'Enter MCV']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('name', 'MCH') !!}
                                            {!!
                                            Form::text('mch',$bloodExamData->mch,
                                            ['class' =>
                                            'form-control','placeholder' =>
                                            'Enter MCH']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('name', 'MCHC') !!}
                                            {!!
                                            Form::text('mchc',$bloodExamData->mchc,
                                            ['class' =>
                                            'form-control','placeholder' =>
                                            'Enter MCHC']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('name', 'Bleeding
                                            Time') !!} {!!
                                            Form::text('bleedingTime',$bloodExamData->bleedingTime,
                                            ['class' =>
                                            'form-control','placeholder' =>
                                            'Enter Bleeding Time']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('name', 'Clotting
                                            Time') !!} {!!
                                            Form::text('clottingTime',$bloodExamData->clottingTime,
                                            ['class' =>
                                            'form-control','placeholder' =>
                                            'Enter Clotting Time']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('name', 'Malarial
                                            Parasite') !!} {!!
                                            Form::text('malarialParasite',$bloodExamData->malarialParasite,
                                            ['class' =>
                                            'form-control','placeholder' =>
                                            'Enter Malarial Parasite']) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::label('name', 'Remarks')
                                            !!} {!!
                                            Form::textarea('remark',$bloodExamData->remark,
                                            ['class' =>
                                            'form-control','placeholder' =>
                                            'Enter Remarks','rows' => 3, 'cols'
                                            => 10,]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <center>
                                            <div class="form-group">
                                                {!! Form::submit('Submit',['class' => 'btn btn-info']) !!}
                                                {!! Form::reset('Cancel',['class' => 'btn btn-danger']) !!}
                                    
                                        </div>
                                        </center>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection @push('script') @endpush
