@extends('layout.app')

@section('content')
<div class="app-content  my-3 my-md-5">
    <div class="side-app">
        <div class="page-header">
            <h5 class="page-title">PATIENT HISTORY</h5>
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="{{ route('dashborad') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                   Patient History
                </li>
            </ol>
        </div>
        @include('layout.error')
    	 <div class="col-lg-12">
          <div class="row">
              <div class="col-md-12">
                  <div class="card">
                      <div class="card-header">
                           <div class="col-md-12">
                             <span class="pull-right" style="margin-right: 5px;">
                              <a href="javascript:;" class="btn btn-info btn-xs" onclick="printDiv('PATIENT HISTORY LIST','patientHistory')"> <i class="fa fa-print"></i> PRINT </a>
                            </span>
                          </div>
                      </div>
                      <div class="card-body">
                        <div class="table-responsive">
                  		  <table id="patientHistory" class="table table-striped table-bordered w-100" >
                  		    <thead>
                  		        <tr>
                  		            <th>#</th>
                  		            <th>Name</th>
                  		            <th>Reg no.</th>
                  		            <th>Reg Date</th>
                  		            <th>Address</th>
                  		            <th>Gender</th>
                  		            <th class="noPrint">Action</th>
                                </tr>       
                  		    </thead>
                  		  </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="patienthistory-view" tabindex="-1" role="dialog" aria-labelledby="largemodal" aria-hidden="true">
         <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div id="patienthistory-div"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                   
                </div>
            </div>
        </div>
      </div>
      <div class="container">
                <div id="ipdTreatmentEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                
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
                          
@endsection
@push('script')
<script type="text/javascript">
$(document).ready(function() {
    oTable = $('#patientHistory').DataTable({
        "lengthMenu": [[100, 250, 500, 1000], [100, 250, 500, 1000]],
        processing: true,
        serverSide: true,
        bDestroy: true,
        ajax: "{{ route('AllPatientData') }}",
        dom: 'Blfrtip',
      buttons: [
          { extend: 'print', className: 'btn green btn-outline'},
      ],
        columns: [
            {data: 'sn', name: 'sn'},
            {data: 'patientName', name: 'patientName'},
            {data: 'regNum', name: 'regNum'},
            {data: 'regDate', name: 'regDate'},
            {data: 'address', name: 'address'},
            {data: 'gender', name: 'gender'},
            {data: 'action', name: 'action',className:'noPrint'},
            
            
        ]
    });
});
    var obj = {
        patientHistoryView:function(data){
          $.ajax({
            url : data.action,
            type:"POST",
            data: data,
            success:function(res){
              if(res.status == true){
                $(data.target).html(res.html);
                $(data.modal).modal("show");

              }else{

              }
            }
          });
        }, 
         IpdTreatmentEdit:function(data){
                $.ajax({
                    url: data.action,
                    type: 'get',
                    data: data,
                    success:function(res){
                        if(res.status==true){
                            $("#id-ipd-addtreatment").modal("hide");
                            $("#patienthistory-view").modal("hide");
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
           IpdTreatmentDelete:function(data){
                $.ajax({
                    url: data.action,
                    type: 'DELETE',
                    data: data,
                    success:function(res){
                        if(res.status==true){
                             $('#patienthistory-view').modal("hide");
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
                           $('#ipdTreatmentEdit').modal("hide");
                           $('#id-ipdview').modal("hide");
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

         }    
    

    $(document).on('click','.patienthistory-view',function(){

          var id = $(this).data('id');
          var _token = $("input[name='_token']").val();
          var action = '{{ route('patient.history.view') }}';
           // var data = {treatment_id:treatment_id,_token:_token,target:'#patientdiv',modal:'#viewModal',action:action};
          var data = {id:id,_token:_token,target:"#patienthistory-div",modal:"#patienthistory-view",action:action,};
          obj.patientHistoryView(data);
    });
    $(document).on('click','.updatePatientTreatment',function() {
                var _token=$("input[name='_token']").val();
                var id = $(this).data('id');
                var action='{{ url('hms/ipd-treatment/edit') }}'+'/'+id;
                var data={action:action,target:'#ipdtreatment-edit',modal:'#ipdTreatmentEdit'};
                obj.IpdTreatmentEdit(data);
            });
    $(document).on('click','.updatePatientTreatment',function() {
                var _token=$("input[name='_token']").val();
                var id = $(this).data('id');
                var action='{{ url('hms/ipd-treatment/edit') }}'+'/'+id;
                var data={action:action,target:'#ipdtreatment-edit',modal:'#ipdTreatmentEdit'};
                obj.IpdTreatmentEdit(data);
            });

    $(document).on('click','.delete',function() {
        var id = $(this).data('id');
        var _token=$("input[name='_token']").val();
        var action='{{  url('hms/ipd-treatment/destroy') }}'+'/'+id;
        var data={_token:_token,action:action};
        obj.IpdTreatmentDelete(data);
    });
    $(document).on('click','#ipd-edittreatment',function() {
            var patientId=$('#patientId').val();
            var ipdId=$('#ipdId').val();
            var id=$('#id').val();
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
            var action = '{{ url('hms/ipd-treatment/update') }}'+'/'+id;
            var data = {
                            patientId:patientId,treatment_date:treatment_date,complaint:complaint,treatment:treatment,
                            medicine:medicine,potency:potency,nod:nod,advice:advice,remark:remark,consultant:consultant,
                            ipdId:ipdId,consultant:consultant,refTo:myCheckboxes, _token:_token,action:action
                       };
            obj.ipdTreatmentUpdate(data);
        });

</script>
@endpush