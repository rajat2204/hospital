  <div class="panel panel-default">
    <div class="panel-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">x</span>
        </button>
        <b style="margin-right: 36px">{{ ucfirst($data->getPatientDetails->patientName) }}</b>
        <span class="pull-right"> 
              <a href="javascript:;" onclick="printPopup('IPD - PATIENTS LIST','tables')" class="btn btn-sm btn-info"style="margin-right: 10px;"> <i class="fa fa-print"></i> PRINT 
              </a>
        </span>
        <span class="pull-right" style="padding-right: 5px">
            <b style="margin-right: 36px">{{ $data->patientId }}</b>
        </span>
        
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
                      <td width="25%">{{ $data->opdDate }}</td>
                    </tr>
                    
                    <tr>
                      <th>IPD Number</th>
                      <td>{{ $data->ipdRegNum }}</td>
                      <th>IPD Date</th>
                      <td>{{ $data->ipdRegDate }}</td>
                    </tr>
                    <tr>
                      <th>Patient Name</th>
                      <td colspan="3">
                          {{ $data->getPatientDetails->patientName }}
                          <strong>{{ $data->prefixName }} </strong>
                           {{ $data->refName }}
                     </td>
                    </tr>

                    <tr>
                      <th>Gender</th>
                      <td>{{$data->getPatientDetails->gender  }}</td>
                      <th>Age</th>
                      <td>{{ $data->getPatientDetails->age }}</td>
                    </tr>

                    <tr>
                      <th>Address</th>
                      <td colspan="3">{{ $data->getPatientDetails->address }}</td>
                    </tr>

                    <tr>
                      <th>Consultant</th>
                      <td>{{ $data->getConsultant->name }}</td>
                      <th>Other Consultant </th>
                      <td>{{ $data->otherConsultant }}</td>
                    </tr>


                    <tr>
                      <th>Ward Name</th>
                      <td>{{ $data->wardName ? $data->getwardName->name:'' }}</td>
                      <th>Bed Number</th>
                      <td>{{ $data->bedNum }}</td>
                    </tr>

                    <tr>
                      <th>Date of Discharge</th>
                      <td colspan="3">{{ $data->dod }}</td>
                    </tr>

                    <tr>
                      <th>Provisional Diagnosis</th>
                      <td colspan="3">{{ $data->provisionalDiagnosis }}</td>
                    </tr>

                    <tr>
                      <th>Chief Complaints</th>
                      <td colspan="3">{{ $data->chiefComplaints }}</td>
                    </tr>

                    <tr>
                      <th>Past History</th>
                      <td colspan="3">{{ $data->pastHistory }}</td>
                    </tr>

                    <tr>
                      <th>Family History - Maternal</th>
                      <td colspan="3">{{ $data->fh_maternal }}</td>
                    </tr>

                    <tr>
                      <th>Family History - Paternal</th>
                      <td colspan="3">{{ $data->fh_paternal}}</td>
                    </tr>

                    <tr>
                      <th>Family History - Other</th>
                      <td colspan="3">{{ $data->fh_other}}</td>
                    </tr>

                    <tr>
                      <th colspan="4">
                        <table class="table table-bordered table-hover table-striped">
                            <tbody><tr>
                              <th>GC:</th>
                              <td>{{ $data->ge_gc  }} </td>
                              <th>Anaemla/Pallor:</th>
                              <td>{{ $data->ge_anaemla  }}</td>
                              <th>Bowel/Bladder:</th>
                              <td>{{  $data->ge_bowel }}</td>
                            </tr>
                            <tr>
                              <th>Pulse:</th>
                              <td>{{  $data->ge_pulse }}</td>
                              <th>JVP:</th>
                              <td>{{ $data->ge_jvp }}</td>
                              <th>Sleep:</th>
                              <td>{{ $data->ge_sleep }}</td>
                            </tr>
                            <tr>
                              <th>Temp:</th>
                              <td>{{ $data->ge_temp  }} </td>
                              <th>Oedema:</th>
                              <td>{{ $data->ge_oedema  }}</td>
                              <th>Allergies:</th>
                              <td>{{  $data->ge_allergies }}</td>
                            </tr>
                            <tr>
                              <th>Resp:</th>
                              <td>{{  $data->ge_resp}}</td>
                              <th>Cyanosis:</th>
                              <td>{{ $data->ge_cyanosis  }}</td>
                              <th>Skin:</th>
                              <td>{{ $data->ge_skin  }}</td>
                            </tr>
                            <tr>
                              <th>B.P.:</th>
                              <td>{{$data->ge_bp }}</td>
                              <th>Appetite:</th>
                              <td>{{ $data->ge_thirst }}</td>
                              <th>Thirst:</th>
                              <td>{{ $data->ge_tongue }}</td>
                            </tr>
                            <tr>
                              <th>Tongue:</th>
                              <td>{{ $data->ge_lymph }}</td>
                              <th>Lymph Gland:</th>
                              <td>{{ $data->ge_addictions }}  </td>
                              <th>Addictions:</th>
                              <td>{{ $data->ge_conjective }}</td>
                            </tr>
                            <tr>
                              <th>Conjunctiva/Icterus:</th>
                              <td>{{ $data->ge_throat }}</td>
                              <th>Throat:</th>
                              <td>{{ $data->ge_diet }}</td>
                              <th>Diet:</th>
                              <td>{{$data->ge_appetite  }}</td>
                            </tr>
                          </tbody></table>
                      </th>
                    </tr>

                    <tr>
                      <th>ECG</th>
                      <td colspan="3">{{ $data->ecgTest }}</td>
                    </tr>

                    <tr>
                      <th>Respiratory System</th>
                      <td colspan="3">{{ $data->respiratorySystem }} </td>
                    </tr>

                    <tr>
                      <th>Gastro - Intestinal System</th>
                      <td colspan="3">{{ $data->gastroIntestinalSystem }}</td>
                    </tr>

                    <tr>
                      <th>Cardio - Vascular System</th>
                      <td colspan="3">{{ $data->cardioVascularSystem }}</td>
                    </tr>

                    <tr>
                      <th>Central Nervous System</th>
                      <td colspan="3">{{ $data->centralNervousSystem }} </td>
                    </tr>

                    <tr>
                      <th>Local Examination</th>
                      <td colspan="3">{{ $data->localExamination }}</td>
                    </tr>

                    <tr>
                      <th>Investigation <span class="badge  badge-success pull-right">1</span></th>
                      <td colspan="3">{{ $data->getInvestigation1->name ? $data->getInvestigation1->name:$data->getInvestigation1->investigation  }}</td>
                    </tr>

                    <tr>
                      <th>Investigation <span class="badge  badge-success pull-right">2</span></th>
                      <td colspan="3">{{ $data->investigation2 ? $data->getInvestigation2->name:$data->getInvestigation2->investigation2 }}</td>
                    </tr>

                    <tr>
                      <th>Investigation <span class="badge badge-success pull-right">3</span></th>
                      <td colspan="3">{{ $data->investigation3 ? $data->getInvestigation3->name:$data->getInvestigation3->investigation3}}</td>
                    </tr>

                    <tr>
                      <th>Medicine <span class="badge badge-danger pull-right">1</span></th>
                      <td>{{ $data->medicine1 ? $data->getMedicine1->name:$data->getMedicine1->medicine1}} </td>
                      <th>Potency <span class="badge badge-danger pull-right">1</span></th>
                      <td>{{ $data->potency1 ? $data->getPotency1->name:$data->getPotency1->potency1}}</td>
                    </tr>

                    <tr>
                      <th>Medicine <span class="badge badge-danger pull-right">2</span></th>
                      <td>{{ $data->medicine2 ? $data->getMedicine2->name:$data->getMedicine2->medicine2}}</td>
                      <th>Potency <span class="badge badge-danger pull-right">2</span></th>
                      <td>{{ $data->potency2 ? $data->getPotency2->name:$data->getPotency2->potency2}}</td>
                    </tr>

                    <tr>
                      <th>Medicine <span class="badge badge-danger pull-right">3</span></th>
                      <td>{{ $data->medicine3 ? $data->getMedicine3->name:$data->getMedicine3->medicine3}}</td>
                      <th>Potency <span class="badge badge-danger pull-right">3</span></th>
                      <td>{{ $data->potency3 ? $data->getPotency3->name:$data->getPotency3->potency3}}</td>
                    </tr>

                    <tr>
                      <th>Diet Plan <span class="badge badge-success pull-right">1</span></th>
                      <td>{{ $data->dietPlan1 ? $data->getDietPlan1->name :$data->getDietPlan1->dietPlan1 }}</td>
                      <th>Diet Plan <span class="badge badge-success pull-right">2</span></th>
                      <td>{{ $data->dietPlan2 ? $data->getDietPlan2->name :$data->getDietPlan2->dietPlan2 }}</td>
                    </tr>

                    <tr>
                      <th>Diet Plan Text <span class="badge badge-info pull-right">1</span></th>
                      <td>{{ $data->diet1Text }} </td>
                      <th>Diet Plan Text <span class="badge badge-info pull-right">2</span></th>
                      <td>{{ $data->diet2Text }}</td>
                    </tr>

                    <tr>
                      <th>Yoga</th>
                      <td>{{ $data->yoga }}</td>
                      <th>Physiotherapy</th>
                      <td>{{ $data->physiotherapy }}</td>
                    </tr>
                    
                    <tr>
                      <th>Remark</th>
                      <td colspan="3">{{ $data->remark }}</td>
                    </tr>

                  </thead>
                </table>
              </div>
            </div>
        
    @if(!empty($data->getPatientTreatmentDetails))
         <div class="text-center">
              <strong class="bgRed badge-danger">IPD TREATMENT DETAILS</strong>
          </div>
          <br>
        @foreach($data->getPatientTreatmentDetails as $patient)
            <table class="table table-bordered table-striped table-hovered">
                <tbody><tr>
                  <th>Complaints </th>
                  <td>{{ $patient->complaint }}<span class="pull-right">
                      <div class="btn-group btn-group-sm noPrint"> 
                        <button data-toggle="modal" data-id="{{ $patient->id }}" href="#updateDetail" class="btn btn-success tooltips updatePatientTreatment" data-original-title="Update Treatment" style="margin-right: 5px !important;"><i class="fa fa-pencil"></i> Edit</button>
                        <button  class="btn btn-danger delete" data-id="{{ $patient->id }}" data-original-title="Delete Treatment"><i class="fa fa-times"></i> Delete</button>
                      </div>
                    </span>
                  </td>
                </tr>
                <tr>
                  <th width="20%">Treatment Date </th>
                  @php static $i=1; @endphp
                  <td class="text-danger"> {{ Carbon\Carbon::parse($patient->treatment_date)->format('d-m-Y') }}<span class="badge pull-right">{{ $i++}}</span>
                  </td>
                </tr>
                <tr>
                  <th>Treatment</th>
                  <td>{{ $patient->treatment }} </td>
                </tr>
                <tr>
                  <th>Medicine </th>
                  <td>{{ $patient->getMedicine->name  }} </td>
                </tr>
                <tr>
                  <th>Potency </th>
                  <td>{{ $patient->getPotency->name }}</td>
                </tr>
                <tr>
                  <th>Number of Days </th>
                  <td>{{ $patient->nod }} </td>
                </tr>
                <tr>
                  <th>Investigation </th>
                  <td>
                      <span class="badge badge-info"><span class="text-danger">#1</span>
                      {{ $patient->getInvestigation->name }} </span><br><br>
                  </td>
                </tr>
                <tr>
                  <th>Remark </th>
                  <td>{{ $patient->remark }}</td>
                </tr>
                <tr>
                  <?php $a=explode(",",$patient->refTo)?>

                  <th>Referred To </th>
                    <td>  
                      @foreach($a as $b)
                       <span class="badge badge-primary">{{ $b }}</span>
                       @endforeach
                  </td>
                </tr>
                <tr>
                  <th>Consultant </th>
                  <td>{{ $patient->getConsultant->name }}</td>
                </tr>
               </tbody>
             </table>
             @endforeach
        @endif
          </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
            </div>
          </section>
          </div> 
       </div>
