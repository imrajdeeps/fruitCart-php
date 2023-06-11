<?php

$username = "root";
$password = "";
$server = 'localhost';
$db = 'fruitcart';

$con = mysqli_connect($server,$username,$password,$db);

if($con){
    //echo  "Connection Succesful ";
?>

<!-- <script>
    alert('cennection successful');
</script> -->

<?php    
}else{
    echo "No connection";
}

?>