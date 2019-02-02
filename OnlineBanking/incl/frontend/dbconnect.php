<?php

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "onlinebanking";


            //-- Connect to db --
            $db = new mysqli($servername,$username,$password,$dbname);
            print_r($db->connect_error);
?>