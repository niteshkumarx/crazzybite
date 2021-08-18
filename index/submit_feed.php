<?php
ob_start();//output buffer
session_start();
ob_start();//output buffer
//require_once("../../of_course/dbcontroller.php");
require("../../of_course/constants_2.php");// -->on server, not-standalone, redirection to same directory
   date_default_timezone_set('Asia/Calcutta'); //Change as per your default time
?>

<?php
$gtx_connection=mysql_connect(DB_SERVER,DB_USER,DB_PASS);
if(!$gtx_connection)
{die(" Database Connection Failed".mysql_error());}
?>

<?php
$gtx_select=mysql_select_db(DB_NAME,$gtx_connection);
if(!$gtx_select)
{	die("Database Selection Failed ".mysql_error());}
?>

<?php
//setting DATE as string in $now variable
//$now=date("Y").date("m").date("d");
//echo $now;
//Setting order numbers
if(isset($_POST['contact_us_submit'])){
 $_POST['contact_us_subject']=ucfirst($_POST['contact_us_subject']);
  $_POST['contact_us_message']=ucfirst($_POST['contact_us_message']);
    $_POST['contact_us_name']=ucwords($_POST['contact_us_name']);
//updating CURRENT RESERVATION DATABASE
$gtx_query="INSERT INTO user_feeds_problems";
$gtx_query.=" (email_id,subject,message,name) ";
$gtx_query.="VALUES('{$_POST['contact_us_email']}','{$_POST['contact_us_subject']}','{$_POST['contact_us_message']}','{$_POST['contact_us_name']}')";

//INSERT PHP this way ^^^

$gtx_result=mysql_query($gtx_query,$gtx_connection);
if(!$gtx_query)
 {	
 die("Database Query Failed ".mysql_error());
 }
// end of updating CURRENT RESERVATION DATABASE
 


mysql_close($gtx_connection);
header("Location:index.php?customer_feedback={$_POST['contact_us_name']}");	
		
}//end of isset case

else{
 mysql_close($gtx_connection);
header("Location:index.php");
}
?>