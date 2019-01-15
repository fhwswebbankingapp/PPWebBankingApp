<?php
	
	$sql = "SELECT kunde.* FROM kunde";	
	$result = $db->query($sql);


	if ($result->num_rows > 0) {
	  // output data of each row
	  while($row = $result->fetch_assoc()) {
	      echo "<option value=". $row["ID"] . ">" . $row["VORNAME"] . " " . $row["NAME"] . "</option>";
	  }
	} else {
	  echo "0 results";
	}

?>

