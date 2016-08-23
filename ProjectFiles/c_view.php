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
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="storescripts\jquery-1.10.1.min.js" type="text/javascript"></script>
    
<meta charset="utf-8" />
    <title></title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,400italic" rel="stylesheet" type="text/css" />
    <link href="Content/bootstrap.min.css" rel="stylesheet">
    <link href="Styles/headfoot.css" rel="stylesheet" />
    <link href="general.css" rel="stylesheet" />
    <link rel="stylesheet" href="VMap\jquery-jvectormap-2.0.3.css" type="text/css" media="screen"/>
    
     <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script src="VMap\jquery-jvectormap-2.0.3.min.js" type="text/javascript"></script>
    <script src="VMap\jquery-jvectormap-europe-mill-en.js" type="text/javascript"></script>
   

<script type="text/javascript">
$(document).ready(function(){

$('img').on('click',function(){
var sr= $(this).attr('src');
/*$('#image-gallery-image').attr('src',sr);*/
var img = '<img src="' + sr + '" class="img-responsive" id="image-gallery-image"/>';

        $('#image-gallery').on('shown.bs.modal', function(){
            $('#image-gallery .modal-body').html(img);
        });
        $('#image-gallery').on('hidden.bs.modal', function(){
            $('#image-gallery .modal-body').html('');
        });
});   

 loadGallery(true, 'a.thumbnail');

    //This function disables buttons when needed
    function disableButtons(counter_max, counter_current){
        $('#show-previous-image, #show-next-image').show();
        if(counter_max == counter_current){
            $('#show-next-image').hide();
        } else if (counter_current == 1){
            $('#show-previous-image').hide();
        }
    }

    /**
     *
     * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
     * @param setClickAttr  Sets the attribute for the click handler.
     */

    function loadGallery(setIDs, setClickAttr){
        var current_image,
            selector,
            counter = 0;
$(document).keydown(function(e){
       var code = e.keyCode || e.which;
       switch (code){
          case 37:
          if(current_image==1){
            current_image=1;
          } else{
            current_image--;
          }               
          break;
          case 39:          
         current_image++;         
          break;
          default: return;
       }
        selector = $('[data-image-id="'+ current_image +'"]');
          updateGallery(selector);
          console.log(selector);
           e.preventDefault();
          
  });
        $('#show-next-image, #show-previous-image').click(function(){
            if($(this).attr('id') == 'show-previous-image'){
                current_image--;
            } else {
                current_image++;
            }

            selector = $('[data-image-id="' + current_image + '"]');
            updateGallery(selector);
        });

        function updateGallery(selector) {
            var $sel = selector;
            current_image = $sel.data('image-id');
            $('#image-gallery-caption').text($sel.data('caption'));
            $('#image-gallery-title').text($sel.data('title'));
            $('#image-gallery-image').attr('src', $sel.data('image'));
            $('#image-gallery-link a').text($sel.data('title'));
            $('#image-gallery-link a').attr('src', $sel.data('href'));
            disableButtons(counter, $sel.data('image-id'));
        }

        if(setIDs == true){
            $('[data-image-id]').each(function(){
                counter++;
                $(this).attr('data-image-id',counter);
            });
        }
        $(setClickAttr).on('click',function(){
            updateGallery($(this));
        });
    }
});
</script>
 

</head>
<body>
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
                <a class="navbar-brand" href="default.php"><span class="glyphicon glyphicon-euro"></span>&nbsp;EURO-GO</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">    
                        <input type="search" class="form-control" placeholder="Search for a city">
                        
                        </div>
                        <button type="submit" class="btn btn-default">Explore</button>
                    </form>
                    
                   <!--<li><a href="signin.php"><span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;SIGN IN</a></li>
                    <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;SIGN UP</a></li>-->
                    
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="signin.php"><span class="glyphicon glyphicon-user"></span>&nbsp; &nbsp;<?php echo ucfirst($una); ?> <span class="caret"></span> </a>
                        <ul class="dropdown-menu">
                            <li><a href="user_settings.php"><span class="glyphicon glyphicon-cog"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SETTINGS</a></li>
                            <li class="divider"></li>
                            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LOGOUT</a></li>
                        </ul>
                        </li>
                    
                    <li><a href="favourites.php"><span class="glyphicon glyphicon-heart"></span>&nbsp;&nbsp;FAVOURITES</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">HELP&nbsp;<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">HOW GOEURO WORKS</a></li>
                            <li class="divider"></li>
                            <li><a href="#">ABOUT US</a></li>
                            <li class="divider"></li>
                            <li><a href="contact_us.php">CONTACT US</a></li>
                        </ul>
                    </li>
                </ul>

            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    
    <div class="jumbotron">
<?php  
$id1=$_GET["id"];
//echo $id1;
include "storescripts/connect_mysql.php";
$sql = mysql_query("SELECT * FROM italy WHERE id=$id1");
		while($row = mysql_fetch_array($sql)){ 
                        $id=$row["id"];
						$img1id = $id."-img1.jpg";
                        $img2id = $id."-img2.jpg";
                        $img3id = $id."-img3.jpg";
						$l_name = $row["name"];
                        $l_time = $row["timings"];
                        $l_desc = $row["des"];
						$l_city = $row["city"];
						$l_categ = $row["categ"];
                        $l_fee = $row["fee"];
                        $l_lat = $row["lat"];
                        $l_lng = $row["lng"];
                        $l_nbus = $row["near_bus"];
						$l_nrail = $row["near_rail"];
						$l_nair = $row["near_air"];
}
?>

<div class="container col-md-14" style="text-align:center;padding-top:15px;">  <form id="form1" name="form1" method="post" action="#">
<p style="font-weight:bold;text-transform:uppercase;padding-top: 23px;"><?php echo $l_name; ?></p>
        <input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
        <input type="submit" class="btn btn-primary" style="width:200px;height:40px;" id="cartButton" name="c" value="ADD TO FAVOURITES"></input>
        
        <?php 
	 if(isset($_POST['c']))
	 {
//		 echo "<script>alert('entered');</script>";

include "storescripts/connect_mysql.php";
	$sql = mysql_query("SELECT * FROM italy WHERE id=$id");

		// get all the product details
		while($row=mysql_fetch_array($sql)){
				$id=$row["id"];
				$imgid = $id."-img1.jpg";
				$l_name = $row["name"];
				$l_country = $row["country"];
				$l_city = $row["city"];
				$l_categ = $row["categ"];
			 $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
         }
		$q=mysql_query("insert into cart (id,name,country,city,categ,username,date_added)values($id,'$l_name','$l_country','$l_city','$l_categ','$username',now())") or die(mysql_error());
//		echo $q;
	 }
	//$q1=mysql_query("delete from identity where id=$id1");
//	echo $q1;
	?>
        
      </form> 

<p style="font-weight:bold;text-transform:uppercase;">CITY: <?php echo $l_city; ?>    </p></div> 
<div class="container col-md-14">
<div class="row">
<div class="col-md-4">
<a href="#" class="thumbnail" data-image-id="" data-toggle="modal" data-title="Image One" data-target="#image-gallery">
 <img src="storeimages/landmarks/<?php echo $img1id;?>"  alt="image not available"></img>
</a></div>
<div class="col-md-4">
<a href="#" class="thumbnail" data-image-id="" data-toggle="modal" data-title="Image Two" data-target="#image-gallery"> <img src="storeimages/landmarks/<?php echo $img2id;?>"  alt="image not available"></img>
</a></div>
<div class="col-md-4">
<a href="#" class="thumbnail" data-image-id="" data-toggle="modal" data-title="Image Three" data-target="#image-gallery"> <img src="storeimages/landmarks/<?php echo $img3id;?>"  alt="image not available"></img>
</a></div>

<div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="image-gallery-title"></h4>
            </div>
            <div class="modal-body">
                <img id="image-gallery-image" class="img-responsive" src="">
            </div>
            <div class="modal-footer">

                <div class="col-md-2 pull-left">
                    <button type="button" class="btn btn-primary" id="show-previous-image">Previous</button>
                </div>

                <div class="col-md-5 pull-left" id="image-gallery-caption">
                 
                </div>

                <div class="col-md-2 pull-right">
                    <button type="button" id="show-next-image" class="btn btn-default">Next</button>
                </div>
                
                <div class="col-md-12" id="image-gallery-link">
                    <a href="">I'll be changed</a>
                </div>
            </div>
        </div>
    </div>
</div>

</div>           
</div>
    <div class="container col-md-14">
  <p style="font-weight:bold;">Something about this place:</p>
<p><?php echo $l_desc;?></p>
    </div>
    
    <div class="container col-md-14">
  <p style="font-weight:bold;">You can visit this place from:</p>
<p><?php echo $l_time;?></p>
    </div>
    
    <div class="container col-md-14">
  <p style="font-weight:bold;">ENTRY FEE:</p>
<p style="font-weight:bold;"> <span class="glyphicon glyphicon-euro"></span>  <?php echo $l_fee;?></p>
       
</div>
    
<div class="container col-md-14">
  <p style="font-weight:bold;">Nearest Airport: <?php echo $l_nair;?> KM far!</p>

       
</div>

<div class="container col-md-14">
  <p style="font-weight:bold;">Nearest Railway Station: <?php echo $l_nrail;?> KM far!</p>

       
</div>

<div class="container col-md-14">
  <p style="font-weight:bold;">Nearest Bus Terminal: <?php echo $l_nbus;?> KM far!</p>
       
</div>


<script type="text/javascript">
function initialize(){
var latlng= {lat: <?php echo $l_lat;?>, lng: <?php echo $l_lng;?>};
var mapcanvas=document.getElementById("map");
 var mapOptions = {
      center: latlng,
      zoom: 17,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
var map=new google.maps.Map(mapcanvas, mapOptions);
var marker = new google.maps.Marker({
    position: latlng,
    map: map,
    title: 'Hello World!'
  });
}
 google.maps.event.addDomListener(window, 'load', initialize);
</script>    

<div class="container" id="map" style="width:85%; height:300px;border:1px solid lightblue;border-radius:10px;"><p></p></div>

  <div class="container col-md-14" style="text-align:center;padding-top:15px;">  <form id="form1" name="form1" method="post" action="#">
        <input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
        <input type="submit" class="btn btn-primary" style="width:200px;height:40px;" id="cartButton" name="b" value="ADD TO FAVOURITES"></input>
        
        <?php 
	 if(isset($_POST['b']))
	 {
//		 echo "<script>alert('entered');</script>";

include "storescripts/connect_mysql.php";
	$sql = mysql_query("SELECT * FROM italy WHERE id=$id");

		// get all the product details
		while($row=mysql_fetch_array($sql)){
				$id=$row["id"];
				$imgid = $id."-img1.jpg";
				$l_name = $row["name"];
				$l_country = $row["country"];
				$l_city = $row["city"];
				$l_categ = $row["categ"];
			 $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
         }
		$q=mysql_query("insert into cart (id,name,country,city,categ,username,date_added)values($id,'$l_name','$l_country','$l_city','$l_categ','$username',now())") or die(mysql_error());
//		echo $q;
	 }
	//$q1=mysql_query("delete from identity where id=$id1");
//	echo $q1;
	?>
        
      </form> 
      </div>
</div>
    
    
    
    <footer>
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
                    <h4 style="color: white;text-align: center;">Copyright &copy; 2015 Euro-Go AB, Sweden</h4>
                </div>
            </div>
        </div>
    </footer>

    <script src="storescripts/jquery-2.1.4.min.js"></script>
    <script src="storescripts/bootstrap.min.js"></script>
</body>
</html>

	