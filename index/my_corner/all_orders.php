<?php
ob_start();
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

<script src="../js/jquery.min.js"></script>

  <link rel="stylesheet" type="text/css" href="../css/login.css" />
<style>
</style>


<script>


function loadDoc(nex) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("demo").innerHTML = xhttp.responseText;
    }
  }
  xhttp.open("POST", "includes/take_order.php?val="+nex+"&req=32", true);
  xhttp.send();
}

function loadDocCancel(nex) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("demo").innerHTML = xhttp.responseText;
    }
  }
  xhttp.open("POST", "includes/cancel_order.php?val="+nex+"&req=32", true);
  xhttp.send();
}
</script>

</head>
<body>

           	<span style="font-size:40px; color:#058AA8; font-family:Museo;"> All Orders | </span><span style="font-size:24px; font-family:Museo;"><?php echo date('j F, Y ');?></span><br><br>
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
$gtx_query="SELECT * from order_total";
$gtx_query.=" WHERE now='{$now}'";
$gtx_result=mysql_query($gtx_query,$gtx_connection);

if(mysql_num_rows($gtx_result)==0 )
{ 
echo "There are no orders for now.";
	mysql_close($gtx_connection);
}
else{
 while($row=mysql_fetch_assoc($gtx_result))
{ 
//embedded query to get the display picture of the customer
$dp_query="SELECT picture_url from user_database";
$dp_query.=" WHERE app_scoped_user_id='{$row['app_scoped_user_id']}'";
$dp_result=mysql_query($dp_query,$gtx_connection);
 while($dp_row=mysql_fetch_assoc($dp_result))
 {$dp=$dp_row['picture_url'];}
//end of embedded query to get the display picture of the customer
 
$trim1=rand(100000,999999);
$trim2=rand(100000,999999);
$trim3=rand(100000,999999);
$trim4=rand(100000,999999);
$trim5=rand(100000,999999);
$trim6=rand(100000,999999);

//messing up with time function
$timestamp = strtotime($row['timestamp']);
//Well this remote server is storing time-stamp which is 12 Hr 30 minutes late thus we're adding 750 minutes to get correct timing
         
$timestamp = strtotime("+750 minutes", strtotime($row['timestamp']));

//Well this remote server is storing time-stamp which is 12 Hr 30 minutes late thus we're adding 750 minutes to get correct timing
$diff=get_time_difference_php($row['timestamp']);

$time = date('g:i A ', $timestamp);//displaying current time using this
//end of messing up with time function
//setting order status
if($row['whether_taken']=='YES')
{$status="DELIVERED";
}
else if($row['whether_taken']=='NO')
{$status="ON QUEUE";
}
else if($row['whether_taken']=='CANCELLED')
{$status="CANCELLED";
}
else{$status="UNKNOWN";
}
//end of setting order status			
			
echo"
			<script> 
$(document).ready(function(){
/*
    $(\"#{$trim1}\").mouseenter(function(){
        $(\"#{$trim2}\").show();
	
});
    $(\"#{$trim1}\").mouseleave(function(){
        $(\"#{$trim2}\").hide();
	
});
*/

    $(\"#{$trim3}\").click(function(){
        $(\"#{$trim3}\").hide();
		 $(\"#{$trim5}\").hide();
		  $(\"#{$trim6}\").hide();
	
});
    $(\"#{$trim3}\").click(function(){
        $(\"#{$trim4}\").show();
	
});

     
   
	    $(\"#{$trim5}\").click(function(){
        $(\"#{$trim5}\").hide();
		 $(\"#{$trim3}\").hide();
		 $(\"#{$trim4}\").hide();
	
});
    $(\"#{$trim5}\").click(function(){
        $(\"#{$trim6}\").show();
	
});

     
    });
	
 </script> 
			
			<div class=\"its_a_learner\"id=\"{$trim1}\">

			<div class=\"learner_info\">
			<div class=\"learner_more_info\" id=\"{$trim2}\"><b>{$row['fb_name']}</b><br/>&#9743; {$row['contacts']}<p style=\"font-size:.8em;\"><br/>{$row['delivery_address']}<br/>{$row['location']}</p></div>
			
											
								";//customer verification QUERY STARTS
			$v_query="SELECT verified_user from user_database";
			$v_query.=" WHERE app_scoped_user_id='{$row['app_scoped_user_id']}'";
			$v_result=mysql_query($v_query,$gtx_connection);
			while($v_row=mysql_fetch_assoc($v_result))
			{$v=$v_row['verified_user'];}
			
			if($v=="VERIFIED"){echo"<div class=\"verified\" title=\"This user is verified\" id=\"{$trim2}\"></div>";}//verified icon //customer verification QUERY ENDS
			
			echo"
			<span style=\"font-size:24px; font-family:Museo \">{$time}| </span> <span style=\"font-size:14px; font-family:Museo \">{$diff}</span>
			<br/>Total(Cash on Delivery): &#x20B9;{$row['total']}
			<br/><span style=\"font-size:12px; color:#535454;\">Order Number: {$row['order_number']}
		 </span>";
		 
	
		 
	
		 
		 		echo"	
				<!--<button type=\"button\" class=\"button\" id=\"{$trim3}\" style=\"background:#99CC33;\" onclick=\"loadDoc('".$row['order_number']."')\">&nbsp;Take&nbsp; </button>
				<button type=\"button\" class=\"button\" id=\"{$trim5}\" style=\"background:#99CC33;\" onclick=\"loadDocCancel('".$row['order_number']."')\">&nbsp;Cancel&nbsp; </button>
				<div id=\"{$trim4}\" style=\"display:none;\"><br/><span style=\"color:#ccc; \">You have successfully taken the order</span></div>
				<div id=\"{$trim6}\" style=\"display:none;\"><br/><span style=\"color:#ccc; \">The order got cancelled</span></div>-->
				<div><span style=\"color:#ccc; \">Status: {$status}</span></div>
				
<!-- Table to display customers cart/orders -->		 
<br/><br/><br/>	<div style=\"color:#ffffff;font-size:14px;border-radius:4px;background:#0DAACE;height:20px;width:100%;padding-top:1px;padding-left:3px;\">Customer's Cart</div>			
<table cellpadding=\"10\" class=\"shopping-cart-visibility-width-admin\" cellspacing=\"1\">
<tbody><span >
<tr>
<th style=\"font-size:.8em;\"><strong>Name</strong></th>
<th style=\"font-size:.8em;\"><strong>Code</strong></th>
<th style=\"font-size:.8em;\"><strong>Quantity</strong></th>
<th style=\"font-size:.8em;\"><strong>Pricing</strong></th></tr>";

// query to extract the order details using order_number 			 
$cart_query="SELECT * from current_orders";
$cart_query.=" WHERE order_number='{$row['order_number']}'";
$cart_result=mysql_query($cart_query,$gtx_connection);	
	while($cart_row=mysql_fetch_assoc($cart_result))
	{
	
	echo"
<tr>
<td style=\"font-size:.8em;\">{$cart_row['product_name']}</td>
<td style=\"font-size:.8em;\">{$cart_row['product_id']}</td>
<td style=\"font-size:.8em;\">{$cart_row['product_quantity']}</td>
<td style=\"font-size:.8em;\">&#x20B9;{$cart_row['product_pricing']}</td>
</tr>";}

		echo"</span></tbody></table>";

// end of Table to display customers cart/orders 





 
		echo" </div>
			<div class=\"dp_learner_search\" style=\"background:url('{$dp}');background-size: cover; \"></div>
			
		
		
			</div>
				";
				
				}
			mysql_close($gtx_connection);
				}
					
				
		?>	
		

              
	  
			</body></html>