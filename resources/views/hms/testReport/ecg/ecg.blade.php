@extends('layout.app') @section('title') Admin Dashboard @endsection
@section('content')
<div class="app-content  my-3 my-md-5">
    <div class="side-app">
        <div class="page-header">
            <h5 class="page-title">ADD NEW ECG EXAMINATION </h5>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashborad') }}">Home</a></li>
                <li class="breadcrumb-item " aria-current="page">
                    Test Report
                </li>
                 <li class="breadcrumb-item " aria-current="page">
                    ECG Examination
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
                                      <a href="{{ route('ecgexam.filter') }}">
                                        <span class="pull-right btn btn-success ">
                                            <i class="fa fa-list"></i> SHOW/SEARCH OLD PATIENT</span>
                                        </a>
                                </span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    {!! Form::open(['route' => ['ecg-examination.store'],'autocomplete'=>'off'])!!} 
                                    {{ Form::hidden('age', '',['id'=>'age']) }}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('name', 'OPD
                                                Registration Number') !!} {!!
                                                Form::text('abc','',
                                                ['class' => 'form-control
                                                dynamic_opd', 'placeholder' =>'Enter Registration Number','id'=>'id-opd-regnum'])
                                                !!}
                                                <div id="opd_list"></div>
                                                <div class="error">{{ $errors->first('patientId') }}</div>
                                                  {!!  Form::hidden('patientId','', [ 'class'=>'form-control opd','id'=>'patientId']) !!}

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-grop">
                                                {!! Form::label('name', 'Patient
                                                Name') !!} {!!
                                                Form::text('patientName','',
                                                ['class' =>
                                                'form-control','placeholder' =>'Enter Patient Name','id'=>'patientName','readonly'=>true])
                                                !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('name', 'OPD
                                                Date') !!} {!!
                                                Form::date('opdDate','',
                                                ['class' =>
                                                'form-control','placeholder'=>'Enter OPD Date','id'=>'regDate','readonly'=>true])
                                                !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('name',
                                                'Referred By') !!} {!!
                                                Form::text('referredBy','',
                                                ['class' =>
                                                'form-control','placeholder' =>'Enter Patient Name','id'=>'consultant','readonly'=>true])
                                                !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('name', 'Test
                                                Date') !!} {!!
                                                Form::date('date',Carbon\Carbon::today()->format('Y-m-d'), ['class'=> 'form-control','placeholder'=> 'Enter Test Date']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('name','Remarks') !!}
                                                {!! Form::textarea('remark','',['class' =>'form-control','placeholder' =>'Enter Remarks','rows' => 3,'cols' => 10,]) !!}
                                                <div class="error">{{ $errors->first('remark') }}</div>
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

@endsection @push('script')

<script>
    jQuery(document).ready(function() {
        jQuery("#id-opd-regnum").on("keyup", function() {
            var opd = $(this).val();
            $("#opd_list").html("");
            if (opd != "") {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('opd.regsearch') }}",
                    method: "POST",
                    data: { query: opd, _token: _token },
                    success: function(data) {
                        $("#opd_list").fadeIn();
                        $("#opd_list").html(data);
                    }
                });
            }
        });
    });
    $(document).on("click", ".select", function() {
        $("#id-opd-regnum").val($(this).text());
        var opd = $("#id-opd-regnum").val();
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "{{ route('opd.value') }}",
            method: "POST",
            data: { query: opd, _token: _token },
            success: function(res) {
                console.log(res);
                $('#patientId').val(res.opd.regNum);
                $("#regDate").val(res.opd.regDate);
                $("#patientName").val(res.opd.patientName);
                $("#consultant").val(res.consultantName);
                $("#otherConsultant").val(res.opd.otherConsultant);
                $("#age").val(res.opd.age);
                $("#gender").val(res.opd.gender);
                $("#address").val(res.opd.address);
            }
        });
        $("#opd_list").fadeOut();
    });
</script>

@endpush
