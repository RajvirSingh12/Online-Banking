<?php
session_start();
session_set_cookie_params( 0, "/~rs726/assignment2/", "web.njit.edu");
$status = $_SESSION['logged'];
if ( ! isset( $_SESSION['logged'] ) )
{
  echo "<br>login first <br><br>";
  header( "refresh:3; url = login.html" );
  exit();
}

session_start();
error_reporting(E_ERORR | E_WARNING | E_PARSE | E_NOTICE);

ini_set('display errors' , 1);


include (  "account.php"     ) ;
include ( "myfunction.php");
$db = mysqli_connect($hostname,$username, $password ,$project);
if (mysqli_connect_errno())
  {	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  exit();
  }
print "Successfully connected to MySQL.<br>";
mysqli_select_db( $db, $project ); 
$ucid=$_SESSION['ucid'];
$flag=false;
$account = GET("account", $flag) ;

display($ucid, $account, $output, $db);
//echo $output;
?>
<br>
<a href="Display.php">Dislpay Link</a><br><br>
<a href="logout.php">Logout</a><br><br>