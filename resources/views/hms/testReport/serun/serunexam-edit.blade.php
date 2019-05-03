@extends('layout.app') @section('title') Admin Dashboard @endsection
@section('content')
<div class="app-content  my-3 my-md-5">
    <div class="side-app">
        <div class="page-header">
            <p class="page-title">EDIT SERUN OF WIDAL EXAMINTION DETAILS</p>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashborad') }}">Home</a></li>
                <li class="breadcrumb-item " aria-current="page">
                    <a href="javascript:void(0);">Test Report</a>
                </li>
                 <li class="breadcrumb-item " aria-current="page">
                   Serun Of Widal Examination
                </li>
            </ol>
        </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-md-12 col-sm-6 col-xs-12">
                               {{--  <span class="pull-left">
                                        OT -PATIENT REGISTRATION
                                </span> --}}
                                <span class="pull-right">
                                      <a href="{{ route('serunexam.filter') }}">
                                        <span class="pull-right btn btn-success ">
                                            <i class="fa fa-list"></i> SHOW/SEARCH OLD PATIENT</span>
                                        </a>
                                </span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    {!! Form::open(['route' =>
                                    ['serun.update',$serunexamData->id],'method'=>'PUT','autocomplete'=>'off'])
                                    !!}

                                    {{ Form::hidden('status', '1') }}
                                    {{ Form::hidden('age', $serunexamData->age,['id'=>'age']) }}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('name', 'OPD Registration Number') !!}
                                                 {!!
                                                Form::text('patientId',$serunexamData->patientId,['class' => 'form-control dynamic_opd', 'placeholder' => 'Enter Registration Number','id'=>'id-opd-regnum','readonly'=>true])
                                                !!}
                                                <div id="opd_list"></div>
                                                 <div class="error">{{ $errors->first('patientId') }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('name', 'Patient
                                                Name') !!} {!!
                                                Form::text('patientName',$serunexamData->getPatientDetails->patientName,
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
                                                Form::date('opdDate',$serunexamData->getPatientDetails->regDate,
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter Registration
                                                Date','id'=>'regDate','readonly'=>true])
                                                !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('name',
                                                'Referred By') !!} {!!
                                                Form::text('referredBy',
                                                $serunexamData->referredBy,
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter referredBy
                                                Name','id'=>'consultant',]) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('name',
                                                'Investigation Advised') !!} {!!
                                                Form::text('investigationAdvised',$serunexamData->investigationAdvised,
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter investigationAdvised
                                                Name','id'=>'opd_name',]) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('name', 'Test
                                                Date') !!} {!!
                                                Form::date('date',$serunexamData->date,
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter OT Date']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('name', 'S.
                                                TYPHI "O"') !!} {!!
                                                Form::text('sTyphiO',$serunexamData->sTyphiO,
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter TYPHI']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('name', 'S.
                                                TYPHI "H"') !!} {!!
                                                Form::text('sTyphiH',$serunexamData->sTyphiH,
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter Total TYPHI']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('name', 'S. PARA
                                                TYPHI "AH"') !!} {!!
                                                Form::text('sTyphiAH',$serunexamData->sTyphiAH,
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter PARA TYPHI']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('name', 'S. PARA
                                                TYPHI "BH"') !!} {!!
                                                Form::text('sTyphiBH',$serunexamData->sTyphiBH,
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter PARA TYPHI']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                {!! Form::label('name',
                                                'IMPRESSION') !!} {!!
                                                Form::textarea('impression',$serunexamData->impression,
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter IMPRESSION','rows' => 3,
                                                'cols' => 10,]) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div style="float: right;">
                                                    {!! Form::submit('Submit',
                                                    ['class' => 'btn btn-info'])
                                                    !!}
                                                </div>
                                            </div>
                                        </div>
                                        {!! Form::close() !!}
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div>
                                                    <a href="#"
                                                        ><button
                                                            class="btn btn-primary"
                                                        >
                                                            Cancel
                                                        </button></a
                                                    >
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
    </div>
</div>

@endsection @push('script') @endpush
