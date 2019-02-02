<?php

            $userid=$_SESSION['id'];


            $sql = "SELECT ueberweisung.*, konto.*, kunde.* FROM ueberweisung
            JOIN konto ON ueberweisung.V_IBAN = konto.IBAN
            JOIN kunde ON konto.KUNDE_ID = kunde.ID
            WHERE konto.KUNDE_ID= '$userid'"; 
            $result = $db->query($sql);

            if ($result->num_rows > 0) {
                echo "<div class=table-responsive>
                        <table class=table table-bordered id=dataTable width=100% cellspacing=0>
                          <thead>
                            <tr>
                              <th style='display:none'>ID</th>
                              <th>Absender</th>
                              <th>Absender Iban</th>
                              <th>Empfänger Iban</th>
                              <th>Betrag</th>
                              <th>Zeitpunkt</th>
                            </tr>
                          </thead>
                        <tbody>";
                // output data of each row
                while($row = $result->fetch_assoc()) {

                    $starttime = strtotime($row["TIME"]);
                    $newdate = date("d.m.Y H:i:s", $starttime);

                    $vIBANn = $row["V_IBAN"];
                    $aIBANn = $row["A_IBAN"];

                    if(strlen($vIBANn)>= 10){
                    //IBAN Anzeige aufhübschen
                    $vIBANn=substr($vIBANn,0,4).' '.substr($vIBANn,4,4).' '.substr($vIBANn,8,4).' '.substr($vIBANn,12,4).' '.substr($vIBANn,16,4).' '.substr($vIBANn,20);
                    } 
                    if(strlen($aIBANn)>= 10){
                    //IBAN Anzeige aufhübschen
                    $aIBANn=substr($aIBANn,0,4).' '.substr($aIBANn,4,4).' '.substr($aIBANn,8,4).' '.substr($aIBANn,12,4).' '.substr($aIBANn,16,4).' '.substr($aIBANn,20); 
                    } 

                    echo "<tr>
                            <td style='display:none'>" . $row["UE_ID"] . "</td>
                            <td>" . $row["VORNAME"]. " " . $row["NAME"] . "</td>
                            <td>" . $vIBANn . "</td>
                            <td>" . $aIBANn . "</td>
                            <td>" . $row["BETRAG"] . "€" . "</td>
                            <td>" . $newdate . "</td>
                          </tr>";
                }
                echo "</tbody></table></div>";
              } else {
                echo "0 results";
              }



?>