<?php

$kID = mysqli_real_escape_string($db, $_POST['Kunden_Id']);


	$sql = "SELECT kunde.*, konto.* FROM kunde
	JOIN konto ON kunde.id = konto.kunde_id
	WHERE kunde.ID= $kID ";	
	$result = $db->query($sql);



	if ($result->num_rows > 0) {
      echo "<table><tr><th>Name</th><th>Iban</th><th>Betrag</th></tr>";
      // output data of each row
      while($row = $result->fetch_assoc()) {
          echo "<tr><td>" . $row["VORNAME"]. " " . $row["NAME"] . "</td><td>" . $row["IBAN"]. "</td><td>" . $row["BETRAG"] . "€" . "</td></tr>";
      }
      echo "</table><br>";
    } else {
      echo "0 results";
    }


?>