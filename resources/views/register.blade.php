<!DOCTYPE html>
<html lang="en" data-textdirection="LTR" class="loading">
  <head>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities." />
    <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app" />
    <meta name="author" content="PIXINVENT" />
    <title>Register Page - Robust Admin Template</title>
    <link rel="apple-touch-icon" sizes="60x60" href="./robust-assets/ico/apple-icon-60.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="./robust-assets/ico/apple-icon-76.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="./robust-assets/ico/apple-icon-120.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="./robust-assets/ico/apple-icon-152.png" />
    <link rel="shortcut icon" type="image/x-icon" href="./robust-assets/ico/favicon.ico" />
    <link rel="shortcut icon" type="image/png" href="./robust-assets/ico/favicon-32.png" />
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
  <body data-open="click" data-menu="vertical-menu" data-col="1-column" class="vertical-layout vertical-menu 1-column  blank-page">

    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="robust-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="flexbox-container">
    <div class="col-md-6 offset-md-3 col-xs-10 offset-xs-1 box-shadow-2 p-0">
		<div class="card border-grey border-lighten-3 px-2 py-2 m-0">
			<div class="card-header no-border">
				<div class="card-title text-xs-center">
        <img src="./robust-assets/ico/brgy_logo.png" alt="branding logo" style="width:100px"/>
				<br/><br/><p> BRGY RESIDENT, SERVICES AND FACILITY MANAGEMENT SYSTEM </p>
				</div>
				<h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>Create Account</span></h6>
			</div>
			<div class="card-body collapse in">	
				<div class="card-block">


          <form class="form" method="post" action="/register" enctype="multipart/form-data" />

          {{ csrf_field() }}
							<div class="form-body">
								<h4 class="form-section"><i class="icon-head"></i> Registration</h4>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
							        		<input type="text" class="form-control form-control-lg input-lg" id="name" name="name" placeholder="* User Name" />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
         									<input type="text" class="form-control form-control-lg input-lg" id="firstName" name="firstName" placeholder="* First Name" />
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" class="form-control form-control-lg input-lg" id="middleName" name="middleName" placeholder="Middle Name" />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
        									<input type="text" class="form-control form-control-lg input-lg" id="lastName" name="lastName" placeholder="* Last Name" />
										</div>
									</div>
								</div>
                				<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" class="form-control form-control-lg input-lg" id="suffix" name="suffix" placeholder="Suffix" />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input type="file" class="form-control form-control-lg input-lg" id="imagePath" name="imagePath" />
										</div>
									</div>
								</div>
                				<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input type="email" class="form-control form-control-lg input-lg" id="email" name="email" placeholder="Your Email Address" required="" />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input type="password" class="form-control form-control-lg input-lg" id="password" name="password" placeholder="Enter Password" required="" />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" class="form-control form-control-lg input-lg" id="position" name="position" placeholder="Enter Position" required="" />
										</div>
									</div>
								</div>
							<div class="form-actions center">
								<button type="button" class="btn btn-warning mr-1">
									<i class="icon-cross2"></i> Cancel
								</button>
								<button type="submit" class="btn btn-primary">
									<i class="icon-check2"></i> Save
								</button>
							</div>
						</form>


				</div>
				<p class="text-xs-center">Already have an account ? <a href="/login" class="card-link">Login</a></p>
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
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN ROBUST JS-->
    <script src="./robust-assets/js/app.min.js"></script>
    <!-- END ROBUST JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="./robust-assets/js/components/forms/form-login-register.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->
  </body>
</html>