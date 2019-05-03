@extends('layout.app') 
@section('content')
   <div class="page">
         <div class="app-content  my-3 my-md-5">
            <div class="side-app">
                <div class="page-header">
                    <h4 class="page-title">IPD PATIENT DETAILS</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashborad') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                           Ipd Patient
                        </li>
                    </ol>
                </div>
              @include('layout.error')
            <div class="card">
                <div class="card-header">
                    <div class="col-md-12">
                       <span class="pull-right" style="margin-right: 5px;">
                            <a href="{{ route('ipd.index') }}">
                                <p class="btn btn-success btn-xs">
                                    <i class="fa fa-plus"></i>  ADD PATIENT 
                                </p>
                            </a>
                        </span>
                        <span class="pull-right" style="margin-right: 5px;">
                              <a href="javascript:;" class=" btn btn-info btn-xs" onclick="printDiv('IPD - PATIENTS LIST','ipd')"> <i class="fa fa-print"></i> PRINT </a>
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="table-responsive" id="ipd-table">
                            <table id="ipd" class="table table-striped table-bordered w-100" width="100%">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>opd no.</th>
                                        <th>ipd no.</th>
                                        <th>ipd Date</th>
                                        <th>ward no.</th>
                                        <th>bed no.</th>
                                        <th>Consultant</th>
                                        <th class="noPrint">Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{-- ========================modal========= --}}
            <div class="container">
                <div id="id-ipdview" class="modal fade"tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-body"><div id="ipdDiv"></div></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal -->
            <div class="container">
                <div id="id-ipd-discharge" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-body">
                                <div id="ipd-discharge"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal -->
            <div class="container">
                <div id="id-ipd-addtreatment" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content" >
                            <div class="modal-body">
                                <div id="ipd-addtreatment"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal -->
            <div class="container">
                <div id="edit-ipd-treatment" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-body">
                                <div id="ipdtreatment-edit"></div>
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
<script>
        $(document).ready(function() {
            oTable = $('#ipd').DataTable({
                "lengthMenu": [[100, 250, 500, 1000], [100, 250, 500, 1000]],

                processing: true,
                serverSide: true,
                bDestroy: true,
                ajax: "{{ route('ipdFilter.data') }}",
              //   dom: 'Blfrtip',
              // buttons: [
              //     { extend: 'print', className: 'btn green btn-outline'},
              // ],
                columns: [
                    {data: 'sn', name: 'sn'},
                    {data: 'fullname', name: 'fullname'},
                    {data: 'RegNum', name: 'RegNum'},
                    {data: 'ipdRegNum', name: 'ipdRegNum'},
                    {data: 'ipdRegDate', name: 'ipdRegDate'},
                    {data: 'wardName', name: 'wardName'},
                    {data: 'bedNum', name: 'bedNum'},
                    {data: 'consultant', name: 'consultant'},
                    {data: 'action', name: 'action',className:'noPrint'},
                ]
            });
        });
         var obj = {
         	ipdView:function(data){
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
            ipdDischarge:function(data){
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
             ipdAddTreatment:function(data){
                $.ajax({
                    url: data.action,
                    type:"get",
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
            ipdAddTreatmentStore:function(data) {
                $.ajax({
                    url:data.action,
                    type:'POST',
                    data:data,
                    success:function(res) {
                        if(res.status==true) {
                         $("#id-ipd-addtreatment").modal("hide");
                         swal({
                                    title:"Done",
                                    text: "Data Save Successfully !!",
                                    type:"success",
                                    timer: 2000,
                             });
                        }if(res.status==false) {
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
             ipdTreatmentUpdate:function(data) {
                $.ajax({
                    url:data.action,
                    type:'PUT',
                    data:data,
                    success:function(res){
                        if(res.status==true){                       
                              swal({
                                    title:"Done",
                                    text: "Data Updated Successfully !!",
                                    type:"success",
                                    timer: 2000,
                             });
                           $('#edit-ipd-treatment').modal("hide");
                           $('#id-ipdview').modal("hide");
                        }
                         if(res.status==false) {
                                 $('.error').text("");

                                jQuery.each(res.errors, function(i, v) {
                               // console.log('.'+index);
                                  if ($('div').find('.'+i)) {
                                     $('.'+i).text(v[0]);
                                    }
                            });
                        }

                    }
                });
            },
            IpdTreatmentEdit:function(data) { 
                $.ajax({
                    url: data.action,
                    type: 'get',
                    data: data,
                    success:function(res){
                        if(res.status==true){
                            $("#id-ipd-addtreatment").modal("hide");
                            $("#id-ipdview").modal("hide");
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
            IpdDelete:function(data){
                $.ajax({
                    url: data.action,
                    type: 'post',
                    data: data,
                    success:function(res){
                        if(res.status==true) {
                             $('#ipd').DataTable().ajax.reload();
                            swal({
                                    title:"Done",
                                    text: "Data Deleted Successfully !!",
                                    type:"warning",
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
             IpdTreatmentDelete:function(data){
                $.ajax({
                    url: data.action,
                    type: 'DELETE',
                    data: data,
                    success:function(res){
                        if(res.status==true){
                             $('#id-ipdview').modal("hide");
                            swal({
                                    title:"Done",
                                    text: "Data Deleted Successfully !!",
                                    type:"warning",
                                    timer: 2000,
                             });
                        }
                    }
                })
            },
         }
            jQuery(document).ready(function() {
            	 jQuery(document).on('click','.ipdView',function() {
        		    var id = $(this).data('id');
        		    var _token = $("input[name='_token']").val();
        		    var action = '{{url('hms/ipd-view') }}';
        		    var data = {id:id,_token:_token,target:'#ipdDiv',modal:'#id-ipdview',action:action};
        		    obj.ipdView(data);
        		});
            });
            jQuery(document).ready(function() {
            	 jQuery(document).on('click','.ipdDischarge',function() {
        		    var id = $(this).data('id');
        		    var _token = $("input[name='_token']").val();
        		    var action = '{{route('ipdDischarge') }}';
        		    var data = {id:id,_token:_token,target:'#ipd-discharge',modal:'#id-ipd-discharge',action:action};
        		    obj.ipdDischarge(data);
        		});
            });
            jQuery(document).ready(function() {
            	 jQuery(document).on('click','.ipd-addtreatment',function() {
        		    var id = $(this).data('id');
        		    //var _token = $("input[name='_token']").val();
        		    var action = '{{route('ipd-treatment.index') }}';
        		    var data = {id:id,target:'#ipd-addtreatment',modal:'#id-ipd-addtreatment',action:action};
        		    obj.ipdAddTreatment(data);
        		});
            });

          $(document).on('click','#ipd-treatment',function() {
            var patientId=$('#patientId').val();
            var ipdId=$('#ipdId').val();
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

            var action = '{{ route('ipd-treatment.store') }}';
            var data = {
                            patientId:patientId,treatment_date:treatment_date,complaint:complaint,treatment:treatment,
                            medicine:medicine,potency:potency,nod:nod,advice:advice,remark:remark,consultant:consultant,
                            ipdId:ipdId,consultant:consultant,refTo:myCheckboxes, _token:_token,action:action
                       };
            obj.ipdAddTreatmentStore(data);
        });
         $(document).on('click','#ipd-edittreatment',function() {debugger

            var editpatientId=$('#patientId').val();
            var editipdId=$('#ipdId').val();
            var id=$('#edit-id').val();
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
            var action = '{{ url('hms/ipd-treatment/update') }}'+'/'+id;
            var data = {
                            patientId:editpatientId,treatment_date:edittreatment_date,complaint:editcomplaint,treatment:edittreatment,
                            medicine:editmedicine,potency:editpotency,nod:editnod,advice:editadvice,remark:editremark,consultant:editconsultant,
                            ipdId:editipdId,consultant:editconsultant,refTo:editmyCheckboxes, _token:_token,action:action
                       };
            obj.ipdTreatmentUpdate(data);
        });
           $(document).on('click','.updatePatientTreatment',function() {
                var _token=$("input[name='_token']").val();
                var id = $(this).data('id');
                var action='{{ url('hms/ipd-treatment/edit') }}'+'/'+id;
                var data={action:action,target:'#ipdtreatment-edit',modal:'#edit-ipd-treatment'};
                obj.IpdTreatmentEdit(data);
            });

            $(document).on('click','.delete',function() {
                var id = $(this).data('id');
                var _token=$("input[name='_token']").val();
                var action='{{  url('hms/ipd-treatment/destroy') }}'+'/'+id;
                var data={_token:_token,action:action};
                obj.IpdTreatmentDelete(data);
            });

            $(document).on('keypress','#nod',function (event) { 
                    var keycode = event.which;   
                    if (!(event.shiftKey == false && 
                        (keycode == 46 || keycode == 8 || keycode == 37 ||
                         keycode == 37 || keycode == 39 
                        || (keycode >= 48 && keycode <= 57)))) 
                        { event.preventDefault(); }
                });
            $(document).on('click','.ipd-delete',function(){
                if(!confirm('Are you sure delete?')) {    
                             
                              return  false;   
                    }       
                    var del = true; 
                     if(del == true) {

                        var id = $(this).data('id');
                        var _token=$("input[name='_token']").val();
                        var action='{{ route('ipd.delete') }}';
                        var data={id:id,_token:_token,action:action};
                        obj.IpdDelete(data);
                  }    
                
            });
    </script>
    @endpush
