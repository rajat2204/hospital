    @extends('layout.app')
    
    @section('content')
    <div class="app-content  my-3 my-md-5">
        <div class="side-app">
            <div class="page-header">
                <h5 class="page-title">OPD PATIENT LIST</h5>
                <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="{{ route('dashborad') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="{{ route('opd.index') }}">Opd Registration</a>
                 
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Opd Filter
                </li>
            </ol>
            </div>
             @include('layout.error')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <p class="card-title"> OPD - FILTER DATA</p>
                        </div>
                            <div class="card-body">
                                    {!! Form::open(array('id'=>'opd-filter-form'))!!}
                                    <div class="row">
                                        <div class="col-lg-1">
                                            <div class="form-group">
                                                {!! Form::label('from', 'From:') !!}
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                {!! Form::date('fromDate','',
                                                ['class' =>
                                                'form-control','id'=>'fromDate','required'=>true])
                                                !!}
                                            </div>
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="form-group">
                                                {!! Form::label('to', 'To:') !!}
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                {!! Form::date('toDate','', ['class'
                                                =>
                                                'form-control','id'=>'toDate','required'=>true])
                                                !!}
                                            </div>
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="form-group">
                                                {!! Form::label('gender', 'Gender:')
                                                !!}
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                {!! Form::select('gender', 
                                                    array( 
                                                        ''=> '-Select Gender-', 
                                                        'Male Adult' =>'Male Adult',
                                                        'Female Adult' =>'Female Adult',
                                                        'Male Child' =>'Male Child',
                                                        'Female Child' =>'Female Child', ), '',
                                                        ['class' =>'form-control','id'=>'gender'])
                                                     !!}
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <center>
                                                <div class="form-group">
                                                    {!! Form::button('Submit', ['class'=> 'btn btn-info','id'=>'id-opdfilter']) !!}
                                                    {!! Form::reset('Cancel', ['class' => 'btn btn-danger','id'=>'id-opdfilter']) !!}
                                                </div>
                                            </center>
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                            </div>
                            <div class="error hide" id="id-error"> <h6><p class="text-center">Both Field Required</p></h6> </div>
                       
                    </div>
                </div>
            </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="col-md-12">
                                        <span class="pull-left">
                                            <strong>PATIENTS LIST</strong>
                                        </span>
                                   
                                    <span class="pull-right" style="margin-right: 5px;">
                                         <a href="{{ route('opd.index') }}">
                                            <p class="btn btn-success btn-xs">
                                                <i class="fa fa-plus"></i>  ADD PATIENT 
                                            </p>
                                        </a>
                                    </span>
                                    <span class="pull-right" style="margin-right: 5px;">
                                          <a href="javascript:;" class=" btn btn-info btn-xs" onclick="printDiv('OPD - PATIENTS LIST','myTable')"> <i class="fa fa-print"></i> PRINT </a>
                                    </span>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table card-table table-vcenter text-nowrap w-100" id="myTable">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th class="wd-15p">Patient Name</th>
                                                    <th class="wd-15p">Reg.No</th>
                                                    <th class="wd-15p">Date</th>
                                                    <th class="wd-15p">Address</th>
                                                    <th class="wd-15p">Gender</th>
                                                    <th class="wd-15p">Consultant</th>
                                                    <th class="wd-15p noPrint">Action</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
          
            <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="largemodal" aria-hidden="true">
                <div class="modal-dialog modal-lg " role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div id="patientdiv"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                           
                        </div>
                    </div>
                </div>
            </div>
           
            <div class="modal fade" id="addPatientModal" tabindex="-1" role="dialog" aria-labelledby="largemodal" aria-hidden="true">
                <div class="modal-dialog modal-lg " role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div id="add-patientdiv"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="OpdTreatmentEdit" tabindex="-1" role="dialog" aria-labelledby="largemodal" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div id="opdtreatment-edit"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection 
    @push('script')
   
    <script type="text/javascript">
        $(function() {
            $('#id-error').hide();
            var _token = $("input[name='_token']").val();
            var fromDate=jQuery('#fromDate').val();
            var  toDate= jQuery('#toDate').val();
            var  gender=jQuery('#gender').val();
            $('#myTable').DataTable({
                     "lengthMenu": [[100, 250, 500, 1000], [100, 250, 500, 1000]],

                    processing: true,
                    serverSide: true,
                    bDestroy: true,

                    ajax: { url:'{!! route('opd.allPatient') !!}'},

                    // dom: 'Blfrtip',
                    // buttons: [
                    //    'print'
                    // ],

                    columns: [
                        { data: 'id', data: 'id' },
                        { data: 'patientName', name: 'patientName' },
                        { data: 'regNum', name: 'regNum' },
                        { data: 'regDate', name: 'regDate' },
                        { data: 'address', name: 'address' },
                        { data: 'gender', name: 'gender' },
                        { data: 'consultant', name: 'consultant' },
                        { data:'action',name:'action',className:'noPrint'},

                    ],
                });
            jQuery('#id-opdfilter').click(function(e) {
                    $('#id-error').hide();
                    var fromDate=jQuery('#fromDate').val();
                    var  toDate= jQuery('#toDate').val();
                    var  gender=jQuery('#gender').val();
                if(fromDate != '' && toDate !='') {
                       e.preventDefault();
                       var _token = $("input[name='_token']").val();
                        $('#myTable').DataTable({
                            "lengthMenu": [[100, 250, 500, 1000], [100, 250, 500, 1000]],

                            processing: true,
                            serverSide: true,
                            bDestroy: true,

                            ajax: {   url: "{{ route('filter.search') }}",
                                     type: "POST",
                                     data:{fromDate: jQuery('#fromDate').val(),
                                     toDate: jQuery('#toDate').val(),
                                     gender: jQuery('#gender').val(),
                                     _token:_token},  },

                            dom: 'Blfrtip',
                          buttons: [
                               'print'
                          ],

                    columns: [
                        { data: 'id', data: 'id' },
                        { data: 'patientName', name: 'patientName' },
                        { data: 'regNum', name: 'regNum' },
                        { data: 'regDate', name: 'regDate' },
                        { data: 'address', name: 'address' },
                        { data: 'gender', name: 'gender' },
                        { data: 'consultant', name: 'consultant' },
                        { data:'action',name:'action',className:'noPrint'},

                    ],
                });
            }else{
                     $('#id-error').show();
            }
        });
    });

        // =================================== for loading the patient view========================


        $(document).on('click','.opdview',function() {
            var order_id = $(this).data('order_id');
            var _token = $("input[name='_token']").val();
            var action = '{{ url('hms/opd-view') }}';
            var data = {order_id:order_id,_token:_token,target:'#patientdiv',modal:'#viewModal',action:action};
            obj.OpdView(data );
        });

        var obj = {
            OpdAdd:function(data){
                $.ajax({
                    url: data.action,
                    type:"POST",
                    data: data,
                    success:function(r){
                        //o = JSON.parse(r);
                        if(r.status == true) {
                            $(data.target).html(r.html);
                            $(data.modal).modal("show");
                        }
                    }
                });
            },
             OpdAddTreatment:function(data){
                $.ajax({
                    url:data.action,
                    type:'POST',
                    data:data,
                    success:function(res) {
                        if(res.staus==true) {
                         $("#addPatientModal").modal("hide");
                         swal({
                            title:"Done",
                            text: "Data Save Successfully !!",
                            type:"success",
                            timer: 2000,
                         });
                        }
                        else if(res.status==false) {
                             $('.error').text("");
                            jQuery.each(res.error, function(index, val) {
                           // console.log('.'+index);
                              if ($('div').find('.'+index )) {
                                        $('.'+index).text(val[0]);
                                        
                                    }
                            });
                        }
                    }
                });
            },
            OpdView:function(data) {
                $.ajax({
                    url: data.action,
                    type:"POST",
                    data: data,
                    success:function(r){
                        if(r.status == true) {
                            $(data.target).html(r.html);
                            $(data.modal).modal("show");
                        }
                    }
                });
            },
            OpdTreatmentDelete:function(data){
                $.ajax({
                    url: data.action,
                    type:"POST",
                    data: data,
                    success:function(r){

                        if(r.status == true){
                          $("#viewModal").modal("hide");
                           swal({
                            title:"Done",
                            text: "Data Delete Successfully !!",
                            type:"success",
                            timer: 2000,
                         });
                        }
                    }
                });
            },
            OpdTreatmentEdit:function(data){
                $.ajax({
                    url: data.action,
                    type: 'POST',
                    data: data,
                    success:function(res){
                        if(res.status==true){
                            $("#viewModal").modal("hide");
                            $(data.target).html(res.html);
                                $(".check").each(function() {
                                    for (var i = 0; i < res.data.length; i++) {
                                   if($(this).val() == res.data[i]){
                                    console.log(res.data[i],$(this).val());
                                    $('input[type=checkbox][value="'+res.data[i]+'"]').prop("checked",true);
                                   }
                                }
                            });

                            $(data.modal).modal("show");
                        }else{

                        }
                    }
                })
            },
            OpdTreatmentUpdate:function(data){
                $.ajax({
                    url:data.action,
                    type:'PUT',
                    data:data,
                    success:function(res){
                        if(res.status==true) {
                           $('#viewModal').modal("hide");
                           $('#OpdTreatmentEdit').modal("hide");
                            swal({
                                title:"Done",
                                text: "Data Update Successfully !!",
                                type:"success",
                                timer: 2000,
                            });
                        }
                           else if(res.status==false) {
                             $('.error').text("");
                            jQuery.each(res.error, function(index, val) {
                           // console.log('.'+index);
                              if ($('div').find('.'+index )) {
                                        $('.'+index).text(val[0]);
                                        
                                    }
                            });
                        }
                   

                    }
                });
            },
            OpdDelete:function(data){
                $.ajax({
                    url: data.action,
                    type: 'POST',
                    data: data,
                    success:function(res) {
                        if(res.status==true) {
                            $('#myTable').DataTable().ajax.reload();
                            swal({
                            title:"Delete",
                            text: "Data Delete Successfully !!",
                            type:"success",
                            timer: 2000,
                         });

                        }else {
                               swal({
                                title:"Data Is In Used",
                                text: "Patient Info Not  Delete Successfully !!",
                                type:"warning",
                                timer: 2000,
                             });
                        }
                    }
                })


            },

        }

            $(document).on('click','.addpatient',function() {
                var order_id = $(this).data('order_id');
                var _token = $("input[name='_token']").val();
                var action = '{{ route('opd.opdAddTreatment') }}';
                var data = {order_id:order_id,_token:_token,target:'#add-patientdiv',modal:'#addPatientModal',action:action};
                obj.OpdAdd(data );
            });


            $(document).on('click','.delete',function() {
                if(!confirm('Are you sure want to Delete?')) {    
                             
                              return  false;   
                    }       
                    var del = true; 
                     if(del == true) {
                   var _token = $("input[name='_token']").val();
                   var id = $(this).data('id');
                   var action ='{{ route('opdtreatment.delete') }}';
                   var data = {id:id,_token:_token,action:action};
                   obj.OpdTreatmentDelete(data);
               }  
            });

            $(document).on('click','.updatePatientTreatment',function(){
                var _token=$("input[name='_token']").val();
                var id = $(this).data('id');
                var action='{{ route('opdtreatment.edit') }}';
                var data={id:id,_token:_token,action:action,target:'#opdtreatment-edit',modal:'#OpdTreatmentEdit'};
                obj.OpdTreatmentEdit(data);
            });
            $(document).on('click','.opd-delete',function(){
                if(!confirm('Are you sure want to Delete?')) {    
                             
                              return  false;   
                    }       
                    var del = true; 
                     if(del == true) {

                        var order_id = $(this).data('order_id');
                        var _token=$("input[name='_token']").val();
                        var action='{{ route('opd.delete') }}';
                        var data={order_id:order_id,_token:_token,action:action};
                        obj.OpdDelete(data);
                  }    
                
            });

            $(document).on('click','#edit-opd-treatment',function() {debugger
                var id=$('#edit-id').val();
                var editpatientId=$('#patientId').val();
                var editcomplaint=$('#edit-complaint').val();
                var edittreatment_date=$('#edit-treatment_date').val();
                var edittreatment=$('#edit-treatment').val();
                var editmedicine=$('#edit-medicine').val();
                var editpotency=$('#edit-potency').val();
                var editnod=$('#edit-nod').val();
                var editadvice = $("#edit-advice").val();

                var editremark=$('#edit-remark').val();
                var editconsultant=$('#edit-consultant').val();
                var editmyCheckboxes = new Array();
                $("input:checked").each(function() {
                   editmyCheckboxes.push($(this).val());
                });
                var _token = $("input[name='_token']").val();

                var action = '{{ url('hms/opd-treatment/update') }}'+'/'+id;
                var data = {
                                patientId:editpatientId,treatment_date:edittreatment_date,complaint:editcomplaint,treatment:edittreatment,medicine:editmedicine,potency:editpotency,nod:editnod,
                                advice:editadvice,
                                remark:editremark,consultant:editconsultant,refTo:editmyCheckboxes, _token:_token,action:action
                            };

                obj.OpdTreatmentUpdate(data);
            });
            $(document).on('click','#opd-treatment',function() {
                 var patientId=$('#patientId').val();
               
                var complaint=$('#id-complaint').val();
                var treatment_date=$('#treatment_date').val();
                var treatment=$('#treatment').val();
                var medicine=$('#medicine').val();
                var potency=$('#potency').val();
                var nod=$('#nod').val();
                var advice = $("#advice").val();
                var remark=$('#remark').val();
                var consultant=$('#consultant').val();
                var myCheckboxes = new Array();
                $("input:checked").each(function() {
                   myCheckboxes.push($(this).val());
                });
                

                var _token = $("input[name='_token']").val();

                var action = '{{ route('opd-treatment.store') }}';
                var data = {
                                patientId:patientId,treatment_date:treatment_date,complaint:complaint,treatment:treatment,medicine:medicine,potency:potency,nod:nod,
                                advice:advice,
                                remark:remark,consultant:consultant,consultant:consultant,refTo:myCheckboxes, _token:_token,action:action
                            };
                obj.OpdAddTreatment(data);
            });

            $(document).ready(function(){
              $('[data-toggle="tooltip"]').tooltip();   


            });


///for only numeric entry
$(document).on('keypress','#nod',function (event) { 
                    var keycode = event.which;   
                    if (!(event.shiftKey == false && 
                        (keycode == 46 || keycode == 8 || keycode == 37 ||
                         keycode == 37 || keycode == 39 
                        || (keycode >= 48 && keycode <= 57)))) 
                        { event.preventDefault(); }
                });

    </script>

    @endpush
