<?php
ob_start();
require("../../../of_course/constants_2.php");// -->on server
//require("../includes/constants.php"); //-->on local machine
session_start();
//security divert

if(!isset($_POST['submit_password'])||!isset($_SESSION['admin_id'])||!isset($_SESSION['admin_name'])||!isset($_SESSION['restaurant_branch']))
{
header("Location:../");}
//security divert
?>
<?php 
$gtx_connection=mysql_connect(DB_SERVER,DB_USER,DB_PASS);
if(!$gtx_connection)
{
	die(" Database Connection Failed".mysql_error());
}?>

<?php 
$gtx_select=mysql_select_db(DB_NAME,$gtx_connection);
if(!$gtx_select)
{	die("Database Selection Failed ".mysql_error());
}
?>

<?php 
 if(isset($_POST['submit_password']))
 {
//queries for editing admin info
$gtx_auth1=md5($_POST['admin_old_password']);
$gtx_auth2=sha1($gtx_auth1);
$gtx_auth3=md5($gtx_auth2);
$gtx_auth=$gtx_auth3;


$gtx_query="SELECT * from admin_database";
$gtx_query.=" WHERE admin_id='{$_SESSION['admin_id']}' and password='{$gtx_auth}'";
$gtx_result=mysql_query($gtx_query,$gtx_connection);
	
if(mysql_num_rows($gtx_result)==0 )
{ mysql_close($gtx_connection);
	header("Location:index.php?password_change_failed=1");
}

else
{
$gtx_auth1x=md5($_POST['admin_new_password']);
$gtx_auth2x=sha1($gtx_auth1x);
$gtx_auth3x=md5($gtx_auth2x);
$gtx_authx=$gtx_auth3x;


$gtx_query="UPDATE admin_database";
$gtx_query.=" SET password='{$gtx_authx}' where admin_id='{$_SESSION['admin_id']}'";
$gtx_result=mysql_query($gtx_query,$gtx_connection);
	mysql_close($gtx_connection);
	header("Location:index.php?password_change_successful=1");	
}


 }	
	


?>