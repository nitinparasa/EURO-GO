<?php
session_start();
if(isset($_SESSION["user"])){
    header("location:index.php");
    exit();
}
    ?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="Scripts\jquery-1.10.1.min.js" type="text/javascript"></script>
    
<meta charset="utf-8" />
    <title></title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,400italic" rel="stylesheet" type="text/css" />
    <link href="Content/bootstrap.min.css" rel="stylesheet">
    <link href="Styles/headfoot.css" rel="stylesheet" />
    <link href="general.css" rel="stylesheet" />
    <link rel="stylesheet" href="VMap\jquery-jvectormap-2.0.3.css" type="text/css" media="screen"/>
    
    
    <script src="VMap\jquery-jvectormap-2.0.3.min.js" type="text/javascript"></script>
    <script src="VMap\jquery-jvectormap-europe-mill-en.js" type="text/javascript"></script>

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
                            <li><a href="contact_us.php">CONTACT US</a></li>
                        </ul>
                    </li>
                </ul>

            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    
<div class="container" style="margin-top:51px;">

<h3>Use the interactive map to view various places in Europe</h3>   
<div id="eumap" style="width: 100%; height: 400px; position:relative;"></div>
<script type="text/javascript">
      $(document).ready(function () {
            jQuery.noConflict();
          $('#eumap').vectorMap({ map: 'europe_mill',
                    onRegionClick: function(event, code){
                        if (code == "ES") {window.location = 'grid.php'}
                        if (code == "GB") {window.location = 'grid.php'}
                        if (code == "SE") {window.location = 'grid.php'}
                        
}

 });
            //$('#eumap').css('border', '3px solid red');
    });
  </script>     
    
    </div>
    
    <div class="neighborhood-guides">
        <div class="container">
            <h2>Pick a location</h2>
            <p>Not sure where to go? We've created guides for cities all around the world.</p>
            <div class="row">
                <div class="col-md-4">
                    <div class="thumbnail">
                        <a href="grid.php"><img src="Images/stockholm.jpg">
                        <div class="caption post-content">
                            <h3>Stockholm</h3>
                            <p>Home of the meatballs!</p>
                        </div>
                        </a>
                    </div>
                    <div class="thumbnail">
                    <a href="#"><img src="Images/berlin.jpg">
                        <div class="caption post-content">
                            <h3>Berlin</h3>
                            <p>Fall in line!!</p>
                            </div>
                            </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="thumbnail">
                    <a href="#">    
                    <img src="Images/brussels.jpg">
                        <div class="caption post-content">
                            <h3>Brussels</h3>
                            <p>Is it Dutch??Is it French??</p>
                            </div>
                            </a>
                    </div>
                    <div class="thumbnail">
                        <a href="#">    
                        <img src="Images/paris.jpg">
                        <div class="caption post-content">
                            <h3>Paris</h3>
                            <p>Lorem ipsum dolor sit amet</p>
                       
                            </div>
                    </a>
                            </div>
                </div>
                <div class="col-md-4">
                    <div class="thumbnail">
                        <a href="#">    
                        <img src="Images/london.jpg">
                        <div class="caption post-content">
                            <h3>London</h3>
                            <p>Cheerio! Governor</p>
                       
                            </div>
                    </a>
                            </div>
                </div>
                <div class="col-md-4">
                    <div class="thumbnail">
                        <a href="#">    
                        <img src="Images/budapest.jpg">
                        <div class="caption post-content">
                            <h3>Budapest</h3>
                            <p>Lorem ipsum dolor sit amet</p>
                       
                        </div>
                    </a>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <div class="learn-more">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h3>Travelling</h3>
                    <p>From the fjords of Norway to the floating houses of Venice Explore unique locations accross Europe.</p>
                    <p><a href="#">Learn More</a></p>
                </div>
                <div class="col-md-4">
                    <h3>Robots!!</h3>
                    <p>Lorem ipsum dolor sit amet, moderatius complectitur at eam, sed illum error no. Explicari interesset an nec, his liber harum delenit at. Ex omnesque iracundia nec. Est modus repudiandae ex. In dicit impedit corpora nec, ut est assum vituperata.</p>
                    <p><a href="#">Learn more </a></p>
                </div>
                <div class="col-md-4">
                    <h3>Trust and Safety</h3>
                    <p>Get in touch with our worldwide customer support team, we've got your back.</p>
                    <p><a href="#">Learn more</a></p>
                </div>
            </div>
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

	