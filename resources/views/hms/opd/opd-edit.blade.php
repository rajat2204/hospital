@extends('layout.app') 
@section('title') Admin HMS 
@endsection
@section('content')
<div class="page">
    <div class="app-content  my-3 my-md-5">
        <div class="side-app">
            <div class="page-header">
                <h5 class="page-title"> EDIT OPD PATIENT DETAILS</h5>
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
                                {!! Form::open(array('route'=>['opd.update',$data->orderId],'files'=>'true','id'=>'opd-form','method'=>'put'))
                                !!}
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        {!! Form::label('PatientTitle',
                                        'Patient Title:*') !!}
                               
                                        {!! Form::select('patientTitle',array( '' => '----Select Title----','Mr.' => 'Mr.', 'Mrs.' => 'Mrs.','Ms.' => 'Ms.', 'Mst.' => 'Mst.','Baby' => 'Baby', ),$data->patientTitle, ['class'=> 'form-control','id'=>'patientTitle'])
                                        !!}
                                         <div class="error">{{ $errors->first('patientTitle') }}</div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        {!! Form::label('Patient Name',
                                        'Patient Name:*') !!}
                                        {!! Form::text('patientName',$data->patientName,
                                        ['class' =>
                                        'form-control','id'=>'patientName','placeholder'=>'Enter Patient Name'])
                                        !!}
                                        <div class="error">{{ $errors->first('patientName') }}</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('regNum',
                                        'Registration Number:*') !!}
                                
                                        {!! Form::text('regNum',$data->regNum,
                                        ['class' =>
                                        'form-control','id'=>'regNum','placeholder'=>'Enter Registration Number','readonly'=>true]) !!}
                                         <div class="error">{{ $errors->first('regNum') }}</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('regDate',
                                        'Registration Date:*') !!}
                                  
                                        {!! Form::date('regDate',$data->regDate,
                                        ['class' =>
                                        'form-control','id'=>'regDate','placeholder'=>'Enter Registration regDate']) !!}
                                         <div class="error">{{ $errors->first('regDate') }}</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('Address',
                                        'Address:*') !!}
                              
                                        {!! Form::text('address',$data->address,
                                        ['class' =>
                                        'form-control','id'=>'address','placeholder'=>'Enter address']) !!}
                                         <div class="error">{{ $errors->first('address') }}</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('Age', 'Age:*') !!}
                                    
                                        {!! Form::text('Age',$data->age, ['class'
                                        => 'form-control','id'=>'Age','placeholder'=>'Enter Age']) !!}
                                         <div class="error">{{ $errors->first('Age') }}</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('regAmount', 'Registration Amount:*') !!}
                                    
                                        {!! Form::text('regAmount',$data->regAmount, ['class'
                                        => 'form-control','id'=>'regAmount','placeholder'=>'Enter Registration Amount']) !!}
                                        <div class="error">{{ $errors->first('regAmount') }}</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('contactNum', 'Contact Number:*') !!}
                                    
                                        {!! Form::text('contactNum',$data->contactNum, ['class'
                                        => 'form-control','id'=>'contactNum','placeholder'=>'Enter Contact Number']) !!}
                                        <div class="error">{{ $errors->first('contactNum') }}</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('Gender', 'Gender:*') !!}
                                        {!! Form::select('gender',array( ''=> '----Select Gender----','Male Adult' =>'Male Adult','Female Adult' =>'Female Adult','Male Child' =>'Male Child','Female Child' =>'Female Child',),$data->gender,['class' =>'form-control','id'=>'gender']) !!}
                                         <div class="error">{{ $errors->first('gender') }}</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('Consultant Name','Consultant Name') !!}
                                        {!! Form::select('consultant', $doctorList,$data->consultant, [ 'class' =>'form-control', 
                                        'id'=>'consultant','placeholder' => '--Select Consultant Name--' ]) !!}
                                         <div class="error">{{ $errors->first('consultant') }}</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('otherConsultant','Other Consultant') !!}
                                        {!! Form::text('otherConsultant',$data->otherConsultant, ['class' =>
                                        'form-control','id'=>'otherConsultant','placeholder'=>'Enter otherConsultant'])
                                        !!}
                                         <div class="error">{{ $errors->first('otherConsultant') }}</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('department','Department') !!}
                                        {!! Form::select('department',$departmentList,$data->department, ['class' =>'form-control','id'=>'department','placeholder' => '--Select Department Name--'])!!}
                                         <div class="error">{{ $errors->first('department') }}</div>
                                    </div>
                                </div>
                           </div>
                           <div class="col-md-12">
                               <center>
                                {!! Form::submit('Submit', ['class'=> 'btn btn-info']) !!}
                                {!! Form::reset('Cancel', ['class'=> 'btn btn-danger']) !!}
                               
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

@endsection
 @section('script') 
 @endsection
