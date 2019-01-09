
<?php include 'incl/dbconnect.php';?>
<?php





//-- Insert --
/*
$sql = "INSERT INTO user (name)
VALUES ('Maxi')";

if ($db->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}
*/

//-- Insert multiple --
/*
$sql = "INSERT INTO user (name, age)
VALUES ('John', 61);";
$sql .= "INSERT INTO user (name, age)
VALUES ('Horst', 62);";
$sql .= "INSERT INTO user (name, age)
VALUES ('Kili', 63);";

if ($db->multi_query($sql) === TRUE) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}
*/


//-- Update --
/*
$sql = "UPDATE user SET name='Doe' WHERE age=63";

if ($db->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $db->error;
}
*/

//-- Delete --
/*
$sql = "DELETE FROM user WHERE age=62";

if ($db->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $db->error;
}
*/


//-- Ausgabe --
/*
$sql = "SELECT * FROM user";
$result = $db->query($sql);

if ($result->num_rows > 0) {
  echo "<table><tr><th>Name</th><th>Age</th></tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
      echo "<tr><td>" . $row["name"]. "</td><td>" . $row["age"]. "</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
*/

/*
$sql = "SELECT * FROM ueberweisung";
$result = $db->query($sql);


if (!$result) {
    trigger_error('Invalid query: ' . $sql->error);
}

if ($result->num_rows > 0) {
  echo "<table><tr><th>Name</th><th>Age</th></tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
      echo "<tr><td>" . $row["V_IBAN"]. "</td><td>" . $row["A_IBAN"]. "</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
*/

/*
$sql = "SELECT * FROM kunde";
$result = $db->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  echo " " . $row["NAME"]. "   " . $row["VORNAME"]. "  <br>";
  $row = $result->fetch_assoc();
  echo " " . $row["NAME"]. "   " . $row["VORNAME"]. "  ";

} else {
  echo "0 results";
}
*/

      $sql = "SELECT BETRAG FROM konto WHERE IBAN=123456";
      $result = $db->query($sql);

        $row = $result->fetch_assoc();
        $test1 = $row["BETRAG"];

        if($test1 >= 300){
          echo"400+<br>";
        } else {
          echo"not 400+<br>";
        }

        echo $test1;



//$db->close();

?>