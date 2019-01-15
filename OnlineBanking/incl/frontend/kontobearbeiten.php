<?php
	// escape variables for security
		$kID = mysqli_real_escape_string($db, $_POST['Kunden_Id']);
		$iban = mysqli_real_escape_string($db, $_POST['iban']);
		$bet = mysqli_real_escape_string($db, $_POST['sBetrag']);

		$sql="INSERT INTO konto (IBAN, KUNDE_ID, BETRAG)
		VALUES ('$iban', '$kID', '$bet')";

		if (!mysqli_query($db,$sql)) {
		  die('Error: ' . mysqli_error($db));
		}
		echo "---- 1 record added ----<br>";
		include 'incl/kontoanzeigen.php';

?>