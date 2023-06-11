<?php
require "header.php";
require("connection.php");
if (!isset($_SESSION['user_name'])) {
	echo "<script>window.location.assign('login.php?msg=Login First')</script>";
}
if(isset($_POST['submit'])){
	$user_id = $_SESSION['user_id'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$pincode = $_POST['pincode'];
	$message = $_POST['message'];
	$subtotal = $_POST['subtotal'];
	$total = $_POST['total'];
	$q = "insert into `orders` (`user_id`, `address`, `phone`, `pincode`, `subtotal`, `shipping`, `total`, `message`) values ('$user_id','$address','$phone','$pincode','$subtotal','50','$total','$message')";
	$result = mysqli_query($con,$q);
	if($result > 0){
		$last_id = mysqli_insert_id($con);
		foreach ($_SESSION['cart'] as $key => $value) {
			$s = "select * from product where id='$key'";
			$select = mysqli_query($con,$s);
			$product = mysqli_fetch_assoc($select);
			$price = $product['price'];
			$qtyTotal = $price*$value;
			$o = "INSERT INTO `order_detail`(`product_id`, `order_id`, `quantity`, `price`, `total_price`) VALUES ('$key','$last_id','$value','$price','$qtyTotal')";
			$res = mysqli_query($con,$o);
		}
		unset($_SESSION['cart']);
		echo "<script>window.location.assign('myorders.php')</script>";
	}else{
		echo "<script>window.location.assign('cart.php?msg=Try Again')</script>";
	}
}
//print_r($_SESSION['cart']);
?>


<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="breadcrumb-text">
					<p>Fresh and Organic</p>
					<h1>Cart</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end breadcrumb section -->

<!-- cart -->
<div class="cart-section mt-150 mb-150">
	<div class="container">
		<div class="row">
			<?php
				if(isset($_GET['msg'])){
					echo "<div class='col-12 alert alert-info'>" . $_GET["msg"] . "</div>";
				}
			?>
			<div class="col-lg-8 col-md-12">
				<div class="cart-table-wrap">
					<table class="cart-table">
						<thead class="cart-table-head">
							<tr class="table-head-row">
								<th class="product-remove"></th>
								<th class="product-image">Product Image</th>
								<th class="product-name">Name</th>
								<th class="product-price">Price</th>
								<th class="product-quantity">Quantity</th>
								<th class="product-total">Total</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$t = 0;
							$subtotal = 0;
							if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
								foreach ($_SESSION['cart'] as $id => $quantity) {
									$t++;
									//$obj = mysqli_connect("localhost","root","","wedding");
									$que = "select * from `product` where `id`='$id'";
									$res  = mysqli_query($con, $que);
									if ($data = mysqli_fetch_array($res)) {
							?>
										<tr class="table-body-row">
											<td class="product-remove"><a href='removeit.php?x=<?php echo $id; ?>'><i class="far fa-window-close"></i></a></td>
											<td class="product-image"><img src="image/<?php echo $data['upload_image']; ?>" alt=""></td>
											<td class="product-name"><?php echo $data['name']; ?></td>
											<td class="product-price">&#8377; <?php echo $data['price']; ?></td>
											<td class="product-quantity"><input type="number" value="<?php echo $quantity; ?>" name="quantity" min="1" onchange="increaseQty(this.value,<?php echo $data['id']; ?>)"></td>
											<td class="product-total"><?php $subtotal += ($data['price'] * $quantity);
																		echo ('&#8377; ' . $data['price'] * $quantity) . "<br/>"; ?></td>
										</tr>
								<?php
										$_SESSION["total"] = $subtotal;
									}
								}
							} else {
								?>
								<tr class="table-body-row">
									<td class="product-name" colspan="6">No Product in Cart.</td>
								</tr>
							<?php
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
			<?php
			if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
			?>
				<div class="col-lg-4">
					<div class="total-section">
						<table class="total-table">
							<thead class="total-table-head">
								<tr class="table-total-row">
									<th>Total</th>
									<th>Price</th>
								</tr>
							</thead>
							<tbody>
								<tr class="total-data">
									<td><strong>Subtotal: </strong></td>
									<td>&#8377; <?php echo $subtotal; ?></td>
								</tr>
								<tr class="total-data">
									<td><strong>Shipping: </strong></td>
									<td>&#8377; 50</td>
								</tr>
								<tr class="total-data">
									<td><strong>Total: </strong></td>
									<td>&#8377; <?php echo $total = $subtotal + '50'; ?></td>
								</tr>
							</tbody>
						</table>
						<!-- <div class="cart-buttons">
							<a href="cart.php" class="boxed-btn">Update Cart</a>
							<a href="checkout.php" class="boxed-btn black">Check Out</a>
						</div> -->
					</div>
				</div>
			<?php
			} ?>
		</div>
		<?php
		if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
		?>
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="checkout-accordion-wrap">
						<div class="accordion" id="accordionExample">
							<div class="card single-accordion">
								<div class="card-header" id="headingOne">
									<h5 class="mb-0">
										<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
											Billing Address
										</button>
									</h5>
								</div>

								<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
									<div class="card-body">
										<div class="billing-address-form">
											<form method="post">
												<p><input readonly value="<?php echo $_SESSION['user_name']; ?>" type="text" placeholder="Name">
												<input value="<?php echo $subtotal; ?>" name="subtotal" type="hidden">
												<input value="<?php echo $total; ?>" name="total" type="hidden">
											</p>

												<p><input readonly value="<?php echo $_SESSION['user_email']; ?>" type="email" placeholder="Email"></p>

												<p><input type="number" placeholder="Phone" value="<?php echo $_SESSION['user_phone']; ?>" required name="phone"></p>

												<p><input type="number" placeholder="Pincode" name="pincode" required></p>

												<p><textarea required name="address" id="address" cols="30" rows="10" placeholder="Address"></textarea></p>

												<p><textarea name="message" id="message" cols="30" rows="10" placeholder="Say Something (Optional)"></textarea></p>
												<div class="cart-buttons">
													<input type="submit" name="submit" class="boxed-btn border-0 mt-0" value="Check Out">
													</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php
		}
		?>
	</div>
</div>
<!-- end cart -->

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
<script>
	function increaseQty(val, id) {
		window.location.assign('increase.php?id=' + id + '&qty=' + val);
	}
</script>
<!-- end logo carousel -->
<?php
require "footer.php";
?>