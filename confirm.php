<?php
    require 'db.php';

    $alltotal = MYSQLI_REAL_ESCAPE_STRING($conn,$_GET['total']);
    $bill_id = MYSQLI_REAL_ESCAPE_STRING($conn,$_GET['bill_id']);

    $sql = "UPDATE bill SET bill_total =  $alltotal, status = 1 WHERE bill_id = $bill_id ";
    if( MYSQLI_QUERY($conn,$sql)){
        header('location:cart.php');
    }else{
        echo "ERROR";
    }
?>