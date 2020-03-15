<!DOCTYPE html>
<html lang="en">
<head>
	<?php 
	// $uuid = null;
	
	use Ramsey\Uuid\Uuid;
	$uuid = Uuid::uuid1();
	if (Session::get('uuid_login')==null) {
		# code...
		Session::put('uuid_login',$uuid = Uuid::uuid1());

	}
	$e = URL::to('api/login_scan/'.Session::get('uuid_login'));
	// $e = "http://192.168.43.247/airmas_web/public/api/login_scan/".Session::get('uuid_login');
	
	// print($e);
	
	// print(Session::get('username'));
	?>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{asset('admin/global_assets/css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('admin/assets/css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('admin/assets/css/layout.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('admin/assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('admin/assets/css/colors.min.css')}}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="{{asset('admin/global_assets/js/main/jquery.min.js')}}"></script>
	<script src="{{asset('admin/global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('admin/global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{asset('admin/global_assets/js/plugins/forms/styling/uniform.min.js')}}"></script>

	<script src="{{asset('admin/assets/js/app.js')}}"></script>
	<script src="{{asset('admin/global_assets/js/demo_pages/login.js')}}"></script>
	<!-- /theme JS files -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://js.pusher.com/5.1/pusher.min.js"></script>
	<script type="text/javascript">
		var ses = '"{{Session::get("uuid_login")}}"';
	</script>
	<script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('eac5609656d84bb1a1fb', {
    	cluster: 'ap1',
    	forceTLS: true
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      // alert();
      var message = JSON.stringify(data['message']);
      if (message == ses) {
      	
      	location.reload(); 

      }
      

  });
</script>

</head>

<body>

	

	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="row" style="padding: 30px;">
				
				<div class="col-md-12"><center><img src="{{asset('admin/airmas.png')}}" width="300"></center></div>				
			</div>
			<div class="content d-flex justify-content-center align-items-center">
				<div class="row">
					<div class="col-sm-6" >
					<br>
					<br>
					<br> 
						<center>
						{!! QrCode::size(250)->generate($e); !!}
						
						</center>
						<br>
						<center>Scan to Login</center>
					</div>
					<!-- Login card -->
					<div class="col-sm-6">
						<form class="login-form" action="{{URL::to('/login')}}" method="post">
							{{csrf_field()}}
							<div class="card-body">
								<div class="text-center mb-3">
									<!-- <i class="icon-people icon-2x text-warning-400 border-warning-400 border-3 rounded-round p-3 mb-3 mt-1"></i> -->

									<h5 class="mb-0">Login </h5>
									<span class="d-block text-muted">Masukan Kredensial </span>
								</div>

								<div class="form-group form-group-feedback form-group-feedback-left">
									<input type="text" class="form-control" placeholder="Username" name="username">
									<div class="form-control-feedback">
										<i class="icon-user text-muted"></i>
									</div>
								</div>

								<div class="form-group form-group-feedback form-group-feedback-left">
									<input type="password" class="form-control" placeholder="Password" name="password">
									<div class="form-control-feedback">
										<i class="icon-lock2 text-muted"></i>
									</div>
								</div>


								<div class="form-group">
									<button type="submit" class="btn btn-primary btn-block">Login in <i class="icon-circle-right2 ml-2"></i></button>

								</div>



								<div class="form-group">
									<a href="{{URL::to('register')}}"  target="_blank" class="btn btn-dark btn-block">Register</a>
								</div>

								<span class="form-text text-center text-muted">Dengan melanjutkan konfimrasi,anda dapat masuk ke sistem kami</span>
								@if(Session::get('message')!=null)
								<div class="alert alert-success" role="alert">
									Registrasi berhasil silahkan ! silahkan anda login ke sistem terlebih dahulu
								</div>
								@endif


								<?php 
								Session::put('message',null);
								?>
								@if(Session::get('message_alert')!=null)
								<div class="alert alert-danger" role="alert">
									Mohon maaf kombinasi salah , mohon ulang sekali lagi ..
								</div>
								@endif
								<?php 
								Session::put('message_alert',null);
								?>
							</div>
						</form>
						<!-- /login card -->
					</div>
				</div>

			</div>
			<!-- /content area -->


			<!-- Footer -->
			<div class="navbar navbar-expand-lg navbar-light">
				<div class="text-center d-lg-none w-100">
					<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
						<i class="icon-unfold mr-2"></i>
						Footer
					</button>
				</div>

				<div class="navbar-collapse collapse" id="navbar-footer">
					<span class="navbar-text">
						&copy; 2020 . <a href="#">Scan to your web apps</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Hernawan Putra Malintan</a>
					</span>

					<ul class="navbar-nav ml-lg-auto">
						<li class="nav-item"><a href="https://kopyov.ticksy.com/" class="navbar-nav-link" target="_blank"><i class="icon-android"></i> <i class="icon-earth"></i> Support</a></li>
						
					</ul>
				</div>
			</div>
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>
</html>
