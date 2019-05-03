
<div class="panel panel-default">
    <div class="panel-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">x</span>
        </button>
        <b style="margin-right: 36px">{{ ucfirst($data->patientName) }}</b>
        <span class="pull-right"> 
            <a href="javascript:;" onclick="printPopup('OPD - PATIENTS LIST','tables')" class="btn btn-sm btn-info"style="margin-right: 10px;"> <i class="fa fa-print"></i> PRINT 
            </a>
        </span>

        <span class="pull-right" style="padding-right: 5px">
            <b style="margin-right: 36px">{{ $data->regNum }}</b>
        </span>
    </div>
    <hr>

    <div class="container" id="tables">
        <div class="table-responsive">
            <table class="table-bordered table card-table table-vcenter text-nowrapd">
                <thead>
                    <tr>
                        <b><th>Registration Number</th></b>
                        <td>{{ $data->regNum }}</td>
                        <th>Registration Date</th>
                        <td>{{ \Carbon\Carbon::parse($data->regDate)->format('d/m/Y') }}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td colspan="3">{{ $data->patientName }}</td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td>{{ $data->gender }}</td>
                        <th>Age</th>
                        <td>{{ $data->age }}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td colspan="3">{{ $data->address }}</td>
                    </tr>
                    <tr>
                        <th>Consultant Name</th>
                        <td>{{ $data->getConsultant->name }}</td>
                        <th>Other Consultant</th>
                        <td>{{ $data->otherConsultant }}</td>
                    </tr>
                    <tr>
                        <th>Department</th>
                        <td colspan="3">{{ $data->getDepartment->name }}</td>
                    </tr>
                </thead>
            </table>
        </div>
        <br>
        @if(!empty($data->PatientTreatmentDetails))
         <div class="text-center">
            <strong class="bgRed badge-danger">OPD TREATMENT DETAILS</strong>
        </div>
        @foreach($data->PatientTreatmentDetails as $patient)
       
        <div class="table-responsive">
            <table class="table-bordered table card-table table-vcenter text-nowrapd">
                <tbody>
                    <tr>
                        <th>Complaints</th>
                        <td>
                            {{ $patient->complaint}}<span class="pull-right">
                                <div class="btn-group btn-group-sm  noPrint">
                                    <a data-toggle="modal"
                                        data-id="{{ $patient->id }}"
                                        href="#updateDetail"
                                        class="btn btn-success tooltips updatePatientTreatment"
                                        data-original-title="Update Treatment"
                                        style="margin-right: 5px !important;"
                                        ><i class="fa fa-pencil"></i> Edit</a
                                    >
                                    <button class="btn btn-danger delete noPrint" data-id="{{ $patient->id }}"data-original-title="Delete Treatment">
                                        <i class="fa fa-times"></i> Delete</button>
                                </div>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th width="20%">Treatment Date</th>
                        <td class="text-danger">
                            <?php static $i=1;?>
                            {{  \Carbon\Carbon::parse($patient->treatment_date)->format('d/m/Y')}} 
                            <span class="badge badge-warning pull-right">{{ $i++ }}</span>
                        </td>
                    </tr>
                    <tr>
                        <th>Treatment</th>
                        <td>{{ $patient->treatment }}</td>
                    </tr>
                    <tr>
                        <th>Medicine</th>
                        <td>{{ $patient->getMedicine->name }}</td>
                    </tr>
                    <tr>
                        <th>Potency</th>
                        <td>{{ $patient->getPotency->name }}</td>
                    </tr>
                    <tr>
                        <th>Number of Days</th>
                        <td><span class="badge badge-danger">{{ $patient->nod }}</span></td>
                    </tr>
                    <tr>
                        <th>Investigation</th>
                        <td>
                            <span class="badge badge-success"
                                ><span class="text-danger">#1</span
                                >{{ $patient->getInvestigation->name }} </span
                            ><br /><br />
                        </td>
                    </tr>
                    <tr>
                        <th>Remark</th>
                        <td>{{ $patient->remark }}</td>
                    </tr>
                    <tr>
                        <?php $a=explode(",",$patient->refTo)?>

                        <th>Referred To</th>
                        <td>
                            @foreach($a as $b)
                            <span class="badge badge-primary">{{ $b }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>Consultant</th>

                        <td>{{ $patient->getConsultant->name }}</td>
                    </tr>
                </tbody>
            </table>
             @endforeach @endif
        </div>
    </div>
</div>

