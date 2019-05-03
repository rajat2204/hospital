@extends('layout.app')
@section('title') Admin Dashboard 
@endsection
@section('content') 
<div class="app-content  my-3 my-md-5">
    <div class="side-app">
     <div class="page-header">
            <h5 class="page-title">EDIT  STOOL EXAMINTION DETAILS</h5>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashborad') }}">Home</a></li>
                <li class="breadcrumb-item " aria-current="page">
                    <a href="javascript:void(0);">Test Report</a>
                </li>
                 <li class="breadcrumb-item " aria-current="page">
                   Stool Examination
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
                                  <a href="{{ route('stoolexam.filter') }}">
                                    <span class="pull-right btn btn-success ">
                                        <i class="fa fa-list"></i> SHOW/SEARCH OLD PATIENT</span>
                                    </a>
                            </span>
                        </div>
                    </div>
	                <div class="card-body">
						<div class="row">	
							<div class="col-md-12">
								{!! Form::open(['route' => ['stool-examination.update',$stoolExamData->id],'method'=>'PUT','autocomplete'=>'off']) !!}
								{{ Form::hidden('status', '1') }}
								{{ Form::hidden('age',$stoolExamData->age,['id'=>'age']) }}
							<div class="row">
	  							<div class="col-md-6">
									<div class="form-group">
										{!! Form::label('name', 'OPD Registration Number') !!}
								        {!! Form::text('patientId',$stoolExamData->patientId, ['class' => 'form-control dynamic_opd',
								        'placeholder' => 'Enter Registration Number','id'=>'id-opd-regnum','readonly'=>true]) !!}
								         <div id="opd-reg-list"></div>
	       								<div class="error">{{ $errors->first('patientId') }}</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">								
										{!! Form::label('name', 'Patient Name') !!}
	        							{!! Form::text('patientName',$stoolExamData->getPatientDetails->patientName, ['class' => 'form-control','placeholder' => 'Enter Patient Name','id'=>'patientName','readonly'=>true]) !!}
							    	</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">								
										{!! Form::label('name', 'OPD Date') !!}
	        							{!! Form::date('opdDate',$stoolExamData->getPatientDetails->regDate, ['class' => 'form-control','placeholder' => 'Enter Registration Date','id'=>'regDate','readonly'=>true]) !!}
							    	</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">								
										{!! Form::label('name', 'Referred By') !!}
								        {!! Form::text('referredBy',$stoolExamData->referredBy, ['class' => 'form-control','placeholder' => 'Enter Patient Name','id'=>'consultant','readonly'=>true]) !!}
								    </div>
								</div>
								<div class="col-md-6">
									<div class="form-group">								
										{!! Form::label('name', 'Investigation Advised') !!}
	        							{!! Form::text('investigationAdvised',$stoolExamData->investigationAdvised, ['class' => 'form-control','placeholder' => 'Enter Investigation Advised','id'=>'investigationAdvised',]) !!}
							    	</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">								
										{!! Form::label('name', 'Test Date') !!}
	        							{!! Form::date('date',$stoolExamData->date, ['class' => 'form-control','placeholder' => 'Enter OT Date']) !!}
							    	</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">								
										{!! Form::label('name', 'Colour') !!}
	        							{!! Form::text('colour',$stoolExamData->colour, ['class' => 'form-control','placeholder' => 'Enter Colour']) !!}
							    	</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">								
										{!! Form::label('name', 'Consistency') !!}
	        							{!! Form::text('consistency',$stoolExamData->consistency, ['class' => 'form-control','placeholder' => 'Enter Consistency']) !!}
							    	</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">								
										{!! Form::label('name', 'Mucus') !!}
	        							{!! Form::text('mucus',$stoolExamData->mucus, ['class' => 'form-control','placeholder' => 'Enter Mucus']) !!}
							    </div>
									</div>
								<div class="col-md-6">
									<div class="form-group">								
										{!! Form::label('name', 'Blood') !!}
	        							{!! Form::text('blood',$stoolExamData->blood, ['class' => 'form-control','placeholder' => 'Enter Blood']) !!}
							    </div>
									</div>
								<div class="col-md-6">
									<div class="form-group">								
										{!! Form::label('name', 'Pus Cells') !!}
	        							{!! Form::text('pusCells',$stoolExamData->pusCells, ['class' => 'form-control','placeholder' => 'Enter Pus Cells']) !!}
							    	</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">								
										{!! Form::label('name', 'RBCS') !!}
	        							{!! Form::text('rbcs',$stoolExamData->rbcs, ['class' => 'form-control','placeholder' => 'Enter RBCS']) !!}
							    </div>
									</div>
								<div class="col-md-6">
									<div class="form-group">								
										{!! Form::label('name', 'Vegetable Matter') !!}
	        							{!! Form::text('vegetableMatter',$stoolExamData->vegetableMatter, ['class' => 'form-control','placeholder' => 'Enter Vegetable Matter']) !!}
							    	</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">								
										{!! Form::label('name', 'Cysts') !!}
	        							{!! Form::text('cysts',$stoolExamData->cysts, ['class' => 'form-control','placeholder' => 'Enter Cysts']) !!}
							    </div>
									</div>
								<div class="col-md-6">
									<div class="form-group">								
										{!! Form::label('name', 'Giardia') !!}
	        							{!! Form::text('giardia',$stoolExamData->giardia, ['class' => 'form-control','placeholder' => 'Enter Giardia']) !!}
							    	</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">								
										{!! Form::label('name', 'E Histolytica') !!}
	        							{!! Form::text('eHistolytica',$stoolExamData->eHistolytica, ['class' => 'form-control','placeholder' => 'Enter E Histolytica']) !!}
							    	</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">								
										{!! Form::label('name', 'E Coil') !!}
	        							{!! Form::text('eCoil',$stoolExamData->eCoil, ['class' => 'form-control','placeholder' => 'Enter E Coil']) !!}
							    </div>
									</div>
								<div class="col-md-6">
									<div class="form-group">								
										{!! Form::label('name', 'OVA') !!}
	        							{!! Form::text('ova',$stoolExamData->ova, ['class' => 'form-control','placeholder' => 'Enter OVA']) !!}
							    </div>
									</div>
								<div class="col-md-6">
									<div class="form-group">								
										{!! Form::label('name', 'Worms') !!}
	        							{!! Form::text('worms',$stoolExamData->worms, ['class' => 'form-control','placeholder' => 'Enter Worms']) !!}
							    </div>
									</div>
								<div class="col-md-6">
									<div class="form-group">								
										{!! Form::label('name', 'Occult Stool') !!}
	        							{!! Form::text('occultBlood',$stoolExamData->occultBlood, ['class' => 'form-control','placeholder' => 'Enter Occult Stool']) !!}
							    	</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">								
										{!! Form::label('name', 'Reducing Substances') !!}
	        							{!! Form::text('reducingSubstances',$stoolExamData->reducingSubstances, ['class' => 'form-control','placeholder' => 'Enter Reducing Substances']) !!}
							    	</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">								
										{!! Form::label('name', 'Other') !!}
	        							{!! Form::textarea('other',$stoolExamData->other, ['class' => 'form-control','placeholder' => 'Enter Other','rows' => 3, 'cols' => 10,]) !!}
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


@endsection
@push('script')

	
	</script>
@endpush