<?php
require("../../../of_course/constants_2.php"); //-->on server not required here
//require("../includes/constants.php"); //-->on local machine  not required here
session_start();

//security divert
$_SESSION['yes_its_index']==22;
if(!($_SESSION['yes_its_index']==21)||!isset($_GET['yes_its_in_index'])||!isset($_SESSION['admin_id'])||!isset($_SESSION['admin_name'])||!isset($_SESSION['restaurant_branch']))
{
header("Location:../");}
//security divert
?>
<!DOCTYPE html>
<html>
<head>
<style>
table#t01 tr:nth-child(even) {
    background-color: #eee;
}
table#t01 tr:nth-child(odd) {
   background-color:#fff;
}

</style>
</head>
<body>

           	<span style="font-size:40px; color:#058AA8; font-family:Museo;"> Cash Counters | </span><span style="font-size:24px; font-family:Museo;">Past Month</span><br><br>
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
require("includes/timedifference.php");
        date_default_timezone_set('Asia/Calcutta'); //Change as per your default time
$total_sales_past_month=0;
$avg_sales_per_day=0;
$gtx_query="SELECT * from cash_counter";
$gtx_query.=" WHERE date>DATE_SUB(NOW(), INTERVAL 1 MONTH)";
$gtx_result=mysql_query($gtx_query,$gtx_connection);

echo "	<div style=\"color:#ffffff;font-size:14px;border-radius:4px;background:#0DAACE;height:20px;width:100%;padding-top:1px;padding-left:3px;\">Sales Summary</div>";
echo"

			
<br><table cellpadding=\"10\" class=\"shopping-cart-visibility-width-admin\" id=\"t01\" cellspacing=\"1\">
<tbody><span >
<tr>
<th style=\"font-size:1em;\"><strong>Date</strong></th>
<th style=\"font-size:1em;\"><strong>Number of orders</strong></th>
<th style=\"font-size:1em;\"><strong>Total Sales</strong></th></tr>";

if(mysql_num_rows($gtx_result)==0 )
{ 
echo "It seems you haven't made any sales past month, keep smiling :)";
$avg_sales_per_day=1;
	mysql_close($gtx_connection);
}

else{
 while($row=mysql_fetch_assoc($gtx_result))
{ 


// query to extract the order details using order_number 			 
$cart_query="SELECT * from order_total";
$cart_query.=" WHERE now='{$row['date']}'";
$cart_result=mysql_query($cart_query,$gtx_connection);
	$cart_row_nums=0;
 while($row2=mysql_fetch_assoc($cart_result)){
	 	$cart_row_nums=$cart_row_nums+1;
 }
$sales_date=date('j F, Y ', strtotime($row['date']));
	echo"
<tr>
<td style=\"font-size:.8em;\">{$sales_date}</td>
<td style=\"font-size:.8em;\">{$cart_row_nums}</td>
<td style=\"font-size:.8em;\">&#x20B9;{$row['total_sales']}</td>
</tr>
			
";
		
$avg_sales_per_day=$avg_sales_per_day+1;
$total_sales_past_month=$total_sales_past_month+$row['total_sales'];
}

echo"</span></tbody></table>";

			mysql_close($gtx_connection);
				}
				echo"<br><span style=\"font-size:25px; color:#000; font-family:Museo;\"> Total Sales for past month is &#x20B9; <b>".$total_sales_past_month."</b></span>";
				
				echo"<br><span style=\"font-size:25px; color:#000; font-family:Museo;\"> Average Sale per day currently is &#x20B9; <b>".floor($total_sales_past_month/$avg_sales_per_day)."</b></span>";
					
				
		?>	
		

              
	  
			</body></html>