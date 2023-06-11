<?php
    include 'connection.php';
    $id = $_GET['id'];
    $query = "delete from `subcategory` where id ='$id'";
    $result = mysqli_query($con,$query);
    if($result > 0){
        echo "<script>window.location.assign('view_subcategory.php?msg=Data Deleted!');</script>";
       
    }else{
        echo "error";
    }
?>