<?php
require "header.php";
if(!isset($_SESSION['admin_name'])){
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
                    <h1>Category</h1>
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
                    <h2 class="pb-3">Add <span class="orange-text">Category</span></h2>
                    <div class="row">
                        <div class="col-lg-12 col-md-8 mb-4 mb-md-7">
                            <form action="" method="POST" enctype="multipart/form-data">
                            <?php
                                include "connection.php";
                               if(isset($_POST['submit']))
                               {
                                $name = $_POST['name'];
                                $description = $_POST['description'];
                                $upload_image = $_FILES['image']['name'];
                               
                                $newname = rand().$upload_image;
                                $location = $_FILES['image']['tmp_name'];
                                move_uploaded_file($location, '../image/'.$newname);                     
                               
                                $insertquery = " insert into category (name,description,upload_image) values('$name',' $description ','$newname') ";

                              $res = mysqli_query($con,$insertquery);
                              
                              if($res){
                               
                                  ?>
                                  <script>
                                    alert("data inserted ");
                                    
                                  </script>
                                <?php
                        
                              } else{
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
                                    <label for="inputAddress">description</label>
                                    <input required type="text" name="description" class="form-control" id="inputAddress" placeholder="description">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlFile1">upload image</label>
                                    <input required type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
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
<?php
require "footer.php";
?>