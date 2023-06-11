<?php
include "connection.php";
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
                    <h1>Edit Product</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<div class="feature-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="featured-text">
                    <h2 class="pb-3">Edit<span class="orange-text">Product</span></h2>
                    <div class="row">
                        <div class="col-lg-12 col-md-8 mb-4 mb-md-7">
                            <?php
                            include "connection.php";

                            if (isset($_GET['id'])) {
                                include "connection.php";
                                $id = $_GET['id'];
                                $q = "Select * from  `orders` where `id` = '$id'";
                                $result = mysqli_query($con, $q);
                                $data = mysqli_fetch_assoc($result);
                            } else {
                                echo "<script>window.location.assign('view_order.php')</script>";
                            }
                            if (isset($_POST['submit'])) {
                                include "connection.php";
                                $status = $_POST['status'];
                                $q = "Update `orders` set `status`='$status' where `id` = '$id'";
                                $result = mysqli_query($con, $q);
                                if ($result > 0) {
                                    echo "<script>window.location.assign('view_order.php?msg=Record Updated')</script>";
                                } else {
                                    echo "<script>window.location.assign('view_order.php?msg=Try Again')</script>";
                                }
                            }
                            ?>

                            <form action="" method="POST" enctype="multipart/form-data">


                                <div class="form-group">
                                    <label for="name">Order ID</label>
                                    <input type="text" class="form-control" id="name" readonly value="<?php echo $data['id']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="name">Status</label>
                                    <select name="status" class="form-control" required>
                                        <option selected disabled value="">Select Status</option>
                                        <option>CONFIRMED</option>
                                        <option>OUT FOR DELIVERY</option>
                                        <option>DELIVERED</option>
                                        <option>CANCELLED</option>
                                    </select>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>


                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end featured section -->


<?php
require "footer.php";
?>