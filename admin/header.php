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
	<!-- bootstrap 5.2 -->
	<link rel="stylesheet" href="assets/bootstrap-5.2.0-dist/css/bootstrap.min.css">
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
	<!-- raj-stylesheet -->
	<link rel="stylesheet" href="assets/css/raj_style.css">

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

	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="index.html">
								<img src="assets/img/logo.png" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul style="float: right;">
								<?php
								if (isset($_SESSION['admin_name'])) {
								?>
									<!-- menu start -->

									<li><a class="active" href="index.php">Dashboard</a></li>
									<li><a href="#">Category</a>
										<ul class="sub-menu">
											<li><a href="add_category.php">Add</a></li>
											<li><a href="view_category.php">View</a></li>
										</ul>
									</li>
									<li><a href="#">Subcategory</a>
										<ul class="sub-menu">
											<li><a href="subcategory.php">Add</a></li>
											<li><a href="view_subcategory.php">View</a></li>
										</ul>
									</li>

									<li><a href="#">Product</a>
										<ul class="sub-menu">
											<li><a href="product.php">Add</a></li>
											<li><a href="view_product.php">View</a></li>
										</ul>
									</li>
								

									<li><a href="logout.php"> <i class="fas fa-sign-out-alt"></i></a></li>


								<?php
								} else {
								?>
									<li class="current-list-item"><a href="adminlogin.php">Login</a></li>
								<?php
								}
								?>
							</ul>
						</nav>
						<div class="mobile-menu"></div>
						<!-- menu end -->
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- end header -->