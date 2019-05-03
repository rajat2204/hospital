@extends('layout.app') @section('title') Admin Dashboard @endsection
@section('content')
<div class="app-content  my-3 my-md-5">
    <div class="side-app">
        <div class="page-header">
             <h5 class="page-title">EDIT GENERAL BLOOD EXAMINTION DETAILS</h5>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashborad') }}">Home</a></li>
                <li class="breadcrumb-item " aria-current="page">
                    <a href="javascript:void(0);">Test Report</a>
                </li>
                 <li class="breadcrumb-item " aria-current="page">
                    General Blood Examination
                </li>
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
                                      <a href="{{ route('generalblood.filter') }}">
                                        <span class="pull-right btn btn-success ">
                                            <i class="fa fa-list"></i> SHOW/SEARCH OLD PATIENT</span>
                                        </a>
                                </span>
                            </div>
                        </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    {!! Form::open(['route' =>
                                    ['general-blood.update',$generalBloodData->id],'method'=>'PUT','autocomplete'=>'off'])
                                    !!} {{ Form::hidden('status', '1') }}
                                    {{ Form::hidden('age',$generalBloodData->age,['id'=>'age']) }}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('name', 'OPD Registration Number') !!} 
                                                {!! Form::text('patientId',$generalBloodData->patientId,['class' => 'form-control
                                                dynamic_opd', 'placeholder' =>'Enter Registration Number','id'=>'id-opd-regnum','readonly'=>true])
                                                !!}
                                                <div class="error">{{ $errors->first('patientId') }}</div>
                                                <div id="opd_list"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('name', 'Patient
                                                Name') !!} {!!
                                                Form::text('patientName',$generalBloodData->getPatientDetails->patientName,
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter Patient
                                                Name','id'=>'patientName','readonly'=>true])
                                                !!}
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('name', 'OPD
                                                Date') !!} {!!
                                                Form::date('opdDate',$generalBloodData->getPatientDetails->regDate,
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter Registration
                                                Date','id'=>'id-opddate','readonly'=>true])
                                                !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('name',
                                                'Referred By') !!} {!!
                                                Form::text('referredBy',$generalBloodData->referredBy,
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter Patient
                                                Name','id'=>'consultant','readonly'=>true])
                                                !!}
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('name',
                                                'Investigation Advised') !!} {!!
                                                Form::text('investigationAdvised',$generalBloodData->investigationAdvised,
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter Patient
                                                Name','id'=>'opd_name',]) !!}
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('name', 'Test
                                                Date') !!} {!!
                                                Form::date('date',$generalBloodData->date,
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter Date']) !!}
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('name', 'Blood
                                                (Fasting)') !!} {!!
                                                Form::text('bloodFasting',$generalBloodData->bloodFasting,
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter Haemoglobin']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('name', 'Blood
                                                (Random)') !!} {!!
                                                Form::text('bloodRandom',$generalBloodData->bloodRandom,
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter Total RBC Count']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('name', 'Blood
                                                (PP)') !!} {!!
                                                Form::text('bloodPP',$generalBloodData->bloodPP,
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter Haemoglobin']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('name', 'Urea')
                                                !!} {!!
                                                Form::text('urea',$generalBloodData->urea,
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter Total RBC Count']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('name',
                                                'Creatinine') !!} {!!
                                                Form::text('creatinine',$generalBloodData->creatinine,
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter Haemoglobin']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('name', 'Uric
                                                Acid') !!} {!!
                                                Form::text('uricAcid',$generalBloodData->uricAcid,
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter Uric Acid']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('name', 'Total
                                                Bilirubin') !!} {!!
                                                Form::text('totalBilirubin',$generalBloodData->totalBilirubin,
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter Total Bilirubin']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('name', 'Direct
                                                Bilirubin') !!} {!!
                                                Form::text('directBilirubin',$generalBloodData->directBilirubin,
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter Direct Bilirubin']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('name', 'SGPT /
                                                ALT') !!} {!!
                                                Form::text('sgptAlt',$generalBloodData->sgptAlt,
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter SGPT / ALT']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('name', 'SGOT /
                                                AST') !!} {!!
                                                Form::text('sgotAst',$generalBloodData->sgotAst,
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter SGOT / AST']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('name', 'ALK
                                                Phosphatase') !!} {!!
                                                Form::text('alkPhosphatase',$generalBloodData->alkPhosphatase,
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter ALK Phosphatase']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('name', 'Total
                                                Protein') !!} {!!
                                                Form::text('totalProtein',$generalBloodData->totalProtein,
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter Total Protein']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('name',
                                                'Albumin') !!} {!!
                                                Form::text('albumin',$generalBloodData->albumin,
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter Albumin']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('name', 'AG
                                                Ratio') !!} {!!
                                                Form::text('agRatio',$generalBloodData->agRatio,
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter AG Ratio']) !!}
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
    </div>
</div>

@endsection @push('script') @endpush
