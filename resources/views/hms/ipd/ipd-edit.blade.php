@extends('layout.app') @section('content')
<div class="app-content  my-3 my-md-5">
    <div class="side-app">
       
         <div class="page-header">
            <h4 class="page-title"> EDIT IPD NEW PATIENT DETAILS</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashborad') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    IPD PATIENT REGISTRATION
                </li>
            </ol>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-md-12 col-sm-6 col-xs-6">
                                <span class="pull-right">
                                      <a href="{{ route('ipd.filter') }}">
                                        <span class="pull-right btn btn-success ">
                                            <i class="fa fa-list"></i> SHOW/SEARCH OLD PATIENT</span>
                                        </a>
                                </span>
                            </div>
                        </div>
                        <div class="card-body">
                            {!!
                            Form::open(array('route'=>['ipd.update',$data->id],'method'=>'PUT','files'=>'true','id'=>'opd-form','autocomplete'=>'off'))
                            !!} {{ Form::hidden('id-ipd', $data->id,['id'=>'id-ipd']) }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('name', 'OPD
                                        Registration Number') !!} {!!
                                        Form::text('patientId',$data->patientId,
                                        [ 'class' => 'form-control opd',
                                        'placeholder' => 'Enter OPD Registration
                                        Number',
                                        'id'=>'id-opd-regnum','readonly'=>true,
                                        ]) !!}
                                        <div id="opd-reg-list"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('opd', 'OPD Date') !!}
                                        {!! Form::date('opdDate',$data->opdDate,
                                        [ 'class' => 'form-control',
                                        'placeholder' => 'Enter OPD Date',
                                        'id'=>'id-opddate','readonly'=>true, ])
                                        !!}
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('ipdnum', 'IPD
                                        Registration Number') !!} {!!
                                        Form::text('ipdRegNum',$data->ipdRegNum,
                                        [ 'class' => 'form-control',
                                        'placeholder' => 'Enter IPD Registration
                                        Number',
                                        'id'=>'regnum','readonly'=>true, ]) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('name', 'IPD
                                        Registration Date') !!} {!!
                                        Form::date('ipdRegDate',$data->ipdRegDate,
                                        [ 'class' => 'form-control',
                                        'placeholder' => 'Enter Registration
                                        Date','readonly'=>true, ]) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('consultant', 'IPD
                                        Consultant Name') !!} {!!
                                        Form::select('consultant',
                                        $doctorList,$data->consultant, [ 'class'
                                        => 'form-control', 'id'=>'consultant',
                                        'placeholder' => '--Select Consultant
                                        Name--' ]) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Other
                                        Consultant') !!} {!!
                                        Form::text('otherConsultant',$data->otherConsultant,
                                        ['class' => 'form-control',
                                        'id'=>'otherConsultant', 'placeholder'
                                        => 'Enter Other Consultant']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Patient Name')
                                        !!} {!!
                                        Form::text('patientName',$data->getPatientDetails->patientName,
                                        ['class' => 'form-control',
                                        'placeholder' => 'Enter Patient Name',
                                        'id'=>'patientName','readonly'=>true, ])
                                        !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Age') !!} {!!
                                        Form::text('age',
                                        $data->getPatientDetails->age, ['class'
                                        => 'form-control', 'placeholder' =>
                                        'Enter Age' ,
                                        'id'=>'age','readonly'=>true, ]) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    
                                      <div class="form-group">
                                        <div class="custom-controls-stacked">
                                            <label class="custom-control custom-radio" id="radio" >
                                               
                                                {!! Form::radio('prefixName','S/o',$data->prefixName=='S/o',array("class"=>"custom-control-input",'id'=>'prefixName',))  !!}
                                                <span class="custom-control-label">S/o</span>
                                            </label>
                                            <label class="custom-control custom-radio" id="radio" >
                                                {!! Form::radio('prefixName','W/o',$data->prefixName=='W/o',array("class"=>"custom-control-input",'id'=>'prefixName',))  !!}
                                                <span class="custom-control-label">W/o</span>
                                            </label>
                                            <label class="custom-control custom-radio"  id="radio">
                                                {!! Form::radio('prefixName','D/o',$data->prefixName=='D/o',array("class"=>"custom-control-input",'id'=>'prefixName',))  !!}
                                                <span class="custom-control-label">D/o</span>
                                            </label>
                                        </div>
                                        {!!Form::text('refName',$data->refName,['class' => 'form-control','placeholder' => 'Enter Name','id'=>'refName',]) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Gender') !!}
                                        {!! Form::select('gender', 
                                            ['Male Adult'=> 'Male Adult',
                                            'Female Adult' =>'Female Adult', 
                                            'Male Child' => 'Male Child','Male Child' =>
                                             'Male Child','Female Child' => 'Female
                                        Child',],$data->getPatientDetails->gender,
                                        ['class' =>
                                        'form-control','id'=>'gender','readonly'=>true,])
                                        !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Address') !!}
                                        {!!
                                        Form::text('address',$data->getPatientDetails->address,
                                        ['class' => 'form-control','placeholder'
                                        => 'Enter Address','id'=>'address','readonly'=>true,])
                                        !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Ward Name') !!}
                                        {!! Form::select('wardName',$wardList,$data->wardName, ['class'=>'form-control','id'=>'wardName','placeholder'=>'--Select Ward Name --','onChange'=>'bedCheck();']) !!}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div>Bed Number</div>
                                        <div class="custom-controls-stacked">
                                            <label class="custom-control custom-radio col-lg-2 col-md-2 col-sm-4 col-xs-4">
                                               {!! Form::radio('bedNum','1',$data->bedNum=='1',array("class"=>"custom-control-input bedNum",'id'=>'bedNum','onClick'=>'bedCheck();'))  !!}
                                                <span class="custom-control-label"><strong>1</strong></span>
                                           </label>
                                           <label class="custom-control custom-radio col-lg-2 col-md-2 col-sm-4 col-xs-4">
                                               {!! Form::radio('bedNum','2',$data->bedNum=='2',array("class"=>"custom-control-input bedNum",'id'=>'bedNum','onClick'=>'bedCheck();'))  !!}
                                                <span class="custom-control-label"><strong>2</strong></span>
                                           </label>
                                           <label class="custom-control custom-radio col-lg-2 col-md-2 col-sm-4 col-xs-4">
                                               {!! Form::radio('bedNum','3',$data->bedNum=='3',array("class"=>"custom-control-input bedNum",'id'=>'bedNum','onClick'=>'bedCheck();'))  !!}
                                                <span class="custom-control-label"><strong>3</strong></span>
                                           </label>
                                           <label class="custom-control custom-radio col-lg-2 col-md-2 col-sm-4 col-xs-4">
                                               {!! Form::radio('bedNum','4',$data->bedNum=='4',array("class"=>"custom-control-input bedNum",'id'=>'bedNum','onClick'=>'bedCheck();'))  !!}
                                                <span class="custom-control-label"><strong>4</strong></span>
                                           </label>
                                           <label class="custom-control custom-radio col-lg-2 col-md-2 col-sm-4 col-xs-4">
                                               {!! Form::radio('bedNum','5',$data->bedNum=='5',array("class"=>"custom-control-input bedNum",'id'=>'bedNum','onClick'=>'bedCheck();'))  !!}
                                                <span class="custom-control-label"><strong>5</strong></span>
                                           </label> 
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group custom-controls-stacked">
                                    <label class="custom-control custom-radio col-lg-2 col-md-2 col-sm-4 col-xs-4">
                                               {!! Form::radio('bedNum',6,($data->bedNum==6)?true:'',array("class"=>"custom-control-input bedNum",'id'=>'bedNum','onClick'=>'bedCheck();'))  !!}
                                                <span class="custom-control-label"><strong>6</strong></span>
                                           </label>
                                           <label class="custom-control custom-radio col-lg-2 col-md-2 col-sm-4 col-xs-4">
                                               {!! Form::radio('bedNum','7',$data->bedNum=='7',array("class"=>"custom-control-input bedNum",'id'=>'bedNum','onClick'=>'bedCheck();'))  !!}
                                                <span class="custom-control-label"><strong>7</strong></span>
                                           </label>
                                           <label class="custom-control custom-radio col-lg-2 col-md-2 col-sm-4 col-xs-4">
                                               {!! Form::radio('bedNum','8',$data->bedNum=='8',array("class"=>"custom-control-input bedNum",'id'=>'bedNum','onClick'=>'bedCheck();'))  !!}
                                                <span class="custom-control-label"><strong>8</strong></span>
                                           </label>
                                           <label class="custom-control custom-radio col-lg-2 col-md-2 col-sm-4 col-xs-4">
                                               {!! Form::radio('bedNum','9',$data->bedNum=='9',array("class"=>"custom-control-input bedNum",'id'=>'bedNum','onClick'=>'bedCheck();'))  !!}
                                                <span class="custom-control-label"><strong>9</strong></span>
                                           </label>
                                           <label class="custom-control custom-radio col-lg-2 col-md-2 col-sm-4 col-xs-4">
                                               {!! Form::radio('bedNum','10',$data->bedNum=='10',array("class"=>"custom-control-input bedNum",'id'=>'bedNum','onClick'=>'bedCheck();'))  !!}
                                                <span class="custom-control-label"><strong>10</strong></span>
                                           </label>
                                           <label class="custom-control custom-radio col-lg-2 col-md-2 col-sm-4 col-xs-4">
                                           {!! Form::radio('bedNum','BedFree',false,array("class"=>"custom-control-input bedNum",'id'=>'bedNum','onClick'=>'bedCheck();'))  !!}
                                            <span class="custom-control-label"><strong>Bed Free</strong></span>
                                        </label>
                                    </div>
                                </div>
                                     <b><div id="ipd-bedcheck" class="error"></div></b>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Date of
                                        Discharge') !!} {!!
                                        Form::date('dod',$data->dod, ['class' =>
                                        'form-control','placeholder' => 'Enter
                                        Date of Discharge']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Provisional
                                        Diagnosis') !!} {!!
                                        Form::textarea('provisionalDiagnosis',$data->provisionalDiagnosis,
                                        ['class' => 'form-control','placeholder'
                                        => 'Enter Provisional Diagnosis','rows'
                                        => 3, 'cols' => 10,]) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Chief
                                        Complaints') !!} {!!
                                        Form::textarea('chiefComplaints',
                                        $data->chiefComplaints, ['class' =>
                                        'form-control','placeholder' => 'Enter
                                        Chief Complaints','rows' => 3, 'cols' =>
                                        10,]) !!}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Past History')
                                        !!} {!!
                                        Form::textarea('pastHistory',$data->pastHistory,
                                        ['class' => 'form-control','placeholder'
                                        => 'Enter PastHistory','rows' => 3,
                                        'cols' => 10,]) !!}
                                    </div>
                                </div>
                                    <div class="col-md-12">
                                        <h5 align="center">Family History</h5>
                                    </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Maternal') !!}
                                        {!!
                                        Form::textarea('fh_maternal',$data->fh_maternal,
                                        ['class' => 'form-control','placeholder'
                                        => 'Enter fh_maternal','rows' => 3,
                                        'cols' => 10,]) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Paternal') !!}
                                        {!!
                                        Form::textarea('fh_paternal',$data->fh_paternal,
                                        ['class' => 'form-control','placeholder'
                                        => 'Enter fh_paternal','rows' => 3,
                                        'cols' => 10,]) !!}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Other') !!} {!!
                                        Form::textarea('fh_other',$data->fh_other,
                                        ['class' => 'form-control','placeholder'
                                        => 'Enter fh_other','rows' => 3, 'cols'
                                        => 10,]) !!}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <h5 align="center">General Examination</h5><div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('name', 'GC:')
                                                !!} {!!
                                                Form::text('ge_gc',$data->ge_gc,
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter G. C.']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('name',
                                                'Pulse:') !!} {!!
                                                Form::text('ge_pulse',$data->ge_pulse,
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter Pulse']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('name', 'Temp:')
                                                !!} {!!
                                                Form::text('ge_temp',$data->ge_temp,
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter Temp']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('name', 'Resp:')
                                                !!} {!!
                                                Form::text('ge_resp',$data->ge_resp,
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter Resp']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('name', 'B.P.:')
                                                !!} {!!
                                                Form::text('ge_bp',$data->ge_bp,
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter B.P.']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('name',
                                                'Tongue:') !!} {!!
                                                Form::text('ge_tongue',$data->ge_tongue,
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter Tongue']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('name',
                                                'Conjunctiva/Icterus:') !!} {!!
                                                Form::text('ge_conjective',$data->ge_conjective,
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter Conjunctiva/Icterus'])
                                                !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('name',
                                                'Anaemla/Pallor:') !!} {!!
                                                Form::text('ge_anaemla',$data->ge_anaemla,
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Anaemla/Pallor']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('name', 'JVP:')
                                                !!} {!!
                                                Form::text('ge_jvp',$data->ge_jvp,
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter JVP']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('name',
                                                'Oedema:') !!} {!!
                                                Form::text('ge_oedema',$data->ge_oedema,
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter Oedema']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('name',
                                                'Cyanosis:') !!} {!!
                                                Form::text('ge_cyanosis',$data->ge_cyanosis,
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter Cyanosis']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('name',
                                                'Appetite:') !!} {!!
                                                Form::text('ge_appetite',$data->ge_appetite,
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter Appetite']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('name', 'Lymph
                                                Gland:') !!} {!!
                                                Form::text('ge_lymph',$data->ge_lymph,
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter Lymph Gland']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('name',
                                                'Throat:') !!} {!!
                                                Form::text('ge_throat',$data->ge_throat,
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter Throat']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('name',
                                                'Bowel/Bladder:') !!} {!!
                                                Form::text('ge_bowel',$data->ge_bowel,
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter Bowel/Bladder']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('name',
                                                'Sleep:') !!} {!!
                                                Form::text('ge_sleep',$data->ge_sleep,
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter Sleep']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('name',
                                                'Allergies:') !!} {!!
                                                Form::text('ge_allergies',$data->ge_allergies,
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter Allergies']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('name', 'Skin:')
                                                !!} {!!
                                                Form::text('ge_skin',$data->ge_skin,
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter Skin']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('name',
                                                'Thirst:') !!} {!!
                                                Form::text('ge_thirst',$data->ge_thirst,
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter Thirst']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('name',
                                                'Addictions:') !!} {!!
                                                Form::text('ge_addictions',$data->ge_addictions,
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter Addictions']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('name', 'Diet:')
                                                !!} {!!
                                                Form::text('ge_diet',$data->ge_diet,
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter Diet']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5 align="center"><strong>ECG</strong></h5>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="custom-control custom-checkbox col-lg-6 col-md-6 col-sm-4 col-xs-4">
                                               {!! Form::checkbox('ecgTest','ecgTest',$data->ecgTest=='ecgTest',array("class"=>"custom-control-input",'id'=>'ecgTest',))  !!}
                                                <span class="custom-control-label"><strong>ECG</strong></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('name', 'Respiratory
                                            System') !!} {!!
                                            Form::textarea('respiratorySystem',$data->respiratorySystem,
                                            ['class' => 'form-control','placeholder'
                                            => 'Enter RespiratorySystem','rows' =>
                                            3, 'cols' => 10,]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('name', 'Gastro -
                                            Intestinal System') !!} {!!
                                            Form::textarea('gastroIntestinalSystem',$data->gastroIntestinalSystem,
                                            ['class' => 'form-control','placeholder'
                                            => 'Enter GastroIntestinalSystem','rows'
                                            => 3, 'cols' => 10,]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('name', 'Cardio -
                                            Vascular System') !!} {!!
                                            Form::textarea('cardioVascularSystem',$data->cardioVascularSystem,
                                            ['class' => 'form-control','placeholder'
                                            => 'Enter Cardio VascularSystem','rows'
                                            => 3, 'cols' => 10,]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('name', 'Central Nervous
                                            System') !!} {!!
                                            Form::textarea('centralNervousSystem',$data->centralNervousSystem,
                                            ['class' => 'form-control','placeholder'
                                            => 'Enter Central Nervous System','rows'
                                            => 3, 'cols' => 10,]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('name', 'Local
                                            Examination') !!} {!!
                                            Form::text('localExamination',$data->localExamination,
                                            ['class' => 'form-control','placeholder'
                                            => 'Enter Local Examination','rows' =>
                                            3, 'cols' => 10,]) !!}
                                        </div>
                                    </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Investigation1') !!}
                                        {!! Form::select('investigation1',$investigationList,$data->investigation1, ['class' =>'form-control','id'=>'investigation1','placeholder'=>'--SELECT INVESTIGATION--'])
                                        !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Investigation 2') !!} 
                                       {!! Form::select('investigation2',$investigationList,$data->investigation2, ['class' =>'form-control','id'=>'investigation1','placeholder'=>'--SELECT INVESTIGATION--'])
                                        !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Investigation3') !!}
                                         {!! Form::select('investigation3',$investigationList,$data->investigation3, ['class' =>'form-control','id'=>'investigation1','placeholder'=>'--SELECT INVESTIGATION--'])
                                        !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Medicine 1')
                                        !!} {!!
                                        Form::select('medicine1',$medicineList,$data->medicine1
                                        , ['class' => 'form-control',
                                        'id'=>'medicine1', 'placeholder' =>
                                        '--Select Medicine--']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Potency') !!}
                                        {!! Form::select('potency1',$potencyList,$data->potency1, 
                                        ['class' =>'form-control','placeholder'=>'--SELECT POTECNCY --']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Medicine 2')
                                        !!} {!!
                                        Form::select('medicine2',$medicineList,$data->medicine2
                                        , [ 'class' => 'form-control',
                                        'id'=>'medicine2', 'placeholder' =>
                                        '--Select Medicine--' ]) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Potency') !!}
                                        {!! Form::select('potency2',$potencyList,$data->potency2, 
                                        ['class' =>'form-control','placeholder'=>'--SELECT POTECNCY --']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Medicine 3')
                                        !!} {!!
                                        Form::select('medicine3',$medicineList,$data->medicine3
                                        , [ 'class' => 'form-control',
                                        'id'=>'medicine3', 'placeholder' =>
                                        '--Select Medicine--']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Potency') !!}
                                       {!! Form::select('potency3',$potencyList,$data->potency3, 
                                        ['class' =>'form-control','placeholder'=>'--SELECT POTECNCY --']) !!}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <h5 align="center">Auxiliary Treatment</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('name', 'DietPlan') !!}
                                                <span class="badge badge-danger">1</span>
                                                {!! Form::select('dietPlan1',$dietPlanList,$data->dietPlan1,
                                                ['class' => 'form-control','placeholder'=>'--SELECT DIET PLAN --']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('name', 'Diet Plan') !!}
                                                <span class="badge badge-danger">2</span>
                                               
                                                {!! Form::select('dietPlan2',$dietPlanList,$data->dietPlan2,
                                                ['class' => 'form-control','placeholder'=>'--SELECT DIET PLAN --']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('name', 'Other
                                                Consultant') !!} {!!
                                                Form::textarea('diet1Text',$data->diet1Text,
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter Diet Description','rows'
                                                => 3, 'cols' => 10, ]) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('name', 'Other
                                                Consultant') !!} {!!
                                                Form::textarea('diet2Text',$data->diet2Text,
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter Diet Description','rows'
                                                => 3, 'cols' => 10, ]) !!}
                                            </div>
                                        </div>
                                     
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <h5 align="center"><strong>Yoga</strong></h5>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="custom-control custom-checkbox col-lg-6 col-md-6 col-sm-4 col-xs-4">
                                                       {!! Form::checkbox('yoga','yoga',true,array("class"=>"custom-control-input",'id'=>'yoga',))  !!}
                                                        <input type="hidden" name="yogacheck" id="id-yoga">
                                                        <span class="custom-control-label"><strong>Yoga</strong></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <h5 align="center"><strong>Physiotherapy</strong></h5>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="custom-control custom-checkbox col-lg-6 col-md-6 col-sm-4 col-xs-4">
                                                        {{-- @if(isset($data->physiotherapy)) --}}
                                                       {!! Form::checkbox('physiotherapy','physiotherapy',($data->physiotherapy=='physiotherapy'?true:null),array("class"=>"custom-control-input",'id'=>'physiotherapy',))  !!}
                                                    <span class="custom-control-label"><strong>Physiotherapy</strong></span>
                                                    </label>
                                                </div>
                                            </div>
                                      
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                {!! Form::label('name',
                                                'Remarks') !!} {!!
                                                Form::textarea('remark',$data->remark,
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter remark','rows' => 3,
                                                'cols' => 10,]) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <center>
                                        <div class="form-group">
                                            {!! Form::submit('Submit', ['class'
                                            => 'btn btn-info']) !!}

                                         {!! Form::reset('Cancel', ['class'
                                            => 'btn btn-danger']) !!}
                                    </div>
                                    </center>
                                </div>
                               
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>

@endsection
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="crossorigin="anonymous"></script>
@push('script')

<script type="text/javascript">
 
    $(document).ready(function() {
        bedCheck();
   });

    function bedCheck(){

        var wardName = $("#wardName").val();
        var _token = $('input[name="_token"]').val();
        var bedNum = ($('input[name=bedNum]:checked')).val();
        var id = $('#id-ipd').val();
        // alert(wardName + bedNum);
        if (wardName!='' && bedNum!='') {
            $.ajax({
                url: "{{ route('ipd.bedAvailableCheck') }}",
                method: "POST",
                data: { wardName: wardName,bedNum:bedNum, _token: _token,id:id },
               success: function(res) {
                if(res.status==true) {
                    $('#ipd-bedcheck').attr('class',res.class);
                    $('#ipd-bedcheck').html(res.msg);
                    }else{
                        $('#ipd-bedcheck').attr('class',res.class);
                        $('#ipd-bedcheck').html(res.msg);
                    }
                }
            });
        }
            
     
    }

    $('#yoga').on('change',function(){
    var check = $(this).is(':checked') ? 'yoga' : 'false';
    $('#id-yoga').attr("value",check);
  
        
        });
</script>

@endpush
