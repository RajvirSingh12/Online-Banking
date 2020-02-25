<?php
session_start();
session_set_cookie_params( 0, "/~rs726/assignment2/" );
error_reporting(E_ERORR | E_WARNING | E_PARSE | E_NOTICE);

ini_set('display errors' , 1);


include (  "account.php"     ) ;
include ( "myfunction.php" );
$db = mysqli_connect($hostname,$username, $password ,$project);
if (mysqli_connect_errno())
  {	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  exit();
  }
print "Successfully connected to MySQL.<br>";
mysqli_select_db( $db, $project ); 


$flag=flase;
$ucid= GET("ucid", $flag)  ; echo"<br>user is: $ucid<br>";
$pass =  GET("pass", $flag) ; echo"<br>password is: $pass<br>";
$guess = GET("guess", $flag); 
$text = $_SESSION["captcha"] || "007"; 


$delay = 7;
if ( $guess != $text ){
echo "<br>bad<br>";
header ("refresh:$delay; url = login.html"); 
exit();
}
else{ 
$_SESSION['logged'] = true;
$_SESSION['ucid'] = $ucid;
if(authenticate($ucid,$pass,$db)){ 
	echo "<br>Valid Password." ; }
 else {
 echo "<br>Invalid Password!<br>"; 
 header ("refresh:$delay;  url = login.html"); 
 exit();
 }
header ("refresh:$delay;  url = transactions.php"); 
exit();
}

 