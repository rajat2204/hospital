@extends('layout.app') 
@section('title') Admin Dashboard 
@endsection
@section('content')

<div class="page">
    <div class="app-content  my-3 my-md-5">
        <div class="side-app">
            <div class="page-header">
                <h5 class="page-title"> OPD - NEW PATIENT REGISTRATION</h5>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashborad') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Opd Registration
                    </li>
                </ol>
            </div>
            @include('layout.error')
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                 <div class="col-md-12 col-sm-6 col-xs-6">
                                  
                                    <span class="pull-right">
                                          <a href="{{ route('opd.filter') }}">
                                            <span class="pull-right btn btn-success ">
                                                <i class="fa fa-list"></i> SHOW/SEARCH OLD PATIENT</span>
                                            </a>
                                    </span>
                                </div>
                            </div>
                            <div class="card-body">
                                {!!Form::open(array('route'=>'opd.store','files'=>'true','id'=>'opd-form'))!!}
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            {!! Form::label('PatientTitle',
                                            'Patient Title:*') !!}
                                   
                                            {!! Form::select('patientTitle',
                                            array( '' => '----Select Title----',
                                            'Mr.' => 'Mr.', 'Mrs.' => 'Mrs.',
                                            'Ms.' => 'Ms.', 'Mst.' => 'Mst.',
                                            'Baby' => 'Baby', ), 'S', ['class'
                                            =>
                                            'form-control','id'=>'patientTitle'])
                                            !!}
                                            <div class="error">{{ $errors->first('patientTitle') }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            {!! Form::label('Patient Name',
                                            'Patient Name:*') !!}
                                            {!! Form::text('patientName', '',['class' =>'form-control','id'=>'patientName','placeholder'=>'Enter Patient Name'])
                                            !!}
                                            <div class="error">{{ $errors->first('patientName') }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('regNum',
                                            'Registration Number:*') !!}
                                    
                                            {!! Form::text('regNum', '',
                                            ['class' =>
                                            'form-control regnum-check','id'=>'regNum','placeholder'=>'Enter Registration Number']) !!}
                                            <div class="error">{{ $errors->first('regNum') }}</div>
                                            <div id="opd-regcheck" class="error"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('regDate',
                                            'Registration Date:*') !!}
                                      
                                            {!! Form::date('regDate',Carbon\Carbon::today()->format('Y-m-d'),
                                            ['class' =>
                                            'form-control','id'=>'regDate','placeholder'=>'Enter Registration regDate',]) !!}
                                            <div class="error">{{ $errors->first('regDate') }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('Address',
                                            'Address:*') !!}
                                  
                                            {!! Form::text('address', '',
                                            ['class' =>
                                            'form-control','id'=>'address','placeholder'=>'Enter address']) !!}
                                            <div class="error">{{ $errors->first('address') }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('Age', 'Age:*') !!}
                                        
                                            {!! Form::text('Age', '', ['class'
                                            => 'form-control','id'=>'Age','placeholder'=>'Enter Age']) !!}
                                            <div class="error">{{ $errors->first('Age') }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('regAmount', 'Registration Amount:*') !!}
                                        
                                            {!! Form::text('regAmount', '', ['class'
                                            => 'form-control','id'=>'regAmount','placeholder'=>'Enter Registration Amount']) !!}
                                            <div class="error">{{ $errors->first('regAmount') }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('contactNum', 'Contact Number:*') !!}
                                        
                                            {!! Form::text('contactNum', '', ['class'
                                            => 'form-control','id'=>'contactNum','placeholder'=>'Enter Contact Number']) !!}
                                            <div class="error">{{ $errors->first('contactNum') }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('Gender',
                                            'Gender:*') !!}
                                       
                                            {!! Form::select('gender', array( ''=>'----Select Gender----','Male Adult'=>'Male Adult','Female Adult'=>'Female Adult','Male Child' =>'Male Child','Female Child'=>'Female Child', ), 'S',['class' =>'form-control','id'=>'gender']) !!}
                                            <div class="error">{{ $errors->first('gender') }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('Consultant Name',
                                            'Consultant Name') !!}
                                    
                                            {!! Form::select('consultant',
                                            $doctorList,'', [ 'class' =>
                                            'form-control', 'id'=>'consultant',
                                            'placeholder' => '--Select
                                            Consultant Name--' ]) !!}
                                            <div class="error">{{ $errors->first('consultant') }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('otherConsultant',
                                            'Other Consultant') !!}
                                      
                                            {!! Form::text('otherConsultant',
                                            '', ['class' =>
                                            'form-control','id'=>'otherConsultant','placeholder'=>'Enter otherConsultant'])
                                            !!}
                                            <div class="error">{{ $errors->first('otherConsultant') }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('department',
                                            'Department') !!}
                                      
                                            {!! Form::select('department',$departmentList,'', ['class' =>
                                            'form-control','id'=>'department','placeholder' => '--Select
                                            Department Name--'])
                                            !!}
                                            <div class="error">{{ $errors->first('department') }}</div>
                                        </div>
                                    </div>
                                </div>
                                <center>
                                    {!! Form::submit('Submit', ['class'=> 'btn btn-info']) !!}
                                    {!! Form::reset('Cancel', ['class'=> 'btn btn-danger']) !!}
                                   
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
@push('script') 
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery(".regnum-check").on("keyup", function() {
             $('#opd-regcheck').html('');
            var opdCheck = $(this).val();
            console.log(opdCheck);
            if (opdCheck != "") {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('opd.regcheck') }}",
                    method: "POST",
                    data: { opdCheck: opdCheck, _token: _token },
                    success: function(res) {
                        
                        if(res.status==true) {
                            $('#opd-regcheck').attr('class',res.class);
                            $('#opd-regcheck').html(res.msg);
                        }else{
                             $('#opd-regcheck').attr('class',res.class);
                             $('#opd-regcheck').html(res.msg);
                        }
                    }
                });
            }
        });
    });
        </script>
@endpush
