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
include "storescripts/connect_mysql.php";
if(isset($_POST['signin']))
{
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
    else
    {
echo "
<script type='text/javascript'>

$(document).ready(function(){
jQuery.noConflict();
  //When the user click on the login button    
  $('#signin').click(function(){

    //Get each input value in a veriable.
    var username = $('#email').val();
    var password = $('#pass').val();

    //Check if the username and/or the password input are empty.
    if((username == '') || (password == '')) {
      //$('#message').html('<div class='container'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Please enter a username and a password</div></div>');
//$('#message').html('<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Please enter a username and a password</div>');
    }    
    }
    return false;
  });
});
</script>
";       
//echo '<script type="text/javascript"> alert("Wrong usrname"); </script>';
        //header('location: signin.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title></title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,400italic" rel="stylesheet" type="text/css" />
    <link href="Content/bootstrap.min.css" rel="stylesheet">
    <link href="Styles/headfoot.css" rel="stylesheet" />
    <link href="general.css" rel="stylesheet" />
    <link href="signup.css" rel="stylesheet" />
    <script type="text/javascript" src="storescripts/jquery-1.10.1.min.js"></script>

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
                    <form class="navbar-form navbar-left" method="post" action="signin.php" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search for a city">
                        </div>
                        <button type="submit" class="btn btn-default">Explore</button>
                    </form>
                    
                    <li id="first_menu"><a href="signin.php"><span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;SIGN IN</a></li>
                    <li id="second menu"><a href="signup.php"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;SIGN UP</a></li>
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
   
    <form class="form-horizontal signform" role="form" method="post" action="signin.php">
        <div class="jumbotron">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-2 col-md-8 col-md-offset-2">
                        <div class="signtxt">
                            <span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;&nbsp;&nbsp;SIGN IN
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-offset-2 col-md-8 col-md-offset-2">
                            <label for="name" class="control-label col-md-4" style="font-size:20px;">E-MAIL ID:</label>
                            <div class="input-group col-md-6">
                                <input type="text" style="font-size:20px;" placeholder="E-MAIL" class="form-control" id="email" name="email">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-offset-2 col-md-8 col-md-offset-2">
                            <label for="password" class="control-label col-md-4" style="font-size:20px;">PASSWORD:</label>
                            <div class="input-group col-md-6">
                                <input type="password" style="font-size:20px;" placeholder="PASSWORD" class="form-control" id="pass" name="pass">
                                
                            </div>
                            <!--<span class="glyphicon glyphicon-remove form-control-feedback"></span>-->
                        </div>
                    </div>
                </div>
              <div id="message"></div>
                <div class="row">
                    <div class="col-md-offset-2 col-md-8 col-md-offset-2">
                        <div class="signbtn">
                            <button type="submit" name="signin" id="signin">SIGN IN</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="learn-more">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h3>Travelling</h3>
                    <p>From the fjords of Norway to the floating houses of Venice Explore unique locations accross Europe.</p>
                    <p><a href="#">Learn More</a></p>
                </div>
                <div class="col-md-4">
                    <h3>Explore with your loved ones</h3>
                    <p>“The use of traveling is to regulate imagination with reality, and instead of thinking of how things may be, see them as they are.” – Samuel Johnson</p>
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
                    <h4 style="color: white;text-align: center;">Copyright &copy; 2015 GoEuro AB, Sweden</h4>
                </div>
            </div>
        </div>
    </footer>

    <script src="storescripts/bootstrap.min.js"></script>
</body>
</html>