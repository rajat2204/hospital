@extends('layout.app') @section('content')
<div class="app-content  my-3 my-md-5">
    <div class="side-app">
        <div class="page-header">
            <h5 class="page-title">STOOL EXAMINTION PATIENT DETAILS</h5>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashborad') }}">Home</a></li>
                    <li class="breadcrumb-item " aria-current="page">
                        <a href="javascript:void(0);">Test Report</a>
                    </li>
                     <li class="breadcrumb-item " aria-current="page">Stool Examination</li>
                </ol>
        </div>
       @include('layout.error')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="col-md-12">
                        {{-- <div class="col-md-4 col-sm-4 pull-left" >
                            <h6 class="card-title btn btn-pill btn-info">BLOOD EXAMINATION TEST LIST</h6>
                            </div> --}}
                            <span class="pull-right" style="margin-right: 5px;">
                                <a href="{{ route('general-blood.index') }}">
                                    <p class=" btn btn-success btn-xs">
                                        <i class="fa fa-plus"></i>  ADD STOOL EXAMINATION 
                                    </p>
                                </a>
                            </span>
                            <span class="pull-right" style="margin-right: 5px;">
                                  <a href="javascript:;" class="btn btn-info btn-xs" onclick="printDiv('STOOL EXAMINATION - PATIENTS LIST','stoolexamTable')"> <i class="fa fa-print"></i> PRINT </a>
                            </span>
                         </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="stoolexamTable" class=" table table-bordered table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Reg no.</th>
                                    <th>Reg Date</th>
                                    <th>Reffered By</th>
                                    <th>Age</th>
                                    <th>Investigation Adviced</th>
                                    <th>Test Date</th>
                                    <th class="noPrint">Action</th>
                                </tr>
                            </thead>
                        </table>
                        </div>
                    </div>
                    <div class="container">
                        <div  id="id-stoolexamView" class="modal fade" tabindex="-1" role="dialog"aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div id="stoolexamView"></div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal"aria-hidden="true" >
                                            Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

     
@endsection @push('script')


<script type="text/javascript">
    $(document).ready(function() {
        oTable = $('#stoolexamTable').DataTable({

            "lengthMenu": [[100, 250, 500, 1000], [100, 250, 500, 1000]],

            processing: true,
            serverSide: true,
            bDestroy: true,
            ajax: "{{ route('stoolexam.filterData') }}",
            dom: 'Blfrtip',
          buttons: [
              { extend: 'print', className: 'btn green btn-outline'},
          ],
            columns: [
                {data: 'sn', name: 'sn'},
                {data: 'patientName', name: 'patientName'},
                {data: 'patientId', name: 'patientId'},
                {data: 'regDate', name: 'regDate'},
                {data: 'referredBy', name: 'referredBy'},
                {data: 'age', name: 'age'},
                {data: 'investigationAdvised', name: 'investigationAdvised'},
                {data: 'date', name: 'date'},
                {data: 'action', name: 'action',className:'noPrint'},


            ]
        });
    });
    var obj = {
     	stoolexamView:function(data){
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
       stoolexamDelete:function(data){
            $.ajax({
                url: data.action,
                type: 'DELETE',
                data: data,
                success:function(res){
                    if(res.status==true){
                         $('#stoolexamTable').DataTable().ajax.reload();
                         swal({
                            title:"Delete",
                            text: "Data Delete Successfully !!",
                            type:"success",
                            timer: 2000,
                         });
                    }
                }
            })
        },
       }
       jQuery(document).ready(function() {
        	 jQuery(document).on('click','.stoolexamView',function() {
    		    var id = $(this).data('id');
    		    var _token = $("input[name='_token']").val();
    		    var action = '{{ route('stoolexam.reportView') }}';
    		    var data = {id:id,_token:_token,target:'#stoolexamView',modal:'#id-stoolexamView',action:action};
    		    obj.stoolexamView(data);
    		});
        });

        $(document).on('click','.stoolexamDelete',function(){
            if(!confirm('Are you sure want to Delete?')) {
                              return  false;   
                    }       
                    var del = true; 
                     if(del == true) {
                    var id = $(this).data('id');
                    var _token=$("input[name='_token']").val();
                    var action='{{  url('hms/test-report/stool-examination') }}'+'/'+id;
                    var data={_token:_token,action:action};
                    obj.stoolexamDelete(data);
             }
        });
</script>
@endpush

