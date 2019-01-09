<?php
            $vIban = mysqli_real_escape_string($db, $_POST['vIban']);
            $aIban = mysqli_real_escape_string($db, $_POST['aIban']);
            $ueBet = mysqli_real_escape_string($db, $_POST['ueBetrag']);


            if($vIban == $aIban){
            	echo"Ungültige IBAN Auswahl";
            } else {

            	//Eintrag in ueberweisungs Tabelle
	            $sql3="INSERT INTO ueberweisung (V_IBAN, A_IBAN, BETRAG)
				VALUES ('$vIban', '$aIban', '$ueBet')";

				if (!mysqli_query($db,$sql3)) {
				  die('Fehler beim Eintrag in Tabelle ueberweisung: ' . mysqli_error($db));
				}

				//Aktuellen Geldbetrag mit Abzugehenden Geldbetrag vergleichen
		      	$sql = "SELECT BETRAG FROM konto WHERE IBAN=$vIban";
		      	$result = $db->query($sql);

		        $row = $result->fetch_assoc();
		        $betNow = $row["BETRAG"];

		        if($betNow>=$ueBet){

		        	//Betrag Abbuchen
			        $sql1 = "
			            UPDATE konto 
			            SET BETRAG= BETRAG-$ueBet
			            WHERE IBAN=$vIban
			        ";

		            if ($db->query($sql1) === TRUE) {
		                echo "Geldbetrag erfolgreich abgebucht. <br>";
		            } else {
		                echo "Fehler bei der Abbuchung des Geldes: " . $db->error;
		            } 

		            //Betrag Zubuchen
					$sql2 = "
		           		UPDATE konto 
		            	SET BETRAG=BETRAG+$ueBet
		            	WHERE IBAN=$aIban
		            ";

		            if ($db->query($sql2) === TRUE) {
		                echo "Überweisung war erfolgreich";
		                
		            } else {
		                echo "Fehler der Zubuchung des Geldes: " . $db->error;
		            }  

		        } else {
		        	echo "Nicht genügend Geld auf dem Konto, um die Überweisung durchzuführen!";
		        }
            }
?>