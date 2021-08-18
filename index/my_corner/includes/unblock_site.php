<?php 
session_start();
require("../../../../of_course/constants_2.php");// -->on server
//require("../../includes/constants.php");// -->on local machine
$id=$_GET['val'];
if(isset($_GET['req'])&&isset($_GET['val'])){
function unblocking_site($id){
$gtx_connection=mysql_connect(DB_SERVER,DB_USER,DB_PASS);
if(!$gtx_connection)
{
	die(" Database Connection Failed".mysql_error());
}

$gtx_select=mysql_select_db(DB_NAME,$gtx_connection);
if(!$gtx_select)
{	die("Database Selection Failed ".mysql_error());
}
	

$gtx_query="UPDATE system_control";
$gtx_query.=" SET boot_up_if_time='' ";
$gtx_query.="WHERE restaurant_name_id='{$id}'";

$gtx_result=mysql_query($gtx_query,$gtx_connection);

}
unblocking_site($id);
}
?>