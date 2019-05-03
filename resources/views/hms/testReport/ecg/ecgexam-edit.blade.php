@extends('layout.app')

@section('title') Admin Dashboard  

@endsection

@section('content') 
<div class="app-content  my-3 my-md-5">
    <div class="side-app">
        <div class="page-header">
             <h5 class="page-title">EDIT  ECG EXAMINATION DETAILS</h5>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Ecg Examination</li>
            </ol>
        </div>
<div class="container" >
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
							{!! Form::open(['route' => ['ecg-examination.update',$ecgexamData->id],'method'=>'PUT','autocomplete'=>'off']) !!}
							{{ Form::hidden('status', '1') }}
							{{ Form::hidden('age',$ecgexamData->age,['id'=>'age']) }}
							<div class="row">
	  							<div class="col-md-6">
									<div class="form-group">
										{!! Form::label('name', 'OPD Registration Number') !!}
								        {!! Form::text('patientId',$ecgexamData->patientId, ['class' => 'form-control dynamic_opd',
								        'placeholder' => 'Enter Registration Number','id'=>'id-opd-regnum','readonly'=>true]) !!}
		         						<div id="opd_list">  </div>
	       								<div class="error">{{ $errors->first('patientId') }}</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-grop">
										{!! Form::label('name', 'Patient Name') !!}
	        							{!! Form::text('patientName',$ecgexamData->getPatientDetails->patientName, ['class' => 'form-control','placeholder' => 'Enter Patient Name','id'=>'patientName','readonly'=>true]) !!}
							    	</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">								
										{!! Form::label('name', 'OPD Date') !!}
	        							{!! Form::date('opdDate',$ecgexamData->getPatientDetails->regDate, ['class' => 'form-control','placeholder' => 'Enter OPD Date','id'=>'regDate','readonly'=>true]) !!}
							    	</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">								
										{!! Form::label('name', 'Referred By') !!}
	        							{!! Form::text('referredBy',$ecgexamData->referredBy, ['class' => 'form-control','placeholder' => 'Enter Patient Name','id'=>'consultant','readonly'=>true]) !!}
							    	</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">								
										{!! Form::label('name', 'Test Date') !!}
	        							{!! Form::date('date',$ecgexamData->date, ['class' => 'form-control','placeholder' => 'Enter Test Date']) !!}
							    	</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">								
										{!! Form::label('name', 'Remarks') !!}
	        							{!! Form::textarea('remark',$ecgexamData->remark, ['class' => 'form-control','placeholder' => 'Enter Remarks','rows' => 3, 'cols' => 10,]) !!}
	        							 <div class="error">{{ $errors->first('remark') }}</div>
							    	</div>
								</div>
								<div class="col-md-12" >
									<center>
										<div class="form-group">
									    	 {!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}
									    	 {!! Form::reset('Cancel', ['class' => 'btn btn-danger']) !!}
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

@endsection

@push('script')
	

@endpush