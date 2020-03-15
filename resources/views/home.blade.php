
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div class="jumbotron">
  <h1 class="display-4">Hello, {{Session::get('username')}}!</h1>
  <p class="lead">Anda berhasil masuk ke Aplikasi Scan to Web Apps </p>
  <hr class="my-4">
  <?php 
  		$data = DB::table('tbl_user')->where('id',Session::get('id'))->first();
   ?>
  <p>Email anda <a href="">{{$data->email}}</a> </p>
  <p class="lead">
  	<form method="post" action="{{URL::to('logout')}}">
  		{{csrf_field()}}
		<button class="btn btn-danger btn-lg" type="submit">Sign Out</button>  		
  		
  	</form>
  </p>
</div>