<?php
if(isset($_POST['id'])){
    require_once('./config/config.php');

    $id = $_POST['id'];

    $stmt = $conn->prepare("DELETE FROM items where id = $id");
    $stmt->execute();

}

?>