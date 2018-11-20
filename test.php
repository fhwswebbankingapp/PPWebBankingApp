<?php
//Fehlerbehandlung
error_reporting (0);

$db = new mysqli('localhost', 'root','','testdb');
print_r($db->connect_error);

if($db->connect_error){
    die('Verbindung nicht möglich!');
}
echo "Connected successfully <br>";

$sql = "SELECT * FROM user";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Age: " . $row["age"]. " - Name: " . $row["name"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();

?>