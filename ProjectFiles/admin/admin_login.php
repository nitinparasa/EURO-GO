<?php
session_start();
if(isset($_SESSION["manager"])){
	echo '<script language="javascript"> alert("You are already Logged In.!!") </script>';
	header("location:index.php");
	exit();
}
?>
<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
?>
<?php
if(isset($_POST["uname"])&&isset($_POST["pass"])){
	$manager = preg_replace('#(^A-Za-z0-9)#i','',$_POST["uname"]);//filter everything but numbers and letters.
	$password1 = preg_replace('#(^A-Za-z0-9)#i','',$_POST["pass"]);//filter everything but numbers and letters.
	echo "Username:$manager password1:$password1!!";
	include "../sitescripts/connect_mysql.php";
	$admin_chk_sql = "SELECT id FROM admin WHERE username='$manager' AND password='$password1' ";//WHERE username='$manager' AND password1='$password1'
	$qry_exec = mysql_query($admin_chk_sql);
	$countexist = mysql_num_rows($qry_exec);
	$query_row = mysql_fetch_array($qry_exec);
	echo $query_row['id']; 
	echo $countexist;
	if($countexist==1){
		while($row=mysql_fetch_array($qry_exec)){
		$id = $row["id"];	
		}
		$_SESSION["id"] = $id;
		$_SESSION["manager"] = $manager;
		$_SESSION["password1"] = $password1;
		header("location:index.php");
		exit();
	}
	else{
	//echo "<h1>Dear Trollface.Please check your information and try again.<a href="index.php">Login here</a>.Wiggle Wiggle Wiggle.!!</		h1>";
	//exit();
	echo "<h1>Dear User.<br />Your  data is incorrect.</h1>";
	exit();
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
<title>Admin Log-In</title>
<link rel="stylesheet" href="../styles/admin.css" type="text/css" media="screen"/>
</head>
<body>
	<div align="center" id="main_wrapper">
		<div id="page_content">
			<div class="form">
			`<h1>Please Log-In to enter Landmark Manager.</h1>
			<form action="admin_login.php" method="post" id="adminform" name="adminform">		
<table style="width: 100%;">
	<tr>
		<td>Username</td>
		<td><input type="text" name="uname" placeholder="Enter Username" /></td>
	</tr>
	<tr>
		<td>Password</td>
		<td><input type="password" name="pass" placeholder="Enter Password" /></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" value="LOGIN" /></td>
	</tr>
</table>
			</form>
			</div>
		</div>
	</div>
</body>
</html>