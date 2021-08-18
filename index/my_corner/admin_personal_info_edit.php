<?php
ob_start();
require("../../../of_course/constants_2.php");// -->on server
//require("../includes/constants.php"); //-->on local machine
session_start();
//security divert

if(!isset($_POST['submit_personal_info'])||!isset($_SESSION['admin_id'])||!isset($_SESSION['admin_name'])||!isset($_SESSION['restaurant_branch']))
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

//queries for editing admin info
	$_POST['admin_name']=ucwords($_POST['admin_name']);
$gtx_query="UPDATE admin_database";
$gtx_query.=" SET admin_name='{$_POST['admin_name']}',contact_1='{$_POST['admin_contact']}' ";
$gtx_query.="  where admin_id='{$_SESSION['admin_id']}'";
$gtx_result=mysql_query($gtx_query,$gtx_connection);	

	mysql_close($gtx_connection);
	
	header("Location:index.php?admin_info_updated=1");


?>