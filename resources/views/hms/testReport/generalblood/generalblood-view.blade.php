<div class="container">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <p class="modal-title">
        {{ ucfirst($data->getPatientDetails->patientName) }}
        <span class="pull-right">
            <a href="javascript:;"onclick="printPopup('GENERAL BLOOD TREATMENT DETAILS','tables')"class="btn btn-sm btn-info">
                <i class="fa fa-print"></i> Print
            </a>
        </span>
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
                            <th>Name</th>
                            <td colspan="3">
                                {{ ucfirst($data->getPatientDetails->patientName) }}
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
                        <strong class="bgRed badge-danger">BLOOD EXAMINATION</strong>
                    </div>
                    <hr />
                </div>
                <table class="table table-bordered table-striped table-hovered">
                    <tbody>
                        <tr>
                            <th colspan="3">
                                <span class="text-danger">GLUCOSE</span>
                                <span class="pull-right">NORMAL VALUES</span>
                            </th>
                        </tr>
                        <tr>
                            <th width="40%">Blood (Fasting)</th>
                            <td width="20%">{{ $data->bloodFasting }}</td>
                            <td width="40%">70 - 110 mg%</td>
                        </tr>
                        <tr>
                            <th>Blood (Random)</th>
                            <td>{{ $data->bloodRandom }}</td>
                            <td>70 - 160 mg%</td>
                        </tr>
                        <tr>
                            <th>Blood (PP)</th>
                            <td>{{ $data->bloodPP }}</td>
                            <td>UPTO 140 mg%</td>
                        </tr>
                        <tr>
                            <th colspan="3">
                                <span class="text-danger">RENTAL</span>
                            </th>
                        </tr>
                        <tr>
                            <th>Urea</th>
                            <td>{{ $data->urea }}</td>
                            <td>10 - 45 mg%</td>
                        </tr>
                        <tr>
                            <th>Creatinine</th>
                            <td>{{ $data->creatinine }}</td>
                            <td>
                                <small
                                    >Male : &lt; 1.2 <br />
                                    Female : &lt; 0.9</small
                                >
                            </td>
                        </tr>
                        <tr>
                            <th>Uric Acid</th>
                            <td>{{ $data->uricAcid }}</td>
                            <td>
                                <small
                                    >Male : &lt; 7.0 <br />
                                    Female : &lt; 6.0</small
                                >
                            </td>
                        </tr>
                        <tr>
                            <th colspan="3">
                                <span class="text-danger">HEPATIC</span>
                            </th>
                        </tr>
                        <tr>
                            <th>Total Bilirubin</th>
                            <td>{{ $data->totalBilirubin }}</td>
                            <td>0.3 - 1.1 mg%</td>
                        </tr>
                        <tr>
                            <th>Direct Bilirubin</th>
                            <td>{{ $data->directBilirubin }}</td>
                            <td>0.1 - 0.3 mg%</td>
                        </tr>
                        <tr>
                            <th colspan="3">
                                <span class="text-danger"
                                    >INDIRECT BILIRUBIN</span
                                >
                            </th>
                        </tr>
                        <tr>
                            <th>SGPT / ALT</th>
                            <td>{{ $data->sgptAlt }}</td>
                            <td>
                                <small
                                    >Male : &lt;= 42 <br />
                                    Female : &lt;= 36</small
                                >
                            </td>
                        </tr>
                        <tr>
                            <th>SGOT / AST</th>
                            <td>{{ $data->sgotAst }}</td>
                            <td>
                                <small
                                    >Male : &lt;= 37 <br />
                                    Female : &lt;= 31</small
                                >
                            </td>
                        </tr>
                        <tr>
                            <th>ALK Phosphatase</th>
                            <td>{{ $data->alkPhosphatase }}</td>
                            <td>
                                <small
                                    >Adult : &lt;= 310 <br />
                                    Child : &lt;= 645</small
                                >
                            </td>
                        </tr>
                        <tr>
                            <th>Total Protein</th>
                            <td>{{ $data->totalProtein }}</td>
                            <td>6.0 - 8.5 gm%</td>
                        </tr>
                        <tr>
                            <th>Albumin</th>
                            <td>{{ $data->albumin }}</td>
                            <td>3.2 - 5.5 gm%</td>
                        </tr>
                        <tr>
                            <th>AG Ratio</th>
                            <td>{{ $data->agRatio}}</td>
                            <td>1.0 - 2.2:1'</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
