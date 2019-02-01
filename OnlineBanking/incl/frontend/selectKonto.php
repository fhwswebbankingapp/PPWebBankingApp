<?php
	
	$sql = "SELECT kunde.*, konto.* FROM kunde
	JOIN konto ON kunde.id = konto.kunde_id 
	ORDER BY konto.IBAN";	
	$result = $db->query($sql);


	if ($result->num_rows > 0) {
	  
	  // output data of each row
	  while($row = $result->fetch_assoc()) {

		$IBANn = $row["IBAN"];
	  	if(strlen($IBANn)>= 10){
	  	//IBAN Anzeige aufhübschen
		$IBANn=substr($IBANn,0,4).' '.substr($IBANn,4,4).' '.substr($IBANn,8,4).' '.substr($IBANn,12,4).' '.substr($IBANn,16,4).' '.substr($IBANn,20); 
	  	}  	

	    echo "<option value=". $row["IBAN"] . ">" . $row["VORNAME"] . " " . $row["NAME"] . " (IBAN-- " . $IBANn . ") Kontostand: " . $row["BETRAG"] ."€" . "</option>";
	  }
	  
	} else {
	  echo "0 results";
	}
?>