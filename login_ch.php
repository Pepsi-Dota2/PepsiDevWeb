<?php
session_start();
if($_SESSION['user_id']== NULL){
    header('location:login.php');
    
}
//   echo '<h1>' .$_SESSION['user_id'].'</h1>';
?>