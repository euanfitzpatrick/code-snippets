<?php 
require_once('dbCon.php');

$adminemail = '<email-address-here>';
$headers_admin = 'MIME-Version: 1.0' . "\r\n";
$headers_admin .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
ini_set('display_errors', E_ALL);

$return = '/add-session';

// Additional headers
$headers_admin .= 'From: <your-message>' . "\r\n";

// check logged in
session_start();
if(!$_SESSION['uid']){ ?>
	<script type="text/javascript">alert("You need to login before adding a session!");</script>
    <form action="/add-session" method="post" name="frm">
    <?php foreach ($_POST as $key => $value) {
			if ($key != 'submit') {
				?>
                <input type="hidden" name="<?php echo $key; ?>" value="<?php echo $value; ?>" />
			<?php  }
		} ?>
        </form>
		<script language="JavaScript">
        	document.frm.submit();
        </script>
        <?php 
}


if (isset($_POST['session_name'])) {
		
		foreach ($_POST as $key => $value) {
			if ($key != 'submit') {
				$$key = stripslashes($value);
				$fillform .= $key.'='.$value.'&';
			}
		}
		
		$insert_sql="INSERT INTO fcd_sessions (category, name, short_desc, long_desc, goals, area, bibs, balls, active, user_id) VALUES ('".$session_category."','".$session_name."','".$short_description."','".$long_description."','".$equip_goals."','".$equip_area."','".$equip_bibs."','".$equip_footballs."', '0', '".$_SESSION['uid']."')";
		$insert_result=mysql_query($insert_sql)or die(mysql_error());
		$insert_id=mysql_insert_id();
		echo 'New ID: '.$insert_id;



}
