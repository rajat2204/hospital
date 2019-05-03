				
			<div class="container">
			    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			        <P class="modal-title">{{ ucfirst($data->getPatientDetails->patientName) }}        <span class="pull-right"> <a href="javascript:;" onclick="printPopup('STOOL BLOOD TREATMENT DETAILS','tables')" class="btn btn-sm btn-info"> <i class="fa fa-print"></i> Print </a></span>
			          <span class="pull-right" style="margin-right: 10px;">{{ $data->patientId }}</span>
			        </P>
			        
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
	                      <strong class="bgRed badge-danger">STOOL EXAMINATION</strong>
	                    </div>
	                    <hr>
	                  </div>
	               
	                  <table class="table table-bordered table-striped table-hovered">
	                    <tbody><tr>
	                      <th width="50%"><span class="text-danger">MACROSCOPIC</span></th>
	                      <td></td>
	                    </tr>
	                    <tr>
	                      <th>Colour </th>
	                      <td>{{ $data->colour }}</td>
	                    </tr>
	                    <tr>
	                      <th>Consistency </th>
	                      <td>{{ $data->consistency }}</td>
	                    </tr>
	                    <tr>
	                      <th>Mucus </th>
	                      <td>{{ $data->mucus }}</td>
	                    </tr>
	                    <tr>
	                      <th>Blood </th>
	                      <td>{{ $data->blood }}</td>
	                    </tr>
	                    <tr>
	                      <th><span class="text-danger">MICROSCOPIC</span></th>
	                      <td></td>
	                    </tr>
	                    <tr>
	                      <th>Pus Cells </th>
	                      <td>{{ $data->pusCells }}</td>
	                    </tr>
	                    <tr>
	                      <th>RBCs </th>
	                      <td>{{ $data->rbcs }}</td>
	                    </tr>
	                    <tr>
	                      <th>Vegetable Matter </th>
	                      <td>{{ $data->vegetableMatter }}</td>
	                    </tr>
	                    <tr>
	                      <th>Cysts </th>
	                      <td>{{ $data->cysts }}</td>
	                    </tr>
	                    <tr>
	                      <th><span class="margin-Left"></span>Giardia</th>
	                      <td>{{ $data->giardia }}</td>
	                    </tr>
	                    <tr>
	                      <th><span class="margin-Left"></span>E Histolytica</th>
	                      <td>{{ $data->eHistolytica }}</td>
	                    </tr>
	                    <tr>
	                      <th><span class="margin-Left"></span>E Coil</th>
	                      <td>{{ $data->eCoil }}</td>
	                    </tr>
	                    <tr>
	                      <th>OVA </th>
	                      <td>{{ $data->ova }}</td>
	                    </tr>
	                    <tr>
	                      <th>Worms</th>
	                      <td>{{ $data->worms }}</td>
	                    </tr>
	                    <tr>
	                      <th>Occult Stool</th>
	                      <td>{{ $data->occultBlood }}</td>
	                    </tr>
	                    <tr>
	                      <th>Reducing Substances</th>
	                      <td>{{ $data->reducingSubstances }}</td>
	                    </tr>
	                    <tr>
	                      <th colspan="2"> Other : Stool C/S  Sterilite {{ $data->other }}</th>
	                    </tr>
	                  </tbody>
	              </table>
              </div>
            </div>
		</div>
	</div>
</div>
</section>


