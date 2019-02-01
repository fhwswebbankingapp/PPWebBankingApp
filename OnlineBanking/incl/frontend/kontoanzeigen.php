<?php

$kID = mysqli_real_escape_string($db, $_POST['Kunden_Id']);


	$sql = "SELECT kunde.*, konto.* FROM kunde
	JOIN konto ON kunde.id = konto.kunde_id
	WHERE kunde.ID= $kID ";	
	$result = $db->query($sql);


    if ($result->num_rows > 0) {
      echo "<div class=table-responsive><table class=table table-bordered id=dataTable width=100% cellspacing=0>
      <thead>
        <tr>
          <th>Besitzer</th>
          <th>Iban</th>
          <th>Betrag</th>
        </tr>
      </thead>
      <tbody>";
      // output data of each row
      while($row = $result->fetch_assoc()) {

        $IBANn = $row["IBAN"];                    

        if(strlen($IBANn)== 22){
        //IBAN Anzeige aufhübschen
        $IBANn=substr($IBANn,0,4).' '.substr($IBANn,4,4).' '.substr($IBANn,8,4).' '.substr($IBANn,12,4).' '.substr($IBANn,16,4).' '.substr($IBANn,20); 
        } 

        echo "
        <tr>
          <td>" . $row["VORNAME"]. " " . $row["NAME"] . "</td>
          <td>" . $IBANn . "</td>
          <td>" . $row["BETRAG"] . "€" . "</td>
        </tr>";
      }
      echo "</tbody></table></div>";
    } else {
      echo "0 results";
    }

?>