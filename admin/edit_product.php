<?php
include "connection.php";
$id = $_GET['id'];
$query = "select * from `product` where id='$id'";
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
                            <form action="" method="POST" enctype="multipart/form-data">
                                <?php                                
                                include "connection.php";
                                if (isset($_POST['submit'])) {                                 
                                    $name = $_POST['name'];
                                    $category_id = $_POST['category_id'];
                                    $Subcategory_id = $_POST['subcategory_id'];
                                    $description = $_POST['description'];
                                    $price = $_POST['price'];
                                    $id = $data['id'];
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
                                    $query = "update `product` set `name`='$name', `category_id`='$category_id',`subcategory_id`='$Subcategory_id',
                                   `description` = '$description',`price` = '$price',`upload_image`='$image' where id='$id'";
                                    $res = mysqli_query($con,$query);
                                    if ($res > 0) {
                                        echo "<script>window.location.assign('view_product.php?msg=Record Updated')</script>";
                                    } else {
                                        echo "<script>window.location.assign('view_product.php?msg=Try Again')</script>";
                                    }
                                }
                                if (isset($_GET['id'])) {
                                    $id = $_GET['id'];
                                    $q = "Select * from  `product` where `id` = '$id'";
                                    $result = mysqli_query($con, $q);
                                    $data = mysqli_fetch_assoc($result);
                                } else {
                                    echo "<script>window.location.assign('view_product.php')</script>";
                                }
                                ?>

                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Name</label>
                                    <input required type="text" name="name" class="form-control" id="formGroupExampleInput2" placeholder="Enter name" value="<?php echo $data['name']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">category id</label>
                                    <select class="form-control" name="category_id" onchange="changeValue()" id="category_id">
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
                                    <label for="formGroupExampleInput">Subcategory id</label>
                                    <select class="form-control" id="subcategory_id" name="subcategory_id" value="<?php echo $data['subcategory_id']; ?>">
                                        <?php
                                        include "connection.php";
                                        $query = "select * from `subcategory` where category_id='".$data['category_id']."'";
                                        $res = mysqli_query($con, $query);
                                        foreach ($res as $sub) {
                                        ?>
                                            <option <?php if ($data['subcategory_id'] == $sub['id']) {
                                                        echo 'selected';
                                                    } ?> value="<?php echo $sub['id']; ?>"><?php echo $sub['name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlFile1">upload image</label>
                                    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                                    <img class="img img-fluid" style="height: 50px;"
                                     src="../image/<?php echo $data['upload_image']; ?>">
                                </div> 
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">description</label>
                                    <textarea required class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"><?php echo $data['description']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="price">price</label>
                                    <input required type="text" name="price" class="form-control" id="price" placeholder="Enter price" value="<?php echo $data['price']; ?>">
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
<script>
    function changeValue() {
        var data = document.getElementById('category_id').value;
        //ajax code
        var obj;
        var url = "productajax.php?cat=" + data;
        // alert(url);
        if (window.XMLHttpRequest) {
            obj = new XMLHttpRequest();
        } else {
            obj = new ActiveXObject("Microsoft.XMLHTTP");
        }
        //send request
        obj.open("GET", url, true);
        obj.send();
        obj.onreadystatechange = function() {
            if (obj.readyState == 4 && obj.status == 200) {
                var res = obj.responseText;
                // alert(res);
                document.getElementById("subcategory_id").innerHTML = res;
            }
        };
    }
</script>

<?php
require "footer.php";
?>