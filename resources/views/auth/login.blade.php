@include('layout.header')
    <body class="login-img">
        <div class="page">
            <div class="page-single">
                <div class="container">
                    <div class="row">
                        <div class="col mx-auto">
                            <div class="text-center mb-6">
                                <img src="assets/images/brand/logo.png" class="img-responsive" alt="logo" width="200px" height="200px">
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="card-group mb-0">
                                        <div class="card p-4">
                                            <div class="card-body">
                                              <form method="POST" action="{{ route('login') }}">
                                                    @csrf
                                                    <h1>Login</h1>
                                                    <p class="text-muted">Sign In to your account</p>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                                        @if ($errors->has('email'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('email') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="input-group mb-4">
                                                        <span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
                                                       <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                                        @if ($errors->has('password'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('password') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <button  type="submit"  class="btn btn-gradient-primary btn-block">Login</button>
                                                        </div>
                                                        @if (Route::has('password.request'))
                                                            <a  href="{{ route('password.request') }}">
                                                                {{ __('Forgot Your Password?') }}
                                                            </a>
                                                        @endif
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-6 offset-md-4">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                                <label class="form-check-label" for="remember">
                                                                    {{ __('Remember Me') }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="card text-white bg-primary py-5 d-md-down-none login-transparent">
                                            <div class="card-body text-center justify-content-center ">
                                                <h2>Sign up</h2>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.ed ut perspiciatis unde omnis iste natus error sit voluptatem  </p>
                                                <a href="{{ route('register') }}" class="btn btn-gradient-success active mt-3">Register Now!</a>
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


        <!-- Dashboard js -->
        <script src="assets/js/vendors/jquery-3.2.1.min.js"></script>
        <script src="assets/js/vendors/bootstrap.bundle.min.js"></script>
        <script src="assets/js/vendors/jquery.sparkline.min.js"></script>
        <script src="assets/js/vendors/selectize.min.js"></script>
        <script src="assets/js/vendors/jquery.tablesorter.min.js"></script>
        <script src="assets/js/vendors/circle-progress.min.js"></script>
        <script src="assets/plugins/rating/jquery.rating-stars.js"></script>
        
        <!-- Custom scroll bar Js-->
        <script src="assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>
        
    </body>

<!-- NRTlogin.html by NRT, Mon, 31 Dec 2018 06:28:47 GMT -->
</html>
