<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>vOrchid</title>

    <link rel="stylesheet" href="<?= base_url()?>css/landing.css">

	<!-- Custom fonts for this template-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

  	<!-- Custom styles for this template-->
  	<link href="<?= base_url()?>css/bootstrap.min.css" rel="stylesheet">
  	<link rel="stylesheet" href="<?= base_url()?>css/sb-admin-2.min.css">
	<link rel="stylesheet" href="<?= base_url()?>css/footer.css">
	<link rel="stylesheet" href="<?= base_url()?>css/contact_us.css">

</head>
<body>

    <div class="">
		<header>

			
			<nav class="navbar navbar-light bg-light fixed-top nav-pills" style="width: 100%;>

				<div class="container px-lg-0 mx-lg-0" style="width: 100%;">

					<div class="col-lg-2 mx-lg-0" style="">
					
						<a class="navbar-brand" href="#">
							<img src="/docs/4.3/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
							VOrchid
						</a>
					</div>
					
					

					<div class="col-lg-8 mx-lg-auto" style="">
						<ul class="nav justify-content-center">

						<?php if($active == "Home"):?>

							<li class="nav-item">
								<a class="nav-link active" href="#">Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">Products</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">Orders</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">Special</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">About</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">Contact Us</a>
							</li>
						<?php elseif($active == "Contact Us"):?>
							<li class="nav-item">
								<a class="nav-link " href="#">Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">Products</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">Orders</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">Special</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">About</a>
							</li>
							<li class="nav-item">
								<a class="nav-link active" href="#">Contact Us</a>
							</li>
							<?php endif?>
							
						 

							
							
						</ul>

					</div>
					<div class="col-lg-2 " style="">
					<?php 

						$username = ($user['id'] != null ? $user['firstname']  : "Guest");
					
					
					?>

						<ul class="nav justify-content-end">
							<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?= "Hi! " . $username?></a>
							<div class="dropdown-menu">

								<?php if($user['id'] != null) : ?>

									<a class="dropdown-item" href="<?= site_url('login')?>">Profile</a>
									<a class="dropdown-item" href="<?= site_url('login/register')?>">Message</a>
									<a class="dropdown-item" href="<?= site_url('login/register')?>">Inquiery</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="<?= site_url('login/logout')?>">Log Out</a>

								<?php else : ?>
									<a class="dropdown-item" href="<?= site_url('login')?>">Login</a>
									<a class="dropdown-item" href="<?= site_url('login/register')?>">Register</a>
									<a class="dropdown-item" href="#"></a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#"></a>

								<?php endif; ?>
							</div>
							
								
							</li>
							
 

							<li class="nav-item">
								<a class="nav-link" href="#">
									<img class="rounded" src="<?= base_url() . "Images_Icons/user.png"?>" alt="sfs" style="width: 25px; height: 25px;">
								</a>
							</li>
							 
						</ul>

					</div>

				</div>
				
			</nav>
		</header>
        
    </div>

    