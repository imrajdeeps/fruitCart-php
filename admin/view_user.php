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
                    <h1>View User</h1>
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
                <h3><span class="orange-text">View</span> User Details</h3>
            </div>
        </div>
    </div>
</div>
<!-- end heading -->

<div class="container mb-150 text-center">
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr class="bg-dark text-white">
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Contact</th>
                    <th scope="col">DOB</th>
                    <th scope="col">Id Proof</th>
                    <th scope="col">Address Proof</th>
                    <!-- <th scope="col">Edit</th>
                    <th scope="col">Delete</th> -->
                </tr>
            </thead>

            <tbody style="padding: 2px;">
                <?php
                include "connection.php";
                $selectquery = "Select * from `user`";
                $res = mysqli_query($con, $selectquery);
                foreach ($res as $data) {
                ?>

                    <tr>
                        <td><?php echo $data['id']; ?></td>
                        <td><?php echo $data['name']; ?></td>
                        <td><?php echo $data['email']; ?></td>
                        <td><?php echo $data['password']; ?></td>
                        <td><?php echo $data['contact']; ?></td>
                        <td><?php echo $data['dob']; ?></td>
                        <td><a target="_blank" href="../image/<?php echo $data['upload_id']; ?>"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                        <td><a target="_blank" href="../image/<?php echo $data['upload_addressid']; ?>"><i class="fa fa-eye" aria-hidden="true"></i></a></td>

                        <!-- <td><img class="img img-fluid" style="height:50px;" src="image/<?php echo $data['upload_image']; ?>"></td> -->
                        <!-- <td><h4><a><i class="fa fa-eye" aria-hidden="true"></i></a></h4></td>
                        <td><h4><a href="user.php?id=<?php echo $data['id']; ?>" ><i class="fa fa-trash" aria-hidden="true"></i></h4></a></td> -->
                    </tr>
                <?php
                }
                ?>

            </tbody>
        </table>
    </div>
</div>
<!-- end featured section -->

<small>.</small>
<?php

require "footer.php"
?>