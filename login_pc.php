<?php
if($_POST){
    require "DB.php";
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pw = mysqli_real_escape_string($conn,$_POST['password']);
    $sql = "select * from user where email = '$email' and user_pw = '$pw'";
    $rs = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($rs);
    $num = mysqli_num_rows($rs);
    if($num == 1){
       session_start();
       $_SESSION['user_id'] = $row['user_id'];
       echo $_SESSION['user_id'];
       header('location:index.php');
    }else{
        echo "not success";
        header('location:login.php');
    }
}
?>