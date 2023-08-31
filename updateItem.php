<?php
require_once("./config/checkSession.php");
require_once("./config/config.php");
if(isset($_POST['btn-item'])){

    $id = $_POST['id'];
    
    $itemCode=$_POST['itemCode'];
    $itemName=$_POST['itemName'];
    $itemPrice=$_POST['itemPrice'];


    if(!empty($_POST['itemCode']) && !empty($_POST['itemName']) &&!empty($_POST['itemPrice']) ){

        $stmt = $conn->prepare("UPDATE items SET code='$itemCode', name='$itemName', price='$itemPrice' WHERE id=$id");
        $result = $stmt->execute();

        if($result){
            ?>
            <script>
                alert("Item Updated Successfully.");
                window.location.href="./addItems.php";
            </script>
            <?php
        }

    }else{
        ?>
        <script>
            alert('please enter valid data');
            window.location.href="./editItems.php?id=<?php echo $id;?>"
        </script>
        <?php
    }

}


?>