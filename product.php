<?php
require "header.php";
?>
<!-- search area -->
<div class="search-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<span class="close-btn"><i class="fas fa-window-close"></i></span>
				<div class="search-bar">
					<div class="search-bar-tablecell">
						<h3>Search For:</h3>
						<input type="text" placeholder="Keywords">
						<button type="submit">Search <i class="fas fa-search"></i></button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end search arewa -->

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
			$id = $_GET['id'];
			$q = "select * from `product` where `subcategory_id`=$id";
			$result = mysqli_query($con, $q);
			foreach ($result as $data) {
			?>
				<div class="col-lg-4 col-md-6 text-center strawberry">
					<div class="single-product-item">
						<div class="product-image">
							<a href="addtocart.php?id=<?php echo $data['id']; ?>"><img src="image/<?php echo $data['upload_image']; ?>" style="height:216px ;" alt=""></a>
						</div>
						<h3><?php echo $data['name']; ?></h3>
						<p class="product-price">&#8377; <?php echo $data['price'];?></p>
						<small class="product-price d-block mb-2"><?php echo $data['description'];?> </small>
						<a href="addtocart.php?id=<?php echo $data['id']; ?>" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
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