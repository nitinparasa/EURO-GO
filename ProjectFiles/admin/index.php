<?php
session_start();
if(!isset($_SESSION["manager"])){
header("location:admin_login.php");
exit();
}
//Just to be sure that the manager SESSION variable is in database..to check illegal intruders.
$managerID = preg_replace('#(^0-9)#i','',$_SESSION["id"]);//filter everything but numbers.
$manager = preg_replace('#(^A-Za-z0-9)#i','',$_SESSION["manager"]);//filter everything but numbers and letters.
$password1 = preg_replace('#(^A-Za-z0-9)#i','',$_SESSION["password1"]);//filter everything but numbers and letters.
//connect to mysql database
include "../sitescripts/connect_mysql.php";
//Run a mysql query to check whether the admin is genuine by checkin the id and password1 variables of SESSION.
//echo "$managerID <br/> $manager <br /> $password1";
$admin_chk_sql = mysql_query("SELECT * FROM admin WHERE password='$password1' AND username='$manager'");//WHERE idn='$managerID' AND username='$manager' AND password1='$password1'
$countexist = mysql_num_rows($admin_chk_sql);
if($countexist==0){
	echo "<h1>Dear Hacker.<br />Your login SESSION data is incorrect.I'm calling the cops!!.You're in trouble mate!!</h1>";
	exit();
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="description"/>
<meta name="keywords" content="keywords"/> 
<meta name="author" content="author"/> 
<link rel="stylesheet" type="text/css" href="../styles/default.css" media="screen"/>
<link rel="stylesheet" type="text/css" href="../styles/admin.css" media="screen"/>
<title>Admin Home</title>
</head>

<body>

<div class="outer-container">

<div class="inner-container">

	<div class="header">
		
		<div class="title">

			<span class="sitename"><a href="index.html">Location Manager</a></span>
			<div class="slogan">EuroGo</div>

		</div>
		
	</div>
	<div class="path">
			
			<ul>
			<li>Logged in as &#8250; <a href="index.php"><?php echo ucfirst($manager); ?></a></li>
			<li><a href="logout.php"><img src="img/logout.png" width=20px height=20px />LOGOUT</a></li>
	</ul>
	</div>

	<div class="main">		
		
		<div class="content">
			<h1>Hey <?php echo ucfirst($manager); ?>, </h1>
			<div class="descr">Welcome to the Location Management Page @ EuroGo.<br />Here, You can manage location data and perform other administrative Operations.</div>
			
		</div>

		<div class="navigation">

			<h2>Administration Operations</h2>
			<ul>
				<li><a href="landmark_list.php">Manage Landmark Details</a></li>
				<li><a href="edit_landmarks.php">Edit Landmark Details</a></li>
				<li><a href="index.html">Add Another Admin</a></li>
			</ul>

			<h2>View Records</h2>
			<ul>
				<li><a href="index.html">View Landmark Details</a></li>
				<li><a href="index.html">View Customer Details</a></li>
				<li><a href="index.html">View Customer Complaints</a></li>
			</ul>

		</div>

		<div class="clearer">&nbsp;</div>

	</div>

	<div class="footer">

		<span class="left">
			&copy; 2014 <a href="index.html">eurogo.com</a>.All Rights Reserved.</a>
		</span>
		
		<span class="right">
			Happy Management.!!
		</span>

		<div class="clearer"></div>

	</div>
</div>
</div>
</body>
</html>