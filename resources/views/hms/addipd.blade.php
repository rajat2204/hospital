@extends('layout.app')
@section('content')
<div class="page">
	<div class="page-main">

		<div class="app-content  my-3 my-md-5">
			<div class="side-app">
				<div class="page-header">
					<h4 class="page-title">IPD - NEW PATIENT REGISTRATION</h4>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">IPD</a></li>
						<li class="breadcrumb-item active" aria-current="page">IPD REGISTRATION</li>
					</ol>

				</div>
				<div class="row">
					<div class="col-md-12">

						<div class="card">
							<div class="card-header">
								<h3 class="mb-0 card-title">IPD - REGISTRATION</h3>
							</div>
							<div>
								@if ($errors->any())
								<div class="alert alert-danger">
									<ul>
										@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
								@endif
							</div>
							<div class="card-body">
								<div class="row">

									<div class="col-md-12">
										{!! Form::open(['route' => ['ipd.store']]) !!}

										{!! csrf_field() !!}

										{{ Form::hidden('status', '1') }}
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">

													{!! Form::label('name', 'OPD Registration Number') !!}
													{!! Form::text('opd_id', null, ['class' => 'form-control','placeholder' => 'Enter Registration Number'])
													!!}

												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">

													{!! Form::label('name', 'OPD Date') !!}
													{!! Form::date('opdDate', null, ['class' => 'form-control','placeholder' => 'Enter Patient Name']) !!}
												</div>
											</div>



											<div class="col-md-6">
												<div class="form-group">

													{!! Form::label('name', 'IPD Registration Number') !!}
													{!! Form::text('ipdRegNum', null, ['class' => 'form-control','placeholder' => 'Enter Registration
													Number']) !!}
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">

													{!! Form::label('name', 'IPD Registration Date') !!}
													{!! Form::date('ipdRegDate', null, ['class' => 'form-control','placeholder' => 'Enter Registration Date'])
													!!}
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">

													{!! Form::label('name', 'Consultant Name') !!}
													{!! Form::select('consultant', ['L' => 'Large', 'S' => 'Small', 'Sz' => 'Smallz',], null, ['class' =>
													'form-control']) !!}
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">

													{!! Form::label('name', 'Other Consultant') !!}
													{!! Form::text('otherConsultant', null, ['class' => 'form-control','placeholder' => 'Enter Other
													Consultant']) !!}
												</div>
											</div>


											<div class="col-md-6">
												<div class="form-group">

													{!! Form::label('name', 'Patient Name') !!}
													{!! Form::text('regAmount', null, ['class' => 'form-control','placeholder' => 'Enter Registration
													Amount']) !!}
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">

													{!! Form::label('name', 'Age') !!}
													{!! Form::text('age', null, ['class' => 'form-control','placeholder' => 'Enter Age']) !!}
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">

													{!! Form::label('name', 'S/o') !!}
													{!! Form::radio('prefixName', null, ['class' => 'form-control','placeholder' => 'Enter Registration
													Amount']) !!}
													{!! Form::label('name', 'W/o') !!}
													{!! Form::radio('prefixName', null, ['class' => 'form-control','placeholder' => 'Enter Registration
													Amount']) !!}
													{!! Form::label('name', 'D/o') !!}
													{!! Form::radio('prefixName', null, ['class' => 'form-control','placeholder' => 'Enter Registration
													Amount']) !!}

													{!! Form::text('refName', null, ['class' => 'form-control','placeholder' => 'Enter Reference Name']) !!}

												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">

													{!! Form::label('name', 'Gender') !!}
													{!! Form::select('gender', ['Male Adult' => 'Male Adult', 'Female Adult' => 'Female Adult', 'Male Child'
													=> 'Male Child','Male Child' => 'Male Child','Female Child' => 'Female Child',], null, ['class' =>
													'form-control']) !!}
												</div>
											</div>

											<div class="col-md-12">
												<div class="form-group">

													{!! Form::label('name', 'Address') !!}
													{!! Form::textarea('address', null, ['class' => 'form-control','placeholder' => 'Enter Address','rows' =>
													3, 'cols' => 10,]) !!}
												</div>
											</div>



											<div class="col-md-12">
												<div class="form-group">

													{!! Form::label('name', 'Ward Name') !!}
													{!! Form::select('wardName', ['L' => 'Large', 'S' => 'Small', 'Sz' => 'Smallz',], null, ['class' =>
													'form-control']) !!}
												</div>
											</div>

											<div class="col-md-12">
												<div class="form-group">
													<div>Bed Number</div>

													<div style="margin-left: 20px;">
														{!! Form::radio('bedNum', null, ['class' => 'form-control',]) !!}
														{!! Form::label('name', '1') !!}
														{!! Form::radio('bedNum', null, ['class' => 'form-control',]) !!}
														{!! Form::label('name', '2') !!}
														{!! Form::radio('bedNum', null, ['class' => 'form-control',]) !!}
														{!! Form::label('name', '3') !!}
														{!! Form::radio('bedNum', null, ['class' => 'form-control',]) !!}
														{!! Form::label('name', '4') !!}
														{!! Form::radio('bedNum', null, ['class' => 'form-control',]) !!}
														{!! Form::label('name', '5') !!}
														{!! Form::radio('bedNum', null, ['class' => 'form-control',]) !!}
														{!! Form::label('name', '6') !!}
														{!! Form::radio('bedNum', null, ['class' => 'form-control',]) !!}
														{!! Form::label('name', '7') !!}
														{!! Form::radio('bedNum', null, ['class' => 'form-control',]) !!}
														{!! Form::label('name', '8') !!}
														{!! Form::radio('bedNum', null, ['class' => 'form-control',]) !!}
														{!! Form::label('name', '9') !!}
														{!! Form::radio('bedNum', null, ['class' => 'form-control',]) !!}
														{!! Form::label('name', '10') !!}

													</div>


												</div>
											</div>


											<div class="col-md-12">
												<div class="form-group">

													{!! Form::label('name', 'Date of Discharge') !!}
													{!! Form::date('dod', null, ['class' => 'form-control','placeholder' => 'Enter Mobile Number']) !!}
												</div>
											</div>

											<div class="col-md-12">
												<div class="form-group">

													{!! Form::label('name', 'Provisional Diagnosis') !!}
													{!! Form::textarea('provisionalDiagnosis', null, ['class' => 'form-control','placeholder' => 'Enter
													Address','rows' => 3, 'cols' => 10,]) !!}
												</div>
											</div>

											<div class="col-md-12">
												<div class="form-group">

													{!! Form::label('name', 'Chief Complaints') !!}
													{!! Form::textarea('chiefComplaints', null, ['class' => 'form-control','placeholder' => 'Enter
													Address','rows' => 3, 'cols' => 10,]) !!}
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">

													{!! Form::label('name', 'Past History') !!}
													{!! Form::textarea('pastHistory', null, ['class' => 'form-control','placeholder' => 'Enter Address','rows'
													=> 3, 'cols' => 10,]) !!}
												</div>
											</div>

											<div class="col-md-12">
												<h3 align="center"> Family History</h3>
												<div class="form-group">

													{!! Form::label('name', 'Maternal') !!}
													{!! Form::textarea('fh_maternal', null, ['class' => 'form-control','placeholder' => 'Enter Address','rows'
													=> 3, 'cols' => 10,]) !!}
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">

													{!! Form::label('name', 'Paternal') !!}
													{!! Form::textarea('fh_paternal', null, ['class' => 'form-control','placeholder' => 'Enter Address','rows'
													=> 3, 'cols' => 10,]) !!}
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">

													{!! Form::label('name', 'Other') !!}
													{!! Form::textarea('fh_other', null, ['class' => 'form-control','placeholder' => 'Enter Address','rows' =>
													3, 'cols' => 10,]) !!}
												</div>
											</div>



											<div class="col-md-12">
												<h3 align="center"> General Examination</h3>

												<div class="row">

													<div class="col-md-4">
														<div class="form-group">

															{!! Form::label('name', 'GC:') !!}
															{!! Form::text('ge_gc', null, ['class' => 'form-control','placeholder' => 'Enter Age']) !!}
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">

															{!! Form::label('name', 'Pulse:') !!}
															{!! Form::text('ge_pulse', null, ['class' => 'form-control','placeholder' => 'Enter Age']) !!}
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">

															{!! Form::label('name', 'Temp:') !!}
															{!! Form::text('ge_temp', null, ['class' => 'form-control','placeholder' => 'Enter Age']) !!}
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">

															{!! Form::label('name', 'Resp:') !!}
															{!! Form::text('ge_resp', null, ['class' => 'form-control','placeholder' => 'Enter Age']) !!}
														</div>
													</div>

													<div class="col-md-4">
														<div class="form-group">

															{!! Form::label('name', 'B.P.:') !!}
															{!! Form::text('ge_bp', null, ['class' => 'form-control','placeholder' => 'Enter Age']) !!}
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">

															{!! Form::label('name', 'Tongue:') !!}
															{!! Form::text('ge_tongue', null, ['class' => 'form-control','placeholder' => 'Enter Age']) !!}
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">

															{!! Form::label('name', 'Conjunctiva/Icterus:') !!}
															{!! Form::text('ge_conjective', null, ['class' => 'form-control','placeholder' => 'Enter Age']) !!}
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">

															{!! Form::label('name', 'Anaemla/Pallor:') !!}
															{!! Form::text('ge_anaemla', null, ['class' => 'form-control','placeholder' => 'Enter Age']) !!}
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">

															{!! Form::label('name', 'JVP:') !!}
															{!! Form::text('ge_jvp', null, ['class' => 'form-control','placeholder' => 'Enter Age']) !!}
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">

															{!! Form::label('name', 'Oedema:') !!}
															{!! Form::text('ge_oedema', null, ['class' => 'form-control','placeholder' => 'Enter Age']) !!}
														</div>
													</div>

													<div class="col-md-4">
														<div class="form-group">

															{!! Form::label('name', 'Cyanosis:') !!}
															{!! Form::text('ge_cyanosis', null, ['class' => 'form-control','placeholder' => 'Enter Age']) !!}
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">

															{!! Form::label('name', 'Appetite:') !!}
															{!! Form::text('ge_appetite', null, ['class' => 'form-control','placeholder' => 'Enter Age']) !!}
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">

															{!! Form::label('name', 'Lymph Gland:') !!}
															{!! Form::text('ge_lymph', null, ['class' => 'form-control','placeholder' => 'Enter Age']) !!}
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">

															{!! Form::label('name', 'Throat:') !!}
															{!! Form::text('ge_throat', null, ['class' => 'form-control','placeholder' => 'Enter Age']) !!}
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">

															{!! Form::label('name', 'Bowel/Bladder:') !!}
															{!! Form::text('ge_bowel', null, ['class' => 'form-control','placeholder' => 'Enter Age']) !!}
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">

															{!! Form::label('name', 'Sleep:') !!}
															{!! Form::text('ge_sleep', null, ['class' => 'form-control','placeholder' => 'Enter Age']) !!}
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">

															{!! Form::label('name', 'Allergies:') !!}
															{!! Form::text('ge_allergies', null, ['class' => 'form-control','placeholder' => 'Enter Age']) !!}
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">

															{!! Form::label('name', 'Skin:') !!}
															{!! Form::text('ge_skin', null, ['class' => 'form-control','placeholder' => 'Enter Age']) !!}
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">

															{!! Form::label('name', 'Thirst:') !!}
															{!! Form::text('ge_thirst', null, ['class' => 'form-control','placeholder' => 'Enter Age']) !!}
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">

															{!! Form::label('name', 'Addictions:') !!}
															{!! Form::text('ge_addictions', null, ['class' => 'form-control','placeholder' => 'Enter Age']) !!}
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">

															{!! Form::label('name', 'Diet:') !!}
															{!! Form::text('ge_diet', null, ['class' => 'form-control','placeholder' => 'Enter Age']) !!}
														</div>
													</div>


												</div>

											</div>

											<div class="col-md-12">
												<div class="row">
													<div class="col-md-6">
														<h3 align="center">ECG</h3>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															{!! Form::checkbox('ecgTest', null, ['class' => 'form-control','placeholder' => 'Enter Registration
															Amount']) !!}
														</div>
													</div>
												</div>
											</div>

											<div class="col-md-12">
												<div class="form-group">

													{!! Form::label('name', 'Respiratory System') !!}
													{!! Form::textarea('respiratorySystem', null, ['class' => 'form-control','placeholder' => 'Enter
													Address','rows' => 3, 'cols' => 10,]) !!}
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">

													{!! Form::label('name', 'Gastro - Intestinal System') !!}
													{!! Form::textarea('gastroIntestinalSystem', null, ['class' => 'form-control','placeholder' => 'Enter
													Address','rows' => 3, 'cols' => 10,]) !!}
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">

													{!! Form::label('name', 'Cardio - Vascular System') !!}
													{!! Form::textarea('cardioVascularSystem', null, ['class' => 'form-control','placeholder' => 'Enter
													Address','rows' => 3, 'cols' => 10,]) !!}
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">

													{!! Form::label('name', 'Central Nervous System') !!}
													{!! Form::textarea('centralNervousSystem', null, ['class' => 'form-control','placeholder' => 'Enter
													Address','rows' => 3, 'cols' => 10,]) !!}
												</div>
											</div>

											<div class="col-md-12">
												<div class="form-group">

													{!! Form::label('name', 'Local Examination') !!}
													{!! Form::text('localExamination', null, ['class' => 'form-control','placeholder' => 'Enter
													Address','rows' => 3, 'cols' => 10,]) !!}
												</div>
											</div>

											<div class="col-md-12">
												<div class="form-group">

													{!! Form::label('name', 'Investigation 1') !!}
													{!! Form::select('investigation1', ['L' => 'Large', 'S' => 'Small', 'Sz' => 'Smallz',], null, ['class' =>
													'form-control']) !!}
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">

													{!! Form::label('name', 'Investigation 2') !!}
													{!! Form::select('investigation2', ['L' => 'Large', 'S' => 'Small', 'Sz' => 'Smallz',], null, ['class' =>
													'form-control']) !!}
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">

													{!! Form::label('name', 'Investigation 3') !!}
													{!! Form::select('investigation3', ['L' => 'Large', 'S' => 'Small', 'Sz' => 'Smallz',], null, ['class' =>
													'form-control']) !!}
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">

													{!! Form::label('name', 'Medicine 1') !!}
													{!! Form::select('medicine1', ['L' => 'Large', 'S' => 'Small', 'Sz' => 'Smallz',], null, ['class' =>
													'form-control']) !!}
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">

													{!! Form::label('name', 'Potency') !!}
													{!! Form::select('potency1', ['L' => 'Large', 'S' => 'Small', 'Sz' => 'Smallz',], null, ['class' =>
													'form-control']) !!}
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">

													{!! Form::label('name', 'Medicine 2') !!}
													{!! Form::select('medicine2', ['L' => 'Large', 'S' => 'Small', 'Sz' => 'Smallz',], null, ['class' =>
													'form-control']) !!}
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">

													{!! Form::label('name', 'Potency') !!}
													{!! Form::select('potency2', ['L' => 'Large', 'S' => 'Small', 'Sz' => 'Smallz',], null, ['class' =>
													'form-control']) !!}
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">

													{!! Form::label('name', 'Medicine 3') !!}
													{!! Form::select('medicine3', ['L' => 'Large', 'S' => 'Small', 'Sz' => 'Smallz',], null, ['class' =>
													'form-control']) !!}
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">

													{!! Form::label('name', 'Potency') !!}
													{!! Form::select('potency3', ['L' => 'Large', 'S' => 'Small', 'Sz' => 'Smallz',], null, ['class' =>
													'form-control']) !!}
												</div>
											</div>

											<div class="col-md-12">
												<h3 align="center">Auxiliary Treatment</h3>

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">

															{!! Form::label('name', 'Diet Plan 1') !!}
															{!! Form::select('dietPlan1', ['L' => 'Large', 'S' => 'Small', 'Sz' => 'Smallz',], null, ['class' =>
															'form-control']) !!}
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">

															{!! Form::label('name', 'Diet Plan 2') !!}
															{!! Form::select('dietPlan2', ['L' => 'Large', 'S' => 'Small', 'Sz' => 'Smallz',], null, ['class' =>
															'form-control']) !!}
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">

															{!! Form::label('name', 'Other Consultant') !!}
															{!! Form::textarea('diet1Text', null, ['class' => 'form-control','placeholder' => 'Enter Other
															Consultant','rows' => 3, 'cols' => 10,]) !!}
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">

															{!! Form::label('name', 'Other Consultant') !!}
															{!! Form::textarea('diet2Text', null, ['class' => 'form-control','placeholder' => 'Enter Other
															Consultant','rows' => 3, 'cols' => 10,]) !!}
														</div>
													</div>


													<div class="col-md-6">
														<div class="row">
															<div class="col-md-6">
																<h3 align="center">Yoga</h3>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	{!! Form::checkbox('yoga', null, ['class' => 'form-control','placeholder' => 'Enter Registration
																	Amount']) !!}
																</div>
															</div>
														</div>
													</div>


													<div class="col-md-6">
														<div class="row">
															<div class="col-md-6">
																<h3 align="center">Physiotherapy</h3>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	{!! Form::checkbox('physiotherapy', null, ['class' => 'form-control']) !!}
																</div>
															</div>
														</div>
													</div>



													<div class="col-md-12">
														<div class="form-group">

															{!! Form::label('name', 'Remarks') !!}
															{!! Form::textarea('remark', null, ['class' => 'form-control','placeholder' => 'Enter Other
															Consultant','rows' => 3, 'cols' => 10,]) !!}
														</div>
													</div>

												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">
													<div style="float: right;">
														{!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}
													</div>
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">
													<div>
														<a href="#"> <button class="btn btn-primary">Cancel</button></a>
													</div>
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

		</div>


		@endsection