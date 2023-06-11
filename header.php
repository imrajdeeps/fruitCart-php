<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>FruitCart</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="assets/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="assets/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="assets/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="assets/css/responsive.css">
	<!-- login style -->
	<link rel="stylesheet" href="assets/css/login.css">
	<!-- responsive leyouts by raj -->
	<link rel="stylesheet" href="assets/css/responsive-leyouts.css">
	<!-- bootsrap-5.2 -->
	<link rel="stylesheet" href="assets/bootstrap-5.2.0-dist/css/bootstrap.min.css">
	</body>

</head>

<body>

	<!--PreLoader-->
	<div class="loader">
		<div class="loader-inner">
			<div class="circle"></div>
		</div>
	</div>
	<!--PreLoader Ends-->

	<!-- header -->
	<div class="top-header-area main-head" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="index.php">
								<!-- <img src="assets/img/favicon.png" alt="" style="float: left;"> -->
								<h3 style="color: #f28123; font-family:cursive; font-style:normal;" class="">FruitCart</h3>
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>

								<li><a href="index.php">Home</a></li>
								<li><a href="about.php">About</a></li>
								<li><a href="shop.php">Shop</a>
								<li><a href="contact.php">Contact</a></li>
								<?php
								if (isset($_SESSION['user_name'])) {
								?>
									<li><a href="myorders.php">My Orders</a></li>
								<?php
								} else {
								?>
									<li><a href="user.php">Register</a></li>
									<li><a href="login.php">Login</a></li>
								<?php
								}
								?>
								<!-- login/signup button -->
								<li>
									<div class="header-icons">
										<?php
										if (isset($_SESSION['user_name'])) {
											$t = 0;
											if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
												foreach ($_SESSION['cart'] as $id => $quantity) {
													$t++;
												}
												count($_SESSION['cart']);
												//print_r($_SESSION['cart']);
											} else {
												$t = 0;
											}
										?>
											<a class="shopping-cart" href="cart.php"><i class="fas fa-shopping-cart"></i>&nbsp;<?php echo $t; ?></a>
											<a href="logout.php"><i class="fa fa-sign-out-alt"></i></a>
										<?php
										} else {
										?>
											<a class="shopping-cart" href="cart.php"><i class="fas fa-shopping-cart"></i></a>
										<?php
										} ?>
									</div>
								</li>
							</ul>
						</nav>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->