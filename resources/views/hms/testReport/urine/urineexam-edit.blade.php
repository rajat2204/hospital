	@extends('layout.app')
	@section('title') Admin Dashboard 
	@endsection
	@section('content')
	<div class="app-content  my-3 my-md-5">
    	<div class="side-app">
        	<div class="page-header">
	            <h5 class="page-title">EDIT URINE EXAMINTION DETAILS</h5>
	            <ol class="breadcrumb">
	                <li class="breadcrumb-item"><a href="{{ route('dashborad') }}">Home</a></li>
	                <li class="breadcrumb-item " aria-current="page">
	                    <a href="javascript:void(0);">Test Report</a>
	                </li>
	                 <li class="breadcrumb-item " aria-current="page">
	                   Urine Examination
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
                                      <a href="{{ route('urineexam.filter') }}">
                                        <span class="pull-right btn btn-success ">
                                            <i class="fa fa-list"></i> SHOW/SEARCH OLD PATIENT</span>
                                        </a>
                                </span>
                            </div>
                        </div>
		                <div class="card-body">
							<div class="row">	
								<div class="col-md-12">
									{!! Form::open(['route' => ['urine-examination.update',$urineExamData->id],'method'=>'PUT','autocomplete'=>'off']) !!}

									{!! csrf_field() !!}
									{{ Form::hidden('status', '1') }}
									{{ Form::hidden('age',$urineExamData->getPatientDetails->age,['id'=>'age']) }}
									<div class="row">
			  							<div class="col-md-6">
											<div class="form-group">
											{!! Form::label('name', 'OPD Registration Number') !!}
								        	{!! Form::text('patientId',$urineExamData->patientId, ['class' => 'form-control dynamic_opd',
								        	'placeholder' => 'Enter Registration Number','id'=>'id-opd-regnum','readonly'=>true]) !!}
								        	<div class="error">{{ $errors->first('patientId') }}</div>
								         	<div id="opd-reg-list">  </div>
								       
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											{!! Form::label('name', 'Patient Name') !!}
			       							{!! Form::text('patientName',$urineExamData->getPatientDetails->patientName, ['class' => 'form-control','placeholder' => 'Enter Patient Name','id'=>'patientName','readonly'=>true]) !!}
								   		</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">								
											{!! Form::label('name', 'OPD Date') !!}
		        							{!! Form::date('opdDate',$urineExamData->getPatientDetails->regDate,['class' => 'form-control','placeholder' => 'Enter Registration Date','id'=>'regDate','readonly'=>true]) !!}
								    	</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">								
											{!! Form::label('name', 'Referred By') !!}
		        							{!! Form::text('referredBy',$urineExamData->referredBy, ['class' => 'form-control','placeholder' => 'Enter Patient Name','id'=>'consultant','readonly'=>true]) !!}
								    	</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">								
											{!! Form::label('name', 'Investigation Advised') !!}
		        							{!! Form::text('investigationAdvised',$urineExamData->investigationAdvised, ['class' => 'form-control','placeholder' => 'Enter Investigation Advised','id'=>'investigationAdvised',]) !!}
								    	</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">								
											{!! Form::label('name', 'Test Date') !!}
		        							{!! Form::date('date',$urineExamData->date, ['class' => 'form-control','placeholder' => 'Enter OT Date']) !!}
								    	</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">								
											{!! Form::label('name', 'Sample') !!}
		        							{!! Form::text('sample',$urineExamData->sample, ['class' => 'form-control','placeholder' => 'Enter Sample']) !!}
								        </div>
									</div>
									<div class="col-md-6">
										<div class="form-group">								
											{!! Form::label('name', 'Quantity') !!}
		        							{!! Form::text('quantity',$urineExamData->quantity, ['class' => 'form-control','placeholder' => 'Enter Quantity']) !!}
								    	</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">								
											{!! Form::label('name', 'Colour') !!}
		        							{!! Form::text('colour',$urineExamData->colour, ['class' => 'form-control','placeholder' => 'Enter Colour']) !!}
								   		</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">								
											{!! Form::label('name', 'SP Gravity') !!}
		        							{!! Form::text('spGravity',$urineExamData->spGravity, ['class' => 'form-control','placeholder' => 'Enter SP Gravity']) !!}
								    	</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">								
											{!! Form::label('name', 'Reaction') !!}
		        							{!! Form::text('reaction',$urineExamData->reaction, ['class' => 'form-control','placeholder' => 'Enter Reaction']) !!}
								    	</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">								
											{!! Form::label('name', 'Albumin') !!}
		        							{!! Form::text('albumin',$urineExamData->albumin, ['class' => 'form-control','placeholder' => 'Enter Albumin']) !!}
								    	</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">								
											{!! Form::label('name', 'Suger') !!}
		        							{!! Form::text('suger',$urineExamData->suger, ['class' => 'form-control','placeholder' => 'Enter Suger']) !!}
								   		 </div>
									</div>
									<div class="col-md-6">
										<div class="form-group">								
											{!! Form::label('name', 'BileSalts') !!}
		        							{!! Form::text('bileSalts',$urineExamData->bileSalts, ['class' => 'form-control','placeholder' => 'Enter BileSalts']) !!}
								    	</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">								
											{!! Form::label('name', 'Bile Pigments') !!}
		        							{!! Form::text('bilePigments',$urineExamData->bilePigments, ['class' => 'form-control','placeholder' => 'Enter Bile Pigments']) !!}
								    	</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">								
											{!! Form::label('name', 'Acetone') !!}
		        							{!! Form::text('acetone',$urineExamData->acetone, ['class' => 'form-control','placeholder' => 'Enter Acetone']) !!}
								    </div>
										</div>
									<div class="col-md-6">
										<div class="form-group">								
											{!! Form::label('name', 'Bence Jones Proteins') !!}
		        							{!! Form::text('benceJonesProteins',$urineExamData->benceJonesProteins, ['class' => 'form-control','placeholder' => 'Enter Bence Jones Proteins']) !!}
								    	</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">								
											{!! Form::label('name', 'Pus Cells') !!}
		        							{!! Form::text('pusCells',$urineExamData->pusCells, ['class' => 'form-control','placeholder' => 'Enter Pus Cells']) !!}
								    </div>
										</div>
									<div class="col-md-6">
										<div class="form-group">								
											{!! Form::label('name', 'Epithellal Cells') !!}
		        							{!! Form::text('epithellalCells',$urineExamData->epithellalCells, ['class' => 'form-control','placeholder' => 'Enter Epithellal Cells']) !!}
								    	</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">								
											{!! Form::label('name', 'Crystals') !!}
		        							{!! Form::text('crystals',$urineExamData->crystals, ['class' => 'form-control','placeholder' => 'Enter Crystals']) !!}
								    </div>
										</div>
									<div class="col-md-6">
										<div class="form-group">								
											{!! Form::label('name', 'RBS') !!}
		        							{!! Form::text('rbs',$urineExamData->rbs, ['class' => 'form-control','placeholder' => 'Enter RBS']) !!}
								    </div>
										</div>
									<div class="col-md-6">
										<div class="form-group">								
											{!! Form::label('name', 'Bacteria') !!}
		        							{!! Form::text('bacteria',$urineExamData->bacteria, ['class' => 'form-control','placeholder' => 'Enter Bacteria']) !!}
								    </div>
										</div>
									<div class="col-md-6">
										<div class="form-group">								
											{!! Form::label('name', 'Cast') !!}
		        							{!! Form::text('cast',$urineExamData->cast, ['class' => 'form-control','placeholder' => 'Enter Cast']) !!}
								    </div>
										</div>

									<div class="col-md-6">
										<div class="form-group">								
											{!! Form::label('name', 'Remarks') !!}
		        							{!! Form::textarea('others',$urineExamData->others, ['class' => 'form-control','placeholder' => 'Enter Remarks','rows' => 3, 'cols' => 10,]) !!}
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