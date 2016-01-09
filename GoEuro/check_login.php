<?php
session_start();

if(isset($_SESSION["user"])){
	echo '<script language="javascript"> alert("You are already Logged In.!!") </script>';
	header("location:index.php");
	exit();
}
?>
<?php
//ini_set('display_errors',1);
//error_reporting(E_ALL);
?>
<?php
include "conn.php";
//if(isset($_POST['signin']))
//{
    $user = preg_replace('#(^A-Za-z0-9)#i','',$_POST["email"]);//filter everything but numbers and letters.
	$password = preg_replace('#(^A-Za-z0-9)#i','',$_POST["pass"]);//filter everything but numbers and letters.
    
    $email=$_POST['email'];
    //echo "$email";
    $pass=$_POST['pass'];
    //echo "<br> $pass";
    $qry="select * from users where username='$email' and password='$pass'";
   // echo $qry;
    $qry1=mysql_query($qry) or die(mysql_error());
   // echo $qry1;
	$count = mysql_num_rows($qry1);
	$rows = mysql_fetch_array($qry1);
	//echo $rows['id']; 
	//echo $count;
	if($count==1){
		while($row=mysql_fetch_array($qry1)){
            $id = $row["id"];
           }
		$_SESSION["id"] = $id;
		$_SESSION["user"] = $user;
		$_SESSION["password"] = $password;
        
		header("location:index.php");
		exit();
	}
    //else
    //{
       // echo '<script type="text/javascript"> alert("Wrong usrname"); </script>';
        //header('location: signin.php');
    //}
//}
?>