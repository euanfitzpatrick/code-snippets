<?php
require_once('dbCon.php');

function fcd_categories(){
		$sql="SELECT * FROM fcd_session_categories WHERE active='1'";
		$result=mysql_query($sql);
		
		// Mysql_num_row is counting table row
		$count=mysql_num_rows($result);
		// If result matched $myusername and $mypassword, table row must be 1 row
		
		if($count>0){
			$categories = $result;
		}else{
			$categories = "";	
		}
		
		return $categories;
}
