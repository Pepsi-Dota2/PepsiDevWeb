<?php 
require 'db.php';
    $bill_id = mysqli_real_escape_string($conn,$_GET['bill_id']);

    $sql = "DELETE FROM bill WHERE bill_id = $bill_id";
    mysqli_query($conn,$sql);

    $sql_detail = "DELETE FROM bill_datail WHERE bill_id = $bill_id";
    mysqli_query($conn,$sql_detail);
    header('location:index.php');
?>