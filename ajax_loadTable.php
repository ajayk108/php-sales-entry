<?php
require_once("./config/config.php");

$stmt=$conn->prepare("SELECT * FROM temitems");
$stmt->execute();
$result=$stmt->get_result();
$allData=$result->fetch_all(MYSQLI_ASSOC);
$stmt->close();


$output ="";
$count=0;
foreach($allData as $row){
    $count++;
    $output.="<tr><td>{$count}</td><td>{$row['code']}</td><td>{$row['name']}</td><td>{$row['price']}</td><td>{$row['quantity']}</td><td>{$row['total']}</td><td><button class='btn btn-danger delete-btn' data-id='{$row['id']}'>Delete</button></td></tr>";
}
echo $output;






?>