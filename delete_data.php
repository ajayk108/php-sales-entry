<?php
require_once('./config/config.php');

$del_id=$_POST['del_id'];

$stmt=$conn->prepare("DELETE FROM temitems WHERE id=$del_id");
$result=$stmt->execute();

if($result){
    echo 1;
}


?>