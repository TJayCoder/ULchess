<?php


session_start();
$sessn=session_destroy();

if($sessn){

    echo "<script>window.open('../index.php','_self')</script>";
}




?>