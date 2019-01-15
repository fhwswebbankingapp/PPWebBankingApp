<?php
      // escape variables for security
            $iban = mysqli_real_escape_string($db, $_POST['iban']);
            $bet = mysqli_real_escape_string($db, $_POST['nBetrag']);


            $sql = "UPDATE konto SET BETRAG=$bet WHERE IBAN=$iban";

            if ($db->query($sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $db->error;
            }     
?>