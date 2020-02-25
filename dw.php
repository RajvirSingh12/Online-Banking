<?php
session_start();
session_set_cookie_params( 0, "/~rs726/assignment2/", "web.njit.edu");
error_reporting(E_ERORR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('display_errors' , 1);

if ( ! isset( $_SESSION['logged'] ) )
{
  echo "<br>login first <br><br>";
  header( "refresh:3; url = login.html" );
  exit();
}
include ("account.php") ;
include ("myfunction.php");
$db = mysqli_connect($hostname,$username, $password ,$project);
if (mysqli_connect_errno())
  {	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  exit();
  }
print "Successfully connected to MySQL.<br>";
mysqli_select_db( $db, $project ); 

$ucid=$_SESSION['ucid'];
$flag=false;
echo"<br>user is: $ucid<br>";
$amount =  GET("amount", $flag) ; echo"<br>amount is: $amount<br>";
$type =  GET("type", $flag) ; echo"<br>type of action: $type<br>";
$account =  GET("account", $flag) ; echo"<br>account number is: $account<br>";
?>
<br>
<a href="transactions.php">Transcation Link</a><br><br>
<a href="logout.php">Logout</a><br><br>