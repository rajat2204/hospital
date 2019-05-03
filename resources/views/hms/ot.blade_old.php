		@extends('layout.app')
		@section('content')
		<div class="container" style="width: 1175px;">
		    <div class="row">
		        <div class="col-lg-12">
		            <div class="card">
		                <div class="card-header">
		                    <h6 class="card-title btn btn-pill btn-info">OT - NEW PATIENT REGISTRATION</h6>
		                    <h6 class="pull-right card-title btn btn-pill btn-default" style="margin-left: 400px; background-color:#1fb5ad;color:white;"><i class="fa fa-list"></i>  SHOW/SEARCH OLD PATIENT</h6>

		                </div>
		                <div class="card-body">
		                  {!! Form::open(array('route' => 'ot.store','files'=>'true','id'=>'profile-form','autocomplete'=>'off')) !!}
		                        <div class="col-md-12">
		                           <div class="row">
			                          <div class="col-md-offset-3 col-sm-2">
		                                  <div class="form-group">
		                                                {!! Form::label('name', 'OPD Registration Number:*') !!}
		                                   </div>
		                              </div>
	                          		 <div class="col-sm-3">
	                                   <div class="form-group">
	                                          {!! Form::text('patientId',  null, 
		                                [
		                                    'class' => 'form-control opd',
		                                    'placeholder' => 'Enter OPD  Registration Number',
		                                    'id'=>'id-opd-regnum',
		                                ]) !!}
		                                		<div id="opd-reg-list"> </div>
	                                   </div>
	                          		 </div>
		                                <div class="col-md-offset-3 col-sm-2">
	                                        <div class="form-group">
	                                                {!! Form::label('opdDate', 'OPD Date:*') !!}
	                                        </div>
		                               </div>
		                               <div class="col-sm-3">
	                                       <div class="form-group">
	                                               {!! Form::text('opdDate', '', ['class' => 'form-control','id'=>'id-opddate','name'=>'opdDate','placeholder'=>'OPD date','readonly'=>'readonly']) !!}
	                                       </div>
		                               </div>
		                         </div>
		                         <div class="row">
		                              <div class="col-md-offset-3 col-sm-2">
	                                      <div class="form-group">
	                                              {!! Form::label('patientName', 'PatientName:*') !!}
	                                      </div>
		                              </div>
		                              <div class="col-sm-8">
	                                      <div class="form-group">
	                                              {!! Form::text('patientName', '', ['class' => 'form-control','name'=>'patientName','id'=>'patientName','readonly'=>'readonly','placeholder'=>'Enter Patient Name']) !!}
	                                      </div>
		                              </div>
		                         </div>
		                         <div class="row">
		                              <div class="col-md-offset-3 col-sm-2">
	                                      <div class="form-group">
	                                              {!! Form::label('ipdRegNum', 'IPD Number:*') !!}
	                                      </div>
		                              </div>
		                              <div class="col-sm-3">
	                                      <div class="form-group">
	                                              {!! Form::text('ipdRegNum', '', ['class' => 'form-control','id'=>'ipdRegNum','name'=>'ipdRegNum','placeholder'=>'IPD Registration number','readonly'=>'readonly']) !!}
	                                      </div>
		                              </div>
		                              <div class="col-md-offset-3 col-sm-2">
	                                      <div class="form-group">
	                                              {!! Form::label('ipdRegNUM', 'IPD Date:*') !!}
	                                      </div>
		                             </div>
		                             <div class="col-sm-3">
	                                     <div class="form-group">
	                                             {!! Form::text('ipdRegDate', '', ['class' => 'form-control','id'=>'ipdRegDate','name'=>'ipdDate','placeholder'=>'IPD date','readonly'=>'readonly']) !!}
	                                     </div>
		                             </div>
		                           </div>
		                           <div class="row">
		                                <div class="col-md-offset-3 col-sm-2">
	                                        <div class="form-group">
	                                                {!! Form::label('age', 'AGE:*') !!}
	                                        </div>
		                                </div>
		                                <div class="col-sm-3">
	                                        <div class="form-group">
	                                                {!! Form::text('age', '', ['class' => 'form-control','id'=>'age','name'=>'age','placeholder'=>'AGE','readonly'=>'readonly']) !!}
	                                        </div>
		                                </div>
		                                <div class="col-md-offset-3 col-sm-2">
	                                        <div class="form-group">
	                                                {!! Form::label('gender', 'GENDER:*') !!}
	                                        </div>
		                               </div>
		                               <div class="col-sm-3">
	                                       <div class="form-group">
	                                               {!! Form::text('gender', '', ['class' => 'form-control','id'=>'gender','name'=>'gender','placeholder'=>'GENDER','readonly'=>'readonly']) !!}
	                                       </div>
		                               </div>
		                             </div>
			                             <div class="row">
			                                  <div class="col-md-offset-3 col-sm-2">
			                                          <div class="form-group">
			                                                  {!! Form::label('address', 'Address:*') !!}
			                                          </div>
			                                  </div>
			                                  <div class="col-sm-8">
			                                          <div class="form-group">
			                                                  {!! Form::text('address', '', ['class' => 'form-control','id'=>'address','readonly'=>'readonly','placeholder'=>'Enter Address']) !!}
			                                          </div>
			                                  </div>
			                             </div>
			                             <div class="row">
			                                  <div class="col-md-offset-3 col-sm-2">
			                                          <div class="form-group">
			                                                  {!! Form::label('referby', 'ReferedBy:') !!}
			                                          </div>
			                                  </div>
			                                  <div class="col-sm-8">
			                                          <div class="form-group">
			                                                  {!! Form::text('referby', '', ['class' => 'form-control','id'=>'referby','readonly'=>'readonly','placeholder'=>'Enter Refered By']) !!}
			                                          </div>
			                                  </div>
			                             </div>
			                             <div class="row">
			                                  <div class="col-md-offset-3 col-sm-2">
			                                          <div class="form-group">
			                                                  {!! Form::label('otDate', 'Ot Date:*') !!}
			                                          </div>
			                                  </div>
			                                  <div class="col-sm-3">
			                                          <div class="form-group">
			                                                  {!! Form::date('otDate', '', ['class' => 'form-control','id'=>'otDate','name'=>'otDate']) !!}
			                                          </div>
			                                  </div>
			                             </div>
			                             <div class="row">
			                                  <div class="col-md-offset-3 col-sm-2">
			                                          <div class="form-group">
			                                                  {!! Form::label('dignosis', 'Diagnosis:*') !!}
			                                          </div>
			                                  </div>
			                                  <div class="col-sm-8">
			                                          <div class="form-group">
			                                                {!! Form::textarea('dignosis',null,['class'=>'form-control', 'id'=>'diagnosis','name'=>'diagnosis','rows' => 3, 'cols' => 40,'placeholder'=>'diagnosis']) !!}
			                                          </div>
			                                  </div>
			                             </div>
			                             <div class="row">
			                                  <div class="col-md-offset-3 col-sm-2">
			                                          <div class="form-group">
			                                                  {!! Form::label('otProcessure', 'OT Processure:*') !!}
			                                          </div>
			                                  </div>
			                                  <div class="col-sm-8">
			                                          <div class="form-group">
			                                                {!! Form::textarea('otProcessure',null,['class'=>'form-control', 'id'=>'otProcessure','name'=>'otProcessure','rows' => 3, 'cols' => 40,'placeholder'=>'otprocessre']) !!}
			                                          </div>
			                                  </div>
			                             </div>
			                             <div class="row">
			                                  <div class="col-md-offset-3 col-sm-2">
			                                          <div class="form-group">
			                                                  {!! Form::label('Consultant', 'Consultant:*') !!}
			                                          </div>
			                                  </div>
			                                  <div class="col-sm-8">
			                                          <div class="form-group">

			                                                {!! 
					                                               Form::select('consultant', $doctorList,'',
					                                            [
					                                                'class' => 'form-control',
					                                                'id'=>'consultant',
					                                                'placeholder' => '--Select Consultant Name--'
					                                            ])   
	                                            
	                                        				!!} 
			                                          </div>
			                                  </div>
			                              </div>
			                              <div class="row">
			                                      <div class="col-md-offset-3 col-sm-2">
			                                              <div class="form-group">
			                                                      {!! Form::label('otherConsultant', 'Other Consultant') !!}
			                                              </div>
			                                      </div>
			                                      <div class="col-sm-8">
			                                              <div class="form-group">
			                                                      {!! Form::text('otherConsultant', '', ['class' => 'form-control','id'=>'otherConsultant','name'=>'otherConsultant']) !!}
			                                              </div>
			                                      </div>
			                              </div>
			                              <div class="row">
			                                   <div class="col-md-offset-3 col-sm-2">
			                                           <div class="form-group">
			                                                   {!! Form::label('adviceTreatment', 'advice & Treatment:*') !!}
			                                           </div>
			                                   </div>
			                                   <div class="col-sm-8">
			                                           <div class="form-group">
			                                                 {!! Form::textarea('adviceTreatment',null,['class'=>'form-control', 'id'=>'adviceTreatment','name'=>'adviceTreatment','rows' => 3, 'cols' => 40,'placeholder'=>'adviceTreatment']) !!}
			                                           </div>
			                                   </div>
			                              </div>
			                              <div class="row">
			                                      <div class="col-md-offset-3 col-sm-2">
			                                              <div class="form-group">
			                                                      {!! Form::label('medicine1', 'Medicine<span class="badge badge-danger control-label">1</span>',[],false) !!}
			                                              </div>
			                                      </div>
			                                      <div class="col-sm-8">
			                                              <div class="form-group">

			                                                      {!! Form::select('medicine1',
			                                                      array(
			                                                          '' => '-- Select Medicine --',
			                                                          'Medicine' => 'Medicine',
			                                                          'Surgery' => 'Surgery',
			                                                          'Obs / Gyne' => 'Obs / Gyne',
			                                                          'Pediatric' => 'Pediatric',
			                                                          'Others' => 'Others',
			                                                          ),
			                                                          'S',
			                                                          ['class' => 'form-control','id'=>'medicine1','name'=>'medicine1'])
			                                                      !!}
			                                              </div>
			                                      </div>
			                                  </div>
			                                  <div class="row">
			                                          <div class="col-md-offset-3 col-sm-2">
			                                                  <div class="form-group">
			                                                          {!! Form::label('medicine2', 'Medicine<span class="badge badge-danger control-label">2</span>',[],false) !!}
			                                                  </div>
			                                          </div>
			                                          <div class="col-sm-8">
			                                                  <div class="form-group">

			                                                          {!! Form::select('medicine1',
			                                                          array(
			                                                              '' => '-- Select Medicine --',
			                                                              'Medicine' => 'Medicine',
			                                                              'Surgery' => 'Surgery',
			                                                              'Obs / Gyne' => 'Obs / Gyne',
			                                                              'Pediatric' => 'Pediatric',
			                                                              'Others' => 'Others',
			                                                              ),
			                                                              'S',
			                                                              ['class' => 'form-control','id'=>'medicine2','name'=>'medicine2'])
			                                                          !!}
			                                                  </div>
			                                          </div>
			                                      </div>
			                                      <div class="row">
			                                              <div class="col-md-offset-3 col-sm-2">
			                                                      <div class="form-group">
			                                                              {!! Form::label('medicine3', 'Medicine<span class="badge badge-danger control-label">3</span>',[],false) !!}
			                                                      </div>
			                                              </div>
			                                              <div class="col-sm-8">
			                                                      <div class="form-group">

			                                                              {!! Form::select('medicine1',
			                                                              array(
			                                                                  '' => '-- Select Medicine --',
			                                                                  'Medicine' => 'Medicine',
			                                                                  'Surgery' => 'Surgery',
			                                                                  'Obs / Gyne' => 'Obs / Gyne',
			                                                                  'Pediatric' => 'Pediatric',
			                                                                  'Others' => 'Others',
			                                                                  ),
			                                                                  'S',
			                                                                  ['class' => 'form-control','id'=>'medicine3','name'=>'medicine3'])
			                                                              !!}
			                                                      </div>
			                                              </div>
			                                          </div>
			                                          <div class="row">
			                                               <div class="col-md-offset-3 col-sm-2">
			                                                       <div class="form-group">
			                                                               {!! Form::label('Remark', 'Remark:*') !!}
			                                                       </div>
			                                               </div>
			                                               <div class="col-sm-8">
			                                                       <div class="form-group">
			                                                             {!! Form::textarea('Remark',null,['class'=>'form-control', 'id'=>'Remark','rows' => 3, 'cols' => 40,'placeholder'=>'Remark','name'=>'Remark']) !!}
			                                                       </div>
			                                               </div>
			                                          </div>
		                                              <center >    
		                                               	<button class="btn btn-success" type="submit" >Submit</button>
		                                                <button class="btn btn-danger" type="reset">Cancel</button>
		                                             </center>

		                                        {!! Form::close() !!}
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		            </div>
		@endsection
	<script  src="https://code.jquery.com/jquery-3.3.1.min.js"
	  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	  crossorigin="anonymous"></script>
	    @push('script')
	  <script type="text/javascript">
	        jQuery(document).ready(function(e){
	        jQuery('#id-opd-regnum').on('keyup',function(){ 
	         var opd= $(this).val();
	            $('#opd-reg-list').html("");
	            if(opd !='')
	            {
	                var _token = $('input[name="_token"]').val();
	                $.ajax({

	                    url:"{{ route('opd.regsearch') }}",
	                    method:"POST",
	                    data:{query:opd,_token:_token},
	                    success:function(data){
	                       $('#opd-reg-list').fadeIn();
	                       $('#opd-reg-list').html(data);
	                    }

	                });
	            }
	        });
	       
	    });
	        $(document).on('click', 'li', function(){  
	       $('#id-opd-regnum').val($(this).text()); 
	       var opd=$('#id-opd-regnum').val();
	        var _token = $('input[name="_token"]').val();
	        $.ajax({ 
	                    url:"{{ route('ot.value') }}",
	                    method:"POST",
	                    data:{query:opd,_token:_token},
	                    success:function(data){
	                     //var a=data.patientName;
	                     console.log(data);
	                    $('#id-opddate').val(data.regDate);
	                    $('#patientName').val(data.patientName);
	                    $('#consultant').val(data.consultant);
	                    $('#otherConsultant').val(data.otherConsultant);
	                    $('#age').val(data.age);
	                    $('#gender').val(data.gender);
	                    $('#referby').val(data.consultant);
	                    $('#ipdRegNum').val(data.ipdRegNum);
	                    $('#ipdRegDate').val(data.ipdRegDate);
	                    $('#address').val(data.address);
	                    


	                    }

	                });
	        $('#opd-reg-list').fadeOut();  
	    }); 

	         
	    


	        
	   </script>
	        
	    @endpush