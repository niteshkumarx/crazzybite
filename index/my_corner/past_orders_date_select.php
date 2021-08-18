<?php
require("../../../of_course/constants_2.php"); //-->on server not required here
//require("../includes/constants.php"); //-->on local machine  not required here
session_start();
        date_default_timezone_set('Asia/Calcutta'); //Change as per your default time
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

           	<span style="font-size:40px; color:#058AA8; font-family:Museo;"> Past Orders  </span><br><br>
<div id="demo"></div>



 <link href="../style_product.css" type="text/css" rel="stylesheet" />

			<?php 
			
			//require_once('includes/functions.php');
			
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

$now=date("Y").date("m").date("d");





			mysql_close($gtx_connection);
	
					
				
		?>	<form action="index.php?past_orders=1" method="post">
		<label >Please select the date<br><br>
                    </label>

  <input type="date" title="You need to select a date before you can proceed" style="height:30px; width:250px; font-size:20px; border:1px solid #009966; border-radius:4px; color:#000; background:#fff;" name="select_date" required min="<?php echo date("Y-m-d", strtotime("-1 month")); ?>" max="<?php echo date("Y-m-d", strtotime("-1 day")); ?>">
<br/><input class="button" type="submit" value="View Orders" name="view_orders">
</form>
              
	  
			</body></html>