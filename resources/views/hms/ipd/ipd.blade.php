@extends('layout.app') 
@section('title') Admin Dashboard 
@endsection
@section('content')
<div class="app-content  my-3 my-md-5">
    <div class="side-app">
        <div class="page-header">
            <h5 class="page-title">  IPD NEW PATIENT REGISTRATION</h5>
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
                            {!!Form::open(array('route'=>'ipd.store','files'=>'true','id'=>'opd-form','autocomplete'=>'off'))!!}
                            {!!Form::hidden('contactNum','', [ 'class' => 'form-control opd','id'=>'contactnum', ]) !!}
                            <div class="row">
                                    <div class="col-md-6 ">
                                    <div class="form-group">
                                        {!! Form::label('name', 'OPD Registration Number*:') !!} 
                                        {!!Form::text('abc','', [ 'class' => 'form-control opd', 'placeholder' =>'Enter OPD Registration Number','id'=>'id-opd-regnum', ]) !!}
                                        <div id="opd-reg-list"></div>
                                        <div class="error">{{ $errors->first('patientId') }}</div>
                                        {!!  Form::hidden('patientId','', [ 'class'=>'form-control opd','id'=>'patientId']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        {!! Form::label('opd', 'OPD Date*:') !!}
                                        {!! Form::date('opdDate', '', [ 'class'
                                        => 'form-control', 'placeholder' =>
                                        'Enter OPD Date', 'id'=>'id-opddate','readonly'=>true ])
                                        !!}
                                         <div class="error">{{ $errors->first('opdDate') }}</div>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        {!! Form::label('ipdnum', 'IPD
                                        Registration Number*:') !!} {!!
                                        Form::text('ipdRegNum','', [ 'class' =>
                                        'form-control regnum-check', 'placeholder' => 'Enter IPD Registration Number',
                                        'id'=>'regnum', ]) !!}
                                         <div class="error">{{ $errors->first('ipdRegNum') }}</div>
                                          <div id="ipd-regcheck" class="error"></div>
                                    </div>
                                    @if(Session::has('error_message'))
                                        <div class="error">{{ Session::get('error_message') }} </div>
                                    @endif
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        {!! Form::label('name', 'IPD
                                        Registration Date*:') !!} {!!
                                        Form::date('ipdRegDate',Carbon\Carbon::today()->format('Y-m-d'), [ 'class' =>
                                        'form-control', 'placeholder' => 'Enter
                                        Registration Date', ]) !!}
                                        <div class="error">{{ $errors->first('ipdRegDate') }}</div>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        {!! Form::label('consultant', 'IPD
                                        Consultant Name*:') !!} {!!
                                        Form::select('consultant',
                                        $doctorList,'', [ 'class' =>
                                        'form-control', 'id'=>'consultant',
                                        'placeholder' => '--Select Consultant
                                        Name--', ]) !!}
                                         <div class="error">{{ $errors->first('consultant') }}</div>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Other
                                        Consultant*:') !!} {!!
                                        Form::text('otherConsultant','',
                                        ['class' => 'form-control',
                                        'id'=>'otherConsultant', 'placeholder'
                                        => 'Enter Other Consultant']) !!}
                                        <div class="error">{{ $errors->first('otherConsultant') }}</div>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Patient Name*:')
                                        !!} {!! Form::text('patientName','',
                                        ['class' => 'form-control',
                                        'placeholder' => 'Enter Patient Name',
                                        'id'=>'patientName','readonly'=>true ]) !!}
                                        <div class="error">{{ $errors->first('patientName') }}</div>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Age*:') !!} {!!
                                        Form::text('age','', ['class' =>'form-control', 'placeholder' => 'Enter Age' , 'id'=>'age','readonly'=>'readonly' ]) !!}
                                            <div class="error">{{ $errors->first('age') }}</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    {{-- <div class="form-group">
                                        <div class="custom-controls-stacked">
                                            {!! Form::label('name', 'S/o') !!}
                                             {!!
                                            Form::radio('prefixName','S/o' ,
                                            ['class' => 'form-control',
                                            'placeholder' => 'Enter Registration
                                            Amount', 'id'=>'prefixName', ]) !!} {!!
                                            Form::label('name', 'W/o') !!} {!!
                                            Form::radio('prefixName','W/o', ['class'
                                            => 'form-control', 'placeholder' =>
                                            'Enter Registration Amount',
                                            'id'=>'prefixName',]) !!} {!!
                                            Form::label('name', 'D/o') !!} {!!
                                            Form::radio('prefixName','D/o', ['class'
                                            => 'form-control', 'placeholder' =>
                                            'Enter Registration Amount',
                                            'id'=>'prefixName',]) !!} {!!
                                            Form::text('refName','', ['class' =>
                                            'form-control', 'placeholder' => 'Enter
                                            Name', 'id'=>'refName',]) !!}
                                    </div>
                                </div> --}}
                                   
                                    <div class="form-group">
                                        <div class="custom-controls-stacked">
                                            <label class="custom-control custom-radio" id="radio" >
                                                <input type="radio" class="custom-control-input" name="prefixName" id="prefixName" value="S/o" checked>
                                                <span class="custom-control-label">S/o</span>
                                            </label>
                                            <label class="custom-control custom-radio" id="radio" >
                                                <input type="radio" class="custom-control-input" name="prefixName" id="prefixName" value="W/o">
                                                <span class="custom-control-label">W/o</span>
                                            </label>
                                            <label class="custom-control custom-radio"  id="radio">
                                                <input type="radio" class="custom-control-input" name="prefixName"  id="prefixName"value="D/o">
                                                <span class="custom-control-label">D/o</span>
                                            </label>
                                          
                                        </div>
                                    </div>
                                    <div class="error">{{ $errors->first('prefixName') }}</div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        {!! Form::text('refName','', ['class' =>'form-control', 'placeholder' => 'Enter Refrence Name', 'id'=>'refName',]) !!}
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Gender*:') !!}
                                        {!! Form::select('gender', [
                                            ''=> '--SELECT GENDER--','Male Adult'=> 'Male Adult','Female Adult' =>'Female Adult','Male Child' => 'MaleChild','Male Child' => 'Male Child','Female Child' => 'Female Child',],'',['class' =>'form-control','id'=>'gender','readonly'=>'readonly']) !!}
                                            <div class="error">{{ $errors->first('age') }}</div>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Address*:') !!}
                                        {!! Form::text('address','',
                                        ['class' => 'form-control','placeholder'
                                        => 'Enter Address','id'=>'address','readonly'=>true]) !!}
                                        <div class="error">{{ $errors->first('address') }}</div>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Ward Name*:') !!}
                                        {!! Form::select('wardName',$wardList,'',
                                             ['class' =>'form-control wardName','id'=>'wardName','placeholder'=>'--Select Ward Name --']) !!}
                                             <div class="error">{{ $errors->first('wardName') }}</div>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Date of Discharge*:') !!}
                                         {!! Form::date('dod','', ['class' =>'form-control','placeholder' => 'Enter Date of Discharge']) !!}
                                         <div class="error">{{ $errors->first('dod') }}</div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div>Bed Number*:</div>
                                        <div class="custom-controls-stacked">
                                            <label class="custom-control custom-radio col-lg-2 col-md-2 col-sm-4 col-xs-4">
                                               {!! Form::radio('bedNum','1',true,array("class"=>"custom-control-input bedNum",'id'=>'bedNum','checked'=>false))  !!}
                                                <span class="custom-control-label"><strong>1</strong></span>
                                           </label>
                                           <label class="custom-control custom-radio col-lg-2 col-md-2 col-sm-4 col-xs-4">
                                               {!! Form::radio('bedNum','2',false,array("class"=>"custom-control-input bedNum",'id'=>'bedNum',))  !!}
                                                <span class="custom-control-label"><strong>2</strong></span>
                                           </label>
                                           <label class="custom-control custom-radio col-lg-2 col-md-2 col-sm-4 col-xs-4">
                                               {!! Form::radio('bedNum','3',false,array("class"=>"custom-control-input bedNum",'id'=>'bedNum',))  !!}
                                                <span class="custom-control-label"><strong>3</strong></span>
                                           </label>
                                           <label class="custom-control custom-radio col-lg-2 col-md-2 col-sm-4 col-xs-4">
                                               {!! Form::radio('bedNum','4',false,array("class"=>"custom-control-input bedNum",'id'=>'bedNum',))  !!}
                                                <span class="custom-control-label"><strong>4</strong></span>
                                           </label>
                                           <label class="custom-control custom-radio col-lg-2 col-md-2 col-sm-4 col-xs-4">
                                               {!! Form::radio('bedNum','5',false,array("class"=>"custom-control-input bedNum",'id'=>'bedNum',))  !!}
                                                <span class="custom-control-label"><strong>5</strong></span>
                                           </label>
                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group custom-controls-stacked">
                                        <label class="custom-control custom-radio col-lg-2 col-md-2 col-sm-4 col-xs-4">
                                           {!! Form::radio('bedNum','6',false,array("class"=>"custom-control-input bedNum",'id'=>'bedNum',))  !!}
                                         
                                            <span class="custom-control-label"><strong>6</strong></span>
                                        </label>
                                        <label class="custom-control custom-radio col-lg-2 col-md-2 col-sm-4 col-xs-4">
                                           {!! Form::radio('bedNum','7',false,array("class"=>"custom-control-input bedNum",'id'=>'bedNum',))  !!}
                                            <span class="custom-control-label"><strong>7</strong></span>
                                        </label>
                                        <label class="custom-control custom-radio col-lg-2 col-md-2 col-sm-4 col-xs-4">
                                           {!! Form::radio('bedNum','8',false,array("class"=>"custom-control-input bedNum",'id'=>'bedNum',))  !!}
                                            <span class="custom-control-label"><strong>8</strong></span>
                                        </label>
                                        <label class="custom-control custom-radio col-lg-2 col-md-2 col-sm-4 col-xs-4">
                                           {!! Form::radio('bedNum','9',false,array("class"=>"custom-control-input bedNum",'id'=>'bedNum',))  !!}
                                            <span class="custom-control-label"><strong>9</strong></span>
                                        </label>
                                        <label class="custom-control custom-radio col-lg-2 col-md-2 col-sm-4 col-xs-4">
                                           {!! Form::radio('bedNum','10',false,array("class"=>"custom-control-input bedNum",'id'=>'bedNum',))  !!}
                                            <span class="custom-control-label"><strong>10</strong></span>
                                        </label>
                                    </div>
                                     <div class="error">{{ $errors->first('bedNum') }}</div>
                                      <b><div id="ipd-bedcheck" class="error"></div></b>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Provisional
                                        Diagnosis') !!} {!!
                                        Form::textarea('provisionalDiagnosis',
                                       '', ['class' =>'form-control','placeholder' => 'Enter Provisional Diagnosis','rows' => 3,'cols' => 10,]) !!}
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Chief
                                        Complaints') !!} {!!
                                        Form::textarea('chiefComplaints','',
                                        ['class' => 'form-control','placeholder'
                                        => 'Enter Chief Complaints','rows' => 3,
                                        'cols' => 10,]) !!}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Past History')
                                        !!} {!! Form::textarea('pastHistory',
                                       '', ['class' =>
                                        'form-control','placeholder' => 'Enter Past History','rows' => 3, 'cols' =>
                                        10,]) !!}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <p align="center"><strong>Family History</strong></p>
                                    <div class="form-group">
                                        {!! Form::label('name', 'Maternal') !!}
                                        {!! Form::textarea('fh_maternal','',
                                        ['class' => 'form-control','placeholder'
                                        => 'Enter fh_maternal','rows' => 3,
                                        'cols' => 10,]) !!}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Paternal') !!}
                                        {!! Form::textarea('fh_paternal','',
                                        ['class' => 'form-control','placeholder'
                                        => 'Enter fh_paternal','rows' => 3,
                                        'cols' => 10,]) !!}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Other') !!} {!!
                                        Form::textarea('fh_other','',
                                        ['class' => 'form-control','placeholder'
                                        => 'Enter fh_other','rows' => 3, 'cols'
                                        => 10,]) !!}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <p align="center"><strong>General Examination</strong></p>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('name', 'GC:')
                                                !!} {!! Form::text('ge_gc',
                                               '', ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter G. C.']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('name',
                                                'Pulse:') !!} {!!
                                                Form::text('ge_pulse','',
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter Pulse']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('name', 'Temp:')
                                                !!} {!! Form::text('ge_temp',
                                               '', ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter Temp']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('name', 'Resp:')
                                                !!} {!! Form::text('ge_resp',
                                               '', ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter Resp']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('name', 'B.P.:')
                                                !!} {!! Form::text('ge_bp',
                                               '', ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter B.P.']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('name',
                                                'Tongue:') !!} {!!
                                                Form::text('ge_tongue','',
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter Tongue']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('name',
                                                'Conjunctiva/Icterus:') !!} {!!
                                                Form::text('ge_conjective',
                                               '', ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter Conjunctiva/Icterus'])
                                                !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('name',
                                                'Anaemla/Pallor:') !!} {!!
                                                Form::text('ge_anaemla','',
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Anaemla/Pallor']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('name', 'JVP:')
                                                !!} {!! Form::text('ge_jvp',
                                               '', ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter JVP']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('name',
                                                'Oedema:') !!} {!!
                                                Form::text('ge_oedema','',
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter Oedema']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('name',
                                                'Cyanosis:') !!} {!!
                                                Form::text('ge_cyanosis','',
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter Cyanosis']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('name',
                                                'Appetite:') !!} {!!
                                                Form::text('ge_appetite','',
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter Appetite']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('name', 'Lymph
                                                Gland:') !!} {!!
                                                Form::text('ge_lymph','',
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter Lymph Gland']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('name',
                                                'Throat:') !!} {!!
                                                Form::text('ge_throat','',
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter Throat']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('name',
                                                'Bowel/Bladder:') !!} {!!
                                                Form::text('ge_bowel','',
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter Bowel/Bladder']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('name',
                                                'Sleep:') !!} {!!
                                                Form::text('ge_sleep','',
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter Sleep']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('name',
                                                'Allergies:') !!} {!!
                                                Form::text('ge_allergies','',
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter Allergies']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('name', 'Skin:')
                                                !!} {!! Form::text('ge_skin',
                                               '', ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter Skin']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('name',
                                                'Thirst:') !!} {!!
                                                Form::text('ge_thirst','',
                                                ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter Thirst']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('name',
                                                'Addictions:') !!} {!!
                                                Form::text('ge_addictions',
                                               '', ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter Addictions']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('name', 'Diet:')
                                                !!} {!! Form::text('ge_diet',
                                               '', ['class' =>
                                                'form-control','placeholder' =>
                                                'Enter Diet']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <p align="center"><strong>ECG</strong></p>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label class="custom-control custom-checkbox col-lg-6 col-md-6  col-sm-4 col-xs-4">
                                           {!! Form::checkbox('ecgTest','ecgTest',false,array("class"=>"custom-control-input",'id'=>'ecgTest',))  !!}
                                            <span class="custom-control-label"><strong>ECG</strong></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Respiratory System') !!} 
                                    </div>
                                </div>
                                 <div class="col-md-10">
                                    <div class="form-group">
                                        {!!
                                        Form::textarea('respiratorySystem',
                                       '', ['class' =>
                                        'form-control','placeholder' => 'Enter Respiratory System','rows' => 3, 'cols'
                                        => 10,]) !!}
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Gastro -Intestinal System') !!}
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                         {!!
                                        Form::textarea('gastroIntestinalSystem','', ['class' =>'form-control','placeholder' => 'Enter GastroIntestinalSystem','rows' => 3,
                                        'cols' => 10,]) !!}
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Cardio -Vascular System') !!}
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                         {!!
                                        Form::textarea('cardioVascularSystem',
                                       '', ['class' =>'form-control','placeholder' => 'Enter Cardio VascularSystem','rows' => 3,
                                        'cols' => 10,]) !!}
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Central Nervous System') !!}
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                         {!!
                                        Form::textarea('centralNervousSystem',
                                       '', ['class' =>
                                        'form-control','placeholder' => 'Enter Central Nervous System','rows' => 3,
                                        'cols' => 10,]) !!}
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Local
                                        Examination') !!}
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                         {!!
                                        Form::text('localExamination','',
                                        ['class' => 'form-control','placeholder'=> 'Enter Local Examination','rows' =>
                                        3, 'cols' => 10,]) !!}
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Investigation') !!}
                                        <span class="badge badge-info">1</span>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                         {!!Form::select('investigation1',$investigationList,'',
                                        ['class' =>'form-control','id'=>'investigation1','placeholder'=>'-- Select Investigation 1 --'])
                                        !!}
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Investigation') !!}
                                        <span class="badge badge-info">2</span>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                         {!!Form::select('investigation2',$investigationList,'',
                                        ['class' =>'form-control','id'=>'investigation2','placeholder'=>'-- Select Investigation 2 --'])
                                        !!}
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Investigation') !!}
                                        <span class="badge badge-info">3</span>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                         {!!Form::select('investigation3',$investigationList,'',
                                        ['class' =>'form-control','id'=>'investigation3','placeholder'=>'-- Select Investigation 3 --'])
                                        !!}
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Medicine')
                                        !!}
                                         <span class="badge badge-warning">1 </span> {!!
                                        Form::select('medicine1',$medicineList,''
                                        , ['class' => 'form-control',
                                        'id'=>'medicine1', 'placeholder' =>
                                        '--Select Medicine--']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Potency ') !!}
                                        <span class="badge badge-warning">1 </span>
                                        {!! Form::select('potency1',$potencyList,'',
                                        ['class' => 'form-control','placeholder'=>'--Select Potency 1--']) !!}

                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Medicine ')
                                        !!} <span class="badge badge-warning"> 2 </span>{!!
                                        Form::select('medicine2',$medicineList,''
                                        , [ 'class' => 'form-control',
                                        'id'=>'medicine2', 'placeholder' =>
                                        '--Select Medicine--' ]) !!}
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Potency') !!}
                                        <span class="badge badge-warning">2 </span>
                                        {!! Form::select('potency2',$potencyList,'',
                                        ['class' => 'form-control','placeholder'=>'--Select Potency 2--']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Medicine ')
                                        !!} <span class="badge badge-warning"> 3 </span>{!!
                                        Form::select('medicine3',$medicineList,''
                                        , [ 'class' => 'form-control',
                                        'id'=>'medicine3', 'placeholder' =>
                                        '--Select Medicine--']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Potency') !!}
                                        <span class="badge badge-warning">3 </span>
                                        {!! Form::select('potency3',$potencyList,'',
                                        ['class' => 'form-control','placeholder'=>'--Select Potency 3--']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <p align="center"><strong>Auxiliary Treatment</strong></p>
                                <div class="row">
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            {!! Form::label('name', 'Diet Plan ') !!}
                                            <span class="badge badge-danger">1</span>
                                            {!! Form::select('dietPlan1',$dietPlanList,'', ['class' =>'form-control','placeholder'=>'--Select Diet Plan--']) !!}
                                        </div>
                                         <div class="form-group">
                                            {!! Form::label('name', 'Other
                                            Consultant') !!} {!!
                                            Form::textarea('diet1Text',
                                           '', ['class' =>
                                            'form-control','placeholder' =>
                                            'Enter Diet Description','rows'
                                            => 3, 'cols' => 10, ]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            {!! Form::label('name', 'Diet Plan ') !!}
                                            <span class="badge badge-danger">2</span>
                                            {!! Form::select('dietPlan2',$dietPlanList,'', ['class' =>'form-control','placeholder'=>'--Select Diet Plan--']) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('name', 'Other
                                            Consultant') !!} 
                                            {!!Form::textarea('diet2Text','', ['class' =>'form-control','placeholder' =>'Enter Diet Description','rows'=> 3, 'cols' => 10, ]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <p align="center"><strong>Yoga</strong></p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="custom-control custom-checkbox col-lg-6 col-md-6  col-sm-4 col-xs-4">
                                               {!! Form::checkbox('yoga','yoga',false,array("class"=>"custom-control-input",'id'=>'yoga',))  !!}
                                                <span class="custom-control-label"><strong>Yoga</strong></span>
                                            </label>
                                        </div>
                                    </div>
                                     <div class="col-md-2">
                                        <div class="form-group">
                                            <p align="center"><strong>Physiotherapy</strong></p>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="custom-control custom-checkbox col-lg-6 col-md-6  col-sm-4 col-xs-4">
                                               {!! Form::checkbox('physiotherapy','physiotherapy',false,array("class"=>"custom-control-input",'id'=>'physiotherapy',))  !!}
                                                <span class="custom-control-label"><strong>Physiotherapy</strong></span>
                                            </label>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::label('name','Remarks') !!}
                                            {!!  Form::textarea('remark','', ['class' =>'form-control','placeholder' =>'Enter remark','rows' => 3,'cols' => 10,]) !!}
                                            <div class="error">{{ $errors->first('remark') }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="col-md-12">
                                    <center>
                                        <div class="form-group">
                                            {!! Form::submit('Submit', ['class'=> 'btn btn-info']) !!}
                                             {!! Form::reset('Cancel', ['class' => 'btn btn-danger']) !!}
                                        </div>
                                    </center>
                                </div>  {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>                    
@endsection 
@push('script') 

<script type="text/javascript">
    $(document).ready(function() {
        $("#wardName").on("change", function() {
            var wardName = $(this).val();
           
          $('.bedNum').on('click',function() {
            var _token = $('input[name="_token"]').val();
            var bedNum = $(this).val();
            console.log(wardName,bedNum);
                if (wardName!='' && bedNum!='') {
                    $.ajax({
                        url: "{{ route('ipd.bedAvailableCheck') }}",
                        method: "POST",
                        data: { wardName: wardName,bedNum:bedNum, _token: _token },
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
            });  
        });
    }); 
    $(document).ready(function() {
        $("#success").hide();
        $("#error").hide();
        jQuery("#id-opd-regnum").on("keyup", function() {
            var opd = $(this).val();
            $("#opd-reg-list").html("");
            $("#success_message").html("");
            if (opd != "") {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('opd.regsearch') }}",
                    method: "POST",
                    data: { query: opd, _token: _token },
                    success: function(data) {
                        $("#opd-reg-list").fadeIn();
                        $("#opd-reg-list").html(data);
                        
                    }
                });
            }
        });
    });
    $(document).on("click", ".select", function() {
        
        $("#id-opd-regnum").val($(this).text());
        var opd = $("#id-opd-regnum").val();
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "{{ route('opd.value') }}",
            method: "POST",
            data: { query: opd, _token: _token },
            success: function(res) {
                $('#patientId').val(res.opd.regNum);
                $("#id-opddate").val(res.opd.regDate);
                $("#patientName").val(res.opd.patientName);
                $("#contactnum").val(res.opd.contactNum);
                // $("#consultant").val(res.opd.consultant);
                // $("#otherConsultant").val(res.opd.otherConsultant);
                $("#age").val(res.opd.age);
                $("#gender").val(res.opd.gender);
                $("#address").val(res.opd.address);
                
                
            }
        });
        $("#opd-reg-list").fadeOut();
    });
    $("#gender").css("pointer-events","none");
    $(document).ready(function() {
        $(".regnum-check").on("keyup", function() {
             $('#ipd-regcheck').html('');
            var ipdCheck = $(this).val();
            console.log(ipdCheck);
            if (ipdCheck != "") {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('ipd.regsearch') }}",
                    method: "POST",
                    data: { ipdCheck: ipdCheck, _token: _token },
                    success: function(res) {
                        
                        if(res.status==true) {
                            $('#ipd-regcheck').attr('class',res.class);
                            $('#ipd-regcheck').html(res.msg);
                        }else{
                             $('#ipd-regcheck').attr('class',res.class);
                             $('#ipd-regcheck').html(res.msg);
                        }
                    }
                });
            }
        });
    });
    $("input:radio").attr("checked", false);
     </script>
@endpush
