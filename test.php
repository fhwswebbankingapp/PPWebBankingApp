<?php
//Fehlerbehandlung
error_reporting (0);

$db = new mysqli('localhost', 'root','','test');
print_r($db->connect_error);

if($db->connect_error){
    die('Verbindung nicht möglich!');
}
echo "Connected successfully";

?>