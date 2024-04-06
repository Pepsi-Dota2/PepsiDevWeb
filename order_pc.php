<?php
    require 'DB.php';
    session_start();
    $user_id = $_SESSION['user_id'];
    
    $pro_id = mysqli_real_escape_string($conn,$_POST['id']);
    $price = mysqli_real_escape_string($conn,$_POST['price']);
    $qty = mysqli_real_escape_string($conn,$_POST['qty']);
    $total = $qty * $price;


    $sql_ch = "SELECT * FROM bill WHERE bill_total = 0 AND user_id = $user_id";
    $rs_ch = mysqli_query($conn,$sql_ch);
    $row = mysqli_fetch_array($rs_ch);
    $bill_id = $row['bill_id'];

    if($row['bill_total'] == null){
    $sql_bill = "INSERT INTO bill VALUES (NULL,current_timestamp(), $user_id, 0,0)";
    $bill_rs= mysqli_query($conn,$sql_bill);
    }


    $sql_chck = "SELECT * FROM bill_datail WHERE bill_id = $bill_id AND pro_id = $pro_id";
    $rs_chck = mysqli_query($conn,$sql_chck);
    $row_chck = mysqli_fetch_array($rs_chck);

    if($row_chck == NULL){
        $sql_detail = "INSERT INTO bill_datail VALUES (NULL,$bill_id,$pro_id,$price,$qty,$total)";
    }else{
        $sql_detail = "UPDATE bill_datail SET qty = qty +  $qty, total = total +  $total WHERE bill_id = $bill_id AND pro_id = $pro_id";
    }
    $rs_detail = mysqli_query($conn, $sql_detail);

?>