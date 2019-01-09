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
            /*
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
            
            //Ausgabe
            $sql = "SELECT * FROM kunde";
            $result = $db->query($sql);

            if ($result->num_rows > 0) {
              echo "<table><tr><th>Name</th><th>Vorname</th></tr>";
              // output data of each row
              while($row = $result->fetch_assoc()) {
                  echo "<tr><td>" . $row["NAME"]. "</td><td>" . $row["VORNAME"]. "</td></tr>";
              }
              echo "</table><br>";
            } else {
              echo "0 results";
            }
            */

            $sql = "SELECT kunde.*, konto.* FROM kunde
            JOIN konto ON kunde.id = konto.kunde_id
            ORDER BY kunde.id, konto.iban"; 
            $result = $db->query($sql);

            if ($result->num_rows > 0) {
                echo "<table><tr><th>Besitzer</th><th>Iban</th><th>Betrag</th></tr>";
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["VORNAME"]. " " . $row["NAME"] . "</td><td>" . $row["IBAN"]. "</td><td>" . $row["BETRAG"] . "€" . "</td></tr>";
                }
                echo "</table><br>";
              } else {
                echo "0 results";
              }
              
              $sql = "SELECT * FROM ueberweisung";
              $result = $db->query($sql);

              if ($result->num_rows > 0) {
                echo "<table><tr><th>ID</th><th>V_Iban</th><th>A_Iban</th><th>Betrag</th></tr>";
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["UE_ID"]. "</td><td>" . $row["V_IBAN"]. "</td><td>" . $row["A_IBAN"]. "</td><td>" . $row["BETRAG"]. "</td></tr>";
                }
                echo "</table><br>";
              } else {
                echo "0 results";
              }
?>