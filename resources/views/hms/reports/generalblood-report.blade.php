   @extends('layout.app')
   @section('content')
    <div class="page">
        <div class="page-main">
            <div class="app-content  my-3 my-md-5" >
                <div class="side-app">
                    <div class="page-header">
                        <h4 class="page-title"></h4>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashborad') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> Reports</li>
                            <li class="breadcrumb-item active" aria-current="page">GENERAL BLOOD EXAM  REPORTS</li>
                        </ol>
                    </div>
                    <div class="col-md-12  col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <p class="card-title">GENERAL BLOOD EXAM - REPORT MONTH WISE</p>
                            </div>
                            <div class="card-body">
                                {!! Form::open(array('id'=>'generalblood')) !!}
                                <div class="row">
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            {!! Form::label('from', 'From:') !!}
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            {!! Form::month('fromDate','',['class' =>'form-control ','id'=>'fromDate','required'=>'required',])
                                            !!}
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            {!! Form::label('to', 'To:') !!}
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            {!! Form::month('toDate','', ['class'=>'form-control ','id'=>'toDate','required'=>'required',])
                                            !!}
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <center>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            {!! Form::button('Submit', ['class'=> 'btn btn-primary','id'=>'id-generalblood']) !!}
                                            {!! Form::reset('Cancel', ['class'=> 'btn btn-danger','id'=>'reset']) !!}
                                        </div>
                                    </div>
                                </center>
                                {!! Form::close() !!}
                            </div>
                            <b>Note : Use Same Year form and to date, if you use different year then result show only from date year.</b>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-xl-12">
                                <div class="card">  
                                    <header class="card-header"> 
                                        <div class="col-md-8" id="month"></div>
                                        <span class="pull-right"> <a href="javascript:;" onclick="printDiv('SERUM OF WIDAL EXAMINATION  - REPORT MONTH WISE')" class="btn btn-sm btn-info"> <i class="fa fa-print"></i> Print </a></span>
                                    </header>         
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="generalblood-table" class="table table-striped table-bordered w-100">
                                                <thead>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Year/Month</th>
                                                        <th>No. Of General Blood Examination</th>
                                                        <th>Remark</th>
                                                       
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th colspan="2"><b>Total:</b></th>
                                                        <th></th>
                                                        <th></th>
                                                       
                                                    </tr>
                                                </tfoot>
                                            </table>
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
@endsection
@push('script')

<script type="text/javascript">  
  $(document).ready(function() {
    $('#id-generalblood').on('click',function() {
            var _token = $("input[name='_token']").val();
        var fromDate = jQuery('#fromDate').val();
            var toDate = jQuery('#toDate').val();
            if(fromDate!='' && toDate !='') {
                  var todate = new Date(toDate);
                  var fromdate = new Date(fromDate);
                  var months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
                var m1 = months[fromdate.getMonth()];
                var y1 = fromdate.getFullYear();
                var m2 = months[todate.getMonth()];
                var y2 = todate.getFullYear();
              
                 $('#month').html( m1 +'~'+y1 +' <b> To </b>   '+ m2 +'~'+ y2  );
      $('#generalblood-table').DataTable({
        processing: true,
        serverSide: true,
        bDestroy: true,
        ajax: {   url: "{{ route('generalbloodReport.search') }}",
        type: "POST",
        data:{fromDate: $('#fromDate').val(), toDate: $('#toDate').val(),_token:_token}},
        columns:[
                    { data: 'sn', data: 'sn' },
                    { data: 'fullmonth', name: 'fullmonth' },
                    { data: 'count', data: 'count',className:'totalyoga' },
                    { data: 'remark', data: 'remark' },
                    
                ],
                "footerCallback": function(row, data, start, end, display) {
                        var api = this.api();
                        api.columns('.totalyoga', { page: 'current' }).every(function () {
                            var sum = this
                                .data()
                                .reduce(function (a, b) {
                                    var x = parseFloat(a) || 0;
                                    var y = parseFloat(b) || 0;
                                    return x + y;
                                }, 0);
                                console.log(sum);
                        $(this.footer()).html('<b>'+sum+'</b>');
                    });
                }
   
             }); 
         }else{
                $('#month').html('');
            }
    });  
 }); 

</script>


@endpush