<?php
            /*
            //Ausgabe
            $sql = "SELECT * FROM user";
            $result = $db->query($sql);

            if ($result->num_rows > 0) {
              echo "<table><tr><th>Id</th><th>Name</th><th>Age</th></tr>";
              // output data of each row
              while($row = $result->fetch_assoc()) {
                  echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"]. "</td><td>" . $row["age"]. "</td></tr>";
              }
              echo "</table><br>";
            } else {
              echo "0 results";
            }
            */
            //Ausgabe
            $sql = "SELECT * FROM konto";
            $result = $db->query($sql);

            if ($result->num_rows > 0) {
              echo "<table><tr><th>Id</th><th>Iban</th><th>Betrag</th></tr>";
              // output data of each row
              while($row = $result->fetch_assoc()) {
                  echo "<tr><td>" . $row["KUNDE_ID"]. "</td><td>" . $row["IBAN"]. "</td><td>" . $row["BETRAG"]. "</td></tr>";
              }
              echo "</table><br>";
            } else {
              echo "0 results";
            }
?>