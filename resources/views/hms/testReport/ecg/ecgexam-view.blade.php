<div class="container">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
        ×
    </button>
    <h4 class="modal-title">
        {{ ucfirst($data->getPatientDetails->patientName) }}
        <span class="pull-right">
            <a href="javascript:;"onclick="printPopup('ECG - EXAMINATION TREARMENT DETAILS','tables')"class="btn btn-sm btn-info">
                <i class="fa fa-print"></i> Print
            </a>
        </span>
        <span class="pull-right"style="margin-right: 10px;">{{ $data->patientId }}</span>
    </h4>
</div>
<section class="panel">
    <div class="panel-body" id="tables">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hovered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <td colspan="3">
                                {{ $data->getPatientDetails->patientName }}
                            </td>
                        </tr>
                        <tr>
                            <th width="25%">Age</th>
                            <td width="25%">
                                {{ $data->getPatientDetails->age }}
                            </td>
                            <th width="25%">Gender</th>
                            <td width="25%">
                                {{ $data->getPatientDetails->gender }}
                            </td>
                        </tr>
                        <tr>
                            <th>Referred By</th>
                            <td>{{ $data->referredBy }}</td>
                            <th>Test Date</th>
                            <td>{{ Carbon\Carbon::parse($data->date)->format('d-m-Y') }}</td>
                        </tr>
                        <tr>
                            <th>OPD Number</th>
                            <td colspan="3">{{ $data->patientId }}</td>
                        </tr>
                    </thead>
                </table>
                <hr />
                <div class="col-md-12">
                    <div class="text-center">
                        <strong class="bgRed badge-danger">ECG EXAMINATION</strong>
                    </div>
                    <hr>
                    <table class="table table-bordered table-striped table-hovered">
                        <tbody>
                            <tr>
                                <th>
                                    <span class="text-danger">Remark : </span><br/>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
