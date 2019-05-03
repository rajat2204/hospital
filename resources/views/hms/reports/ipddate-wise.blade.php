@extends('layout.app')
@section('content')
    <div class="app-content  my-3 my-md-5">
        <div class="side-app">
            <div class="page-header">
                <h4 class="page-title">IPD - DATE WISE REPORTS</h4>
                <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="{{ route('dashborad') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Reports </li>
                <li class="breadcrumb-item active" aria-current="page">IPD - DATE WISE REPORTS</li>
            </ol>
            </div>
            <div class="row">
              <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            {{-- <h6 class="card-title btn btn-pill btn-info">
                                OPD - Date Wise Reports
                            </h6> --}}
                          </div>
                    <div class="card-body">
                        {!! Form::open(array('id'=>'ipd-filter-form'))!!}
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
                                    'form-control','id'=>'fromDate','required'=>'required'])
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
                                    'form-control','id'=>'toDate','required'=>'required'])
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
                            <div class="col-sm-12">
                                <center>
                                    <div class="form-group">
                                        {!! Form::button('Submit', ['class' => 'btn btn-info','id'=>'id-wardName']) !!}
                                        {!! Form::reset('Cancel', ['class'=> 'btn btn-danger','id'=>'id-reset-wardName']) !!}
                                    </div>
                            </center>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                  </div>
                </div>
              </div>
           
          
                <section class="card">
                    <header class="card-header"> 
                        <div class="col-md-8" id="month"></div>
                        <span class="pull-right"> <a href="javascript:;" onclick="printDiv('IPD - REPORT DATE WISE','myTable')" class=" btn btn-info"> <i class="fa fa-print"></i> Print </a></span>
                    </header> 
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class=" datatable table table-striped table-bordered w-100" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>S No.</th>
                                            <th>Date</th>
                                            <th>Patients</th>
                                        </tr>
                                        <tfoot>
                                            <tr>
                                                <th><b>Number Of Total Patients:</b></th>
                                                <th></th>
                                                <th></th>
                                                
                                            </tr>
                                        </tfoot>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
                      


  @endsection

  @push('script')
  
  <script type="text/javascript">
    jQuery('#id-wardName').click(function(e){
           e.preventDefault();
           var _token = $("input[name='_token']").val();
            $('#myTable').DataTable({
                "lengthMenu": [[100, 250, 500, 1000], [100, 250, 500, 1000]],
                processing: true,
                serverSide: true,
                bDestroy: true,
                ajax: {   url: "{{ route('report.ipddatewise.search') }}",
                         type: "POST",
                         data:{fromDate: jQuery('#fromDate').val(),toDate: jQuery('#toDate').val(),wardName: jQuery('#wardName').val(),
                         _token:_token},  },
        columns: [
            { data: 'id', name: 'id' },
            { data: 'ipdRegDate', name: 'ipdRegDate' },
            { data: 'count', name: 'count',className:'totalyoga' },
        
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
});
  </script>

  @endpush