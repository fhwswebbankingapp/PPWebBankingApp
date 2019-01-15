<?php
// MySQL Data
require('config.php');

$db = OpenCon();

//Update Data if submitted
if(isset($_POST['id'])) 
{
	
$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$txt = $_POST['id'];
fwrite($myfile, $txt);
fclose($myfile);
	
	$sql = "DELETE FROM `transaktionen` WHERE `transaktionen`.`id` = '$_POST[id]';";
	
	$db->query($sql);
}


?>