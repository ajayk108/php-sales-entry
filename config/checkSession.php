<?php
session_start();
if(!isset($_SESSION['userId']) && !isset($_SESSION['userName'])){
    header('location:../index.php');
}

?>