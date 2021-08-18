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
if(isset($_POST['reservation_submit'])){
 
  $_POST['reservation_host_name']=ucwords($_POST['reservation_host_name']);
  $_POST['reservation_venue']=ucwords($_POST['reservation_venue']);
    $_POST['reservation_party_type']=ucwords($_POST['reservation_party_type']);
   $_POST['reservation_message']=ucfirst($_POST['reservation_message']);
//updating CURRENT RESERVATION DATABASE
$gtx_query="INSERT INTO special_booking";
$gtx_query.=" (name,contact,date_reservation,venue,purpose,message,strength) ";
$gtx_query.="VALUES('{$_POST['reservation_host_name']}','{$_POST['reservation_contact']}','{$_POST['reservation_date']}','{$_POST['reservation_venue']}','{$_POST['reservation_party_type']}',";
$gtx_query.="'{$_POST['reservation_message']}','{$_POST['reservation_strength_select']}')";
//INSERT PHP this way ^^^

$gtx_result=mysql_query($gtx_query,$gtx_connection);
if(!$gtx_query)
 {	
 die("Database Query Failed ".mysql_error());
 }
// end of updating CURRENT RESERVATION DATABASE
 


mysql_close($gtx_connection);
header("Location:index.php?customer_reservation={$_POST['reservation_host_name']}");	
		
}//end of isset case

else{
 mysql_close($gtx_connection);
header("Location:index.php");
}
?>