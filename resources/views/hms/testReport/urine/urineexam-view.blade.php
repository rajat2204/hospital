	<div class="container">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	        <p class="modal-title">{{ ucfirst($data->getPatientDetails->patientName) }}        <span class="pull-right"> <a href="javascript:;" onclick="printPopup('URINE EXAMINATION TREATMENT DETAILS','tables')" class="btn btn-sm btn-info"> <i class="fa fa-print"></i> Print </a></span>
	          <span class="pull-right" style="margin-right: 10px;">{{ $data->patientId }}</span>
	        </p>   
	</div>
			<section class="panel">
				<div class="panel-body" id="tables">
					<div class="col-md-12">
					  	<div class="table-responsive">
					    	<table class="table table-bordered table-striped table-hovered">
						      	<thead>
							        <tr>
								        <th>Name </th>
								        <td colspan="3">{{ ucfirst($data->getPatientDetails->patientName) }}</td>
							        </tr>
							        <tr>
								          <th width="25%">Age </th>
								          <td width="25%">{{ $data->getPatientDetails->age }}</td>
								          <th width="25%">Gender </th>
								          <td width="25%">{{ $data->getPatientDetails->gender }}</td>
							        </tr>
							        <tr>
								          <th>Referred By </th>
								          <td>{{ $data->referredBy }}</td>
								          <th>Test Date </th>
								          <td>{{ $data->date }}</td>
							        </tr>
							        <tr>
								          <th>Investigation Advised </th>
								          <td>{{ $data->investigationAdvised }}</td>
								          <th>OPD Number </th>
								          <td>{{ $data->patientId }}</td>
							        </tr>
						        </thead>
					      	</table>
					      <hr>
			              <div class="col-md-12">
			                    <div class="text-center">
			                      <strong class="bgRed badge-danger">URINE EXAMINATION</strong>
			                    </div>
			                    <hr>
			              </div>
			               <table class="table table-bordered table-striped table-hovered">
		                    <tbody>
		                    	<tr>
				                      <th colspan="2"><span class="text-danger">PHYSICAL EXAMINATION</span> </th>
				                      <th colspan="2"><span class="text-danger">MICROSCOPIC EXAMINATION</span> </th>
		                        </tr>
			                    <tr>
				                      <th width="30%">Sample </th>
				                      <td width="20%">{{ $data->sample }} </td>
				                      <th width="30%">Pus Cells </th>
				                      <td width="20%">{{ $data->pusCells }}</td>
			                    </tr>
			                    <tr>
				                      <th>Quantity </th>
				                      <td>{{ $data->quantity }}</td>
				                      <th>Epithellal Cells</th>
				                      <td>{{ $data->epithellalCells }}</td>
			                    </tr>
			                    <tr>
				                      <th>Colour </th>
				                      <td>{{ $data->colour }}</td>
				                      <th>Crystals</th>
				                      <td>{{ $data->crystals }} </td>
			                    </tr>
			                    <tr>
				                      <th>SP Gravity </th>
				                      <td>{{ $data->spGravity }}</td>
				                      <th>RBS</th>
				                      <td>{{ $data->rbs }} </td>
			                    </tr>
			                    <tr>
				                      <th>Reaction </th>
				                      <td>{{ $data->reaction }}</td>
				                      <th>Bacteria</th>
				                      <td>{{ $data->bacteria }} </td>
			                    </tr>
			                    <tr>
				                      <th colspan="2"><span class="text-danger">CHEMICAL EXAMINATION</span> </th>
				                      <th>Cast</th>
				                      <td>{{ $data->cast }}</td>
			                    </tr>
			                    <tr>
				                      <th>Albumin </th>
				                      <td>{{ $data->albumin }} </td>
				                      <th>Others</th>
				                      <td>{{ $data->other }}</td>
			                    </tr>
			                    <tr>
				                      <th>Suger </th>
				                      <td>{{ $data->suger }}</td>
				                      <th></th>
				                      <td></td>
			                    </tr>
			                    <tr>
				                      <th>BileSalts </th>
				                      <td>{{ $data->bileSalts }} </td>
				                      <th></th>
				                      <td></td>
			                    </tr>
			                    <tr>
				                      <th>Bile Pigments </th>
				                      <td>{{ $data->bilePigments }} </td>
				                      <th></th>
				                      <td></td>
			                    </tr>
			                    <tr>
				                      <th>Acetone </th>
				                      <td>{{ $data->acetone }} </td>
				                      <th></th>
				                      <td></td>
			                    </tr>
			                    <tr>
				                      <th>Bence Jones Proteins </th>
				                      <td>{{ $data->benceJonesProteins }} </td>
				                      <th></th>
				                      <td></td>
			                    </tr>
		                  </tbody>
		              </table>
		              </div>
		            </div>
				</div>
			</section>
	

