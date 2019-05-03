<div class="container">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
        ×
    </button>
  
       {{ ucfirst($data->patientDetails->patientName ) }}
        <span class="pull-right"> 
              <a href="javascript:;" onclick="printPopup('OT - PATIENT TREATMENT DETAILS','tables')" class="btn btn-sm btn-info"style="margin-right: 10px;"> <i class="fa fa-print"></i> PRINT 
              </a>
        </span>
        <span class="pull-right" style="padding-right: 5px">
            <b style="margin-right: 36px">{{ $data->patientId }}</b>
        </span>
        <div class="table-responsive" id="tables">
            <table class="table table-bordered table-striped table-hovered">
        <thead>
            <tr>
                <th width="25%">OPD Number</th>
                <td width="25%">{{ $data->patientId }}</td>
                <th width="25%">OPD Date</th>
                <td width="25%">{{ $data->opdDate }}</td>
            </tr>

            <tr>
                <th>Patient Name</th>
                <td colspan="3">{{ $data->patientDetails->patientName  }}</td>
            </tr>

            <tr>
                <th>Gender</th>
                <td>{{ $data->patientDetails->gender  }}</td>
                <th>Age</th>
                <td>{{ $data->patientDetails->age  }}</td>
            </tr>

            <tr>
                <th>Address</th>
                <td colspan="3">{{ $data->patientDetails->address }}</td>
            </tr>

            <tr>
                <th>Referred By</th>
                <td colspan="3">{{ $data->referby }}</td>
            </tr>

            <tr>
                <th>Dignosis</th>
                <td colspan="3">{{ $data->dignosis }}</td>
            </tr>

            <tr>
                <th>OT Processure</th>
                <td colspan="3">{{ $data->otProcessure }}</td>
            </tr>

            <tr>
                <th>Consultant</th>
                <td colspan="3">{{ $data->getConsultant->name }}</td>
            </tr>

            <tr>
                <th>Other Consultant</th>
                <td colspan="3">{{ $data->otherConsultant }}</td>
            </tr>

            <tr>
                <th>Advise &amp; Treatment</th>
                <td colspan="3">{{ $data->adviceTreatment }}</td>
            </tr>
            <tr>
                <th>Medicine <span class="badge badge-danger">1</span></th>
                <td colspan="3">{{ $data->getMedicine1->name }}</td>
            </tr>
            <tr>
                <th>Medicine <span class="badge badge-danger">2</span></th>
                <td colspan="3">{{ $data->getMedicine2->name }}</td>
            </tr>
            <tr>
                <th>Medicine <span class="badge badge-danger">3</span></th>
                <td colspan="3">{{ $data->getMedicine3->name }}</td>
            </tr>
            <tr>
                <th>Remark</th>
                <td colspan="3">{{ $data->remark }}</td>
            </tr>
        </thead>
    </table>
        </div>
    
</div>
