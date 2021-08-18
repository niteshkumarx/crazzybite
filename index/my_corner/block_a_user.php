<?php
ob_start();
require("../../../of_course/constants_2.php"); 
session_start();
//security divert

if(!isset($_GET['yes_its_in_index'])||!isset($_SESSION['admin_id'])||!isset($_SESSION['admin_name'])||!isset($_SESSION['restaurant_branch']))
{
header("Location:../");}
//security divert

?>
<!DOCTYPE html>
<html>
<head>
</head>

<body>

 <?php  
$gtx_connection=mysql_connect(DB_SERVER,DB_USER,DB_PASS);
if(!$gtx_connection)
{die(" Database Connection Failed".mysql_error());
}?>


<?php 
$gtx_select=mysql_select_db(DB_NAME,$gtx_connection);
if(!$gtx_select)
{	die("Database Selection Failed ".mysql_error());
}


//verifying password from admin database starts
$verification_handler='not_verified';
$gtx_query="SELECT * from admin_database where admin_id='".$_SESSION['admin_id']."'";
$gtx_result=mysql_query($gtx_query,$gtx_connection);
 while($row=mysql_fetch_assoc($gtx_result))
{ 

$gtx_auth1=md5($_POST['your_password']);
$gtx_auth2=sha1($gtx_auth1);
$gtx_auth3=md5($gtx_auth2);
$gtx_auth=$gtx_auth3;

if($gtx_auth==$row['password'])
{
$verification_handler='due_verified';	
}
	
else
{
header("Location:index.php?user_block_failed=1");	
}}//verifying password from admin database ends


 if(isset($_POST['submit_block'])&&$verification_handler=='due_verified')
 {
$gtx_query="SELECT * from user_database where app_scoped_user_id='".$_POST['block_user']."'";
$gtx_result=mysql_query($gtx_query,$gtx_connection);

if(mysql_num_rows($gtx_result)==0 )
{ 	mysql_close($gtx_connection);
header("Location:index.php?user_block_failed=1");

}
else{
 while($row=mysql_fetch_assoc($gtx_result))
{ 
$gtx_query="UPDATE user_database";
$gtx_query.=" SET block='TRUE', verified_user=''";
$gtx_query.=" where app_scoped_user_id='{$_POST['block_user']}'";
$gtx_result=mysql_query($gtx_query,$gtx_connection);
}
 header("Location:index.php?user_block_success=1");
 }
 

 }
?>
   
   
   
   
	  
			</body></html>