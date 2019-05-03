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
            <div class="col-sm-12 col-lg-6 col-md-6 col-xl-3 ">
                <div class="card card-img-holder">
                    <div class="card-body">
                        <p class="card-text text-muted font-weight-semibold mb-1">Total Projects</p>
                        <div class="clearfix">
                            <div class="float-left  mt-2">
                                <h1>6,525</h1>
                            </div>
                            <div class="float-right text-right">
                                <span class="pie" data-peity='{ "fill": ["#ff685c", "#f2f2f2"]}'>226,134</span>
                            </div>
                        </div>
                        <div class="progress progress-md mt-1 h-2">
                            <div class="progress-bar  bg-gradient-primary w-70"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6 col-md-6 col-xl-3">
                <div class="card card-img-holder">
                    <div class="card-body">
                        <p class="card-text text-muted font-weight-semibold mb-1">Completed Task</p>
                        <div class="clearfix">
                            <div class="float-left  mt-2">
                                <h1>2,435</h1>
                            </div>
                            <div class="float-right text-right">
                                <span class="pie" data-peity='{ "fill": ["#32cafe", "#f2f2f2"]}'>1,4</span>
                            </div>
                        </div>
                        <div class="progress progress-md mt-1 h-2">
                            <div class="progress-bar  bg-gradient-secondary w-50"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6 col-md-6 col-xl-3">
                <div class="card card-img-holder">
                    <div class="card-body">
                        <p class="card-text text-muted font-weight-semibold mb-1">Ongoing Projects</p>
                        <div class="clearfix">
                            <div class="float-left  mt-2">
                                <h1>3,546</h1>
                            </div>
                            <div class="float-right text-right">
                                <span class="pie" data-peity='{ "fill": ["#5ed84f", "#f2f2f2"]}'>0.52/1.561</span>
                            </div>
                        </div>
                        <div class="progress progress-md mt-1 h-2">
                            <div class="progress-bar  bg-gradient-success w-50"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6 col-md-6 col-xl-3">
                <div class="card card-img-holder">
                    <div class="card-body">
                        <p class="card-text text-muted font-weight-semibold mb-1">Successful Task</p>
                        <div class="clearfix">
                            <div class="float-left  mt-2">
                                <h1>1,657</h1>
                            </div>
                            <div class="float-right text-right">
                                <span class="pie" data-peity='{ "fill": ["#fdb901", "#f2f2f2"]}'>0.52,1.041</span>
                            </div>
                        </div>
                        <div class="progress progress-md mt-1 h-2">
                            <div class="progress-bar  progress-bar-animated bg-warning w-55"></div>
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