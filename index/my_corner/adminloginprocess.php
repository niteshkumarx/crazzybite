<?php
ob_start();//output buffer
session_start();

//require_once("dbcontroller.php");
require("../../../of_course/constants_2.php");// -->on server, not-standalone, redirection to same directory
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
 
if(isset($_POST['admin_login_submit'])){
 
$gtx_auth1=md5($_POST['admin_password']);
$gtx_auth2=sha1($gtx_auth1);
$gtx_auth3=md5($gtx_auth2);
$gtx_auth=$gtx_auth3;

 
//Authenticating USER
$gtx_query="SELECT * FROM admin_database";
$gtx_query.=" WHERE admin_id='".$_POST['admin_email']."' AND password='".$gtx_auth."' AND verification='TRUE'";
$gtx_result=mysql_query($gtx_query,$gtx_connection);


if(mysql_num_rows($gtx_result)==0 )
{ mysql_close($gtx_connection);
header("Location: login.php?authentication_error=1");
}
else{

 while($row=mysql_fetch_assoc($gtx_result)) {
	  $_SESSION['admin_id']=$row['admin_id'];
	  $_SESSION['admin_name']=$row['admin_name'];
	  $_SESSION['restaurant_branch']=$row['restaurant_branch'];

	  }
	mysql_close($gtx_connection);
header("Location:../my_corner/");  
	  }
// end of Authenticating USER
 


	
		
}//end of isset case

else{
 mysql_close($gtx_connection);
header("Location:login.php");
}
?>