<?php
    include 'connection.php';
    $id = $_GET['id'];
    $query = "delete from `category` where id ='$id'";
    $result = mysqli_query($con,$query);
    if($result > 0){
        echo "<script>window.location.assign('view_category.php?msg=Data Deleted!');</script>";
       
    }else{
        echo "error";
    }
?>