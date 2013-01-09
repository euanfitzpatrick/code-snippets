<?
	$username="qphemtm_fcd";
	$password="fcd753*";
	$database="qphemtm_fcd";
	mysql_connect("localhost", $username, $password) or die(mysql_error());
	mysql_select_db($database) or die(mysql_error());
?>