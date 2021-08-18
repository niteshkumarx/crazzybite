<?php
ob_start();
require("../../../of_course/constants_2.php");// -->on server
//require("../includes/constants.php"); //-->on local machine
session_start();
//security divert

if(!isset($_POST['pricing_this'])||!isset($_SESSION['admin_id'])||!isset($_SESSION['admin_name'])||!isset($_SESSION['restaurant_branch']))
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

//queries for inserting new item to database

$_POST['item_name']=ucwords($_POST['item_name']);


	
$gtx_query="UPDATE product_list";
$gtx_query.=" SET name='{$_POST['item_name']}',price='{$_POST['pricing_this']}',cuisine_type='{$_POST['cuisine']}',";
$gtx_query.="available_half='{$_POST['available_half']}',hide='{$_POST['hide']}' where code='{$_GET['product_code']}'";
$gtx_result=mysql_query($gtx_query,$gtx_connection);	

	mysql_close($gtx_connection);
	
	header("Location:index.php?successfully_updated=1");





?>