<?php
require_once('./config/config.php');

$Item = $_POST['Item'];
$ItemQty = $_POST['ItemQty'];

if($Item && $ItemQty){
    $stmt = $conn->prepare("SELECT * FROM items WHERE id=$Item");
    $stmt->execute();
    $result = $stmt->get_result();
    $allData = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    foreach($allData as $val)
    {
        $code = $val['code'];
        $name = $val['name'];
        $price = $val['price'];
    }
    
    $count=0;
    if($count == 0)
    {
        $total= ($ItemQty * $price);
        $stmt=$conn->prepare("INSERT INTO temitems (code,name,quantity,price,total) VALUES ('$code','$name','$ItemQty','$price','$total') ");
        $result=$stmt->execute();
    }
    
}

?>