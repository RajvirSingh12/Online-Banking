<?php

//GET function for smart input
function GET($fieldname, &$flag){
	global $db ;
	$v = $_GET [$fieldname];
	$v = trim ( $v );
	if ($v == "") 
	  { $flag = true ; print"<br><br>$fieldname is empty." ; return  ;} ;
	$v = mysqli_real_escape_string ($db, $v );
	return $v; 
}

//display 
function display ($ucid, $account, &$output, $db) 
{  
  $output="";
  $a   =  "select * from AA where ucid = '$ucid' and account = '$account'  " ;
  ($b = mysqli_query ( $db,  $a   ) )  or die ( mysqli_error ($db) );
  $output.= "<br>AA Table for $ucid<br>";
  $output.= "<table     border=2  width = 70% >" ;
    $output.= "<tr>" ; 
    $output.= "<td>ucid</td>" ;
    $output.= "<td>account</td>";
    $output.= "<td>pass</td>"; 
    $output.= "<td>mail</td>";
    $output.= "<td>initial</td>";
    $output.= "<td>current</td>"; 
    $output.= "<td>recent</td>";
    $output.= "<td>plaintext</td>"; 
    $output.= "</tr>" ;
    $output.= "<style>tr:nth-child(even) {background-color: #add8e6;}</style>" ;
  while ( $c = mysqli_fetch_array ( $b, MYSQL_ASSOC) ) 
  {
    $ucid = $c[ "ucid" ] ;
    $account = $c[ "account" ] ;
    $pass = $c[ "pass" ] ;
    $mail= $c[ "mail" ] ;
    $initial = $c[ "initial" ] ;
    $current = $c[ "current" ] ;
    $recent = $c[ "recent" ] ;
    $plaintext = $c[ "plaintext" ] ;
    $output.= "<tr>" ; 
    $output.= "<td>$ucid</td>" ;
    $output.="<td>$account</td>";
    $output.= "<td>$pass</td>";
    $output.= "<td>$mail</td>";
    $output.= "<td>$initial</td>";
    $output.= "<td>$current</td>"; 
    $output.= "<td>$recent</td>";
    $output.= "<td>$plaintext</td>"; 
    $output.= "</tr>" ;
    };
    $output.= "</table><br>";
    
  
  $s   =  "select * from TT where ucid = '$ucid' and account = '$account' ";
  ($t = mysqli_query ( $db,  $s   ) )  or die ( mysqli_error ($db) );
  $output.= "TT Table for $ucid<br>";
  $output.= "<table     border=2  width = 23% >" ;
    $output.= "<td>type</td>" ;
    $output.= "<td>account</td>" ;
    $output.= "<td>amount</td>"; 
    $output.= "<td>date</td>";
    $output.= "<td>mail</td>";  
    $output.= "</tr>" ;
  while ( $r = mysqli_fetch_array ( $t, MYSQL_ASSOC) ) 
  {
    $type = $r[ "type" ] ;
    $account = $r[ "account" ] ;
    $amount = $r[ "amount" ] ;
    $date = $r[ "date" ] ;
    $mail = $r[ "mail" ] ;
    $output.= "<tr>" ;
    $output.= "<td>$type</td>" ;
    $output.= "<td>$account</td>" ;   
    $output.= "<td>$amount</td>"; 
    $output.= "<td>$date</td>";
    $output.= "<td>$mail</td>";  
    $output.= "</tr>" ;
    };
    $output.= "</table>";
    echo $output;
    
}

function authenticate ($ucid, $pass, $db )
{
	global $t;
	$s = "select * from AA where ucid = '$ucid' and plaintext = '$pass' ";
	echo "<br>SQL is: $s<br>";
	($t = mysqli_query ($db , $s )) or die ( mysqli_error ($db) ); 
		$num = mysqli_num_rows ($t) ;
		echo "<br>The number of rows for $ucid is $num<br>";
		$r = mysqli_fetch_array($t, MYSQLI_ASSOC);
	 $hash = $r ["pass"];

	if(password_verify($pass,$hash)) {
		return true; 
	}
	else {
		return false;
	}	
}

?>