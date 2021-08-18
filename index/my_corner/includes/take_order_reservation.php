<?php 
session_start();
require("../../../../of_course/constants_2.php");// -->on server
//require("../../includes/constants.php");// -->on local machine
$id=$_GET['val'];
if(isset($_GET['req'])&&isset($_GET['val'])){
function taking_the_order($id){
$gtx_connection=mysql_connect(DB_SERVER,DB_USER,DB_PASS);
if(!$gtx_connection)
{
	die(" Database Connection Failed".mysql_error());
}

$gtx_select=mysql_select_db(DB_NAME,$gtx_connection);
if(!$gtx_select)
{	die("Database Selection Failed ".mysql_error());
}
	

$gtx_query="UPDATE special_booking";
$gtx_query.=" SET status='YES' ";
$gtx_query.="WHERE serial='{$id}'";

$gtx_result=mysql_query($gtx_query,$gtx_connection);

}
taking_the_order($id);
}
?>