<?php 
session_start();
if(isset($SESSION['id'])){
unset($SESSION['id']);
header('location:login.php');
}

?>