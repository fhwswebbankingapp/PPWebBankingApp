
<?php include 'incl/dbconnect.php';?>
<?php include 'incl/dbausgabe.php';?>

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



$db->close();

?>