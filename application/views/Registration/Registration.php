<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

	<!-- Including the Styles -->
	<link rel="stylesheet" href="<?= base_url()?>css/login_a.css">
	<link rel="stylesheet" href="<?= base_url()?>css/bootstrap.css">
	<link rel="stylesheet" href="<?= base_url()?>css/all.css">



    <title>Login</title>
</head>
<body>

<body>
	<div id="overlay"></div>
	<div class="container">
		<div class="row">
		<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
			<div class="card card-signin my-5 shadow">
			<div class="card-body">
				<h5 class="card-title text-center">Sign Up</h5>
				<?php echo validation_errors(); ?>
				<form action="<?= site_url('login/addUser')?>" method="post" class="form-signin">

					<div class="container input-group-prepend px-0 mx-0" style="">
						<div class="form-label-group col-6 mx-0 px-0 pr-2">
							<input type="text" id="inputEmail" name="firstname" class="form-control" name="email" placeholder="Email address" required autofocus>
							<label for="inputEmail">First Name</label>
						</div>
						<div class="form-label-group col-6 mx-0 px-0 pl-2">
							<input type="text" id="inputEmail" name="lastname" class="form-control" name="email" placeholder="Email address" required >
							<label for="inputEmail">Last Name</label>
						</div>
						
						
					</div>

					<div class="form-label-group">
						<input type="email" id="inputEmail" name="email" class="form-control" name="email" placeholder="Email address" required >
						<label for="inputEmail">Email address</label>
					</div>

					<div class="form-label-group">
						<input type="password" id="inputPassword" name="password" name="password" class="form-control" placeholder="Password" required>
						<label for="inputPassword">Password</label>
					</div>
					<div class="form-label-group">
						<input type="password" id="inputPassword" name="passwordConf" class="form-control" placeholder="Password" required>
						<label for="inputPassword">Confirm Password</label>
					</div>

					<button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign Up</button>
					<hr class="my-4">
					</form>
					<div class="text" >
						<a href="<?= site_url('login')?>"" class="regLink">Already a Member</a> 
						
					</div>
					<!-- <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Register</button> -->
				

				
				
			</div>
			</div>
		</div>
		</div>
	</div>
</body>

<!-- My Custom JavaScripts File -->
<script src="<?= base_url()?>js/myscripts.js"></script>
<script src="<?= base_url()?>js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url()?>js/jquery.slim.js"></script>



    
</body>
</html>
