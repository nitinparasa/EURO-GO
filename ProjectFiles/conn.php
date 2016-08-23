<?php
$con=mysql_connect("localhost","root","");
$db=mysql_select_db("goeuro",$con);
if(!$db)
    die(mysql_error());
else 
    //echo"Hurrah You made it!!";
?>