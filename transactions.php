<?php
session_set_cookie_params( 0, "/~rs726/assignment2/", "web.njit.edu");
session_start();

$status = $_SESSION['logged'];
if (!($status )){
  echo "<br>login first <br><br>";
  header( "refresh:3; url = login.html" );
  exit();
}

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);  
ini_set('display_errors' , 1);
include (  "account.php"     ) ;
include ("myfunction.php");
$db = mysqli_connect($hostname,$username, $password ,$project);
if (mysqli_connect_errno())
  {	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  exit();
  }
mysqli_select_db( $db, $project ); 
$ucid=$_SESSION['ucid'];
echo "This is $ucid in Transactions<br><br>";

?>
<form action="dw.php">

Select an Account:<br>
<?php include ("Radiobuttons.php") ?>
<br>
<br>
Enter amount <input type="type" name="amount" 
            autocomplete="off"
            placeholder="required"
            required ><br><br>
Transaction type <select name = "type">
 <option value = 'D'>deposit</option>
 <option value = 'W'>withdraw</option>
</select><br><br>

<a href="Display.php">Dislpay Link</a><br><br>
<a href="logout.php">Logout</a><br><br>
<br>
<input type=submit value="Perform Transaction">
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