<?php

?>
<!DOCTYPE html>
<head>
<script src="Scripts\jquery-1.10.1.min.js" type="text/javascript"></script>
    
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
function initialize(){
var latlng= {lat: 56.182967, lng: 15.590850};
var mapcanvas=document.getElementById("map");
 var mapOptions = {
      center: latlng,
      zoom: 15,
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
                    
                   <li><a href="signin.php"><span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;SIGN IN</a></li>
                    <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;SIGN UP</a></li>
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
<div class="container" style="margin-top:55px;">
<h3>EURO-GO AB</h3>
<p>Blekinge Institute of Technology</p>
<p>Valhallavagen </p> 
<p>371 41 Karlskrona, Sweden</p>
    <p>goeuro38@gmail.com</p>
<p>Ph No. +46 767 6513 65</p>
<div class="jumbotron" id="map" style="width:100%;height:400px;">

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

    <script src="Scripts/jquery-2.1.4.min.js"></script>
    <script src="Scripts/bootstrap.min.js"></script>
</body>
</html>