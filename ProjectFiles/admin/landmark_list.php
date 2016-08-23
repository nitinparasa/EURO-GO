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
echo "$managerID <br/> $manager <br /> $password1";
$admin_chk_sql = mysql_query("SELECT * FROM admin WHERE password='$password1' AND username='$manager'");//WHERE idn='$managerID' AND username='$manager' AND password1='$password1'

$countexist = mysql_num_rows($admin_chk_sql);
if($countexist==0){
	echo "<h1>111111Dear Hacker.<br />Your login SESSION data is incorrect.I'm calling the cops!!.You're in trouble.!!</h1>";
	exit();
}
?>
<?php
//Parse the form data and add inventory item to the system.
if(isset($_POST['l_name'])){
	$l_name = mysql_real_escape_string($_POST['l_name']);
	$l_city = mysql_real_escape_string($_POST['l_city']);
	$l_country = mysql_real_escape_string($_POST['l_country']);
	$l_type = mysql_real_escape_string($_POST['l_type']);
	$l_fee = mysql_real_escape_string($_POST['l_fee']);
	$l_desc = mysql_real_escape_string($_POST['l_desc']);
	$l_time = mysql_real_escape_string($_POST['l_time']);
	$l_bus = mysql_real_escape_string($_POST['l_bus']);
	$l_rail = mysql_real_escape_string($_POST['l_rail']);
	$l_air = mysql_real_escape_string($_POST['l_air']);
	$l_lat = mysql_real_escape_string($_POST['l_lat']);
	$l_lng = mysql_real_escape_string($_POST['l_lng']);

	$name_match_sql = mysql_query("SELECT id FROM landmarks WHERE name='$l_name'");
	$name_match_count = mysql_num_rows($name_match_sql);
	if($name_match_count>0){
		echo "You are trying to place a duplicate element into the table.<br/>A product already exists with the name.!!";
		exit();
	}
	echo $name_match_count;
	//Query to add product details.
	$cat_insert = mysql_query("INSERT INTO landmarks (name,city,country,categ,fee,des,timings,near_bus,near_rail,near_air,lat,lng,date_added) values ('$l_name','$l_city','$l_country','$l_type','$l_fee','$l_desc','$l_time','$l_bus','$l_rail','$l_air','$l_lat','$l_lng',now())") or die(mysql_error());
	$pid = mysql_insert_id();
	//Place an image in the folder.
	//$dest = "../storeimages/$imgname";
	$imgname1 = "$pid-img1.jpg";
	$imgname2 = "$pid-img2.jpg";
	$imgname3 = "$pid-img3.jpg";
	move_uploaded_file($_FILES['fileupload1']['tmp_name'],"../storeimages/landmarks/$imgname1");
	move_uploaded_file($_FILES['fileupload2']['tmp_name'],"../storeimages/landmarks/$imgname2");
	move_uploaded_file($_FILES['fileupload3']['tmp_name'],"../storeimages/landmarks/$imgname3");
	//echo "<br/>"$cat[$i];
	header("location:landmark_list.php");
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

			<span class="sitename"><a href="index.html">Landmarks Manager</a></span>
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
			<div class="form">
			<form action="landmark_list.php" method="post" enctype="multipart/form-data" id="adminform" name="adminform">
			<h1>Enter Landmark Details to add to the EuroGo database.</h1>
			<div class="descr" style="font: bold 20px trebuchet ms;">This interface has been designed to make stuff easier for you. Add all details related to the landmark.<br />NOTE: Make sure all the information is standardized. </div>
			<table>
			<tr>
			<td>Landmark Name</td><td><input type="text" name="l_name" placeholder="Enter Landmark Name" /></td></tr>
			<tr><td>Landmark City</td><td><input type="text" name="l_city" placeholder="Enter Landmark City" /></td></tr>
			<tr><td>Landmark Country</td><td>
			<select name="l_country">
			  <option value="uk">The United Kingdom</option>
			  <option value="sweden">Sweden</option>
			  <option value="france">France</option>
			  <option value="germany">Germany</option>
			  <option value="italy">Italy</option>
			  <option value="turkey">Turkey</option>
			</select></td></tr>
			<tr><td>Landmark Type</td><td>
			<select name="l_type">
			  <option value="his_arch">History and Architecture</option>
			  <option value="park_rec">Parks and Recreation</option>
			  <option value="art_mus">Art and Museums</option>
			  <option value="cool_uniq">Cool and Unique</option>
			  <option value="food_fun">Food, Drinks and Fun</option>
			</select></td></tr>
			<tr><td>Landmark Fee (if applicable -- else write N/A)</td><td>&euro;<input type="text" name="l_fee" placeholder="Enter Landmark Fee" style="width: 85%"/></td></tr>
			<tr><td>Description : </td>
			<td><textarea rows="5" cols="50" name="l_desc" placeholder="Enter Landmark Description here..."></textarea></td></tr>
			<tr><td>Timings</td><td><input type="text" name="l_time" placeholder="Enter opening and closingtimings" style="width: 85%"/></td></tr>
			<tr><td>Distance to nearest transport:<br /></td></tr>
			<tr><td>Distance to nearest bus terminal(in KM):</td><td><input type="text" name="l_bus" placeholder="Enter distance" style="width: 85%"/></td></tr>
			<tr><td>Distance to nearest train terminal(in KM):</td><td><input type="text" name="l_rail" placeholder="Enter distance" style="width: 85%"/></td></tr>
			<tr><td>Distance to nearest airport(in KM):</td><td><input type="text" name="l_air" placeholder="Enter distance" style="width: 85%"/></td></tr>
			<tr><td>Geographical Coordinate:<br /></td></tr>
			<tr><td>Latitude(in decimal)</td><td><input type="text" name="l_lat" placeholder="Enter Latitude Value" style="width: 85%"/></td></tr>
			<tr><td>Longitude(in decimal)</td><td><input type="text" name="l_lng" placeholder="Enter Longitude value" style="width: 85%"/></td>
			</tr>
			<tr><td>Landmark Images:</td></tr></br>
			<tr><td>Landmark Image 1</td><td align="center" style="border: 1px solid grey"><input type="file" name="fileupload1" accept="image/*" /></td></tr></br>
			<tr><td>Landmark Image 2</td><td align="center" style="border: 1px solid grey"><input type="file" name="fileupload2" accept="image/*" /></td></tr></br>
			<tr><td>Landmark Image 3</td><td align="center" style="border: 1px solid grey"><input type="file" name="fileupload3" accept="image/*" /></td></tr></br>
			<tr><td colspan="2"> <br><br></td></tr>
			<tr><td colspan="2"><input type="submit" value="SUBMIT" /></td></tr>
			</table>
			</form>
			</div>
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
				<li><a href="inventory_list.php">Manage Landmark Details</a></li>
				<li><a href="edit_inventory.php">Edit Landmark Details</a></li>
				<li><a href="index.html">Add Another Admin</a></li>
			</ul>

		</div>

		<div class="clearer">&nbsp;</div>

	</div>

	<div class="footer">

		<span class="left">
			&copy; 2015 <a href="index.html">eurogo.com</a>.All Rights Reserved.</a>
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