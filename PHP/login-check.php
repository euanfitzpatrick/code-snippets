<?php
require_once('dbCon.php');

// username and password sent from form
$postemail=$_POST['email'];
$postpassword=$_POST['pword'];

// To protect MySQL injection (more detail about MySQL injection)
$myemail = stripslashes($postemail);
$mypassword = stripslashes($postpassword);

//$myusername = mysql_real_escape_string($myusername);
//$mypassword = mysql_real_escape_string($mypassword);

$sql="SELECT * FROM fcd_users WHERE email='".$myemail."' and pssword='".$mypassword."'";
$result=mysql_query($sql);
while ($row = mysql_fetch_array($result)) {
	$myuid = $row['uid'];
	$myfirstname = $row['firstname'];
}


// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){
// Register $myusername, $mypassword and redirect to file "login_success.php"
session_start();
session_register("fcduser");
$_SESSION['email']=$myemail;
$_SESSION['uid']=$myuid;
$_SESSION['firstname']=$myfirstname;

header("location:login-success.php");
}
else {
header("location:../login.php?login=failed");
}
?>