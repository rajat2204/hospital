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
                            <li class="breadcrumb-item active" aria-current="page">IPD MONTH WISE REPORTS</li>
                        </ol>
                    </div>
                    <div class="col-md-12  col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <p class="card-title">IPD - REPORT MONTH WISE</p>
                            </div>
                            <div class="card-body">
                                {!! Form::open(array('id'=>'ipd')) !!}
                                <div class="row">
                                    <div class="col-lg-1">
                                        <div class="form-group">
                                            {!! Form::label('from', 'From:') !!}
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            {!! Form::month('fromDate','',['class' =>'form-control ','id'=>'fromDate','required'=>'required',])
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
                                            {!! Form::month('toDate','', ['class'=>'form-control ','id'=>'toDate','required'=>'required',])
                                            !!}
                                        </div>
                                    </div>
                                   <div class="col-lg-1">
                                        <div class="form-group">
                                            {!! Form::label('wardName', 'Ward Name:')
                                            !!}
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            {!! Form::select('wardName',$wardList,'',['class' =>'form-control','id'=>'wardName','placeholder'=>'All'])!!}
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <center>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            {!! Form::button('Submit', ['class'=> 'btn btn-info','id'=>'id-wardName']) !!}
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
                                        <span class="pull-right"> <a href="javascript:;" onclick="printDiv('IPD - REPORT MONTH WISE','myTable')" class="btn btn-sm btn-info"> <i class="fa fa-print"></i> Print </a>
                                        </span>
                                    </header>         
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class=" datatable table table-striped table-bordered w-100" id="myTable">
                                                <thead>
                                                    <tr>
                                                        <th>S No.</th>
                                                        <th>Date</th>
                                                        <th>Admintted Patients</th>
                                                        <th>Discharge Patients</th>
                                                        <th>Carry Farward In Next Month</th>
                                                        <th>Remark</th>
                                                    </tr>
                                                    <tfoot>
                                                        <tr>
                                                            <th><b>Number Of Total Patients:</b></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            
                                                        </tr>
                                                    </tfoot>
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
        </div>
    </div>
@endsection
@push('script')

<script type="text/javascript">  
  $(document).ready(function() {
    $('#id-wardName').on('click',function() {
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
                  $('#myTable').DataTable({
                    processing: true,
                    serverSide: true,
                    bDestroy: true,
                    ajax: {   url: "{{ route('ipdExamReport.search') }}",
                    type: "POST",
                    data:{fromDate: $('#fromDate').val(), toDate: $('#toDate').val(),_token:_token,wardName: jQuery('#wardName').val()}},
                    columns: [
                                { data: 'sn', name: 'sn' },
                                { data: 'fullmonth', name: 'fullmonth' },
                                { data: 'count', name: 'count',className:'totalyoga' },
                                { data: 'dodcount', name: 'dodcount',className:'totalyoga' },
                                { data: 'carryfarward', name: 'carryfarward',className:'totalyoga' },
                    
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
                        $(this.footer()).html('<span class="begRed badge badge-danger">'+sum+'</span>');
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