<?php
//Turn off all error reporting
error_reporting(1);

include "sitescripts/connect_mysql.php";

					$city = array();
					$city0 = NULL;
					$city1 = NULL;
					$city2 = NULL;
					$city3 = NULL;
					
					$cat = array();
					$cat0 = NULL;
					$cat1 = NULL;
					$cat2 = NULL;
					$cat3 = NULL;
					$cat4 = NULL;
					
					$noval = NULL;
					
					if(isset($_POST['city'])){
						print_r($_POST['city']);
					}
					else
					echo "City not set";
					
					if(isset($_POST['categ'])){
						print_r($_POST['categ']);
					}
					else
					echo "City not set";

if(!empty($_POST['city']) && empty($_POST['categ'])){
					$city_count = count($_POST['city']);
					
					for($i=0;$i<$city_count;$i++){
					$city[] = $_POST['city'][$i];
					}
					
					$city0 = mysql_real_escape_string($city[0]);
					$city1 = mysql_real_escape_string($city[1]);
					$city2 = mysql_real_escape_string($city[2]);
					$city3 = mysql_real_escape_string($city[3]);
					
					$sql = mysql_query("SELECT * FROM uk WHERE (city='$noval' OR city='$city0' OR city='$city1' OR city='$city2' OR city='$city3')");
			
					$prod_count = mysql_num_rows($sql);
					if($prod_count>0){
					$dynamicTitle = "Image Not Available.";
						$dynamic_list ="<table border=0 cellspacing='0' cellpadding='0' width='225px'  height='250px' >";
						$i = 0;
					while($row=mysql_fetch_array($sql)){
						$id=$row["id"];
						$imgid = $id."-img1.jpg";
						$l_name = $row["name"];
						$l_city = $row["city"];
						$l_categ = $row["categ"];
						$date_added = strftime("%b %d,20%y",strtotime($row["date_added"]));
						$dynamic_list .= "<div class='col-md-4' ><a href='qview1.php?id=".$id."' class='iframe'>
						<div class='thumbnail'><div class='QViewHover' ><img src='storeimages/uk/$imgid' alt='$dynamicTitle' />
                        <p class='title'>$l_name</p>
                        <p class='price'>+</p>
                        <p class='city'>$l_city</p>
                        <p class='city'>$l_categ</p>
                    </div> </div></a></div>";
						}
				}
				else{
					$dynamic_list = "No Landmarks here.Come	 back later.!!";
					}
}

		
elseif(!empty($_POST['categ']) && empty($_POST['city'])){
					$cat_count = count($_POST['categ']);
					
					for($i=0;$i<$cat_count;$i++){
					$cat[] = $_POST['categ'][$i];
					}
					
					
					$cat0 = mysql_real_escape_string($cat[0]);
					$cat1 = mysql_real_escape_string($cat[1]);
					$cat2 = mysql_real_escape_string($cat[2]);
					$cat3 = mysql_real_escape_string($cat[3]);
					$cat4 = mysql_real_escape_string($cat[4]);
					
					$sql = mysql_query("SELECT * FROM uk WHERE (categ='$noval' OR categ='$cat0' OR categ='$cat1' OR categ='$cat2' OR categ='$cat3')");

					$prod_count = mysql_num_rows($sql);
					if($prod_count>0){
					$dynamicTitle = "Image Not Available.";
						$dynamic_list ="<table border=0 cellspacing='0' cellpadding='0' width='225px'  height='250px' >";
						$i = 0;
					while($row=mysql_fetch_array($sql)){
						$id=$row["id"];
						$imgid = $id."-img1.jpg";
						$l_name = $row["name"];
						$l_city = $row["city"];
						$l_categ = $row["categ"];
						$date_added = strftime("%b %d,20%y",strtotime($row["date_added"]));
						$dynamic_list .= "<div class='col-md-4'><a href='qview1.php?id=".$id."' class='iframe'>
						<div class='thumbnail'><div class='QViewHover' ><div class='hover' >Information</div><img src='storeimages/uk/$imgid' alt='$dynamicTitle' />
                        <p class='title'>$l_name</p>
                        <p class='price'>+</p>
                        <p class='city'>$l_city</p>
                        <p class='city'>$l_categ</p>
                    </div> </div></a></div>";
						}
				}
				else{
					$dynamic_list = "No Landmarks here.Come back later.!!";
				}
}

elseif(!empty($_POST['city']) && !empty($_POST['categ'])){
					$noval = "NULL";			
					
					$city_count = count($_POST['city']);
					$cat_count = count($_POST['categ']);
					
					for($i=0;$i<$city_count;$i++){
					$city[] = $_POST['city'][$i];
					}
					
					for($i=0;$i<$cat_count;$i++){
					$cat[] = $_POST['categ'][$i];
					}
					
					$city0 = mysql_real_escape_string($city[0]);
					$city1 = mysql_real_escape_string($city[1]);
					$city2 = mysql_real_escape_string($city[2]);
					$city3 = mysql_real_escape_string($city[3]);
					
					$cat0 = mysql_real_escape_string($cat[0]);
					$cat1 = mysql_real_escape_string($cat[1]);
					$cat2 = mysql_real_escape_string($cat[2]);
					$cat3 = mysql_real_escape_string($cat[3]);
					$cat4 = mysql_real_escape_string($cat[4]);
					
					
					$sql = mysql_query("SELECT * FROM uk WHERE (city='$noval' OR city='$city0' OR city='$city1' OR city='$city2' OR city='$city3') AND (categ='$noval' OR categ='$cat0' OR categ='$cat1' OR categ='$cat2' OR categ='$cat3')");
					
					$prod_count = mysql_num_rows($sql);
					if($prod_count>0){
					$dynamicTitle = "Image Not Available.";
						$dynamic_list ="<table border=0 cellspacing='0' cellpadding='0' width='225px'  height='250px' >";
						$i = 0;
					while($row=mysql_fetch_array($sql)){
						$id=$row["id"];
						$imgid = $id."-img1.jpg";
						$l_name = $row["name"];
						$l_city = $row["city"];
						$l_categ = $row["categ"];
						$date_added = strftime("%b %d,20%y",strtotime($row["date_added"]));
						$dynamic_list .= "<div class='col-md-4'><a href='qview1.php?id=".$id."' class='iframe'>
						<div class='thumbnail'><div class='QViewHover' ><div class='hover' >Information</div><img src='storeimages/uk/$imgid' alt='$dynamicTitle' />
                        <p class='title'>$l_name</p>
                        <p class='price'>+</p>
                        <p class='city'>$l_city</p>
                        <p class='city'>$l_categ</p>
                    </div> </div></a></div>";
						}
				}
				else{
					$dynamic_list = "No Landmarks here.Come back later.!!";
				}	
}
//print_r($_POST['checkbox']);
echo "<h5 align:left;>Selected Categories:".$cats."</h5>";
echo "<h5 align:left;>Selected Tags:".$cities."</h5>";

echo $dynamic_list;
?>