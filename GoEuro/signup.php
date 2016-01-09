<?php
session_start();
include "conn.php";
if(isset($_POST['signup']))
{
    $username=mysql_real_escape_string($_POST['username']);
    //echo $username;
    $email=mysql_real_escape_string($_POST['email']);
    $password=$_POST['password1'];
    if($username && $email && $password){
    $confirmcode = rand();
    $qry= "insert into users values ('','$email','$username','$password','0','$confirmcode')";
    //echo $qry;
    $result=mysql_query($qry);
    $urlname=urlencode($username);
    error_reporting(E_ALL);
    //require_once 'PHPMailer/PHPMailerAutoload.php';
    require("PHPMailer/class.phpmailer.php");
    require  ("PHPMailer /class.smtp.php");
    $mail = new PHPMailer();
    $mail->IsSMTP(); // set mailer to use SMTP
    $mail->SMTPDebug  = 0; 
    $mail->From = "DoNotReply@goeuro.com";
    $mail->FromName = "GoEuro";
    $mail->Host = "smtp.gmail.com"; // specif smtp server
    $mail->SMTPSecure= "ssl"; // Used instead of TLS when only POP mail is selected
    $mail->Port = 465; // Used instead of 587 when only POP mail is selected
    $mail->SMTPAuth = true;
    $mail->Username = "goeuro38@gmail.com"; // SMTP username
    $mail->Password = "Goeuro83"; // SMTP password
    $mail->AddAddress("$email", "$username"); //replace myname and mypassword to yours
    //$mail->AddReplyTo("DoNotReply@goeuro.com", "GoEuro");
    $mail->WordWrap = 50; // set word wrap
    //$mail->AddAttachment("c:\\temp\\js-bak.sql"); // add attachments
    //$mail->AddAttachment("c:/temp/11-10-00.zip");

    $mail->IsHTML(true); // set email format to HTML
    $mail->Subject = 'GO-Euro Email Activation';
    $mail->Body = 'Hi, '.$username.'. Welcome to GoEuro. Enjoy the rich experince of knowing various places in Europe!!!<br>
        Confirm Your Email<br><br>
        Click the link below to verify your account<br> http://localhost/GoEuro/email_confirmation.php?urlname='.$urlname.'&code='.$confirmcode.'
                  ';

    if($mail->Send()) {echo "Registration Successful. Please verify your account for us to recognize you!"; }
    else {echo "OOMPA LOOMPA !!! Something went wrong";} 
    
    }
    
    //echo $result;
   // header("location: signin.php");
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
    <script type="text/javascript" src="Scripts/jquery-1.10.1.min.js"></script>
    <link href="general.css" rel="stylesheet" />
    <link href="signup.css" rel="stylesheet" />
<script type="text/javascript">
    $(document).ready(function () {
       
        $("#password2").keyup(validate);
    });

    function validate()
    {
       
        var p1=$("#password1").val();
        var p2 = $("#password2").val();
        if (p1 == null || p2 == null) {
            $("#validate").hide();
        }
        if(p1 == p2)
        {
           // $("#validate_status").class("glyphicon glyphicon-ok");
           // $("#validate_status").style("color:green");
            
            $("#validate").html("<p style='color:green;width:40%;font-size:15px;'><span class='glyphicon glyphicon-ok'></span>Passwords match</p>");
        }
        else{
            //$("#validate_status").class("glyphicon glyphicon-remove");
            // $("#validate").text("Passwords do not match");
            
            $("#validate").html("<p style='color:red;width:40%;font-size:15px;'><span class='glyphicon glyphicon-remove'></span>Passwords do not match</p>");

        }
    }

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
                <a class="navbar-brand" href="default.php"><span class="glyphicon glyphicon-euro"></span>&nbsp;Go-Euro</a>
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
    
    <form class="form-horizontal signform" role="form" action="#" method="post">
        <div class="jumbotron">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-2 col-md-8 col-md-offset-2">
                        <div class="signtxt">
                            <span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;&nbsp;&nbsp;SIGN UP
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-offset-2 col-md-8 col-md-offset-2">
                            <label for="name" class="control-label col-md-4" style="font-size:20px;">USER NAME:</label>
                            <div class="input-group col-md-6">
                                <input type="text" style="font-size:20px;" placeholder="NAME" class="form-control" id="username" name="username">
                                <span class="input-group-addon glyphicon glyphicon-user"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                            <div class="col-md-offset-2 col-md-8 col-md-offset-2">
                                <label for="email" class="control-label col-md-4" style="font-size:20px;" >E-MAIL:</label>
                                <div class="input-group col-md-6">
                                    <input type="email" style="font-size:20px;" placeholder="E-MAIL" class="form-control" id="email" name="email">
                                    <span class="input-group-addon glyphicon glyphicon-envelope"></span>
                                </div>
                            </div>
                    </div>
                    </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-offset-2 col-md-8 col-md-offset-2">
                            <label for="password" class="control-label col-md-4" style="font-size:20px;">PASSWORD:</label>
                            <div class="input-group col-md-6">
                                <input type="password" style="font-size:20px;" placeholder="PASSWORD" class="form-control" id="password1" name="password1">
                                <span class="input-group-addon glyphicon glyphicon-lock"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-offset-2 col-md-8 col-md-offset-2">
                            <label for="password" class="control-label col-md-4" style="font-size:20px;">CONFIRM PASSWORD:</label>
                            <div class="input-group col-md-6">
                                <input type="password" style="font-size:20px;" placeholder="CONFIRM PASSWORD" class="form-control" id="password2" name="password2">
                                <span class="input-group-addon glyphicon glyphicon-lock"></span>
                            </div>
                            <div class="form-control" style="border:0px;background-color:#EEEEEE;width:60%;float:left;" id="validate"></div>
                        </div>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-md-offset-2 col-md-8 col-md-offset-2">
                            <div class="signbtn">
                                <button type="submit" id="signup" name="signup">SIGN UP</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 remember">
                            By clicking "Create Account" you agree with GoEuro Terms and Conditions and Privacy Policy.
                        </div>
                    </div>
                </div>
        </div>
        </form>
        <div class="learn-more">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h3>Seafaring</h3>
                        <p>From cruisers and speed boats to kayaks and jet skis: rent unique boats in 12 countries.</p>
                        <p><a href="#">See how to rent boats on Seasharing</a></p>
                    </div>
                    <div class="col-md-4">
                        <h3>Be a Host</h3>
                        <p>Renting out your unused boats could pay your bills or fund your next vacation.</p>
                        <p><a href="#">Learn more about hosting</a></p>
                    </div>
                    <div class="col-md-4">
                        <h3>Trust and Safety</h3>
                        <p>From Verified ID to our worldwide customer support team, we've got your back.</p>
                        <p><a href="#">Learn about trust at Seasharing</a></p>
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

        <script src="Scripts/jquery-2.1.4.min.js"></script>
        <script src="Scripts/bootstrap.min.js"></script>
</body>
</html>