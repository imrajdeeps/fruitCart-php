<!-- header -->
<?php
require "header.php";
?>
<!-- end header -->

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="breadcrumb-text">
					<p>Fresh and Organic</p>
					<h1>Shop</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end breadcrumb section -->


<!-- products -->
<div class="product-section mt-150 mb-150">
	<div class="container">

		<div class="row product-lists">
			<?php
			include "connection.php";
			$q = "select * from `category`";
			// $q = "SELECT `product`.* , `category`.name AS cat_name FROM `product` INNER JOIN `category` ON `product`.category_id = `category`.id";
			$result = mysqli_query($con, $q);
			foreach ($result as $data) {
			?>
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="subcategory.php?id=<?php echo $data['id']; ?>"><img src="image/<?php echo $data['upload_image']; ?>" style="height:216px ;" alt=""></a>
						</div>
						<h3><?php echo $data['name']; ?></h3>
					</div>
				</div>
			<?php
			}
			?>
		</div>
	</div>
</div>
<!-- end products -->

<!-- logo carousel -->
<div class="logo-carousel-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="logo-carousel-inner">
					<div class="single-logo-item">
						<img src="assets/img/company-logos/1.png" alt="">
					</div>
					<div class="single-logo-item">
						<img src="assets/img/company-logos/2.png" alt="">
					</div>
					<div class="single-logo-item">
						<img src="assets/img/company-logos/3.png" alt="">
					</div>
					<div class="single-logo-item">
						<img src="assets/img/company-logos/4.png" alt="">
					</div>
					<div class="single-logo-item">
						<img src="assets/img/company-logos/5.png" alt="">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end logo carousel -->
<?php
include "footer.php"
?>