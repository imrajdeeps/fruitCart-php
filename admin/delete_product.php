<?php
    include 'connection.php';
    $id = $_GET['id'];
    $query = "delete from `product` where id ='$id'";
    $result = mysqli_query($con,$query);
    if($result > 0){
        echo "<script>window.location.assign('view_product.php?msg=Data Deleted!');</script>";
       
    }else{
        echo "error";
    }
?>