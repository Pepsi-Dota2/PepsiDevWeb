<?php
require 'DB.php';
$bill_id = mysqli_real_escape_string($conn,$_GET['bill_id']);
echo $bill_id;
$sql= "UPDATE bill SET status = 2 WHERE bill_id = $bill_id";

if( mysqli_query($conn,$sql)){
    header('location:index.php');
}
?>