@extends('layout.app') @section('title') Admin Dashboard @endsection
@section('content')
<div class="app-content  my-3 my-md-5">
    <div class="side-app">
        <div class="page-header">
            <h5 class="page-title">ADD NEW X-RAY EXAMINTION</h5>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashborad') }}">Home</a></li>
                <li class="breadcrumb-item " aria-current="page">
                    <a href="javascript:void(0);">Test Report</a>
                </li>
                 <li class="breadcrumb-item " aria-current="page">
                   X-Ray Examination
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
                                      <a href="{{ route('xrayexam.filter') }}">
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
                                    ['x-ray.store'],'autocomplete'=>'off']) !!}
                                    {{ Form::hidden('status', '1') }}
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
                                                 {!!  Form::hidden('patientId','', [ 'class'=>'form-control opd','id'=>'patientId']) !!}
                                                 <div class="error">{{ $errors->first('patientId') }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('name', 'Patient
                                                Name') !!} {!!
                                                Form::text('patientName','',
                                                ['class' =>
                                                'form-control','placeholder' =>'Enter Patient Name','id'=>'patientName','readonly'])
                                                !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('name', 'OPD
                                                Date') !!} {!!
                                                Form::date('opdDate','',
                                                ['class' =>
                                                'form-control','placeholder' =>'Enter Registration Date','id'=>'regDate','readonly'])
                                                !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('name',
                                                'Referred By') !!} {!!
                                                Form::text('referredBy','',
                                                ['class' =>
                                                'form-control','placeholder' =>'EnterReferred By Name','id'=>'consultant','readonly'])
                                                !!}
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('name',
                                                'Investigation Advised') !!} {!!
                                                Form::text('investigationAdvised','',
                                                ['class' =>
                                                'form-control','placeholder' =>'Enter Investigation Advised','id'=>'investigationAdvised',])
                                                !!}
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('name', 'Test
                                                Date') !!} {!!
                                                Form::date('date',Carbon\Carbon::today()->format('Y-m-d'), ['class'
                                                => 'form-control','placeholder' => 'Enter OT Date']) !!}
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('name',
                                                'Description') !!} {!!
                                                Form::textarea('description','',
                                                ['class' =>
                                                'form-control','placeholder' =>'Enter Description','rows' => 3,'cols' => 10,]) !!}
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('name',
                                                'Remarks') !!} {!!
                                                Form::textarea('remark','',
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter Remarks','rows' => 3,
                                                'cols' => 10,]) !!}
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
