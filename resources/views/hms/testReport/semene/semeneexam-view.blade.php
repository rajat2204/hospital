<div class="container">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
        ×
    </button>
    {{-- <h4 class="modal-title"> --}}
        {{ ucfirst($data->getPatientDetails->patientName) }}
        <span class="pull-right">
            <a href="javascript:;"onclick="printPopup('SEMENE EXAMINATION TREATMENT DETAILS','tables')" class="btn btn-sm btn-info" >
                <i class="fa fa-print"></i> Print</a></span >
        <span class="pull-right" style="margin-right: 10px;">{{ $data->patientId }}</span >
    {{-- </h4> --}}
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
                            <th>Investigation Advised</th>
                            <td>{{ $data->investigationAdvised }}</td>
                            <th>OPD Number</th>
                            <td>{{ $data->patientId }}</td>
                        </tr>
                    </thead>
                </table>
                <hr />

                <div class="col-md-12">
                    <div class="text-center">
                        <strong class="error">SEMEN EXAMINATION</strong>
                    </div>
                    <hr />
                </div>

                <table class="table table-bordered table-striped table-hovered">
                    <tbody>
                        <tr>
                            <th>Place Of Collection</th>
                            <td>{{ $data->placeOfCollection }}</td>
                        </tr>
                        <tr>
                            <th>Time Of Collection In Lab</th>
                            <td>{{ $data->timeOfCollectionInLab }}</td>
                        </tr>
                        <tr>
                            <th colspan="2">
                                <span class="text-danger"
                                    >PHYSICAL EXAMINATION</span
                                >
                            </th>
                        </tr>
                        <tr>
                            <th>Quantity</th>
                            <td>
                                {{ $data->quantity


                                }}<small>NORMAL 2 - 5 ml</small>
                            </td>
                        </tr>
                        <tr>
                            <th>Consistency</th>
                            <td>{{ $data->consistency }}</td>
                        </tr>
                        <tr>
                            <th>Colour</th>
                            <td>{{ $data->colour }}</td>
                        </tr>
                        <tr>
                            <th>PH</th>
                            <td>{{ $data->ph }}</td>
                        </tr>
                        <tr>
                            <th>Liqufication Time</th>
                            <td>{{ $data->liquficationTime }}</td>
                        </tr>
                        <tr>
                            <th>Viscocity</th>
                            <td>{{ $data->viscocity }}</td>
                        </tr>
                        <tr>
                            <th colspan="2">
                                <span class="text-danger"
                                    >MICROSCOPIC EXAMINATION</span
                                >
                            </th>
                        </tr>
                        <tr>
                            <th>Count</th>
                            <td>
                                {{ $data->count }} /
                                <small>NORMAL 60 - 150 Millions/ml</small>
                            </td>
                        </tr>
                        <tr>
                            <th>Motility</th>
                            <td>
                                {{ $data->motility }} /
                                <small>NORMAL 80% &amp; More</small>
                            </td>
                        </tr>
                        <tr>
                            <th>Abnormal Forms</th>
                            <td>
                                {{ $data->abnormalForms }} /
                                <small>NORMAL 20%</small>
                            </td>
                        </tr>
                        <tr>
                            <th>Pus Cells</th>
                            <td>{{ $data->pusCells }}</td>
                        </tr>
                        <tr>
                            <th>Epithelial Cells</th>
                            <td>{{ $data->epithelialCells }}</td>
                        </tr>
                        <tr>
                            <th>RBCS</th>
                            <td>{{ $data->rbcs }}</td>
                        </tr>
                        <tr>
                            <th>Fructose Test</th>
                            <td>{{ $data->fructoseTest }}</td>
                        </tr>
                        <tr>
                            <th colspan="2">Other : {{ $data->other }}</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
