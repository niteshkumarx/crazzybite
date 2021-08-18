<?php
ob_start();
require("../../../of_course/constants_2.php"); 
session_start();
//security divert
        //date_default_timezone_set('Asia/Calcutta'); //Change as per your default time
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
header("Location:index.php?site_shutdown_failed=1");	
}}//verifying password from admin database ends

//cases to set the boot up timer for the website
 if(isset($_POST['submit_shutdown'])&&$verification_handler=='due_verified')
 {

// THE CLOCK IN SERVER MAY RUN FAST its running 12 hour:30minute late here
//thus adding 750 minutes to each time 1hr--> 750+60=810 minute


	 if($_POST['auto_restart_time']==1)
	 { //1 Hour
$gtx_query="UPDATE system_control";
$gtx_query.=" SET boot_up_if_time=DATE_ADD(NOW(), INTERVAL 810 MINUTE)";
$gtx_query.=" where restaurant_name_id='CRAZZYBITEGKP'";
$gtx_result=mysql_query($gtx_query,$gtx_connection);
 header("Location:index.php?site_shutdown_success=1");
	 }

	 else if($_POST['auto_restart_time']==2)
	 { //2 Hour
$gtx_query="UPDATE system_control";
$gtx_query.=" SET boot_up_if_time=DATE_ADD(NOW(), INTERVAL 870 MINUTE)";
$gtx_query.=" where restaurant_name_id='CRAZZYBITEGKP'";
$gtx_result=mysql_query($gtx_query,$gtx_connection);
 header("Location:index.php?site_shutdown_success=1");
	 }
	 
	 else if($_POST['auto_restart_time']==6)
	 { //6 Hour
$gtx_query="UPDATE system_control";
$gtx_query.=" SET boot_up_if_time=DATE_ADD(NOW(), INTERVAL 1110 MINUTE)";
$gtx_query.=" where restaurant_name_id='CRAZZYBITEGKP'";
$gtx_result=mysql_query($gtx_query,$gtx_connection);
 header("Location:index.php?site_shutdown_success=1");
	 }	 

	 	 else if($_POST['auto_restart_time']==12)
	 { //12 Hour
$gtx_query="UPDATE system_control";
$gtx_query.=" SET boot_up_if_time=DATE_ADD(NOW(), INTERVAL 1470 MINUTE)";
$gtx_query.=" where restaurant_name_id='CRAZZYBITEGKP'";
$gtx_result=mysql_query($gtx_query,$gtx_connection);
 header("Location:index.php?site_shutdown_success=1");
	 }
	 
 else if($_POST['auto_restart_time']==24)
	 { //Next Day
$timestamp = date('Y-m-d H:i:s',strtotime('tomorrow 00:00:00'));
$gtx_query="UPDATE system_control";
$gtx_query.=" SET boot_up_if_time='{$timestamp}'";
$gtx_query.=" where restaurant_name_id='CRAZZYBITEGKP'";
$gtx_result=mysql_query($gtx_query,$gtx_connection);
 header("Location:index.php?site_shutdown_success=1");
	 }
	 
	 
//DATE_ADD(NOW(), INTERVAL 1 DAY)
//		
 }
?>
   
   
   
   
	  
			</body></html>