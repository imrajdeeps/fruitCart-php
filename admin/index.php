<?php
require "header.php";
if(!isset($_SESSION['admin_name'])){
	echo "<script>window.location.assign('adminlogin.php?err');</script>";
  }
?>



<main id="home-main">
	<img src="./assets/img/hero-bg-2.jpg" alt="" class="img-fluid">
	<div class="container">
		<div class="main_row">
			<a href="index.php">
				<div class="home-page-btns"><i class="fa fa-home"></i> HOME</div>
			</a>
			<a href="view_order.php">
				<div class="home-page-btns"><i class="fa fa-shopping-cart"></i> ORDERS</div>
			</a>
			<a href="view_contact.php">
				<div class="home-page-btns"><i class="fas fa-comment-alt"></i> CONTACT</div>
			</a>
			<a href="view_user.php">
				<div class="home-page-btns"><i class="fas fa-comment-alt"></i> USERS</div>
			</a>
		</div>
	</div>
</main>

<!-- footer -->
<?php
include "footer.php"
?>
<!-- end footer -->