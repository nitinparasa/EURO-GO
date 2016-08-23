<?php
session_start();
include "conn.php";
$urlname1=$_GET['urlname'];
$username=urldecode($urlname1);
//echo $username;
$code=$_GET['code'];
//echo $code;
$qry1="SELECT * FROM `users` WHERE una='$username'";
echo $qry1;

$qry=mysql_query($qry1);
$count= mysql_num_rows($qry);
echo $count;
//echo $qry;
$db_code=""; 
while($row= mysql_fetch_assoc($qry)){

    $db_code=$row['confirm-code'];
    //echo $db_code;
    }
//echo $code;
//echo $db_code;
//var_dump($db_code);
if($code=$db_code)
{
    mysql_query("update users set confirmed=1");
    mysql_query("UPDATE `users` SET `confirm-code`=0");
    header("Location: signin.php");
}
else
    echo("Username and code do not match");
?>