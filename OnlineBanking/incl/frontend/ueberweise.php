<?php
	
	include 'ibancheck.php';

			$servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "onlinebanking";


            //-- Connect to db --
            $db = new mysqli($servername,$username,$password,$dbname);
            print_r($db->connect_error);

            
            $vIban = mysqli_real_escape_string($db, $_POST['vIban']);
            $aIban = mysqli_real_escape_string($db, $_POST['aIban']);
            $ueBet = mysqli_real_escape_string($db, $_POST['ueBetrag']);


            $symbols = array('$', '€', '£');
			$ueBet = str_replace($symbols, '', $ueBet);
			$ueBet = str_replace(',', '.', $ueBet);
			$vIban = str_replace( ' ', '', $vIban );
			$aIban = str_replace( ' ', '', $aIban );

			
            if($vIban == $aIban){
            	echo '<script type="text/javascript">',
                     'document.getElementById("errorp").innerHTML = "IBAN ist identisch!";',
                     '</script>';
            } else if(!test_iban($aIban)){
			    echo '<script type="text/javascript">',
                     'document.getElementById("errorp").innerHTML = "Ungültige IBAN!";',
                     '</script>';
			} 
			else {
				
				
				//Aktuellen Geldbetrag mit Abzugehenden Geldbetrag vergleichen
		      	$sql = "SELECT BETRAG FROM konto WHERE IBAN='$vIban'";
		      	$result = $db->query($sql);

		        $row = $result->fetch_assoc();
		        $betNow = $row["BETRAG"];

		        if($betNow>=$ueBet){
				
		        	//Betrag Abbuchen
			        $sql1 = "
			            UPDATE konto 
			            SET BETRAG= BETRAG-$ueBet
			            WHERE IBAN='$vIban'
			        ";

		            if ($db->query($sql1) === TRUE) {
		                echo '<script type="text/javascript">',
	                     'document.getElementById("successp").innerHTML = "Geldbetrag erfolgreich abgebucht.";',
	                     '</script>';
		            } else {
		                echo '<script type="text/javascript">',
	                     'document.getElementById("errorp").innerHTML = "Fehler bei der Abbuchung des Geldes!";',
	                     '</script>';
		            } 

		            //Betrag Zubuchen
					$sql2 = "
		           		UPDATE konto 
		            	SET BETRAG=BETRAG+$ueBet
		            	WHERE IBAN='$aIban'
		            ";

		            if ($db->query($sql2) === TRUE) {
		                echo '<script type="text/javascript">',
	                     'document.getElementById("successp").innerHTML += " - Überweisung war erfolgreich.";',
	                     '</script>';
		                
		            } else {
		                echo '<script type="text/javascript">',
	                     'document.getElementById("errorp").innerHTML = "Fehler der Zubuchung des Geldes!";',
	                     '</script>';
		            }				
		            
		            //Eintrag in ueberweisungs Tabelle
		            $sql="INSERT INTO ueberweisung (A_IBAN, V_IBAN, BETRAG)
					VALUES ( '$aIban', '$vIban', '$ueBet')";

					if (!mysqli_query($db,$sql)) {
					  die('<script type="text/javascript">document.getElementById("errorp").innerHTML = "Fehler der Zubuchung des Geldes!";</script>');
					}					

		        } else {
		        	echo '<script type="text/javascript">',
	                     'document.getElementById("errorp").innerHTML = "Nicht genügend Geld auf dem Konto, um die Überweisung durchzuführen!";',
	                     '</script>';
		        }
		        
            }

            
          
?>