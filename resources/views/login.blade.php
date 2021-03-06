<!DOCTYPE html>
<html lang="en" data-textdirection="LTR" class="loading">
  <head>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities." />
    <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app" />
    <meta name="author" content="PIXINVENT" />
    <title>BRGY 629 RSFMS</title>
    <link rel="apple-touch-icon" sizes="60x60" href="./robust-assets/ico/brgy_logo.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="./robust-assets/ico/brgy_logo.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="./robust-assets/ico/brgy_logo.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="./robust-assets/ico/brgy_logo.png" />
    <link rel="shortcut icon" type="image/png" href="./robust-assets/ico/brgy_logo.png" />
    <link rel="shortcut icon" type="image/png" href="./robust-assets/ico/brgy_logo.png" />

    

    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-touch-fullscreen" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="default" />
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" href="{{ URL::asset('/robust-assets/css/vendors.min.css') }}" />   
    <!-- BEGIN VENDOR CSS-->
    <!-- BEGIN Font icons-->
    <link rel="stylesheet" type="text/css" href="./robust-assets/fonts/icomoon.css" />
    <link rel="stylesheet" type="text/css" href="./robust-assets/fonts/flag-icon-css/css/flag-icon.min.css" />
    <!-- END Font icons-->
    <!-- BEGIN Plugins CSS-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/sliders/slick/slick.css') }}" />
    <!-- END Plugins CSS-->
    
    <!-- BEGIN Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="./robust-assets/css/plugins/forms/icheck/icheck.css" />
    <link rel="stylesheet" type="text/css" href="./robust-assets/css/plugins/forms/icheck/custom.css" />
    <!-- END Vendor CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" href="{{ URL::asset('/robust-assets/css/app.min.css') }}" />
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/style.css') }}" />
    <!-- END Custom CSS-->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
  <body data-open="click" data-menu="vertical-menu" data-col="1-column" class="vertical-layout vertical-menu 1-column bg-cyan bg-lighten-2">
    
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="robust-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="col-md-4 offset-md-4 col-xs-8 offset-xs-2 box-shadow-2 p-0 center">
	<div class="card border-grey border-lighten-3 px-2 py-2 row mb-0">
		<div class="card-header no-border">
			<div class="card-title text-xs-center">
				<img src="./robust-assets/ico/brgy_logo.png" alt="branding logo" style="width:100px"/>
				<br/><br/><p> BRGY RESIDENT, SERVICES AND FACILITY MANAGEMENT SYSTEM </p>
			</div>
			</div>
		<div class="card-body collapse in">
			<div class="card-block">


				<form class="form-horizontal" method="post" action="/login" novalidate="" />

        {{ csrf_field() }}
					<fieldset class="form-group has-feedback has-icon-left">
						<input type="text" class="form-control input-lg" id="email" name="email" placeholder="Your Email" tabindex="1" required="" data-validation-required-message="Please enter your email." />
						<div class="form-control-position">
						    <i class="icon-head"></i>
						</div>
						<div class="help-block font-small-3"></div>
					</fieldset>
					<fieldset class="form-group has-feedback has-icon-left">
						<input type="password" class="form-control input-lg" id="password" name="password" placeholder="Enter Password" tabindex="2" required="" data-validation-required-message="Please enter valid passwords." />
						<div class="form-control-position">
						    <i class="icon-key3"></i>
						</div>
						<div class="help-block font-small-3"></div>
					</fieldset>
					<fieldset class="form-group row">
						<div class="col-md-6 col-xs-12 text-xs-center text-md-left">
							<fieldset>
				                <input type="checkbox" id="remember-me" class="chk-remember" />
				                <label for="remember-me"> Remember Me</label>
				            </fieldset>
						</div>
						<div class="col-md-6 col-xs-12 text-xs-center text-md-right"><a href="./recover-password.html" class="card-link">Forgot Password?</a></div>
					</fieldset>
					<button type="submit" class="btn btn-danger btn-block btn-lg"><i class="icon-unlock2"></i> Login</button></br>
          <p class="card-subtitle line-on-side text-muted text-xs-center font-small-3 mx-2 my-1">
          <span> OR </span>
          </p>
          </br>
          <a href="/register" class="btn btn-primary btn-block btn-lg"><i class="icon-head"></i> Sign Up</a>
				</form>


			</div>
		</div>
	</div>
</section>
        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- BEGIN VENDOR JS-->
    <script src="./robust-assets/js/vendors.min.js"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="./robust-assets/js/plugins/forms/validation/jqBootstrapValidation.js" type="text/javascript"></script>
    <script src="./robust-assets/js/plugins/forms/icheck/icheck.min.js" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN ROBUST JS-->
   <script src="{{ URL::asset('/robust-assets/js/app.min.js') }}"></script>
    <!-- END ROBUST JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="./robust-assets/js/components/forms/form-login-register.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->
  </body>
</html>