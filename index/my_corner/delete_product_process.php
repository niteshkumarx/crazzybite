<?php
ob_start();
session_start();
require("../../../of_course/constants_2.php");// -->on server
//require("../includes/constants.php"); //-->on local machine
session_start();
//security divert

if(!isset($_POST['product_code'])||!isset($_SESSION['admin_id'])||!isset($_SESSION['admin_name'])||!isset($_SESSION['restaurant_branch']))
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
$gtx_query="DELETE from product_list";
$gtx_query.=" WHERE code='{$_POST['product_code']}'";
$gtx_result=mysql_query($gtx_query,$gtx_connection);

if(mysql_affected_rows()==0)
{
header("Location:index.php?delete_fail=2");
	mysql_close($gtx_connection);
}
else{ 
	mysql_close($gtx_connection);
	header("Location:index.php?delete_success=1");
}




?>