<?php
require "header.php";
?>


<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="breadcrumb-text">
					<p>Get 24/7 Support</p>
					<h1>Contact us</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end breadcrumb section -->

<!-- contact form -->
<div class="contact-from-section mt-150 mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 mb-5 mb-lg-0">
				<div class="form-title">
					<h2>Have you any question?</h2>
					<p>Kindly put your question in the message box below.</p>
				</div>
				<div id="form_status"></div>
				<div class="contact-form">
					<form method="POST" id="fruitkha-contact" onSubmit="return valid_datas( this );">
						<?php
						include "connection.php";

						if (isset($_POST['submit'])) {
							$name = $_POST['name'];
							$emial = $_POST['email'];
							$phone = $_POST['phone'];
							$subject = $_POST['subject'];
							$messege = $_POST['message'];
							$insertquery = " insert into  contact (name,email,phone,subject,messege) values('$name','$emial','$phone','$subject','$messege') ";

							$res = mysqli_query($con, $insertquery);
							if ($res) {

						?>
								<script>
									alert("Submitted successfully, we will response to your query within 2-hours");
								</script>
							<?php

							} else {

							?>
								<script>
									alert("Try Again! ");
								</script>

						<?php

							}
						}

						?>

						<p>
							<input type="text" name="name" placeholder="Name" name="name" id="name">
							<input type="email" name="email" placeholder="Email" name="email" id="email">
						</p>
						<p>
							<input type="tel" name="phone" placeholder="Phone" name="phone" id="phone">
							<input type="text" placeholder="Subject" name="subject" id="subject">
						</p>
						<p><textarea name="message" name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea></p>
						<input type="hidden" name="token" value="FsWga4&@f6aw" />
						<p><input type="submit" name="submit" value="Submit"></p>
					</form>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="contact-form-wrap">
					<div class="contact-form-box">
						<h4><i class="fas fa-map"></i> Shop Address</h4>
						<p>St-07, Hargobind Nagar <br> Phagwara, Punjab. <br> India</p>
					</div>
					<div class="contact-form-box">
						<h4><i class="far fa-clock"></i> Shop Hours</h4>
						<p>MON - FRIDAY: 8 to 9 PM <br> SAT - SUN: 10 to 8 PM </p>
					</div>
					<div class="contact-form-box">
						<h4><i class="fas fa-address-book"></i> Contact</h4>
						<p>Phone: +91 6283960245 <br> Email: support@fruicart.com</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end contact form -->

<!-- find our location -->
<div class="find-location blue-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<p> <i class="fas fa-map-marker-alt"></i> Find Our Location</p>
			</div>
		</div>
	</div>
</div>
<!-- end find our location -->

<!-- google map section -->
<div class="embed-responsive embed-responsive-21by9">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6824.391461547124!2d75.77139622426512!3d31.215306251486133!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391af4c3bc49576b%3A0x2203fd102f0bf7cf!2sGuru%20Hargobind%20Nagar%2C%20Phagwara%2C%20Punjab%20144401!5e0!3m2!1sen!2sin!4v1662132708437!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
<!-- end google map section -->


<?php
require "footer.php"
?>