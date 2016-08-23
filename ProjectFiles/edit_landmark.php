<?php
session_start();
if(!isset($_SESSION["user"])){
    header("location:index.php");
    exit();
}
//Just to be sure that the manager SESSION variable is in database..to check illegal intruders.
$userID = preg_replace('#(^0-9)#i','',$_SESSION["id"]);//filter everything but numbers.
$username = preg_replace('#(^A-Za-z0-9)#i','',$_SESSION["user"]);//filter everything but numbers and letters.

$password = preg_replace('#(^A-Za-z0-9)#i','',$_SESSION["password"]);//filter everything but numbers and letters.
require "sitescripts/connect_mysql.php";
$username_query=mysql_query("SELECT una FROM users WHERE username='$username' AND password='$password'");
while ($row=mysql_fetch_array($username_query))
{
    $una= $row["una"];
}
?>
<?php
//Delete Item Confirmation
if(isset($_GET['deleteid'])){
	echo 'Are you sure you want to delete this landmark with name:'.$_GET['deleteid'].'?<br/>     <a href="edit_landmark.php?yesdelete='.$_GET['deleteid'].'">YES</a> | <a href="favourites.php">NO</a>';
	exit();
} 
if(isset($_GET['yesdelete'])){
	//Remove from database
	$delete_id = $_GET['yesdelete'];
	$delete_qry = mysql_query("DELETE FROM cart WHERE name='$delete_id' LIMIT 1") or die(mysql_error());
	echo "Landmark Deleted Succesfully. <h4><a href='favourites.php' GO BACK </a> to Favourites Page</h4>";
	}
	
?>