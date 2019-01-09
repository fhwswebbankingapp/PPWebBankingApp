<?php
      // escape variables for security
        $iban = mysqli_real_escape_string($db, $_POST['iban']);

        $sql = "DELETE FROM konto WHERE IBAN=$iban";

		if ($db->query($sql) === TRUE) {
		    echo "Record deleted successfully";
		} else {
		    echo "Error deleting record: " . $db->error;
}
?>