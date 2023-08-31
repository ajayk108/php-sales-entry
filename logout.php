<?php
session_start();
if(isset($_SESSION['userId']) && isset($_SESSION['userName'])){

    unset($_SESSION['userId']);
    unset($_SESSION['userName']);
    
    if(!isset($_SESSION['userId']) && !isset($_SESSION['userName']))
    {
        header("location:./index.php");
    }
    
}


?>