@extends('layout.app') 
@section('title') Admin Dashboard 
@endsection
@section('content')

<div class="app-content  my-3 my-md-5">
    <div class="side-app">
        <div class="page-header">
            <h5 class="page-title"> ADD YOGAlIST</h5>
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="{{ route('dashborad') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="">Management</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    Add Yogalist
                </li>
            </ol>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                         <div class="col-md-12">
                            {{-- <div class="col-md-6 col-sm-6 pull-left">
                                <p class="card-title btn btn-pill btn-info"> --}}
                                   ADD YOGAlIST
                               {{--  </p>
                            </div> --}}
                        </div>
                    </div>
                    <div class="card-body">
                        {!!Form::open(['id'=>'yogalist-form','method'=>'post'])!!}
                        <div class="row">
                            <div class="col-md-2 col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('yogalist','Disease Name:*') !!}
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="form-group">
                                {!! Form::select('disease',$diseaseList,'',['class'=>'form-control','id'=>'id-disease','placeholder'=>'Enter Disease Name'])!!}
                                <div class="alert"  style="color: red;"></div>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('yogalist','Yoga:*') !!}
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="form-group">
                                {!! Form::text('exersise','',['class'=>'form-control','id'=>'id-exersise','placeholder'=>'Enter Excersise Name'])!!}
                                <div class="alert"  style="color: red;"></div>
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-6">
                                <div class="form-group">
                                <center>

                                {!! Form::button('Submit', ['class'=> 'btn btn-info yogalist','data-request'=>'form-submit','data-target'=>'[role="yogalist-form"]','data-method'=>'post','data-fid'=>'yogalist-form','id'=>'yogalist','data-url'=> route('yogalist.store') ]) !!}
                                {!! Form::reset('Cancel', ['class'=> 'btn btn-danger','data-message'=>'save successfully']) !!}
                               
                                 </center>
                               </div>
                            </div>
                            </div>
                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
    
         <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-md-12">
                                {{-- <div class="col-md-4 col-sm-4 pull-left" >
                                    <h6 class="card-title btn btn-pill btn-info"> --}}
                                   YOGAlIST  
                                {{--     </h6>
                                </div>
                                <div class="col-md-4 col-sm-4 pull-left">
                                   
                                    <p class="btn btn-pill card-title">
                                        <i class="fa fa-print"></i> PRINT
                                    </p>
                                </div> --}}
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered w-100" id="mytable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th >Disease Name</th>
                                                <th >Yoga Name</th>
                                                <th >Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- ===============================================================modal============== --}}
            <div class="modal fade" id="yogalist-view" tabindex="-1" role="dialog" aria-labelledby="largemodal" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="largemodal1">Update yogalist Info</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      {!!Form::open(['id'=>'yogalist-form','method'=>'post'])!!}
                        <div class="card">
                            <div class="row">
                                <div class="card-body">
                                    <div class="col-md-3 col-sm-6">
                                        <div class="form-group">
                                            {!! Form::label('Disease Name','Disease Name:*') !!}
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-10 col-sm-6">
                                        <div class="form-group">
                                            {!! Form::select('disease',$diseaseList,'',['class'=>'form-control','id'=>'edit-disease','placeholder'=>'Enter Disease Name'])!!}
                                            <div class="alert"  style="color: red;"></div>
                                        </div>
                                    </div>
                                     <div class="col-md-2 col-sm-6">
                                        <div class="form-group">
                                            {!! Form::label('exersise','Exersise:*') !!}
                                        </div>
                                    </div>
                                    <div class="col-md-10 col-sm-6">
                                        <div class="form-group">
                                        {!! Form::text('exersise','',['class'=>'form-control','id'=>'edit-exersise','placeholder'=>'Enter Excersise Name'])!!}
                                        <div class="alert"  style="color: red;"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-10 col-sm-6">
                                        <div class="form-group">
                                        <center>
        
                                        {!! Form::button('Submit', ['class'=> 'btn btn-info yogalist',
                                        'id'=>'yogalist-submit', ]) !!}
                                        {{-- {!! Form::reset('Cancel', ['class'=> 'btn btn-danger','data-message'=>'Reset successfully','data-title'=>' Reset','id'=>'but2','data-type'=>'success']) !!} --}}
                                       
                                         </center>
                                       </div>
                                    </div>
                                </div>
                        </div>
                        </div>
                            {!! Form::close() !!}  
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                       
                    </div>
                </div>
            </div>
        </div>
     </div>
  </div>
</div>
@endsection

@push('script')


<script type="text/javascript">

    $(document).on('click','[data-request="form-submit"]',function(e){
    e.preventDefault();

    var abc = $(this);
    var target     = $(this).attr('data-target');
    var url        = $(this).attr('data-url');
    var request    = $(this).attr('data-request');
    var method     = $(this).attr('data-method');
    var fid        = $(this).attr('data-fid');

    $(this).attr('disabled',true);

    submitForm(url,method,fid,abc);
})

function submitForm(url,method,data,btnObj) {
jQuery('.alert').html("");
    var formdata = $('#'+ data).serialize();
    $.ajax({
        url:url,
        method:method,
        data:formdata,
        success: function(r) {
            if(r.status==true) {
                 $('#id-disease').val("");
                 $('#id-exersise').val("");
                 $('#mytable').DataTable().ajax.reload();
                swal({
                        title:r.titlee,
                        text: r.msg,
                        type:r.typee,
                        timer: 2000,
                });
               
            }else{
                jQuery.each(r.errors, function(key, value){
                jQuery('.alert').html(value);
                });
            }
        }
    }).then(function(t){
        btnObj.attr('disabled',false);
    });
}
 $(function  () {
    $('#mytable').DataTable({

            "lengthMenu": [[10, 20, 50, 100], [10, 20, 50, 100]],
                processing: true,
                serverSide: true,
                bDestroy: true,
                ajax: { url:'{!! route('yogalist.list') !!}'},


                columns: [
                    { data: 'reg', data: 'reg' },
                    { data: 'disease', name: 'disease' },
                    { data: 'exersise', name: 'exersise' },
                    { data:'action',name:'action'},

                ],
        });
    });


$(document).on('click','.yogalistedit',function(){
    jQuery('.error').html("");
    var doc_id = $(this).data('id');
    var url = $(this).data('url');
    var disease = $(this).data('disease');
    var exersise = $(this).data('exersise');
    $('#edit-disease').val(disease);
    $('#edit-exersise').val(exersise);
    $('#yogalist-submit').attr('edit-exersise',exersise);
    $('#yogalist-submit').attr('edit-disease',disease);
    $('#yogalist-submit').attr('doc_id',doc_id);
    $('#yogalist-view').modal("show");

});
$(document).ready(function(){
    $(document).on('click','.yogalist',function(){
 
     var disease =  $('#edit-disease').val();
     var exersise =  $('#edit-exersise').val();
     var id =  $('#yogalist-submit').attr('doc_id');
     
     var _token = $("input[name='_token']").val();
     $.ajax({
        url:'{{ route('yogalist.update') }}',
        type: "post",
        data: {disease:disease,exersise:exersise,_token:_token,id:id},
        success:function(r){
                    if(r.status==true){
                        $('#mytable').DataTable().ajax.reload();
                        $('#yogalist-view').modal("hide");
                       swal({
                                title:r.titlee,
                                text: r.msg,
                                type:r.typee,
                                timer: 2000,
                        });

                    } else if(r.status==false){
                             jQuery.each(r.errors, function(key, value){
                                jQuery('.error').html(value);
                            });
                    }


                }
        })
   })
   $(document).on('click','.yogalist-delete',function(){
               var _token = $("input[name='_token']").val();
               var id = $(this).data('id');
                $.ajax({
                    url: '{{ route('yogalist.delete') }}',
                    type: 'POST',
                    data: {id:id,_token:_token},
                })
                .done(function(r) {
                   if(r.status==true){
                     $('#mytable').DataTable().ajax.reload();
                     swal({
                                title:r.titlee,
                                text: r.msg,
                                type:r.typee,
                                timer: 2000,
                        });
                   }
                })
                .fail(function(r) {
                    console.log("error");
                })
                .always(function(r) {
                    console.log("complete");
                });
                
              
              
            });
    
});
</script>


@endpush
