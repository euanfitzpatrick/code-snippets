<?
session_start();
if(!session_is_registered(fcduser)){
header("location:../login.php");
}else{
header("location:../index.php");
}
?>

<html>
<body>
Login Successful
</body>
</html>