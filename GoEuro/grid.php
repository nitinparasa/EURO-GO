<?php
//Turn off all error reporting
error_reporting(1);
?>
<?php
require "sitescripts/connect_mysql.php";
				$sql = mysql_query("SELECT * FROM italy");
				$prod_count = mysql_num_rows($sql);
				if($prod_count>0){
					$dynamicTitle = "Image Not Available.";
						$dynamic_list ="<table border=0 cellspacing='0' cellpadding='0' width='225px'  height='250px' >";
						$i = 0;
						function getCategory($a){
					if($a = 'his_arch'){
					echo 'History and Architecture';
					}

					if($a = 'park_rec'){
					echo 'Parks and Recreation';	
					}

					if($a = 'art_mus'){
					echo 'Art and Museums';	
					}


					if($a = 'cool_uniq'){
					echo 'Cool and Unique';	
					}

					if($a = 'food_fun'){
					echo 'Food and Fun';	
					}						
				};
					while($row=mysql_fetch_array($sql)){
						$id=$row["id"];
						$imgid = $id."-img1.jpg";
						$l_name = $row["name"];
						$l_city = $row["city"];
						$l_categ = $row["categ"];
						$date_added = strftime("%b %d,20%y",strtotime($row["date_added"]));
						
						
				


						$dynamic_list .= "<div class='col-md-4' style='border:2px solid red;'><a href='c_view.php?id=".$id."' class='iframe'>
						<div class='thumbnail'><div class='QViewHover' style='border:2px solid blue;'><div class='hover' style='border:2px solid green;'>Information</div><img src='storeimages/landmarks/$imgid' alt='$dynamicTitle' />
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
?>
<!doctype html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,400italic" rel="stylesheet" type="text/css" />
    <link href="Content/bootstrap.min.css" rel="stylesheet">
    <link href="Styles/headfoot.css" rel="stylesheet" />
    <link href="general.css" rel="stylesheet" />
    <link href="grid.css" rel="stylesheet" />
    <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>-->
    <script type="text/javascript" src="storescripts/jquery-1.10.1.min.js"></script>
    <script src="Scripts/bootstrap.min.js"></script>


<script type="text/javascript" src="qryupdate.js"></script>
</head>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-euro"></span>&nbsp;Go-Euro</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search for a city">
                    </div>
                    <button type="submit" class="btn btn-default">Explore</button>
                </form>
                <li><a href="signin.html"><span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;SIGN IN</a></li>
                <li><a href="signup.html"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;SIGN UP</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-heart"></span>&nbsp;&nbsp;FAVOURITES</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">HELP&nbsp;<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">HOW GOEURO WORKS</a></li>
                        <li class="divider"></li>
                        <li><a href="#">ABOUT US</a></li>
                        <li class="divider"></li>
                        <li><a href="#">CONTACT US</a></li>
                    </ul>
                </li>
            </ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<body >
    <div class="main">
        <div class="container">
            <h2>Country Selected: Italy</h2>
            <p>Click the button to display an alert box:</p>

            <aside class="col-md-2" style="height: 100%; background-color:aquamarine;">
                <h3>Narrow your search:</h3>
                <form action="" method="post" id="selectform" name="selectform">
                <div ="cities">
                    <h3>Cities:</h3>
                    <label ><input type="checkbox" name="city[]" value="Rome" id="Rome" onchange="myFunction()">Rome</label></br>
                    <label ><input type="checkbox" name="city[]" value="Milan" id="Milan">Milan</label></br>
                    <label ><input type="checkbox" name="city[]" value="Turin" id="Turin">Turin</label></br>
                    <label ><input type="checkbox" name="city[]" value="Venice" id="Venice">Venice</label></br>
                </div>
                </form>
                <form action="" method="post" id="selectform" name="selectform">
                <div ="categories">
                    <h3>Categories:</h3>
                    <label><input type="checkbox" name="categ[]" value="his_arch" id="his_arch">History and Architecture</label></br>
                    <label><input type="checkbox" name="categ[]" value="park_rec" id="park_rec">Parks and Recreation</label></br>
                    <label><input type="checkbox" name="categ[]" value="art_mus" id="art_mus">Art and Museums</label></br>					
                    <label><input type="checkbox" name="categ[]" value="cool_uniq" id="cool_uniq">Cool and Unique</label></br>					
                    <label><input type="checkbox" name="categ[]" value="food_fun" id="food_fun">Food, Drinks and Fun</label></br>		
                </div>
                </form>
                <div ="fee">
                    <h3>Fee Applicable:</h3>
                    <label><input type="checkbox" name="fee[]" value="">Applicable</label></br>
                    <label><input type="checkbox" name="fee[]" value="">Not Applicable</label></br>
                </div>
            </aside>
            
            
            <div class="container-fluid col-md-10">
            	<div id="grid">
                    <?php echo $dynamic_list?>
                </div>
            </div>
        </div>
    </div>

   <!-- <footer>
        <div class="footnav">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-centered emadd">
                        <label>Enter your e-mail address to recieve our updates:</label>&nbsp;&nbsp;
                        <input type="text" placeholder="Enter your email address" />
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-1">
                        <h3>About</h3>
                        <ul>
                            <li>
                                <a href="#">Company</a>
                            </li>
                            <li>
                                <a href="#">Press</a>
                            </li>
                            <li>
                                <a href="#">Team</a>
                            </li>

                            <li>
                                <a href="#">Jobs</a>
                            </li>
                            <li>
                                <a href="#">Blog</a>
                            </li>

                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h3>Legal</h3>
                        <ul>
                            <li>
                                <a href="#">Policies</a>
                            </li>
                            <li>
                                <a href="#">Terms</a>
                            </li>
                            <li>
                                <a href="#">Privacy</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-md-offset-1">
                        <h3>Community</h3>
                        <ul>
                            <li>
                                <a href="#"> Why List</a>
                            </li>
                            <li>
                                <a href="#">Support</a>
                            </li>
                            <li>
                                <a href="#">Safety Tips</a>
                            </li>

                            <li>
                                <a href="#">Testimonials</a>
                            </li>
                            <li>
                                <a href="#">Wiki</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 social">
                    <h3>Connect with Us</h3>
                    <a class="soclogo" href="http://youtube.com">
                        <img src="images/youtube.png"></img>
                    </a>
                    <a class="soclogo" href="http://twitter.com">
                        <img src="images/twitter.png"></img>
                    </a>
                    <a class="soclogo" href="http://facebook.com">
                        <img src="images/facebook.png"></img>
                    </a>
                    <a class="soclogo" href="http://vimeo.com">
                        <img src="images/vimeo.png"></img>
                    </a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-centered copyright">
                    <h4 style="color: white;text-align: center;">Copyright &copy; 2015 GoEuro AB, Sweden</h4>
                </div>
            </div>
        </div>
    </footer>-->
	
    <script src="Scripts/jquery-2.1.4.min.js"></script>
    <script src="Scripts/bootstrap.min.js"></script>
   <!-- <script src="Scripts/angular.min.js"></script> -->

    <!-- Modules -->
    <!--<script src="js/app.js"></script>-->

    <!-- Controllers -->
    <!--<script src="js/controllers/MainController.js"></script>-->
    
    
</body>
</html>