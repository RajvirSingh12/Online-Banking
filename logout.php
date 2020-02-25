<?php
session_set_cookie_params( 0, "/~rs726/download/Display.php", "web.njit.edu");
session_start() ;

$sidvalue= session_id(); echo "<br>Session ID:  "  . $sidvalue . "<br>";

$_SESSION=array();
session_destroy();
setcookie("PHPESSID", "", time()-3600, '/~rs726/download/Display.php', "", 0,0);

echo "Session Expired";
?>