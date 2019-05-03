	<div class="panel panel-default">
	<div class="panel-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">x</span>
        </button>
        <b style="margin-right: 36px">{{ ucfirst($data->OpdData->patientName) }}</b>
        <span class="pull-right"> 
            <a href="javascript:;" onclick="printPopup('OPD - PATIENTS LIST','tables')" class="btn btn-sm btn-info"style="margin-right: 10px;"> <i class="fa fa-print"></i> PRINT 
            </a>
        </span>

        <span class="pull-right" style="padding-right: 5px">
            <b style="margin-right: 36px">{{ $data->regNum }}</b>
        </span>
        
    </div>
	        <section class="panel">
		        <div class="panel-body" id="tables">
		            <div class="col-md-12">
		            	<table class="table table-bordered table-striped table-hovered">
		              		<thead>
			            <tr>
			                <b><th>Registration Number</th></b>
			                <td>{{ $data->OpdData->regNum }}</td>
			                <th>Registration Date</th>
			                <td>{{ \Carbon\Carbon::parse($data->regDate)->format('d/m/Y') }}</td>
			            </tr>
			            <tr>
			                <th>Name</th>
			                <td colspan="3">{{ $data->OpdData->patientName }}</td>
			            </tr>
			            <tr>
			                <th>Gender</th>
			                <td>{{ $data->OpdData->gender }}</td>
			                <th>Age</th>
			                <td>{{ $data->OpdData->age }}</td>
			            </tr>
			            <tr>
			                <th>Address</th>
			                <td colspan="3">{{ $data->OpdData->address }}</td>
			            </tr>
			            <tr>
			                <th>Consultant Name</th>
			                <td>{{ $data->OpdData->getConsultant->name }}</td>
			                <th>Other Consultant</th>
			                <td>{{ $data->OpdData->otherConsultant }}</td>
			            </tr>
			            <tr>
			                <th>Department</th>
			                <td colspan="3">{{ $data->OpdData->getDepartment->name }}</td>
			            </tr>
			        </thead>
						</table>
					</div>
				</div>
			</section>
	              <hr>
	                <div class="text-center">
            			<strong class="bgRed badge-danger">EDIT - OPD TREATMENT DETAILS</strong>
                    </div>
	              {!! Form::open(array('files'=>'true','id'=>'opdTreatement-form','autocomplete'=>'off')) !!}
	              @csrf
	                 <div class="col-lg-12">
	                    <div class="row">
		                    <div class="col-md-12">
		                    	<input type="hidden" name="patientId" value="{{ $data->OpdData->regNum }}" id="patientId">
		                    	<input type="hidden" name="id" value="{{ $data->id }}" id="edit-id">
		                        {!! Form::label('complaint', 'Complaints') !!}
		                          <div class="form-group">
		                        {!! Form::textarea('complaint',$data->complaint, ['class' => 'form-control','placeholder' => 'Enter complaint','rows' => 3, 'cols' => 10,'id'=>'edit-complaint']) !!}
		                        	<div class="error complaint"></div>
		                    	</div>
	                        </div>
	                        <div class="col-md-12">
	                      		<div class="form-group ">
			                        {!! Form::label('Treatment', 'Treatment Date') !!}
			                        {!! Form::date('treatment_date',$data->treatment_date, ['class' => 'form-control','id'=>'edit-treatment_date','placeholder' => 'Enter Treatment']) !!}
			                        <div class="error treatment_date"></div>
			                    </div>
	                      	</div>
		                    <div class="col-lg-12">
		                         {!! Form::label('treatment', 'Treatment Advice') !!}
		                          <div class="form-group">
		                       		 {!! Form::textarea('treatment',$data->treatment, ['class' => 'form-control','placeholder' => 'Enter treatment','rows' => 3, 'cols' => 10,'id'=>'edit-treatment']) !!}
		                       		 <div class="error treatment"></div>
		                    	</div>
		                    </div>
		                    <div class="col-lg-6">
	                      	    <div class="form-group ">
		                          	{!! Form::label('name', 'Medicine ') !!}
		                            {!! Form::select('medicine',$medicineList,$data->medicine,
		                                ['class' => 'form-control',
		                                  'id'=>'edit-medicine',
		                                  'placeholder' => '--Select Medicine--']) !!}
		                                  <div class="error medicine"></div>
		                        </div>
	                      	</div>
		                    <div class="col-lg-6">
			                    <div class="form-group">
			                        {!! Form::label('name', 'Potency') !!}
			                       {!! Form::select('potency',$potencyList,$data->potency, ['class' => 'form-control','id'=>'edit-potency']) !!}
			                       <div class="error potency"></div>
			                    </div>
			                </div>
		                    <div class="col-lg-12">
		                      	<div class="form-group ">
		                        	{!! Form::label('name', 'Number of Days') !!}
		                          	
		                          	{!! Form::text('nod',$data->nod,['class'=>'form-control','id'=>'edit-nod','placeholder'=>'Treatment Number of Days']) !!}
		                          	<div class="error nod"></div>
		                        </div>
		                    </div>
		                    <div class="col-lg-12">
		                    {!! Form::label('name', 'Investigation 1') !!}
		                      <div class="form-group">
		                             {!! Form::select('advice[]',$investigationList,$data->advice, ['class' => 'form-control','id'=>'edit-advice',]) !!}
		                             <div class="error advice"></div>
		                        </div>
		                    </div>
		                    <div class="col-lg-12">
		                    	<div class="form-group">
		                   		 	{!! Form::label('remark', 'Remark') !!}
		                       		 {!! Form::textarea('remark',$data->remark, ['class' => 'form-control ','placeholder' => 'Enter remark','rows' => 3, 'cols' => 10,'id'=>'edit-remark']) !!}
		                       		 <div class="error remark"></div>
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
	                         <div class="error refTo" ></div>
			            </div>
		            <div class="col-lg-12">
		              	<div class="form-group">
		               		{!! Form::label('consultant', 'IPD Consultant Name') !!}
		                	{!! Form::select('consultant', $doctorList,$data->consultant,['class' => 'form-control','id'=>'edit-consultant','placeholder' => '--Select Consultant Name--']) 
		                	!!} 
		                	<div class="error consultant"></div>
		              	</div>
	          		</div>
                	<div class="col-md-12" >
                        <div class="form-group">
                         	<center>
                         	  {!! Form::button('Submit', ['class' => 'btn btn-info','id'=>'edit-opd-treatment']) !!}
                         	  {{-- {!! Form::reset('cancel', ['class' => 'btn btn-danger',]) !!} --}}
                         	</center>
                        </div>
	                    
	                </div>
		            <div>
	            </div>
	                {!! Form::close() !!}
	        </div>
	    </div>
	 