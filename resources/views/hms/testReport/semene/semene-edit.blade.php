@extends('layout.app')
@section('title') Admin Dashboard 
@endsection
@section('content') 
<div class="app-content  my-3 my-md-5">
    <div class="side-app">
         <div class="page-header">
            <h5 class="page-title">EDIT SEMENE EXAMINTION DETAILS</h5>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashborad') }}">Home</a></li>
                <li class="breadcrumb-item " aria-current="page">
                    <a href="javascript:void(0);">Test Report</a>
                </li>
                 <li class="breadcrumb-item " aria-current="page">
                   Semene Examination
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
                                      <a href="{{ route('semeneexam.filter') }}">
                                        <span class="pull-right btn btn-success ">
                                            <i class="fa fa-list"></i> SHOW/SEARCH OLD PATIENT</span>
                                        </a>
                                </span>
                            </div>
                        </div>
						<div class="card-body">
							<div class="row">			
								<div class="col-md-12">
									{!! Form::open(['route' => ['semene-examination.update',$semeneExamData->id],'method'=>'PUT','autocomplete'=>'off']) !!}
									{{ Form::hidden('status', '1') }}
									{{ Form::hidden('age', $semeneExamData->age,['id'=>'age']) }}
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												{!! Form::label('name', 'OPD Registration Number') !!}
												{!! Form::text('patientId',$semeneExamData->patientId, ['class' => 'form-control dynamic_opd',
												'placeholder' => 'Enter Registration Number','id'=>'id-opd-regnum','readonly'=>true]) !!}
												 <div class="error">{{ $errors->first('patientId') }}</div>
												<div id="opd-reg-list">  </div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">								
												{!! Form::label('name', 'Patient Name') !!}
												{!! Form::text('patientName',$semeneExamData->getPatientDetails->patientName, ['class' => 'form-control','placeholder' => 'Enter Patient Name','id'=>'patientName','readonly'=>true]) !!}
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">								
												{!! Form::label('name', 'OPD Date') !!}
												{!! Form::date('opdDate',$semeneExamData->getPatientDetails->regDate, ['class' => 'form-control','placeholder' => 'Enter Registration Date','id'=>'regDate','readonly'=>true]) !!}
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">								
												{!! Form::label('name', 'Referred By') !!}
												{!! Form::text('referredBy',$semeneExamData->referredBy, ['class' => 'form-control','placeholder' => 'Enter Referred Name','id'=>'consultant','readonly'=>true]) !!}
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">								
												{!! Form::label('name', 'Investigation Advised') !!}
												{!! Form::text('investigationAdvised',$semeneExamData->investigationAdvised, ['class' => 'form-control','placeholder' => 'Enter Patient Name','id'=>'investigationAdvised',]) !!}
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">								
												{!! Form::label('name', 'Test Date') !!}
												{!! Form::date('date',$semeneExamData->date, ['class' => 'form-control','placeholder' => 'Enter OT Date']) !!}
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">								
												{!! Form::label('name', 'Place Of Collection') !!}
												{!! Form::text('placeOfCollection',$semeneExamData->placeOfCollection, ['class' => 'form-control','placeholder' => 'Enter Place Of Collection']) !!}
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">								
												{!! Form::label('name', 'Time Of Collection In Lab') !!}
												{!! Form::text('timeOfCollectionInLab',$semeneExamData->timeOfCollectionInLab, ['class' => 'form-control','placeholder' => 'Enter Collection In Lab']) !!}
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">								
												{!! Form::label('name', 'Quantity') !!}
												{!! Form::text('quantity',$semeneExamData->quantity, ['class' => 'form-control','placeholder' => 'Enter Quantity']) !!}
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">								
												{!! Form::label('name', 'Consistency') !!}
												{!! Form::text('consistency',$semeneExamData->consistency, ['class' => 'form-control','placeholder' => 'Enter Consistency']) !!}
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">								
												{!! Form::label('name', 'Colour') !!}
												{!! Form::text('colour',$semeneExamData->colour, ['class' => 'form-control','placeholder' => 'Enter Colour']) !!}
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">								
												{!! Form::label('name', 'PH') !!}
												{!! Form::text('ph',$semeneExamData->ph, ['class' => 'form-control','placeholder' => 'Enter Total PH']) !!}
										</div>
											</div>
										<div class="col-md-6">
											<div class="form-group">								
												{!! Form::label('name', 'Liqufication Time') !!}
												{!! Form::text('liquficationTime',$semeneExamData->liquficationTime, ['class' => 'form-control','placeholder' => 'Enter Liqufication Time']) !!}
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">								
												{!! Form::label('name', 'Viscocity') !!}
												{!! Form::text('viscocity',$semeneExamData->viscocity, ['class' => 'form-control','placeholder' => 'Enter Viscocity']) !!}
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">								
												{!! Form::label('name', 'Count') !!}
												{!! Form::text('count',$semeneExamData->count, ['class' => 'form-control','placeholder' => 'Enter Count']) !!}
										</div>
											</div>
										<div class="col-md-6">
											<div class="form-group">								
												{!! Form::label('name', 'Motility') !!}
												{!! Form::text('motility',$semeneExamData->motility, ['class' => 'form-control','placeholder' => 'Enter Motility']) !!}
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">								
												{!! Form::label('name', 'Abnormal Forms') !!}
												{!! Form::text('abnormalForms',$semeneExamData->abnormalForms, ['class' => 'form-control','placeholder' => 'Enter Abnormal Forms']) !!}
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">								
												{!! Form::label('name', 'Pus Cells') !!}
												{!! Form::text('pusCells',$semeneExamData->pusCells, ['class' => 'form-control','placeholder' => 'Enter Pus Cells']) !!}
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">								
												{!! Form::label('name', 'Epithelial Cells') !!}
												{!! Form::text('epithelialCells',$semeneExamData->epithelialCells, ['class' => 'form-control','placeholder' => 'Enter Epithelial Cells']) !!}
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">								
												{!! Form::label('name', 'RBCS') !!}
												{!! Form::text('rbcs',$semeneExamData->rbcs, ['class' => 'form-control','placeholder' => 'Enter Total RBCS']) !!}
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">								
												{!! Form::label('name', 'Fructose Test') !!}
												{!! Form::text('fructoseTest',$semeneExamData->fructoseTest, ['class' => 'form-control','placeholder' => 'Enter Fructose Test']) !!}
											</div>
										</div>
										

										<div class="col-md-12">
											<div class="form-group">								
												{!! Form::label('name', 'Remarks') !!}
												{!! Form::textarea('other',$semeneExamData->other, ['class' => 'form-control','placeholder' => 'Enter Remarks','rows' => 3, 'cols' => 10,]) !!}
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

		

		</script>
	@endpush