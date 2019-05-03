@extends('layout.app')
 @section('content')
<div class="page">
    <div class="app-content my-3 my-md-5">
        <div class="side-app">
            <div class="page-header">
                <h5 class="page-title">OT - NEW PATIENT REGISTRATION</h5>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        OT Registration
                    </li>
                </ol>
            </div>
            @include('layout.error')
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="col-md-12 col-sm-6 col-xs-12">
                                   {{--  <span class="pull-left">
                                            OT -PATIENT REGISTRATION
                                    </span> --}}
                                    <span class="pull-right">
                                          <a href="{{ route('otFilter') }}">
                                            <span class="pull-right btn btn-success ">
                                                <i class="fa fa-list"></i> SHOW/SEARCH OLD PATIENT</span>
                                            </a>
                                    </span>
                                </div>
                            </div>
                            <div class="card-body">
                                {!! Form::open(array('route' =>'ot.store','files'=>'true','id'=>'profile-form','autocomplete'=>'off')) !!}
                                   <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('name', 'OPD Registration Number*:') !!} 
                                                {!!Form::text('abc','', [ 'class' => 'form-control opd', 'placeholder' =>'Enter OPD Registration Number','id'=>'id-opd-regnum', ]) !!}
                                                <div id="opd-reg-list"></div>
                                                <div class="error">{{ $errors->first('patientId') }}</div>
                                                {!!  Form::hidden('patientId','', [ 'class'=>'form-control opd','id'=>'patientId']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('opdDate', 'OPD Date:*') !!}
                                            
                                                {!! Form::text('opdDate','',['class' =>'form-control','id'=>'id-opddate','name'=>'opdDate','placeholder'=>'Enter OPD date','readonly'=>'readonly']) 
                                                !!}
                                                  <div class="error">{{ $errors->first('opdDate') }}</div>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('patientName','PatientName:*') !!}
                                                {!! Form::text('patientName','',['class' =>'form-control','name'=>'patientName','id'=>'patientName','readonly'=>'readonly','placeholder'=>'Enter Patient Name']) 
                                                !!}
                                                  <div class="error">{{ $errors->first('patientName') }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('ipdRegNum','IPD Number:*') !!}
                                         
                                                {!! Form::text('ipdRegNum','',['class' =>'form-control','id'=>'ipdRegNum','name'=>'ipdRegNum','placeholder'=>'Enter IPD Registration number','readonly'=>'readonly']) 
                                                !!}
                                                  <div class="error">{{ $errors->first('ipdRegNum') }}</div>
                                            </div>
                                        </div>
                                       <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('ipdRegDate', 'IPD Date:*') !!}
                                                {!! Form::text('ipdRegDate','',['class' =>'form-control','id'=>'ipdRegDate','name'=>'ipdRegDate','placeholder'=>'IPD date','readonly'=>'readonly']) 
                                                !!}
                                                  <div class="error">{{ $errors->first('ipdRegDate') }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('age', 'AGE:*') !!}
                                                {!! Form::text('age', '', ['class'=>'form-control','id'=>'age','name'=>'age','placeholder'=>'Enter AGE','readonly'=>'readonly'])
                                                !!}
                                                  <div class="error">{{ $errors->first('age') }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('gender','GENDER:*') !!}
                                                {!! Form::text('gender','',['class' =>'form-control','id'=>'gender','name'=>'gender','placeholder'=>'Enter GENDER','readonly'=>'readonly'])
                                                !!}
                                                  <div class="error">{{ $errors->first('gender') }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('address','Address:*') !!}
                                                {!! Form::text('address', '',['class' =>'form-control','id'=>'address','readonly'=>'readonly','placeholder'=>'Enter Address']) !!}
                                                  <div class="error">{{ $errors->first('address') }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('referby','ReferedBy:') !!}
                                                {!! Form::text('referby','',['class' =>'form-control','id'=>'referby','readonly'=>'readonly',
                                                'placeholder'=>'Enter Refered By']) !!}
                                                  <div class="error">{{ $errors->first('referby') }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('otDate', 'OtDate:*') !!}
                                                {!! Form::date('otDate',Carbon\Carbon::today()->format('Y-m-d'),['class' =>'form-control','id'=>'otDate','name'=>'otDate'])
                                                !!}
                                                  <div class="error">{{ $errors->first('otDate') }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('dignosis','Diagnosis:*') !!}
                                                {!! Form::textarea('dignosis','',['class'=>'form-control',
                                                'id'=>'dignosis','name'=>'dignosis','rows'=> 3,'cols' =>
                                                40,'placeholder'=>'Enter diagnosis']) !!}
                                                  <div class="error">{{ $errors->first('dignosis') }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('otProcessure', 'OT Processure:*') !!}
                                                {!!Form::textarea('otProcessure',null,['class'=>'form-control','id'=>'otProcessure','name'=>'otProcessure','rows'
                                                     => 3, 'cols' =>40,'placeholder'=>'Enter otprocessre'])
                                                !!}
                                                  <div class="error">{{ $errors->first('otProcessure') }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('Consultant','Consultant:*') !!}
                                                {!! Form::select('consultant',$doctorList,'', [ 'class' =>
                                                     'form-control', 'id'=>'consultant','placeholder' => '--Select Consultant Name--' ]) !!}
                                                <div class="error">{{ $errors->first('consultant') }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('otherConsultant','Other Consultant') !!}
                                                {!! Form::text('otherConsultant','', ['class' =>'form-control','id'=>'otherConsultant','name'=>'otherConsultant','placeholder'=>'Enter Other Consultant'])
                                                !!}
                                                <div class="error">{{ $errors->first('patientId') }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('adviceTreatment','advice & Treatment:*') !!}
                                                {!!Form::textarea('adviceTreatment',null,['class'=>'form-control','id'=>'adviceTreatment','name'=>'adviceTreatment','rows'=> 3, 'cols' =>40,'placeholder'=>'Enter adviceTreatment'])
                                                !!}
                                                <div class="error">{{ $errors->first('adviceTreatment') }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('medicine1','Medicine<span
                                                    class="badge badge-danger control-label"
                                                    >1</span>',[],false) 
                                                !!}
                                                {!!Form::select('medicine1',$medicineList,'', [ 'class' => 'form-control','id'=>'medicine1', 'placeholder'=>'--Select Medicine--' ]) !!}
                                                <div class="error">{{ $errors->first('medicine1') }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('medicine2','Medicine<span class="badge badge-danger control-label">2</span >',[],false) !!}
                                                {!!Form::select('medicine2',$medicineList,'', [ 'class' => 'form-control','id'=>'medicine2', 'placeholder' =>'--Select Medicine--' ]) !!}
                                              {{-- <div class="error">{{ $errors->first('patientId') }}</div> --}}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('medicine3','Medicine<span class="badge badge-danger control-label" >3</span>',[],false) !!}
                                                {!! Form::select('medicine3',$medicineList,'',[ 'class' => 'form-control','id'=>'medicine3', 'placeholder' =>
                                                '--Select Medicine--' ]) !!}
                                            {{-- <div class="error">{{ $errors->first('medicine3') }}</div> --}}
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                {!! Form::label('Remark','Remark:*') !!}
                                                {!!Form::textarea('Remark','',['class'=>'form-control',
                                                'id'=>'Remark','rows' => 3, 'cols'=>40,'placeholder'=>'Enter Remark','name'=>'Remark']) !!}
                                              <div class="error">{{ $errors->first('Remark') }}</div>
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
    </div>
    @endsection
    <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"
    ></script>
    @push('script')
    <script type="text/javascript">
        jQuery(document).ready(function(e) {
            jQuery("#id-opd-regnum").on("keyup", function() {
                var opd = $(this).val();
                $("#opd-reg-list").html("");
                if (opd != "") {
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('opd.regsearch') }}",
                        method: "POST",
                        data: { query: opd, _token: _token },
                        success: function(data) {
                            $("#opd-reg-list").fadeIn();
                            $("#opd-reg-list").html(data);
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
                url: "{{ route('ot.value') }}",
                method: "POST",
                data: { query: opd, _token: _token },
                success: function(data) {
                    console.log(data);
                    $("#id-opddate").val(data.ot.regDate);
                    $('#patientId').val(data.ot.regNum);
                    $("#patientName").val(data.ot.patientName);
                    $("#consultant").val(data.ot.consultant);
                    $("#otherConsultant").val(data.ot.otherConsultant);
                    $("#age").val(data.ot.age);
                    $("#gender").val(data.ot.gender);
                    $("#referby").val(data.consultant);
                    $("#ipdRegNum").val(data.ot.ipdRegNum);
                    $("#ipdRegDate").val(data.ot.ipdRegDate);
                    $("#address").val(data.ot.address);
                }
            });
            $("#opd-reg-list").fadeOut();
        });
    </script>

    @endpush
