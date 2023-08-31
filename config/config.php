<?php 

define("server","localhost");
define("username","root");
define("password","");
define("dbname","salesEntry2");


try{
    $conn = new mysqli(server, username, password, dbname);
}catch(Exception $e){
    echo "Unable to Connect: ".$e;
}

?>