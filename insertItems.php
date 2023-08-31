<?php

if(isset($_POST['btn-item'])){
    
    require_once('./config/checkSession.php');
    require_once('./config/config.php');

    $itemCode=$_POST['itemCode'];
    $itemName=$_POST['itemName'];
    $itemPrice=$_POST['itemPrice'];

    if($itemCode !='' && $itemName !='' && $itemPrice !=''){
        $stmt = $conn->prepare("INSERT INTO items(code, name, price) VALUES('$itemCode', '$itemName', '$itemPrice')");
        $result = $stmt->execute();

        if($result){
            ?>
            <script>
                alert("Item Added Sucessfully");
                window.location.href="./addItems.php";
            </script>
            <?php
        }else{
            ?>
            <script>
                alert("Failed : Please try again...");
                window.location.href="./addItems.php";
            </script>
            <?php
        }
    
    }else{
        ?>
            <script>
                alert("Failed : Please Enter data");
                window.location.href="./addItems.php";
            </script>
        <?php
    }
   







}




?>