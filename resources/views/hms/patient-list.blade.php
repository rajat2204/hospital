@extends('layout.app')

@section('content')
<div class="app-content  my-3 my-md-5">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title"></h4>
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
                                    <div class="col-md-6 col-sm-6 pull-left">
                                        <p class="card-title btn btn-pill btn-info">
                                           OPD - NEW PATIENT REGISTRATION
                                        </p>
                                    </div>
                                    <div class="col-md-6 col-sm-6 pull-left" >
                                          <a href="{{ route('opd.filter') }}">
                                            <span class="pull-right card-title btn btn-pill btn-default"
                                                style=" ">
                                                <i class="fa fa-list"></i> SHOW/SEARCH OLD
                                                PATIENT</span>
                                            </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                              <div class="table-responsive">
                      		  <table id="otTable" class="table table-striped table-bordered w-100" >
                      		    <thead>
                      		        <tr>
                      		            <th>#</th>
                      		            <th>Name</th>
                      		            <th>Reg no.</th>
                      		            <th>Reg Date</th>
                      		            <th>Address</th>
                      		            <th>Gender</th>
                      		            <th>Action</th>
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
                          
@endsection
@push('script')
<script type="text/javascript">


$(document).ready(function() {
    oTable = $('#otTable').DataTable({
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
            {data: 'id', name: 'id'},
            {data: 'patientName', name: 'patientName'},
            {data: 'regNum', name: 'regNum'},
            {data: 'regDate', name: 'regDate'},
            {data: 'address', name: 'address'},
            {data: 'gender', name: 'gender'},
            {data: 'action', name: 'action'},
            
            
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

        } 

    }

    $(document).on('click','.patienthistory-view',function(){

          var id = $(this).data('id');
          var _token = $("input[name='_token']").val();
          var action = '{{ route('patient.history.view') }}';
           // var data = {treatment_id:treatment_id,_token:_token,target:'#patientdiv',modal:'#viewModal',action:action};
          var data = {id:id,_token:_token,target:"#patienthistory-div",modal:"#patienthistory-view",action:action,};
          obj.patientHistoryView(data);
    });

</script>
@endpush