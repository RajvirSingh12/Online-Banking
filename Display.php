<?php
session_start();
session_set_cookie_params( 0, "/~rs726/assignment2/", "web.njit.edu");
$status = $_SESSION['logged'];
if (!($status )){

  echo "<br>login first <br><br>";
  header( "refresh:3; url = login.html" );
  exit();
}
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);  
ini_set('display_errors' , 1);
include (  "account.php"     ) ;
include (  "myfunction.php"  ) ;
$db = mysqli_connect($hostname,$username, $password ,$project);
if (mysqli_connect_errno())
  {	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  exit();
  }
$ucid=$_SESSION['ucid'];
echo "This is $ucid in Display<br><br>";

print "Select an Account:";
?>

<form action="tables.php" >
<?php include ("Radiobuttons.php") ?>
<br>
<br>
<a href="transactions.php">Transcation Link</a><br><br>
<a href="logout.php">Logout</a><br><br>
<input type=submit value="Display Information">
<br><br>
</form>
<meta charset = "UTF-8">
<span id = "demo"></span><br>
<!-- time effects -->
<input type=checkbox checked id = "box" >Auto-stop

<script type = "text/javascript">
  "use strict" 
  var timer1;
  var ptrbox = document.getElementById("box");
  document.addEventListener("click", resetTimer);
  var d, dsec;
  var ptrspan = document.getElementById("demo");
   document.addEventListener("click", resetTimer)
   document.addEventListener ("keypress", resetTimer);
   document.addEventListener ("mousedown", resetTimer);;
   document.addEventListener ("click", F)   
  function resetTimer(){
    if(ptrbox.checked){return;};
    d = new Date();
    dsec = d.getSeconds();
    ptrspan.innerHTML = "<h1>seconds: " + dsec + "<h1>";
    clearTimeout(timer1);
    timer1 = setTimeout(logout, 4000); 
    }
    function logout(){
    if (ptrbox.checked){
    alert("Auto-shutdown stopped.");
    document.getElementById("demo").innerHTML="Auto-shutdown-stopped." ;
    return; 
    };
    window.location.href='logout.php';} 
</script>