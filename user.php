<!-- header -->
<?php
require "header.php";
if (isset($_SESSION['user_name'])) {
    echo "<script>window.location.assign('index.php');</script>";
}
?>
<!-- end header -->
<!-- working with database -->


<!-- end working with database -->
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>it's easy to join us</p>
                    <h1>Signup</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->
<!-- Showing alert to user -->
<?php
$showError = false;
if (isset($_POST['submit'])) {

    // connect database
    include "connection.php";

    // creating variables
    $exists              =   false;
    $name                =   $_POST['name'];
    $email               =   $_POST['email'];
    $password            =   md5($_POST['password']);
    $contact             =   $_POST['contact'];
    $dob                 =   $_POST['dob'];
    $upload_image = $_FILES['id_proof']['name'];
    $upload_image2 = $_FILES['address_proof']['name'];

    $newname = rand() . $upload_image;
    $location = $_FILES['id_proof']['tmp_name'];
    move_uploaded_file($location, 'image/' . $newname);

    $newname2 = rand() . $upload_image2;
    $location2 = $_FILES['address_proof']['tmp_name'];
    move_uploaded_file($location2, 'image/' . $newname2);
    $insertquery = " insert into user (name,email,password,contact,dob,upload_id,upload_addressid) values('$name','$email','$password','$contact','$dob','$newname','$newname2') ";

    $res = mysqli_query($con, $insertquery);


    if ($res) {
        echo "<script>window.location.assign('login.php?msg=Registered Successfully');</script>";
    } else {
        if (mysqli_errno($con) == 1062) {
            echo "<div class='col-12 alert alert-danger'>Email Already Exist.</div>";
        } else {
            echo "<div class='col-12 alert alert-danger'>Error.</div>";
        }
    }
}

?>
<!-- end Showing alert to user -->


<!-- main -->
<div class="container-fluid" id="login-main-container">

    <div id="login-main-inner" class="bg-light col-lg-8 col-md-9 col-11" style="height: 53rem;">

        <!-- signin form start -->
        <form enctype="multipart/form-data" method="post" onsubmit="return checkValues();">
            <p class="display-4 text-center mt-5 mb-4">SIGN UP</p>

            <!-- name -->
            <div class="row input_row">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="name" placeholder="Name" name="name" required>
                    <label for="name" class="mx-2">Name</label>
                </div>
            </div>

            <!-- email -->
            <div class="row input_row">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email" required>
                    <label for="email" class="mx-2">Email address</label>
                </div>
            </div>

            <!-- password -->
            <div class="row input_row">
                <div class="form-floating">
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                    <label for="password" class="mx-2">Password</label>
                </div>
            </div>

            <!-- Contact_number -->
            <div class="row input_row">
                <div class="form-floating mb-3">
                    <input type="tel" class="form-control" id="contact" placeholder="Contact Number" name="contact" required>
                    <label for="contact" class="mx-2">Contact Number</label>
                </div>
            </div>

            <!-- Date of Birth -->
            <div class="row input_row">
                <div class="form-floating mb-3">
                    <input type="date" class="form-control" id="dob" placeholder="name@example.com" name="dob" value="<?php echo date('Y-m-d', strtotime('18 years ago')); ?>" max="<?php echo date('Y-m-d', strtotime('18 years ago')); ?>" required>
                    <label for="dob" class="mx-2">D.O.B</label>
                </div>
            </div>

            <!-- id proof -->
            <label for="id_proof" style="margin-left: 8%;">Upload Id Proof</label>
            <div class="row input_row">
                <div class="mb-3">
                    <input type="file" class="form-control" id="id_proof" placeholder="name@example.com" name="id_proof" required>
                </div>
            </div>

            <!-- Address proof -->
            <label for="address_proof" style="margin-left: 8%;">Upload Address Proof</label>
            <div class="row input_row">
                <div class="mb-3">
                    <input type="file" class="form-control" id="address_proof" placeholder="name@example.com" name="address_proof" required>
                </div>
            </div>

            <!-- submit button -->
            <div class="row input_row">
                <input type="submit" value="sign up" name="submit" class="col-md-12 mb-3">
            </div>


        </form>
        <!-- end signin form -->
    </div>


</div>
<!-- end main -->
<!-- js validation -->
<script>
    function checkValues(){
        var name = document.getElementById('name').value;
        var contact = document.getElementById('contact').value;
        var dob = document.getElementById('dob').value;
        var password = document.getElementById('password').value;        
        var email = document.getElementById('email').value;

        if(name == '' || contact == '' || dob == '' || password == '' || email == ''){
            alert('Please fill complete form.');
            return false;
        }
        
        var emaipatt = /^[a-zA-Z0-9\.\_\-]+\@+[a-zA-Z0-9]+\.+[a-zA-Z]{2,3}$/;
        if(!emaipatt.test(email)){
            alert('Enter Valid Email');
            return false;
        }

        var re = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
        if(!re.test(password)){
            alert('Your password must be of at least 8 characters, must contain a capital letter, a small letter, a number, a symbol and should not contain space');
            return false;
        }
        
        var contactpatt = /^[6-9]{1}[0-9]{9}$/;
        if(!contactpatt.test(contact)){
            alert('Enter Valid Phone Number without code.');
            return false;
        }
    }
</script>
<!-- end js validation -->

<!-- footer -->
<?php
require "footer.php";
?>
<!-- end footer -->