<?php
$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "eurogo";
$conn = mysql_connect("$db_host","$db_username","$db_password");
if(!$conn){
	die("Couldn't connect to database.!!");	
}
echo "Connection Successful";

mysql_select_db("$db_name") or die("No Database Found");

?>