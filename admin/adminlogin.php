<!-- header -->
<?php
require "header.php";
?>
<!-- end header -->

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <h1>Admin login </h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<?php
if (isset($_GET['err'])) {
    echo "<div class='col-12 alert alert-danger'>Please Login First.</div>";
}
if (isset($_POST['submit'])) {
    include 'connection.php';
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    //echo $email." ".$password;
    $query = "select * from `admin_login` where `email`='$email' and `password`='$password'";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        //login 
        $data = mysqli_fetch_assoc($result);
        $_SESSION['admin_name'] = $data['name'];
        $_SESSION['admin_email'] = $data['email'];
        //print_r($_SESSION);
        echo "<script>window.location.assign('index.php');</script>";
    } else {
        //invalid email password
        echo "<div class='col-12 alert alert-danger'>Invalid Email/Password.</div>";
    }
}
?>

<div class="container-fluid" id="login-main-container" style="height: 120vh;">

    <!-- main -->
    <div id="login-main-inner" class="bg-light col-lg-6 col-md-8 col-10 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100" style="height: 27rem;">
        <!-- signin form start -->
        <form enctype="multipart/form-data" method="post">
            <p class="display-4 text-center mt-5 mb-4">LOGIN</p>

            <!-- email -->
            <div class="row input_row">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="email" placeholder="name@example.com" name="email">
                    <label for="email" class="mx-2">Email address</label>
                </div>
            </div>

            <!-- password -->
            <div class="row input_row">
                <div class="form-floating">
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                    <label for="password" class="mx-2">Password</label>
                </div>
            </div>
            <div class="row input_row  mb-3">
                <input type="submit" value="login" name="submit" class="col-md-12 my-3">
            </div>
        </form>
        <!-- end signin form -->
    </div>
    <!-- end main -->
</div>

<!-- footer -->
<?php
require "footer.php";
?>
<!-- end footer -->