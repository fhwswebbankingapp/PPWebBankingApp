<?php
// DB_ADDR - The address of the database server, in host:port format.
//           (You might also try setting this to e.g. ":/tmp/mysql.sock" to
//           use a Unix domain socket, if your mysqld is on the same box as
//           your web server.)
define("DB_ADDR", "localhost");

// DB_USER - The username to connect to the database as
define("DB_USER", "prognose");

// DB_PASS - The password for DB_USER
define("DB_PASS", "prognose123");

// DB_NAME - The name of the database
define("DB_NAME", "prognose");


function OpenCon()
{
	$db = new mysqli(DB_ADDR, DB_USER, DB_PASS, DB_NAME);
	if ($db -> connect_errno) 
	{
		echo "Verbindung fehlgeschlagen: ", $db->connect_error;
		echo "</br> Fehlernummer: " . $db->connect_errno;
		exit;
	}
	mysqli_query($db, "SET NAMES 'utf8'");
	return $db;
}

function CloseCon($db)
{
	mysqli_close($db);
}
?>