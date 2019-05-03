@extends('layout.app')
@section('content')
    <div class="app-content  my-3 my-md-5">
        <div class="side-app">
            <div class="page-header">
                <h5 class="page-title">OPD TREATMENT LIST</h5>
                <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="{{ route('dashborad') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="javascript:void(0);">Reports</a>
                 
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Opd Treatment List
                </li>
            </ol>
            </div>
            <div class="row">
              <div class="col-lg-12">
                    <div class="card">
                        {{-- <div class="card-header">
                            <h6 class="card-title btn btn-pill btn-info">
                                OPD - Treatment List
                            </h6>
                          </div> --}}
                    <div class="card-body">
                        {!! Form::open(array('id'=>'opd-filter-form'))!!}
                        <div class="row">
                            <div class="col-lg-1">
                                <div class="form-group">
                                    {!! Form::label('from', 'From:') !!}
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    {!! Form::date('fromDate','',
                                    ['class' =>
                                    'form-control','id'=>'fromDate','required'=>'required'])
                                    !!}
                                </div>
                            </div>
                            <div class="col-lg-1">
                                <div class="form-group">
                                    {!! Form::label('to', 'To:') !!}
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    {!! Form::date('toDate','', ['class'
                                    =>
                                    'form-control','id'=>'toDate','required'=>'required'])
                                    !!}
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    {!! Form::button('Submit', ['class'=>'btn btn-info','id'=>'id-opdtreatment']) !!}
                                    {!! Form::reset('Cancel', ['class'=>'btn btn-danger','id'=>'id-reset-opdtreatment']) !!}
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              <section class="card">
                  <div class="card-header">
                        <div class="col-md-12">
                            <span class="pull-right" style="margin-right: 5px;">
                                  <a href="javascript:;" class="btn btn-info btn-xs" onclick="printDiv('OPD TREATMENT - PATIENTS LIST','opdtreatment-list')"> <i class="fa fa-print"></i> PRINT </a>
                            </span>
                         </div>
                    </div>
                   <div class="card-body">
                      <div class="col-md-12">
                          <div class="table-responsive">
                              <table class="table table-striped table-bordered w-100" id="opdtreatment-list">
                                <thead>
                                  
                                  <tr role="row">
                                      <td>#</td>
                                      <td>Patient Name</td>
                                      <td>Reg No.</td>
                                      <td>Reg Date</td>
                                      <td>Treatment Date</td>
                                      <td>Address</td>
                                      <td>Gender</td>
                                      <td>Consultant</td>
                                      <td class="noPrint">View</td>
                                  </tr>
                                </thead>
                              </table>
                            </div>
                          </div>
                        </div>
                    </section>
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

    jQuery('#id-opdtreatment').click(function(e){
           e.preventDefault();
           var _token = $("input[name='_token']").val();
           var from = $('#fromDate').val();
           var to = $('#toDate').val();
            $('#opdtreatment-list').DataTable({
                "lengthMenu": [[100, 250, 500, 1000], [100, 250, 500, 1000]],
                processing: true,
                serverSide: true,
                bDestroy: true,
                ajax: {   url: "{{ route('report.treatmentlist.search') }}",
                         type: "POST",
                         data:{fromDate:from,toDate:to,_token:_token}
                      },
              
        columns: [
            { data: 'id', data: 'id' },
            { data: 'patientName', name: 'patientName' },
            { data: 'regNum', name: 'regNum' },
            { data: 'regDate', name: 'regDate' },
            { data: 'treatment_date', name: 'treatment_date' },
            { data: 'address', name: 'address' },
            { data: 'gender', name: 'gender' },
            { data: 'consultant', name: 'consultant' },
            { data:'action',name:'action',className:'noPrint'},
            
            
        ],
    });
});

var obj = {
    OpdView:function(data){
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
                        if(res.status==true){

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
    }
  $(document).on('click','.treatmentView',function() {
            var treatment_id = $(this).data('id');
            var _token = $("input[name='_token']").val();
            var action = '{{ route('treatmentView') }}';
            var data = {treatment_id:treatment_id,_token:_token,target:'#patientdiv',modal:'#viewModal',action:action};
            obj.OpdView(data );
        });
  $(document).on('click','.delete',function(){
               var _token = $("input[name='_token']").val();
               var id = $(this).data('id');
               var action ='{{ route('opdtreatment.delete') }}';
               var data = {id:id,_token:_token,action:action};
               obj.OpdTreatmentDelete(data);
            });

            $(document).on('click','.updatePatientTreatment',function(){
                var _token=$("input[name='_token']").val();
                var id = $(this).data('id');
                var action='{{ route('opdtreatment.edit') }}';
                var data={id:id,_token:_token,action:action,target:'#opdtreatment-edit',modal:'#OpdTreatmentEdit'};
                obj.OpdTreatmentEdit(data);
            });
             $(document).on('click','#edit-opd-treatment',function() {
                var patientId=$('#patientId').val();
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

                var action = '{{ url('hms/opd-treatment/update') }}'+'/'+id;
                var data = {
                                patientId:patientId,treatment_date:treatment_date,complaint:complaint,treatment:treatment,medicine:medicine,potency:potency,nod:nod,
                                advice:advice,
                                remark:remark,consultant:consultant,consultant:consultant,refTo:myCheckboxes, _token:_token,action:action
                            };
                obj.OpdTreatmentUpdate(data);
            });
  </script>

  @endpush