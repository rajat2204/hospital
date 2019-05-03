<!doctype html>
<html lang="en" dir="ltr">
<!-- NRTindex.html by NRT, Mon, 31 Dec 2018 06:25:12 GMT -->
@include('layout.header')
	<body class="app sidebar-mini rtl">
		<div id="global-loader" ></div>
		<div class="page">
			<div class="page-main">
				<div class="app-header header py-1 d-flex">
					<div class="container-fluid">
						<div class="d-flex">
							<a class="header-brand" href="index.html">
								<img src="{{asset('assets/images/brand/logo.png')}}" class="header-brand-img" alt="NRT logo">
							</a>
							<a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#"></a>
							<div class="d-none d-lg-block horizontal">
								<ul class="nav">
									<li class="">
										<div class="dropdown d-none d-md-flex">
											<a href="#" class="d-flex nav-link pr-0 mt-3 country-flag1" data-toggle="dropdown">
												<div>
												<strong><b><h3 style=" font-size: 25px;color:#520099;margin-left: 30px;font-weight: 600;">	Hospital Management System </h3></b></strong>
												</div>
											</a>
									</li>
                	            </ul>
						    </div>
						  	<div class="d-flex order-lg-2 ml-auto">
							    <div class="mt-2">
  									<div class="searching mt-2 ml-2 mr-3">
  										<a href="" class="search-open mt-3"></a>
  										<div class="search-inline">
  											<form>
    												<input type="text" class="form-control" placeholder="Search here">
    												<button type="submit">
    													<i class="fa fa-search"></i>
    												</button>
    												<a href="" class="search-close">
    													<i class="fa fa-times"></i>
    												</a>
  											</form>
  										</div>
  									</div>
								</div>
								<div class="dropdown" style="margin-right:40px">
  									<a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
  										<span class="avatar avatar-md brround"><img src="{{asset('assets/images/faces/male/40.jpg')}}" alt="Profile-img" class="avatar avatar-md brround"></span>
  									</a>
  									<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow ">
  										<div class="text-center">
  											<a href="#" class="dropdown-item text-center font-weight-sembold user">{{ucfirst(Auth::user()->name)}}</a>
  											<div class="dropdown-divider"></div>
  										</div>
  										<a class="dropdown-item" href="#">
  											<i class="fa fa-user "></i> Profile
  										</a>
  										<a class="dropdown-item" href="#">
  											<i class="fa fa-cog"></i> Settings
  										</a>
  										<a class="dropdown-item" href="#">
											<i class="fa fa-cog"></i> Lock Screen
										</a>
										<a class="dropdown-item" href="{{ route('logout') }}"
										
										  onclick="event.preventDefault();
														document.getElementById('logout-form').submit();">
														<i class=" fa fa-power-off"></i>
														
										   {{ __('Logout') }}
										    
									   </a>
									   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										   @csrf
									   </form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				@include('layout.sidebar')
				<div class="app-content  my-3 my-md-5" style="margin-top: 60px;!important; padding:30px; color: black; ">
					<div class="side-app">
						<div class="row" style="padding:5px;">
							<div class="col-md-12">
								@include('layout.message')
								@if ($errors->any())
									<div class="alert alert-danger" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true"><b>X</b></button>
										<ul>
											@foreach ($errors->all() as $error)
												<li>{{ $error }}</li>
											@endforeach
										</ul>
									</div>
									
								@endif
							</div>
						</div>

            @yield('content')

					</div>
        		</div>
				@include('layout.footer')
				</div>
			</div>
		</div>
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>
		@include('layout.footer-script')
		
   		 @stack('script')
	</body>
</html>
