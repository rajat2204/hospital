@extends('layout.app')
@section('content')

<div class="app-content  my-3 my-md-5">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Dashboard</h4>
            <ol class="breadcrumb">
                {{-- <li class="breadcrumb-item"><a href="#">Home</a></li> --}}
                <li class="breadcrumb-item active" aria-current="page">Admin Dashboard</li>
            </ol>
        </div>
       <div class="row row-cards">
            <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                <div class="card card-counter bg-gradient-info shadow-primary ">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="mt-4 mb-0 text-white">
                                    <h2 class="mb-0">{{ number_format($opd) }}</h2>
                                    <a href="{{ route('opd.index') }}" class="text-white"><p class="mt-1">Total OPD Patients</p></a>
                                </div>
                            </div>
                            <div class="col-4">
                                <i class="fa fa-users mt-3 mb-0 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                <div class="card card-counter bg-gradient-danger shadow-primary ">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="mt-4 mb-0 text-white">
                                    <h2 class="mb-0">{{ number_format($ipd) }}</h2>
                                    <a href="{{ route('ipd.index') }}" class="text-white"><p class="mt-1">Total IPD Patients</p></a>
                                </div>
                            </div>
                            <div class="col-4">
                                <i class="fa fa-stethoscope mt-3 mb-0 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                <div class="card card-counter bg-gradient-warning shadow-primary">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="mt-4 mb-0 text-white">
                                    <h2 class="mb-0">{{ number_format($ot) }}</h2>
                                    <a href="{{ route('ot.index') }}" class="text-white"><p class="mt-1">Total OT Patients</p></a>
                                </div>
                            </div>
                            <div class="col-4">
                                <i class="fa fa-heartbeat mt-3 mb-0 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                <div class="card card-counter bg-gradient-success shadow-primary">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="mt-4 mb-0 text-white">
                                    <h2 class="mb-0">{{ number_format($physiotherpy) }}</h2>
                                    <a href="{{ route('physiotherpy.index') }}" class="text-white"><p class="mt-1">Total Physiotherpy</p></a>
                                </div>
                            </div>
                            <div class="col-4">
                                <i class="fa fa-wheelchair mt-3 mb-0 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                <div class="card card-counter bg-gradient-info shadow-primary">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="mt-4 mb-0 text-white">
                                    <h2 class="mb-0">{{ number_format($yoga) }}</h2>
                                    <a href="{{ route('yoga.index') }}" class="text-white"><p class="mt-1">Total Yoga Patients</p></a>
                                </div>
                            </div>
                            <div class="col-4">
                                <i class="fa fa-y-combinator mt-3 mb-0 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                <div class="card card-counter bg-gradient-danger shadow-primary">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="mt-4 mb-0 text-white">
                                    <h2 class="mb-0">{{ number_format($bloodexamination) }}</h2>
                                    <a href="{{ route('blood-examination.index') }}" class="text-white"><p class="mt-1">Blood Examination</p></a>
                                </div>
                            </div>
                            <div class="col-4">
                                <i class="fa fa-file-pdf-o mt-3 mb-0 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                <div class="card card-counter bg-gradient-warning shadow-primary">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="mt-4 mb-0 text-white">
                                    <h2 class="mb-0">{{ number_format($generalblood) }}</h2>
                                    <a href="{{ route('general-blood.index') }}" class="text-white"><p class="mt-1">Total General </p></a>
                                </div>
                            </div>
                            <div class="col-4">
                                <i class="fa fa-building mt-3 mb-0 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                <div class="card card-counter bg-gradient-success shadow-primary">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="mt-4 mb-0 text-white">
                                    <h2 class="mb-0">{{ number_format($semenexamination) }}</h2>
                                    <a href="{{ route('semene-examination.index') }}" class="text-white"><p class="mt-1">Total Semen </p></a>
                                </div>
                            </div>
                            <div class="col-4">
                                <i class="fa fa-medkit mt-3 mb-0 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                <div class="card card-counter bg-gradient-info shadow-primary">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="mt-4 mb-0 text-white">
                                    <h2 class="mb-0">{{ number_format($serumofwidal) }}</h2>
                                    <a href="{{ route('serun.index') }}" class="text-white"><p class="mt-1">Total Serum </p></a>
                                </div>
                            </div>
                            <div class="col-4">
                                <i class="fa fa-bar-chart mt-3 mb-0 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                <div class="card card-counter bg-gradient-danger shadow-primary">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="mt-4 mb-0 text-white">
                                    <h2 class="mb-0">{{ number_format($stoolexamination) }}</h2>
                                    <a href="{{ route('stool-examination.index') }}" class="text-white"><p class="mt-1">Total Stool Exam </p></a>
                                </div>
                            </div>
                            <div class="col-4">
                                <i class="fa fa-wheelchair-alt mt-3 mb-0 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                <div class="card card-counter bg-gradient-warning shadow-primary">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="mt-4 mb-0 text-white">
                                    <h2 class="mb-0">{{ number_format($urineexamination) }}</h2>
                                    <a href="{{ route('urine-examination.index') }}" class="text-white"><p class="mt-1">Urine Exam </p></a>
                                </div>
                            </div>
                            <div class="col-4">
                                <i class="fa fa-file-text mt-3 mb-0 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                <div class="card card-counter bg-gradient-success shadow-primary">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="mt-4 mb-0 text-white">
                                    <h2 class="mb-0">{{ number_format($xray) }}</h2>
                                    <a href="{{ route('x-ray.index') }}" class="text-white"><p class="mt-1">Total X-ray </p></a>
                                </div>
                            </div>
                            <div class="col-4">
                                <i class="fa fa-file-image-o  mt-3 mb-0 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                <div class="card card-counter bg-gradient-info shadow-primary">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="mt-4 mb-0 text-white">
                                    <h2 class="mb-0">{{ number_format($ecg) }}</h2>
                                    <a href="{{ route('ecg-examination.index') }}" class="text-white">
                                        <p class="mt-1">Total ECG Exam</p>
                                       
                                    </a>
                                </div>
                            </div>
                            <div class="col-4">
                                <i class="fa fa-user mt-3 mb-0 text-white"></i>
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


@push('script')

@endpush