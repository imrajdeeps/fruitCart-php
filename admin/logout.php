<?php
    session_start();
    session_destroy();
    echo "<script>window.location.assign('adminlogin.php');</script>";
?>