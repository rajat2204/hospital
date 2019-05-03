@extends('layout.app') @section('content')
<div class="app-content  my-3 my-md-5">
    <div class="side-app">
        <div class="page-header">
               <h5 class="page-title">OT-PATIENT LIST</h5>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                   OT-PATIENT LIST
                </li>
            </ol>
        </div>
        @include('layout.error')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                    <div class="col-md-12">
                       {{--  <span class="col-md-4 col-sm-4 pull-left">
                              <strong>  OT PATIENTS LIST</strong>
                        </span> --}}
                       <span class="pull-right" style="margin-right: 5px;">
                            <a href="{{ route('ot.index') }}">
                                <p class="btn btn-success btn-xs">
                                    <i class="fa fa-plus"></i>  ADD PATIENT 
                                </p>
                            </a>
                        </span>
                        <span class="pull-right" style="margin-right: 5px;">
                              <a href="javascript:;" class="btn btn-info btn-xs" onclick="printDiv('OT - PATIENTS LIST','otTable')"> <i class="fa fa-print"></i> PRINT </a>
                        </span>
                    </div>
                </div>
                    <div class="card-body">
                       <div class="table-responsive">
                            <table id="otTable"class="table table-striped table-bordered w-100">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Reg no.</th>
                                    <th>Reg Date</th>
                                    <th>Ot Date</th>
                                    <th>Consultant</th>
                                    <th class="noPrint">Action</th>
                                </tr>
                            </thead>
                        </table>
                       </div>
                    </div>
                </div>
            </div>
        </div>
        <div  id="id-otview" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largemodal"  aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div id="ot"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection 
@push('script')
<script type="text/javascript">
    $(document).ready(function() {
        oTable = $('#otTable').DataTable({
            "lengthMenu": [[100, 250, 500, 1000], [100, 250, 500, 1000]],
            processing: true,
            serverSide: true,
            bDestroy: true,
            ajax: "{{ route('otFilter.data') }}",
            dom: 'Blfrtip',
          buttons: [
              { extend: 'print', className: 'btn green btn-outline'},
          ],
            columns: [
                {data: 'sn', name: 'sn'},
                {data: 'patientName', name: 'patientName'},
                {data: 'patientId', name: 'patientId'},
                {data: 'opdDate', name: 'opdDate'},
                {data: 'otDate', name: 'otDate'},
                {data: 'consultant', name: 'consultant'},
                {data: 'action', name: 'action',className:'noPrint'},
            ]
        });
    });
    var obj = {
     	otView:function(data){
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
    }
    jQuery(document).ready(function() {
    	jQuery(document).on('click','.otView',function() {
		    var id = $(this).data('id');
		    var _token = $("input[name='_token']").val();
		    var action = '{{url('hms/ot-view') }}';
		    var data = {id:id,_token:_token,target:'#ot',modal:'#id-otview',action:action};
		    obj.otView(data);
		});
    });
    $(document).ready(function(){
          $('[data-toggle="tooltip"]').tooltip();   
        });
</script>
@endpush
