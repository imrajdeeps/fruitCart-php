<?php
require "header.php";
if (!isset($_SESSION['admin_name'])) {
    echo "<script>window.location.assign('adminlogin.php?err');</script>";
}
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
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <h1>Subcategory</h1>
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
                <h3><span class="orange-text">View</span> Subcategorys</h3>
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
                    <th scope="col">Id</th>
                    <th scope="col">Category</th>
                    <th scope="col">Name</th>
                    <th scope="col" class="col-2 text-center">Image</th>
                    <th scope="col" class="text-center">Edit</th>
                    <th scope="col" class="text-center">Delete</th>
                </tr>
            </thead>

            <tbody style="padding: 2px;">
                <?php
                include "connection.php";
                $selectquery = "SELECT `subcategory`.*, `category`.name as c_name FROM `subcategory` INNER JOIN `category` on `subcategory`.category_id = `category`.id";
                $res = mysqli_query($con, $selectquery);
                foreach ($res as $data) {
                ?>

                    <tr>
                        <td class="fw-bold"><?php echo $data['id']; ?></td>
                        <td class="fw-bold"><?php echo $data['c_name']; ?></td>
                        <td><?php echo $data['name']; ?></td>
                        <td><img class="img img-fluid" style="width:70%; border: 0.5px outset;  border-radius:10px;" src="../image/<?php echo $data['upload_image']; ?>"></td>
                        <!-- <td class="text-center"><img class="img img-fluid" style="width:70%; border: 0.5px outset;  border-radius:10px;" src="../image/<?php echo $data['upload_image']; ?>"></td> -->
                        <td>
                            <h5><a href="edit_subcategory.php?id=<?php echo $data['id']; ?>"><i class="fa fa-edit" aria-hidden="true"></i></a></h5>
                        </td>
                        <td>
                            <h5><a href="delete_subcategory.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash text-danger" aria-hidden="true"></i></h5></a>
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