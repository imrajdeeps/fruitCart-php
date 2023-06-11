<?php
require "header.php";
if (!isset($_SESSION['admin_name'])) {
	echo "<script>window.location.assign('adminlogin.php?err');</script>";
}
?>

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="breadcrumb-text">
					<h1>View Contact</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end breadcrumb section -->

<!-- heading -->
<div class="container mt-100">
    <div class="row">
        <div class="col-lg-8 offset-lg-2 text-center">
            <div class="section-title">
                <h3><span class="orange-text">View</span> Contact</h3>
            </div>
        </div>
    </div>
</div>
<!-- end heading -->

<!-- contact form -->
<div class="container mb-150 text-center">
	<div class="table-responsive">
		<table class="table table-bordered table-hover table-striped">
			<thead>
				<tr class="bg-dark text-white">
					<th scope="col">Name</th>
					<th scope="col">Email</th>
					<th scope="col">Phone</th>
					<th scope="col">Subject</th>
					<th scope="col" class="col-4">Messege</th>
					<th scope="col">Delete</th>
				</tr>
			</thead>

			<tbody style="padding: 2px;">
				<?php
				include "connection.php";
				$selectquery = "Select * from `contact`";
				$res = mysqli_query($con, $selectquery);
				foreach ($res as $data) {
				?>

					<tr>

						<td><?php echo $data['name']; ?></td>
						<td><?php echo $data['email']; ?></td>
						<td><?php echo $data['phone']; ?></td>
						<td><?php echo $data['subject']; ?></td>
						<td class="text-justify"><?php echo $data['messege']; ?></td>
						<td>
							<h5><a href="delete_contact.php?id=<?php echo $data['id']; ?>"><i class="fa fa-trash" aria-hidden="true"></i></h5></a>
						</td>

					</tr>
				<?php
				}
				?>

			</tbody>
		</table>
	</div>
	<!-- end contact form -->
</div>
<p>  .</p>
<?php
require "footer.php"
?>