<div class="container">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
        ×
    </button>
    <h6 class="modal-title">
        {{ $data->getPatientDetails->patientName }}
        <span class="pull-right">
            <a href="javascript:;" onclick="printPopup('SERUN OF WIDAL EXAMINATION TREATEMENT DETAILS','tables')"class="btn btn-sm btn-info">
                <i class="fa fa-print"></i> Print
            </a>
        </span>
        <span class="pull-right" style="margin-right: 10px;">{{ $data->patientId }}</span>
    </h6>
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
                            <td>{{ $data->date }}</td>
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
                        <strong class="bgRed badge-danger">SERUM FOR WIDAL TEST REPORT</strong>
                    </div>
                    <hr />
                    <table class="table table-bordered table-striped table-hovered">
                        <tbody>
                            <tr>
                                <th rowspan="2">
                                    <span class="text-danger">ANTIGEN</span>
                                </th>
                                <th colspan="4" class=" text-center">
                                    <span class="text-danger text-center">DILUTION OF SERUM</span>
                                </th>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    S. TYPHI <span class="pull-right">"O"</span>
                                </td>
                                <td>{{ $data->sTyphiO }}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    S. TYPHI <span class="pull-right">"H"</span>
                                </td>
                                <td>{{ $data->sTyphiH }}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    S. PARA TYPHI
                                    <span class="pull-right">"AH"</span>
                                </td>
                                <td>{{ $data->sTyphiAH }}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>S. PARA TYPHI<span class="pull-right">"BH"</span></td>
                                <td>{{ $data->sTyphiBH }}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th colspan="5">
                                    <span class="text-danger"
                                        >IMPRESSION : </span
                                    ><br />
                                    {{ $data->impression }}
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
