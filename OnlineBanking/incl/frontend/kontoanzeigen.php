<?php

$kID = mysqli_real_escape_string($db, $_POST['Kunden_Id']);


	$sql = "SELECT kunde.*, konto.* FROM kunde
	JOIN konto ON kunde.id = konto.kunde_id
	WHERE kunde.ID= $kID ";	
	$result = $db->query($sql);


  if ($result->num_rows > 0) {
        echo "
        <div class=row style=background-color:grey;>
          <div class=col-3 >
            <p>Besitzer</p>
          </div>
          <div class=col-3>
            <p>Iban</p>
          </div>
          <div class=col-3>
            <p>Betrag</p>
          </div> 
          <div class=col-3>
            <p></p>
          </div>
        </div>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "
            <div class=row>
              <div class=col-3>
                <p>" . $row["VORNAME"]. " " . $row["NAME"] . "</p>
              </div>
              <div class=col-3>
                <p>" . $row["IBAN"]. "</p>
              </div>
              <div class=col-3>
                <p>" . $row["BETRAG"] . "€" . "</p>
              </div> 
            </div>";
        }
      } else {
        echo "0 results";
      }

  /*
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
  */
  
?>