<?php
	// escape variables for security
		$kID = mysqli_real_escape_string($db, $_POST['Kunden_Id']);
		$iban = mysqli_real_escape_string($db, $_POST['iban']);
		$bet = mysqli_real_escape_string($db, $_POST['sBetrag']);

		$sql="INSERT INTO konto (IBAN, KUNDE_ID, BETRAG)
		VALUES ('$iban', '$kID', '$bet')";

		if (!mysqli_query($db,$sql)) {
		  die('<script type="text/javascript">document.getElementById("errorp").innerHTML = "Fehler beim Hinzufügen!";</script>');
		}
		echo '<script type="text/javascript">',
             'document.getElementById("successp").innerHTML = "Eintrag hinzugefügt.";',
             '</script>';
		include 'incl/frontend/kontoanzeigen.php';

?>