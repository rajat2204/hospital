<div class="container">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
        ×
    </button>
    <p class="modal-title">
        {{ ucfirst($data->opdData->patientName )}}
        <span class="pull-right">
            <a href="javascript:;"onclick="printPopup('YOGA EXAMINTION TREATMENT DETAILS','tables')"class="btn btn-sm btn-info">
                <i class="fa fa-print"></i> Print</a></span>
        <span class="pull-right"style="margin-right: 10px;">{{ $data->patientId }}</span>
    </p>
</div>
        <section class="panel">
          <div class="panel-body" id="tables">
            <div class="col-md-12">
              <div class="table-responsive">
                <table class="table table-bordered table-striped table-hovered">
                  <thead>
                    <tr>
                      <th width="25%">OPD Number </th>
                      <td width="25%">{{ $data->patientId }}</td>
                      <th width="25%">OPD Date</th>
                      <td width="25%">{{ $data->opdData->regDate }}</td>
                    </tr>
                     
                    <tr>
                      <th>Patient Name</th>
                      <td colspan="3">{{ $data->opdData->patientName }}</td>
                    </tr>
                                        

                    <tr>
                      <th>Age</th>
                      <td>{{ $data->opdData->age }}</td>
                      <th>Gender</th>
                      <td>{{ $data->opdData->gender }}</td>
                    </tr>

                    <tr>
                      <th>Address</th>
                      <td colspan="3">{{ $data->opdData->address }}</td>
                    </tr>
                    
                    <tr>
                      <th>Referred By </th>
                      <td>{{ $data->referredBy }}</td>
                      <th>Test Date </th>
                      <td>{{ $data->yogadate }}</td>
                    </tr>
                    <tr>
                      <th>Disease diagnosis</th>
                      <td>{{ $data->diseaseName->name }}</td>
                      <th>Exercise</th>
                      <td>{{ $data->exersise }}</td>
                    </tr>
                   
                    <tr>
                      <th>Other</th>
                      <td colspan="3">{{ $data->other }}</td>
                    </tr>
                    <tr>
                      <th>Remark </th>
                      <td colspan="3">{{ $data->remark }}</td>
                    </tr>
                    </thead>
                  </table>
              </div>
            </div>
          </div>
        </section>
     </div>