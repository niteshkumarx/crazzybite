<?php
ob_start();
date_default_timezone_set('Asia/Kolkata'); //Change as per your default time
require("../../../of_course/constants_2.php");// -->on server
//require("../includes/constants.php"); //-->on local machine
session_start();
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

if(isset($_POST['submit'])){

$email=$_SESSION['email'];
$feed_name=$_POST['feed_name'];
$rating=$_POST['rating'];
$worst=$_POST['worst'];
$best=$_POST['best'];
$comment=$_POST['comment'];
$name=$_SESSION['learner_name'];


$gtx_query="INSERT INTO report_application_fault";
$gtx_query.=" (feed_title,admin_name,admin_id,restaurant_branch,best,worst,rating,comments) ";
$gtx_query.="VALUES('{$feed_name}','{$_SESSION['admin_name']}','{$_SESSION['admin_id']}','{$_SESSION['restaurant_branch']}','{$best}','{$worst}','{$rating}','{$comment}')";
//INSERT PHP this way ^^

$gtx_result=mysql_query($gtx_query,$gtx_connection);
if(!$gtx_query)
 {	
 die("Database Query Failed ".mysql_error());
 }
 
 mysql_close($gtx_connection);
header("Location: index.php?success_feedback_admin=1");


}
else{
		 mysql_close($gtx_connection);
header("Location: login.php");}

?>