<?php
    require 'DB.php';
    $pro_id = mysqli_real_escape_string($conn,$_POST['pro_id']);
    $bill_id = mysqli_real_escape_string($conn,$_POST['bill_id']);
    $price = mysqli_real_escape_string($conn,$_POST['price']);
    $qty = mysqli_real_escape_string($conn,$_POST['qty']);

    $total =  $price * $qty;
    

    $sql = "UPDATE bill_datail SET qty = $qty, total = $total WHERE bill_id = $bill_id AND pro_id = $pro_id";
    if(mysqli_query($conn,$sql)){
        header('location:cart.php');
    }
?>