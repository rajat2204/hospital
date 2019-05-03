@extends('layout.app') @section('content')
<div class="app-content  my-3 my-md-5">
    <div class="side-app">
        <div class="page-header">
            <h5 class="page-title">EDIT YOGA EXAMINTION DETAILS</h5>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashborad') }}">Home</a></li>
               {{--  <li class="breadcrumb-item " aria-current="page">
                    <a href="javascript:void(0);">Test Report</a>
                </li> --}}
                 <li class="breadcrumb-item " aria-current="page">
                   Yoga Examination
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
                                    <a href="{{ route('yogaFilter') }}">
                                        <span class="pull-right btn btn-success ">
                                            <i class="fa fa-list"></i> SHOW/SEARCH OLD PATIENT</span>
                                    </a>
                                </span>
                            </div>
                        </div>
                        <div class="card-body">
                            {!! Form::open(array('route' =>['yoga.update',$yogaData->id],'files'=>'true','id'=>'profile-form','autocomplete'=>'off','method'=>'put'))
                            !!}
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-offset-2 col-sm-3">
                                        <div class="form-group">
                                            {!! Form::label('name', 'OPD Registration Number:*') !!}
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            {!! Form::text('patientId',$yogaData->patientId, ['class' => 'form-control opd','placeholder' => 'Enter OPD
                                            Registration Number','id'=>'id-opd-regnum','readonly'=>true ]) !!}
                                            <div id="opd-reg-list"></div>
                                            <div class="error">{{ $errors->first('patientId') }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-offset-2 col-sm-2">
                                        <div class="form-group">
                                            {!! Form::label('opdDate', 'OPD Date:*') !!}
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            {!! Form::text('opdDate',Carbon\Carbon::parse($yogaData->opdData->regDate)->format('d-m-Y'),['class' =>'form-control','id'=>'id-opddate','name'=>'opdDate','placeholder'=>'OPD date','readonly'=>'readonly']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-offset-2 col-sm-3">
                                        <div class="form-group">
                                            {!! Form::label('patientName','PatientName:*') !!}
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            {!! Form::text('patientName',$yogaData->opdData->patientName,['class' =>'form-control','name'=>'patientName','id'=>'patientName','readonly'=>'readonly','placeholder'=>'Enter Patient Name']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-offset-2 col-sm-3">
                                        <div class="form-group">
                                            {!! Form::label('ipdRegNum', 'IPD Number:*') !!}
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            {!! Form::text('ipdRegNum',$yogaData->ipdData->ipdRegNum?$yogaData->ipdData->ipdRegNum:'',['class' =>'form-control','id'=>'ipdRegNum','name'=>'ipdRegNum','placeholder'=>'IPD Registration number','readonly'=>'readonly']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-offset-2 col-sm-2">
                                        <div class="form-group">
                                            {!! Form::label('ipdDate', 'IPD Date:*') !!}
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            {!! Form::text('ipdRegDate',$yogaData->ipdData->ipdRegDate?$yogaData->ipdData->ipdRegDate:'',['class' =>'form-control','id'=>'ipdRegDate','name'=>'ipdDate','placeholder'=>'IPD date','readonly'=>'readonly']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-offset-2 col-sm-3">
                                        <div class="form-group">
                                            {!! Form::label('age', 'AGE:*') !!}
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            {!! Form::text('age',$yogaData->opdData->age, ['class'=>'form-control','id'=>'age','name'=>'age','placeholder'=>'AGE','readonly'=>'readonly'])
                                            !!}
                                        </div>
                                    </div>
                                    <div class="col-md-offset-2 col-sm-2">
                                        <div class="form-group">
                                            {!! Form::label('gender','GENDER:*') !!}
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            {!! Form::text('gender',$yogaData->opdData->gender,['class' =>'form-control','id'=>'gender','name'=>'gender','placeholder'=>'GENDER','readonly'=>'readonly'])
                                            !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-offset-2 col-sm-3">
                                        <div class="form-group">
                                            {!! Form::label('address','Address:*') !!}
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            {!! Form::text('address',$yogaData->opdData->address,['class' =>'form-control','id'=>'address','readonly'=>'readonly','placeholder'=>'Enter Address']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-offset-2 col-sm-3">
                                        <div class="form-group">
                                            {!! Form::label('referby','ReferedBy:') !!}
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            {!! Form::text('referredBy',$yogaData->referredBy, ['class' =>'form-control','id'=>'referby','readonly'=>'readonly','placeholder'=>'Enter Refered By']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-offset-2 col-sm-3">
                                        <div class="form-group">
                                            {!! Form::label('Test Date', 'Test Date:') !!}
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            {!! Form::date('yogadate',$yogaData->yogadate,
                                            ['class' =>'form-control','id'=>'yogadate','name'=>'yogadate'])
                                            !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-offset-2 col-sm-3">
                                        <div class="form-group">
                                            {!! Form::label('dignosis', 'Disease diagnosis:') !!}
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            {!! Form::select('disease',$diseaseList,$yogaData->disease, [ 'class' =>'form-control disease', 'id'=>'disease','placeholder' => '--Select Disease--' ]) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-offset-2 col-sm-3">
                                        <div class="form-group">
                                            {!! Form::label('excersise','Excersise:') !!}
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            {!! Form::text('exersise',$yogaData->exersise,['class' =>'form-control','id'=>'exersise','name'=>'exersise','readonly'=>true])
                                            !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-offset-2 col-sm-3">
                                        <div class="form-group">
                                            {!! Form::label('other', 'Other:')!!}
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            {!! Form::text('other',$yogaData->other, ['class'=>'form-control','id'=>'other','name'=>'other'])
                                            !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-offset-2 col-sm-3">
                                        <div class="form-group">
                                            {!! Form::label('Remark','Remark:*') !!}
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            {!!
                                            Form::textarea('remark',$yogaData->remark,['class'=>'form-control','id'=>'Remark','rows' => 3, 'cols'
                                            =>40,'placeholder'=>'Enter Remark'])
                                            !!}
                                        </div>
                                    </div>
                                     <div class="col-md-12">
                                            <center>
                                                <div class="form-group">
                                                   {!! Form::submit('Submit',['class' => 'btn btn-info'])!!}
                                                   {!! Form::reset('Cancel',['class' => 'btn btn-danger'])!!}
                                                 </div>
                                            </center>
                                        </div>
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

@endsection

@push('script')
<script type="text/javascript">
   


    $(document).on('change','.disease',function() {
        var disease_id = $('.disease').val();
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "{{ route('yogaValue') }}",
            method: "POST",
            data: { disease_id: disease_id, _token: _token },
            success: function(data) {
            console.log(data.exersise);
                $('#exersise').val(data.exersise);
            }
        });
    });
</script>

@endpush
