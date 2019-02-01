<?php
      // escape variables for security
        $iban = mysqli_real_escape_string($db, $_POST['iban']);

        $sql = "DELETE FROM konto WHERE IBAN=$iban";

		if ($db->query($sql) === TRUE) {
		    echo '<script type="text/javascript">',
	             'document.getElementById("successp").innerHTML = "Eintrag erfolgreich gelöscht.";',
	             '</script>';
		} else {
		    echo '<script type="text/javascript">',
                 'document.getElementById("errorp").innerHTML = "Fehler beim Löschen!";',
                 '</script>';
}
?>