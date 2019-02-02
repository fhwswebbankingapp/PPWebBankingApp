<?php
      // escape variables for security
            $iban = mysqli_real_escape_string($db, $_POST['iban']);
            $bet = mysqli_real_escape_string($db, $_POST['nBetrag']);


            $sql = "UPDATE konto SET BETRAG=$bet WHERE IBAN=$iban";

            if ($db->query($sql) === TRUE) {
                echo '<script type="text/javascript">',
	             'document.getElementById("successp").innerHTML = "Eintrag erfolgreich geändert.";',
	             '</script>';
            } else {
                echo '<script type="text/javascript">',
                     'document.getElementById("errorp").innerHTML = "Fehler bei der Änderung!";',
                     '</script>';
            } 
  
?>