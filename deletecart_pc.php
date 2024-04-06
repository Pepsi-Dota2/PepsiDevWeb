<?php 
require 'DB.php';
    $pro_id = mysqli_real_escape_string($conn,$_GET['pro_id']);
    $bill_id = mysqli_real_escape_string($conn,$_GET['bill_id']);

    $sql = "DELETE FROM bill_datail WHERE bill_id = $bill_id AND pro_id = $pro_id";
    mysqli_query($conn,$sql);

    header('Location:cart.php');

?>