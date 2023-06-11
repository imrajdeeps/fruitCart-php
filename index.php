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
 <!-- end search area -->

 <!-- home page slider -->
 <div class="homepage-slider">
 	<!-- single home slider -->
 	<div class="single-homepage-slider homepage-bg-1">
 		<div class="container">
 			<div class="row">
 				<div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
 					<div class="hero-text">
 						<div class="hero-text-tablecell">
 							<p class="subtitle">Fresh & Organic</p>
 							<h1>Delicious Seasonal Fruits</h1>
 							<div class="hero-btns">
 								<a href="shop.php" class="boxed-btn">Fruit Collection</a>
 								<a href="contact.php" class="bordered-btn">Contact Us</a>
 							</div>
 						</div>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 	<!-- single home slider -->
 	<div class="single-homepage-slider homepage-bg-2">
 		<div class="container">
 			<div class="row">
 				<div class="col-lg-10 offset-lg-1 text-center">
 					<div class="hero-text">
 						<div class="hero-text-tablecell">
 							<p class="subtitle">Fresh Everyday</p>
 							<h1>100% Organic Collection</h1>
 							<div class="hero-btns">
 								<a href="shop.php" class="boxed-btn">Visit Shop</a>
 								<a href="contact.php" class="bordered-btn">Contact Us</a>
 							</div>
 						</div>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 	<!-- single home slider -->
 	<div class="single-homepage-slider homepage-bg-3">
 		<div class="container">
 			<div class="row">
 				<div class="col-lg-10 offset-lg-1 text-right">
 					<div class="hero-text">
 						<div class="hero-text-tablecell">
 							<p class="subtitle">Mega Sale Going On!</p>
 							<h1>Get December Discount</h1>
 							<div class="hero-btns">
 								<a href="shop.php" class="boxed-btn">Visit Shop</a>
 								<a href="contact.php" class="bordered-btn">Contact Us</a>
 							</div>
 						</div>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 </div>
 <!-- end home page slider -->

 <!-- products -->
<div class="product-section mt-150 mb-150">
	<div class="container">
	<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="section-title">
					<h3><span class="orange-text">Our</span> Products</h3>
					<p>A premium selection of the finest fruits sourced from the best farms across India.</p>
				</div>
			</div>
		</div>

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
<!-- features list section -->
<div class="list-section pt-80 pb-80">
	<div class="container">

		<div class="row">
			<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
				<div class="list-box d-flex align-items-center">
					<div class="list-icon">
						<i class="fas fa-shipping-fast"></i>
					</div>
					<div class="content">
						<h3>Free Shipping</h3>
						<p>When order over &#x20B9;1000</p> <!-- INDIAN RUPEE SYMBOL  &#8377 or &#x20B9-->
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
				<div class="list-box d-flex align-items-center">
					<div class="list-icon">
						<i class="fas fa-phone-volume"></i>
					</div>
					<div class="content">
						<h3>24/7 Support</h3>
						<p>Get support all day</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="list-box d-flex justify-content-start align-items-center">
					<div class="list-icon">
						<i class="fas fa-sync"></i>
					</div>
					<div class="content">
						<h3>Refund</h3>
						<p>Get refund within 3 days!</p>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
<!-- end features list section -->

 <?php
	include "footer.php"
	?>