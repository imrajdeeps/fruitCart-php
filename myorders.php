<?php
require "header.php";
require("connection.php");
if (!isset($_SESSION['user_name'])) {
    echo "<script>window.location.assign('login.php?msg=Login First')</script>";
}
?>

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <h1>Order Details</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<?php
$userid = $_SESSION['user_id'];
$selectquery = "Select * from `orders` where `user_id` = $userid";
$res = mysqli_query($con, $selectquery);
if (mysqli_num_rows($res) > 0) {
?>
    <!-- heading -->
    <div class="product-section mt-150 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Your</span> Order Details</h3>
                        <p>Checkout details of items you ordered yet.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end heading -->


    <div class="container-fluid mb-150">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <!-- <h2 class="pb-3 text-center">My Order<span class="orange-text"> Details</span></h2> -->

                <?php
                if (isset($_GET['msg'])) {
                    echo "<div class='col-12 alert alert-info text-center'>" . $_GET['msg'] . "</div>";
                }
                ?>

                <thead>
                    <tr class="bg-dark text-white">

                        <th scope="col">Id</th>
                        <th scope="col">Products</th>
                        <th scope="col">Address</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Pincode</th>
                        <th scope="col">Subtotal</th>
                        <th scope="col">Shipping</th>
                        <th scope="col">Total</th>
                        <th scope="col">Message</th>
                        <th scope="col">Status</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>

                <tbody style="padding: 2px;">
                    <?php
                    foreach ($res as $data) {
                    ?>
                        <tr>
                            <td><?php echo $data['id']; ?></td>
                            <td>
                                <table class="table">
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Total</th>
                                    </tr>
                                    <?php
                                    $q = "select order_detail.*,product.name from order_detail join product on order_detail.product_id=product.id where order_detail.order_id = '" . $data['id'] . "'";
                                    $exe = mysqli_query($con, $q);
                                    foreach ($exe as $pro) {
                                    ?>
                                        <tr>
                                            <td><?php echo $pro['name']; ?></td>
                                            <td>&#8377;<?php echo $pro['price']; ?>.00</td>
                                            <td><?php echo $pro['quantity']; ?></td>
                                            <td>&#8377;<?php echo $pro['total_price']; ?>.00</td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </table>
                            </td>
                            <td><?php echo $data['address']; ?></td>
                            <td><?php echo $data['phone']; ?></td>
                            <td><?php echo $data['pincode']; ?></td>
                            <td>&#8377;<?php echo $data['subtotal']; ?>.00</td>
                            <td>&#8377;<?php echo $data['shipping']; ?>.00</td>
                            <td>&#8377;<?php echo $data['total']; ?>.00</td>
                            <td><?php echo $data['message']; ?></td>
                            <td><?php echo $data['status']; ?></td>
                            <td><?php echo $data['createdat']; ?></td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
    <!-- end featured section -->

<?php
} else {
?>

    <!-- heading -->
    <div class="product-section mt-150 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">You</span> do not place any order..</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end heading -->
<?php
}
?>
<!-- end logo carousel -->

<?php

require "footer.php"
?>