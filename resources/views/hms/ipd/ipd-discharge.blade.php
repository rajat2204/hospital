<div class="container">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<b>{{ucfirst( $data->getPatientDetails->patientName) }}	</b>
		<span class="pull-right"> 
            <a href="javascript:;" onclick="printPopup('IPD - PATIENT DISCHARGE CARD','tables')" class="btn btn-sm btn-info"style="margin-right: 10px;"> <i class="fa fa-print"></i> PRINT 
            </a>
        </span>
        <span class="pull-right" style="padding-right: 5px">
            <b style="margin-right: 36px">{{ $data->patientId }}</b>
        </span>
</div>
<section class="panel">
	<div class="panel-body" id="tables">
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table table-bordered table-striped table-hovered">
					<thead>
						<tr>
							<th width="25%">OPD Number </th>
							<td width="25%">{{ $data->patientId }}</td>
							<th width="25%">OPD Date</th>
							<td width="25%">{{ $data->opdDate }}</td>
						</tr>

						<tr>
							<th>Patient Name</th>
							<td colspan="3">
								{{ $data->getPatientDetails->patientName }} <strong>
									{{ $data->prefixName }} </strong>
								{{ $data->refName }} </td>
						</tr>

						<tr>
							<th>Gender</th>
							<td>{{$data->getPatientDetails->gender }}</td>
							<th>Age</th>
							<td>{{ $data->getPatientDetails->age }}</td>
						</tr>

						<tr>
							<th>Address</th>
							<td colspan="3">{{ $data->getPatientDetails->address }}</td>
						</tr>

						<tr>
							<th>Consultant</th>
							<td>{{ $data->getConsultant->name }}</td>
							<th>Other Consultant </th>
							<td>{{ $data->otherConsultant }}</td>
						</tr>


						<tr>
							<th>Ward Name</th>
							<td>{{ $data->getWardName->name }}</td>
							<th>Bed Number</th>
							<td>{{ $data->bedNum }}</td>
						</tr>

						<tr>
							<th>Date of Discharge</th>
							<td colspan="1">{{ $data->dod }}</td>
							<th>Time</th>
							<td></td>
						</tr>

						<tr>
							<th> Diagnosis</th>
							<td colspan="3">{{ $data->provisionalDiagnosis }}</td>
						</tr>
						<tr>
							<th>Medicine <span class="badge badge-danger pull-right">1</span></th>
							<td>{{ $data->getMedicine1->name }} </td>
							<th>Potency <span class="badge badge-danger pull-right">1</span></th>
							<td>{{ $data->getPotency1->name }}</td>
						</tr>

						<tr>
							<th>Medicine <span class="badge badge-danger pull-right">2</span></th>
							<td>{{ $data->getMedicine2->name }}</td>
							<th>Potency <span class="badge badge-danger pull-right">2</span></th>
							<td>{{ $data->getPotency2->name }}</td>
						</tr>

						<tr>
							<th>Medicine <span class="badge badge-danger pull-right">2</span></th>
							<td>{{ $data->getMedicine3->name }}</td>
							<th>Potency <span class="badge badge-danger pull-right">2</span></th>
							<td>{{ $data->getPotency3->name }}</td>
						</tr>

						<tr>
							<th>Diet Plan <span class="badge badge-success pull-right">1</span></th>
							<td>{{ $data->getDietPlan1->name }}</td>
							<th>Diet Plan <span class="badge badge-success pull-right">2</span></th>
							<td>{{ $data->getDietPlan2->name }}</td>
						</tr>


						<tr>
							<th>Remark</th>
							<td colspan="3">{{ $data->remark }}</td>
						</tr>

						<tr>
							<th colspan="2">
								<br><br><br><br><br><br>
								<div class="text-center">
									<span>
										Patient / Attender Signature
									</span>
								</div>
							</th>
							<th colspan="2">
								<br><br><br><br><br>
								<div class="text-center">
									<span>
										Authourised Signature
									</span>
									<br>
									<span>
										Date:
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									</span>
								</div>
							</th>
						</tr>

					</thead>
				</table>
			</div>


		</div>
	</div>
</section>
<div class="modal-footer">
	<button type="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
</div>