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
                    <h1>Product </h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->
<!-- featured section -->
<div class="feature-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="featured-text">
                    <h2 class="pb-3">Add <span class="orange-text">product</span></h2>
                    <div class="row">
                        <div class="col-lg-12 col-md-8 mb-4 mb-md-7">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <?php
                                include "connection.php";
                                if (isset($_POST['submit'])) {

                                    $category_id = $_POST['category_id'];
                                    $Subcategory_id = $_POST['subcategory_id'];
                                    $name = $_POST['name'];
                                    $upload_image = $_FILES['image']['name'];
                                    $description = $_POST['description'];
                                    $price = $_POST['price'];

                                    $newname = rand() . $upload_image;
                                    $location = $_FILES['image']['tmp_name'];
                                    move_uploaded_file($location, '../image/' . $newname);

                                    $insertquery = " insert into product (name,category_id,subcategory_id,upload_image,description,price) 
                                    values('$name','$category_id','$Subcategory_id','$newname','$description','$price') ";


                                    $res = mysqli_query($con, $insertquery);
                                    if ($res) {
                                ?>
                                        <script>
                                            alert("data inserted ");
                                        </script>
                                    <?php
                                    } else {
                                    ?>
                                        <script>
                                            alert("data not inserted ");
                                        </script>
                                <?php
                                    }
                                }

                                ?>



                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Name</label>
                                    <input required type="text" name="name" class="form-control" id="formGroupExampleInput2" placeholder="Enter name">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">category id</label>
                                    <select class="form-control" onchange="changeValue()" id="category_id" name="category_id" required>
                                        <option value="" selected disabled>Select Category</option>
                                        <?php
                                        include "connection.php";
                                        $query = "select * from `category`";
                                        $res = mysqli_query($con, $query);
                                        foreach ($res as $data) {
                                        ?>
                                            <option value="<?php echo $data['id']; ?>"><?php echo $data['name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="formGroupExampleInput">Subcategory id</label>
                                    <select class="form-control" id="subcategory_id" name="subcategory_id" required>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlFile1">upload image</label>
                                    <input required type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">description</label>
                                    <textarea required class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="price">price</label>
                                    <input required type="number" name="price" class="form-control w-100" id="price" placeholder="Enter price">
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
<!-- end logo carousel -->
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