<?php 
session_start();
require("../../../../of_course/constants_2.php");// -->on server
//require("../../includes/constants.php");// -->on local machine
$id=$_GET['val'];
if(isset($_GET['req'])&&isset($_GET['val'])){
function unblock_user($id){
$gtx_connection=mysql_connect(DB_SERVER,DB_USER,DB_PASS);
if(!$gtx_connection)
{
	die(" Database Connection Failed".mysql_error());
}

$gtx_select=mysql_select_db(DB_NAME,$gtx_connection);
if(!$gtx_select)
{	die("Database Selection Failed ".mysql_error());
}
	

$gtx_query="UPDATE user_database";
$gtx_query.=" SET block='' ";
$gtx_query.="WHERE app_scoped_user_id='{$id}'";

$gtx_result=mysql_query($gtx_query,$gtx_connection);

}
unblock_user($id);
}
?>