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
                    <h1>Category</h1>
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
                <h3><span class="orange-text">View</span> Categorys</h3>
            </div>
        </div>
    </div>
</div>
<!-- end heading -->


<div class="container mb-150 text-center">
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">

            <?php
            if (isset($_GET['msg'])) {
                echo "<div class='col-12 alert alert-info text-center'>" . $_GET['msg'] . "</div>";
            }
            ?>
            <thead>
                <tr class="bg-dark text-white">
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col" class="col-2 text-center">Image</th>
                    <th scope="col" class="text-center">Edit</th>
                    <th scope="col" class="text-center">Delete</th>
                </tr>
            </thead>

            <tbody style="padding: 2px;">
                <?php
                include "connection.php";
                $selectquery = "Select * from `category`";
                $res = mysqli_query($con, $selectquery);
                foreach ($res as $data) {
                ?>

                    <tr>
                        <td class="fw-bold"><?php echo $data['id']; ?></td>
                        <td class="fw-bold"><?php echo $data['name']; ?></td>
                        <td class="text-justify"><?php echo $data['description']; ?></td>
                        <td><img class="img img-fluid" style="width:70%; border: 0.5px outset;  border-radius:10px;" src="../image/<?php echo $data['upload_image']; ?>"></td>
                        <td>
                            <h5><a href="edit_category.php?id=<?php echo $data['id']; ?>" class="text-primary"><i class="fa fa-edit" aria-hidden="true"></i></a></h5>
                        </td>
                        <td>
                            <h5><a href="delete_category.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash text-danger" aria-hidden="true"></i></h5></a>
                        </td>

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