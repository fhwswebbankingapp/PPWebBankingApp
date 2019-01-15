<?php
	
	$sql = "SELECT kunde.*, konto.* FROM kunde
	JOIN konto ON kunde.id = konto.kunde_id";	
	$result = $db->query($sql);


	if ($result->num_rows > 0) {
	  
	  // output data of each row
	  while($row = $result->fetch_assoc()) {
	      echo "<option value=". $row["IBAN"] . ">" . $row["VORNAME"] . " " . $row["NAME"] . " (IBAN-- " . $row["IBAN"] . ") Kontostand: " . $row["BETRAG"] ."€" . "</option>";
	  }
	  
	} else {
	  echo "0 results";
	}
?>