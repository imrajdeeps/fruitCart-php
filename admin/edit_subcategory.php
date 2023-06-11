<?php
include "connection.php";
$id = $_GET['id'];
$query = "select * from `subcategory` where id='$id'";
$res = mysqli_query($con, $query);
$data = mysqli_fetch_assoc($res);
?>
<?php
require "header.php";
if(!isset($_SESSION['admin_name'])){
	echo "<script>window.location.assign('adminlogin.php?err');</script>";
  }
?>
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <h1>Edit Subcategory</h1>
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
                    <h2 class="pb-3">edit<span class="orange-text">SubCategory</span></h2>
                    <div class="row">
                        <div class="col-lg-12 col-md-8 mb-4 mb-md-7">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <?php
                                include "connection.php";
                                if (isset($_POST['submit'])) {
                                    $id = $data['id'];
                                    $category_id = $_POST['category_id'];
                                    $name = $_POST['name'];
                                    //File upload code
                                    //check if file is updated by user
                                    //print_r($_FILES);
                                    if ($_FILES['image']['error'] > 0) {
                                        $image = $data['upload_image'];
                                    } else {
                                        $image = rand() . $_FILES['image']['name'];
                                        $location = $_FILES['image']['tmp_name'];
                                        move_uploaded_file($location, '../image/' . $image);
                                    }
                                    //-------------
                                    $query = "update `subcategory` set `category_id`=' $category_id' ,`name`='$name', `upload_image`='$image' where id='$id'";
                                    $res = mysqli_query($con, $query);
                                    if ($res > 0) {
                                        echo "<script>window.location.assign('view_subcategory.php?msg=Record Updated')</script>";
                                    } else {
                                        echo "<script>window.location.assign('view_subcategory.php?msg=Try Again')</script>";
                                    }
                                }
                                if (isset($_GET['id'])) {
                                    $id = $_GET['id'];
                                    $q = "Select * from  `subcategory` where `id` = '$id'";
                                    $result = mysqli_query($con, $q);
                                    $data = mysqli_fetch_assoc($result);
                                } else {
                                    echo "<script>window.location.assign('view_subcategory.php')</script>";
                                }
                                ?>

                                <div class="form-group">
                                    <label for="formGroupExampleInput">Category</label>
                                    <select class="form-control" id="formGroupExampleInput" name="category_id">
                                        <?php
                                        $query = "select * from `category`";
                                        $res = mysqli_query($con, $query);
                                        foreach ($res as $cat) {
                                        ?>
                                            <option <?php if ($data['category_id'] == $cat['id']) {
                                                        echo 'selected';
                                                    } ?> value="<?php echo $cat['id']; ?>"><?php echo $cat['name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Name</label>
                                    <input type="text" name="name" class="form-control" id="formGroupExampleInput2" placeholder="Enter name" value="<?php echo $data['name']; ?>">
                                </div>


                                <div class="form-group">
                                    <label for="exampleFormControlFile1">upload image</label>
                                    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                                    <img class="img img-fluid" style="height: 50px;" src="../image/<?php echo $data['upload_image']; ?>">
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