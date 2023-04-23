<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Ratibni </title>
<link rel="icon" type="image/png" href="{{ asset('global_assets/images/favicon.png')}}" />
<!-- Global stylesheets -->
<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
<link href="global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
<link href="assets/css/layout.min.css" rel="stylesheet" type="text/css">
<link href="assets/css/components.min.css" rel="stylesheet" type="text/css">
<link href="assets/css/colors.min.css" rel="stylesheet" type="text/css">
<!-- /global stylesheets -->
<!-- Core JS files -->
<script src="global_assets/js/main/jquery.min.js"></script>
<script src="global_assets/js/main/bootstrap.bundle.min.js"></script>
<script src="global_assets/js/plugins/loaders/blockui.min.js"></script>
<!-- /core JS files -->
<!-- Theme JS files -->
<script src="assets/js/app.js"></script>

<!-- /theme JS files -->

</head>
<body>
<!-- Main navbar --> 

<!-- /main navbar --> 

<!-- Page content -->
<div class="page-content"> 
  
  <!-- Main content -->
  <div class="content-wrapper login_bg">
  <!-- bg_animate -->
    <ul class="bg-bubbles">
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
    </ul>
    
    <!-- Content area -->
    <div class="content d-flex justify-content-center align-items-center login_panel_area"> 
      <!-- Login form -->
      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="card mb-0">
          <div class="card-body">
            <div class="text-center mb-3"> <img src="{{ asset('global_assets/images/ratibni-logo.png')}}" alt="logo" class="img-circle img-fluid img_logo">
              <h5 class="mb-0">Login to your account</h5>
              <span class="d-block">Enter your credentials below</span> </div>
            <div class="form-group form-group-feedback form-group-feedback-left">
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email *" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
              @error('email') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
              <div class="form-control-feedback"> <i class="icon-user mt-2 text-muted"></i> </div>
            </div>
            <div class="form-group form-group-feedback form-group-feedback-left">
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password *" name="password" required autocomplete="current-password">
              @error('password') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
              <div class="form-control-feedback"> <i class="icon-lock2 mt-2 text-muted"></i> </div>
            </div>
            <div class="form-group form-group-feedback form-group-feedback-left" style="margin-bottom:10px">
              <input class="form-check-input1" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
              <label class="form-check-label" for="remember"> {{ __('Remember Me') }} </label>
            </div>
            <div class="form-group mb-0">
              <button type="submit" class="btn btn-primary btn-block">Sign in <i class="icon-circle-right2 ml-2"></i></button>
            </div>
            <!-- <div class="text-center">
                           <a href="login_password_recover.html">Forgot password?</a>
                        </div> --> 
          </div>
        </div>
      </form>
      <!-- /login form --> 
    </div>
    <!-- /content area --> 
    
  </div>
  <!-- /main content --> 
</div>
<!-- /page content -->
</body>
</html>
