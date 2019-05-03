@extends('layout.app')
@section('content')
    <div class="app-content  my-3 my-md-5">
        <div class="side-app">
            <div class="page-header">
                <h4 class="page-title"></h4>
                <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="{{ route('dashborad') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    Reports
                 
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                   Yoga Reports
                </li>
            </ol>
            </div>
            <div class="row">
              <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title btn btn-pill btn-info">
                                Yoga Reports
                            </h6>
                                  Note : Use Same Year form and to date, if you use different year then result show only from date year.
                          </div>
                    <div class="card-body">
                        {!! Form::open(array('id'=>'opd-filter-form'))!!}
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
                        </div>
                        <br>
                        <center>
                                <div class="col-sm-12">
                                <div class="form-group">
                                    {!! Form::button('Submit', ['class'=> 'btn btn-primary','id'=>'id-department']) !!}
                                    {!! Form::reset('Cancel', ['class'=> 'btn btn-danger','id'=>'id-reset-department']) !!}
                                </div>
                            </div>
                           </center>
                            {!! Form::close() !!}
                    </div>
                  </div>
                </div>
              </div>
                 <section class="card" id="dynamic-tables">
                    <header class="card-header"> 
                        <div class="col-md-8" id="month"></div>
                      <span class="pull-right"> <a href="javascript:;" onclick="printDiv('YOGA - REPORT MONTH WISE')" class="btn btn-sm btn-info"> <i class="fa fa-print"></i> Print </a></span>
                    </header>
                      <div class="card-body">
                        <div class="col-md-12">
                            <div class="table-responsive" >
                              <table class="datatable table table-striped table-bordered w-100" id="myTable">
                                <thead>
                                 <tr>
                                    <th>#</th>
                                    <th>Year/Month</th>
                                    <th>NO OF ECG</th>
                                    <th>Remark</th>
                                 </tr>
                                </thead>
                              </table>
                            </div>
                          </div>
                        </div>
                    </section>
                </div>
            </div>

      @endsection

      @push('script')

<script>
        jQuery('#id-department').click(function(e) {

          var fromDate = jQuery('#fromDate').val();
          var toDate = jQuery('#toDate').val();
         
          //var department = jQuery('#department').val();
          var _token = $("input[name='_token']").val();
          $.ajax({
              url: '{{ route("yogaReport.search") }}',
              type: 'POST',
              data: {fromDate:fromDate,toDate:toDate,_token:_token},
              success:function(res) {
               if(res.status==true) {
                  var toDate = jQuery('#toDate').val();
                  var todate = new Date(toDate);
                  var fromdate = new Date(fromDate);
                  var months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
                var m1 = months[fromdate.getMonth()];
                var y1 = fromdate.getFullYear();
                var m2 = months[todate.getMonth()];
                var y2 = todate.getFullYear();
                 $('#month').html( m1 +'~'+y1 +' <b> To </b>   '+ m2 +'~'+ y2  );
               
                 $("#myTable").find('.remove').remove();
                $.each(res.yoga,function(index, val) {

                $("#myTable").append('<tr class="remove"><td> '+(index+1)+' </td> <td>'+res.yoga[index]['month']+'/'+ res.yoga[index]['year']+'</td> <td class="sum">'+res.yoga[index]['count']+'</td> <td>remark</td></tr>');
                    
                });
                var sum = 0;
                  $("#myTable").find('.total').remove();
                  $(".sum").each(function() {
                    var value = $(this).text();
                    if(!isNaN(value) && value.length != 0) {
                        sum += parseFloat(value);
                    }
                });
               $('#myTable').append('<tr class="total"><th colspan="2"><b>Total</b> </th> <td><b>'+sum+'</b></td> <td>  </td></tr>')
             }
                else if (res.status=='nodata') {
                       var toDate = jQuery('#toDate').val();
                       var todate = new Date(toDate);
                       var fromdate = new Date(fromDate);
                       var months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
                        var m1 = months[fromdate.getMonth()];
                        var y1 = fromdate.getFullYear();
                        var m2 = months[todate.getMonth()];
                        var y2 = todate.getFullYear();
                        $('.from').text(m1+'/'+y1);
                        $('.to').text(m2+'/'+y2);
                        $("#myTable").find('.remove').remove();
                        $("#myTable").find('.total').remove();
                        $("#myTable").append('<tr class="remove"><td><b> Total</b></td> <td></td> <td class="sum"><span class="badge badge-danger">0</td> <td></td></tr>');
                }
              }
          })     
     });


  
     

        </script>


      @endpush