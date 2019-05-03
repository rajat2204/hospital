		<div class="panel panel-default">
		  <div class="panel-body">
		      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">x</span>
		      </button>
		      <b style="margin-right: 36px">{{ ucfirst($data->getPatientName->patientName) }}</b>
		      <span class="pull-right"> 
              <a href="javascript:;" onclick="printPopup('IPD - PATIENTS LIST','tables')" class="btn btn-sm btn-info"style="margin-right: 10px;"> <i class="fa fa-print"></i> PRINT 
              </a>
        </span>
        <span class="pull-right" style="padding-right: 5px">
            <b style="margin-right: 36px">{{ $data->patientId }}</b>
        </span>
		      
		  </div>
		 <div class="col-lg-12">
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
		                    <td width="25%">{{ $data->IpdData->opdDate }}</td>
		                  </tr>
		                  
		                  <tr>
		                    <th>IPD Number</th>
		                    <td>{{ $data->IpdData->ipdRegNum }}</td>
		                    <th>IPD Date</th>
		                    <td>{{ $data->IpdData->ipdRegDate }}</td>
		                  </tr>
		                  <tr>
		                    <th>Patient Name</th>
		                    <td colspan="3">
		                         {{ $data->getPatientName->patientName }} <strong>
		                         {{ $data->prefixName }}  </strong>
		                         {{ $data->refName }} 
		                    </td>
		                  </tr>

		                  <tr>
		                    <th>Gender</th>
		                    <td>{{$data->getPatientName->gender  }}</td>
		                    <th>Age</th>
		                    <td>{{ $data->getPatientName->age }}</td>
		                  </tr>

		                  <tr>
		                    <th>Address</th>
		                    <td colspan="3">{{ $data->getPatientName->address }}</td>
		                  </tr>

		                  <tr>
		                    <th>Consultant</th>
		                    <td>{{ $data->getConsultant->name }}</td>
		                    <th>Other Consultant </th>
		                    <td>{{ $data->otherConsultant }}</td>
		                  </tr>
		                </thead>
		              </table>
		            </div>
		          </div>
		         </div>
		     </section>
		 	</div>
		 </div>
		 <div class="text-center">
		        <strong class="begRed badge-danger">EDIT - IPD TREATEMENT DETAILS</strong>
		    </div>
		      {!! Form::open(array('files'=>'true','id'=>'ipdedit-treatement-form','autocomplete'=>'off')) !!}
		         <div class="col-lg-12">
		            <div class="row">
		                <div class="col-md-12">
		                	{!! Form::hidden('id',$data->id,['id'=>'edit-id'])!!}
		                	{!! Form::hidden('ipdId',$data->ipdId,['id'=>'ipdId'])!!}
		                	{!! Form::hidden('patientId',$data->patientId,['id'=>'patientId'])!!}
		                    {!! Form::label('complaint', 'Complaints') !!}
		                      <div class="form-group">
		                    {!! Form::textarea('complaint',$data->complaint,['class' => 'form-control','placeholder' => 'Enter complaint','rows' => 3, 'cols' => 10,'id'=>'edit-complaint']) !!}
		                    <div class="error complaint"></div>
		                	</div>
		                </div>
		                <div class="col-md-12">
			                <div class="form-group ">
				                {!! Form::label('treatment_date', 'Treatment Date') !!}
				                {!! Form::date('treatment_date',Carbon\Carbon::today()->format('Y-m-d'), ['class' => 'form-control','id'=>'edit-treatment_date','placeholder' => 'Enter Treatment Date']) !!}
				                <div class=" error treatment_date"></div>
			                </div>
		                </div>
		                <div class="col-md-12">
	                        {!! Form::label('treatment', 'Treatment Advice') !!}
	                        <div class="form-group">
	                   		  {!! Form::textarea('treatment',$data->treatment, ['class' => 'form-control','placeholder' => 'Enter treatment','rows' => 3, 'cols' => 10,'id'=>'edit-treatment']) !!}
	                		</div>
	                		<div class=" error treatment"></div>
		                </div>
		                <div class="col-lg-6">
		              	    <div class="form-group ">
		                      {!! Form::label('name', 'Medicine ') !!}
	                            {!! Form::select('medicine',$medicineList,$data->medicine,
	                            ['class' => 'form-control','id'=>'edit-medicine','placeholder' => '--Select Medicine--']) !!}
	                            <div class=" error medicine"></div>
		                    </div>
		              	</div>
		                <div class="col-lg-6">
		                    <div class="form-group">
		                        {!! Form::label('name', 'Potency') !!}
		                       {!! Form::select('potency1',$potencyList,$data->potency, ['class' =>'form-control','id'=>'edit-potency','placeholder' => '--Select Potency--']) !!}
		                        <div class=" error potency"></div>
		                    </div>
		                </div>
		                <div class="col-lg-12">
		                  	<div class="form-group">
		                    	{!! Form::label('name', 'Number of Days') !!}
		                      	{!! Form::text('nod', $data->nod,['class'=>'form-control','id'=>'edit-nod','placeholder'=>'Treatment Number of Days']) !!}
		                      	<div class=" error nod"></div>
		                    </div>
		                </div>
			            <div class="col-lg-12">
			           		 {!! Form::label('name', 'Investigation 1') !!}
			              	<div class="form-group">
			                     {!! Form::select('advice[]',$investigationList,$data->advice,['class' => 'form-control','id'=>'edit-advice','placeholder'=>'-- Select Advice --']) !!}
			                     <div class=" error advice"></div>
			                </div>
			            </div>
			            <div class="col-lg-12">
			            	<div class="form-group">
			           		 	{!! Form::label('remark', 'Remark') !!}
			               		 {!! Form::textarea('remark',$data->remark, ['class' => 'form-control ','placeholder' => 'Enter remark','rows' => 3, 'cols' => 10,'id'=>'edit-remark']) !!}
			               		 <div class=" error remark"></div>
			               	</div>
			            </div>
			            <div class="col-md-12">
			            	{!! Form::label('refTo', 'Referred To') !!}
			            	<div class="custom-controls-stacked">
			            		<label class="custom-control custom-checkbox col-lg-4 col-md-4 col-sm-4 col-xs-4">
	                                {!! Form::checkbox('refTo[]','OT',false,array("class"=>"custom-control-input check",'id'=>'id-ot',))  !!}
	                                    <span class="custom-control-label"><strong>OT</strong></span>
	                             </label>
	                             <label class="custom-control custom-checkbox col-lg-4 col-md-4 col-sm-4 col-xs-4">
	                                {!! Form::checkbox('refTo[]','IPD',false,array("class"=>"custom-control-input check",'id'=>'id-ipd',))  !!}
	                                    <span class="custom-control-label"><strong>IPD</strong></span>
	                             </label>
	                             <label class="custom-control custom-checkbox col-lg-4 col-md-4 col-sm-4 col-xs-4">
	                                {!! Form::checkbox('refTo[]','PATHOLOGY',false,array("class"=>"custom-control-input check",'id'=>'id-PATHOLOGY',))  !!}
	                                    <span class="custom-control-label"><strong>PATHOLOGY</strong></span>
	                             </label>
			            	</div>
			            </div>
			            <div class="col-md-12">
			            	
			            	<div class="custom-controls-stacked">
			            		 <label class="custom-control custom-checkbox col-lg-4 col-md-4 col-sm-4 col-xs-4">
	                                {!! Form::checkbox('refTo[]','XRay',false,array("class"=>"custom-control-input check",'id'=>'id-XRay',))  !!}
	                                    <span class="custom-control-label"><strong>XRay</strong></span>
	                             </label>
	                             <label class="custom-control custom-checkbox col-lg-4 col-md-4 col-sm-4 col-xs-4">
	                                {!! Form::checkbox('refTo[]','PHYSIOTHERPHY',false,array("class"=>"custom-control-input check",'id'=>'id-PHYSIOTHERPHY',))  !!}
	                                    <span class="custom-control-label"><strong>PHYSIOTHERPHY</strong></span>
	                             </label>
	                             <label class="custom-control custom-checkbox col-lg-4 col-md-4 col-sm-4 col-xs-4">
	                                {!! Form::checkbox('refTo[]','YOGA',false,array("class"=>"custom-control-input check",'id'=>'id-YOGA',))  !!}
	                                    <span class="custom-control-label"><strong>YOGA</strong></span>
	                             </label>
			            	</div>
			            </div>
			            <div class="col-md-12">
			            	<div class="custom-controls-stacked">
	                              <label class="custom-control custom-checkbox col-lg-4 col-md-4 col-sm-4 col-xs-4">
	                                {!! Form::checkbox('refTo[]','DISPENSARY',false,array("class"=>"custom-control-input check",'id'=>'id-DISPENSARY',))  !!}
	                                    <span class="custom-control-label"><strong>DISPENSARY</strong></span>
	                             </label> 
	                             <label class="custom-control custom-checkbox col-lg-4 col-md-4 col-sm-4 col-xs-4">
	                                {!! Form::checkbox('refTo[]','OTHER HOSPITAL',false,array("class"=>"custom-control-input check",'id'=>'id-OTHERHOSPITAL',))  !!}
	                                    <span class="custom-control-label"><strong>OTHER HOSPITAL</strong></span>
	                             </label> 
	                             <label class="custom-control custom-checkbox col-lg-4 col-md-4 col-sm-4 col-xs-4">
	                                {!! Form::checkbox('refTo[]','ECG',false,array("class"=>"custom-control-input check",'id'=>'id-ECG',))  !!}
	                                    <span class="custom-control-label"><strong>ECG</strong></span>
	                             </label>
	                         </div>
	                         <div class="error refTo"></div>
			            </div>
		                <div class="col-lg-12">
			                <div class="form-group">
			                   {!! Form::label('consultant', 'IPD Consultant Name') !!}
			                	{!! Form::select('consultant',$doctorList,$data->consultant,['class' => 'form-control','id'=>'edit-consultant','placeholder' => '--Select Consultant Name--']) 
			                	!!} 
			                	 <div class="error consultant"></div>
			              </div>
		                </div>
		        	    <div class="col-md-12" >
			                <div class="form-group">
			                	<center>
			                 	  {!! Form::button('Submit', ['class' => 'btn btn-primary',
			                 	  'id'=>'ipd-edittreatment']) !!}
			                 	  {{-- {!! Form::reset('cancel', ['class' => 'btn btn-danger']) !!} --}}
			                 	</center>
			                </div>
			        	</div>
		        	</div>
		        	{!! Form::close() !!}
		  		</div>


