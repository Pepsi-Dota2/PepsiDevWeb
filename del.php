<?php
    require 'db.php';
    $pro_id = mysqli_real_escape_string($con,$_GET['pro_id']);
    $bill_id = mysqli_real_escape_string($con,$_GET['bill_id']);
    
    $sql = "DELETE FROM bill_detail WHERE bill_id = $bill_id AND pro_id = $pro_id";
    mysqli_query($con,$sql);
    header('Location:cart.php');


?>