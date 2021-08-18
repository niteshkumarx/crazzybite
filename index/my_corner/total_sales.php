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




</head>
<body>

           	<span style="font-size:40px; color:#058AA8; font-family:Museo;"> Sales for today | </span><span style="font-size:24px; font-family:Museo;"><?php echo date('j F, Y ');?></span><br><br>
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
$now=date("Y").date("m").date("d");
$gtx_query="SELECT * from cash_counter";
$gtx_query.=" WHERE date='{$now}'";
$gtx_result=mysql_query($gtx_query,$gtx_connection);

if(mysql_num_rows($gtx_result)==0 )
{ 
echo "It seems you haven't made any sales yet, keep smiling :)";
	mysql_close($gtx_connection);
}
else{
 while($row=mysql_fetch_assoc($gtx_result))
{ 
echo"<span style=\"font-size:25px; color:#000; font-family:Museo;\"> Total Sales for today is &#x20B9; <b>".$row['total_sales']."</b></span>

<br/><br/>	<div style=\"color:#ffffff;font-size:14px;border-radius:4px;background:#0DAACE;height:20px;width:100%;padding-top:1px;padding-left:3px;\">Sales Summary</div>			
<br><table cellpadding=\"10\" class=\"shopping-cart-visibility-width-admin\" cellspacing=\"1\">
<tbody><span >
<tr>
<th style=\"font-size:.8em;\"><strong>Customer's Name</strong></th>
<th style=\"font-size:.8em;\"><strong>Order Number</strong></th>
<th style=\"font-size:.8em;\"><strong>Total</strong></th></tr>";

// query to extract the order details using order_number 			 
$cart_query="SELECT * from order_total";
$cart_query.=" WHERE order_number IN (SELECT order_number from current_orders where date='{$now}')";
$cart_result=mysql_query($cart_query,$gtx_connection);
	
	while($cart_row=mysql_fetch_assoc($cart_result))
	{
	
	echo"
<tr>
<td style=\"font-size:.8em;\">{$cart_row['fb_name']}</td>
<td style=\"font-size:.8em;\">{$cart_row['order_number']}</td>
<td style=\"font-size:.8em;\">&#x20B9;{$cart_row['total']}</td>
</tr>";}

		echo"</span></tbody></table>";


}
			mysql_close($gtx_connection);
				}
					
				
		?>	
		

              
	  
			</body></html>