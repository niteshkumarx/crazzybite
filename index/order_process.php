<?php
ob_start();//output buffer
session_start();
//require_once("../../of_course/dbcontroller.php");
require("../../of_course/constants_2.php");// -->on server, not-standalone, redirection to same directory
date_default_timezone_set("Asia/Kolkata"); //Change as per your default time
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
 date_default_timezone_set('Asia/Calcutta'); //Change as per your default time
//setting DATE as string in $now variable
$now=date("Y").date("m").date("d");
//echo $now;
//Setting order numbers
if(isset($_POST['submit_order'])&&isset($_SESSION["cart_item"])&&isset($_SESSION["id_facebook"])){

$gtx_query="SELECT * from current_orders";
$gtx_query.=" WHERE date='".$now."' ORDER BY time_of_order DESC LIMIT 1";
$gtx_result=mysql_query($gtx_query, $gtx_connection);


if(mysql_num_rows($gtx_result)==0)
{$order_token=1;
$order_token= str_pad($order_token, 4, '0', STR_PAD_LEFT);
}
 
else{

 while($row=mysql_fetch_assoc($gtx_result)) {
	/*$_SESSION['_name']=$row['gtx_name']; */
		$order_token=$row['order_token']+1;
		$order_token= str_pad($order_token, 4, '0', STR_PAD_LEFT);
	  }}
	  
	  //echo "<br/>".$order_token;

$order_number=$now.$order_token;
//end of Setting order numbers
//echo "<br/> The order number ".$order_number; 

//modifying quantity starts
foreach($_SESSION["cart_item"] as $k=>$v) {
//if($productByCode[0]["code"] == $k)
echo "<br/><br/>".$_SESSION["cart_item"][$k]["name"];
echo "    ".$_SESSION["cart_item"][$k]["code"];
$quant_modifier=$_SESSION["cart_item"][$k]["quantity"];


if($_SESSION["cart_item"][$k]["available_half"]=='YES'){
	 if($quant_modifier>0 && $quant_modifier<=0.5){$quant_modifier="HALF";}
				 else if($quant_modifier>0.5 && $quant_modifier<=1){$quant_modifier=1;}
				 else if($quant_modifier>1){$quant_modifier = floor($quant_modifier);}
				 else{$quant_modifier=1;}}
				 
				 
else if($_SESSION["cart_item"][$k]["available_half"]=='NO'){
if($quant_modifier>0.5 && $quant_modifier<=1){$quant_modifier=1;}
				 else if($quant_modifier>1){$quant_modifier = floor($quant_modifier);}
				 else{$quant_modifier=1;}}

//modifying quantity ends

//$quant_modifier holds the actual detail of quantity
//echo "   ".$quant_modifier;
// echo "    ".$_SESSION["cart_item"][$k]["price"];
 // echo "    Available Half?".$_SESSION["cart_item"][$k]["available_half"];
 
 
//updating CURRENT ORDERS DATABASE
$gtx_query="INSERT INTO current_orders";
$gtx_query.=" (date,order_token,order_number,product_id,product_pricing,product_name,product_quantity,app_scoped_user_id) ";
$gtx_query.="VALUES('{$now}','{$order_token}','{$order_number}','{$_SESSION["cart_item"][$k]["code"]}','{$_SESSION["cart_item"][$k]["price"]}',";
$gtx_query.="'{$_SESSION["cart_item"][$k]["name"]}','{$quant_modifier}','{$_SESSION['id_facebook']}')";
//INSERT PHP this way ^^^

$gtx_result=mysql_query($gtx_query,$gtx_connection);
if(!$gtx_query)
 {	
 die("Database Query Failed ".mysql_error());
 }
// end of updating CURRENT ORDERS DATABASE
 
//updating SELLING FREQUENCY 
$gtx_query="SELECT selling_frequency from product_list";
$gtx_query.=" WHERE code='".$_SESSION["cart_item"][$k]["code"]."'";
$gtx_result=mysql_query($gtx_query, $gtx_connection);

while($row=mysql_fetch_assoc($gtx_result)) {
	 $selling_frequency=$row['selling_frequency']+1;
	 }
	 
$gtx_query="UPDATE product_list";
$gtx_query.=" SET selling_frequency='".$selling_frequency."' ";
$gtx_query.="WHERE code='".$_SESSION["cart_item"][$k]["code"]."'";


$gtx_result=mysql_query($gtx_query,$gtx_connection);
if(!$gtx_query)
 {	
 die("Database Query Failed ".mysql_error());
 }
//end of updating SELLING FREQUENCY 


 }//ORDER loop ends here
		
//updating CURRENT ORDERS TOTAL, BASIC DATABASE TO MANAGE ORDERS
$complete_address=$_POST['address_line1']." ".$_POST['address_line2'];
$complete_address=ucwords($complete_address);
$gtx_query="INSERT INTO order_total";
$gtx_query.=" (order_number,total,app_scoped_user_id,fb_name,contacts,delivery_address,location,now,whether_taken) ";
$gtx_query.="VALUES('{$order_number}','{$_SESSION["total_bill"]}','{$_SESSION['id_facebook']}','{$_SESSION['name']}','{$_POST['phone']}',";
$gtx_query.="'{$complete_address}','{$_POST['delivary_location']}','{$now}','NO')";
//INSERT PHP this way ^^^

$gtx_result=mysql_query($gtx_query,$gtx_connection);
if(!$gtx_query)
 {	
 die("Database Query Failed ".mysql_error());
 }
// end of updating CURRENT ORDERS TOTAL, BASIC DATABASE TO MANAGE ORDERS

 
 
//updating USERS DATABASE, and buying frequency
//lets look for buying_frequency first

$gtx_query="SELECT * from user_database";
$gtx_query.=" WHERE app_scoped_user_id='".$_SESSION['id_facebook']."'";
$gtx_result=mysql_query($gtx_query, $gtx_connection);

if(mysql_num_rows($gtx_result)==0)
{$buying_frequency=1;
$dp="https://graph.facebook.com/".$_SESSION['id_facebook']."/picture?width=400&height=400";
$gtx_query="INSERT INTO user_database";
$gtx_query.=" (fb_name,app_scoped_user_id,contacts,delivary_address,location,email_id,sex,picture_url,buying_frequency) ";
$gtx_query.="VALUES('{$_SESSION['name']}','{$_SESSION['id_facebook']}','{$_POST['phone']}','{$complete_address}','{$_POST['delivary_location']}',";
$gtx_query.="'{$_SESSION['email']}','{$_SESSION['gender']}','{$dp}','{$buying_frequency}')";
//INSERT PHP this way ^^^

$gtx_result=mysql_query($gtx_query,$gtx_connection);
if(!$gtx_query)
 {	
 die("Database Query Failed ".mysql_error());
 }

}//if closes here
else{
//updating USERS DATABASE
while($row=mysql_fetch_assoc($gtx_result)) {
	 $buying_frequency=$row['buying_frequency']+1;
	 }
$gtx_query="UPDATE user_database";
$gtx_query.=" SET buying_frequency='".$buying_frequency."' ";
$gtx_query.="WHERE app_scoped_user_id='".$_SESSION['id_facebook']."'";

//INSERT PHP this way ^^^

$gtx_result=mysql_query($gtx_query,$gtx_connection);
if(!$gtx_query)
 {	
 die("Database Query Failed ".mysql_error());
 }
	 
	 
}//else closes here
//end of updating USERS DATABASE, and buying frequency

//updating CASH COUNTERS, using date as a string format of yyyymmdd
//we'll convert the date at the admin query panel
$gtx_query2="SELECT * from cash_counter";
$gtx_query2.=" WHERE date='".$now."'";
$gtx_result=mysql_query($gtx_query2, $gtx_connection);

if(mysql_num_rows($gtx_result)==0)
{
$gtx_query2="INSERT INTO cash_counter";
$gtx_query2.=" (date,total_sales) ";
$gtx_query2.="VALUES('{$now}','{$_SESSION['total_bill']}')";

//INSERT PHP this way ^^^

$gtx_result=mysql_query($gtx_query2,$gtx_connection);
if(!$gtx_query2)
 {	
 die("Database Query Failed ".mysql_error());
 }

}//if closes here
else{

while($row=mysql_fetch_assoc($gtx_result)) {
	 $total_sales=$row['total_sales'] + $_SESSION['total_bill'];
	 }
$gtx_query2="UPDATE cash_counter";
$gtx_query2.=" SET total_sales='".$total_sales."' ";
$gtx_query2.="WHERE date='".$now."'";

//INSERT PHP this way ^^^

$gtx_result=mysql_query($gtx_query2,$gtx_connection);
if(!$gtx_query2)
 {	
 die("Database Query Failed ".mysql_error());
 }
	 
	 
}//else closes here
//end of updating CASH COUNTERS

//Printing Visual Cart Table for confirmation E mail

$cart_table='';
$cart_query="SELECT * from current_orders";
$cart_query.=" WHERE order_number='{$order_number}'";
$cart_result=mysql_query($cart_query,$gtx_connection);	
	while($cart_row=mysql_fetch_assoc($cart_result))
	{
$visual_table='<tr>
<td style="font-size:1em;height:16px;  font-family:Century Gothic;">'.$cart_row['product_name'].'</td>
<td style="font-size:1em;height:16px;  font-family:Century Gothic;">'.$cart_row['product_id'].'</td>
<td style="font-size:1em;height:16px;  font-family:Century Gothic;">'.$cart_row['product_quantity'].'</td>
<td style="font-size:1em;height:16px;  font-family:Century Gothic;">&#x20B9;'.$cart_row['product_pricing'].'</td>
</tr>';


$cart_table=$cart_table.$visual_table;}

$visual_date=date('j F, Y ');
$visual_time=date('g:i A ');

//End of Printing Visual Cart Table for confirmation E mail

mysql_close($gtx_connection);





//STARTING ACKNOWLEDGEMENT MAIL

require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'sg2plcpnl0038.prod.sin2.secureserver.net';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'customercare@crazzybite.com';                 // SMTP username
$mail->Password = MAILER_AUTH;                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('customercare@crazzybite.com', 'Crazzy Bite');
$mail->addAddress($_SESSION['email'],$_SESSION['name']);     // Add a recipient


$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Order Confirmation';
 $mail->AddEmbeddedImage(" ", "my-attach", " ");
$mail->Body    = '
<div style="background : #000000;
  background : rgba(0, 0, 0, .7);
    border-radius:10px 10px 0px 0px;
  position : absolute ;
  left : 11px;
    padding:10px 10px 10px 10px;
	  font-family:Century Gothic;
  text-align:right;
  color:#fff;
  font-size:1.1em;
  top : 13px;
  width : 706px;
  height : 126px;" ><a href="http://www.crazzybite.com" target="_blank"><img src="http://www.crazzybite.com/assets/img/logo_small.png" height="80px"></a><br><br>Order your hot and spicy meals online</div>
  
<div style="  background : #D60015;
  background : rgba(214, 0, 21, 1);
  position : absolute ;
    padding:10px 10px 10px 10px;
	  font-family:Century Gothic;
	  color:#fff;
  left : 11px;
  top : 138px;
  width : 706px;
  height : 60px;"><span style="font-size:2em;">Hi '.$_SESSION['name'].'</span><br>We have successfully received your order :)</div>
  
  
<div style="background : #FFFFFF;
  background : rgba(255, 255, 255, 1);
  position : absolute ;    padding:10px 10px 10px 10px;
  text-align:justify;
    font-family:Century Gothic;
  left : 11px;
  top : 218px;
  width : 706px;
  height : 150px;">Your delicious meal is on its way.
<br><br>
<b>Order Details</b><br/>

Order Number:&nbsp;'.$order_number.'  
<br/>Date:&nbsp;'.$visual_date.' | '.$visual_time.'
<br/>Order Total:&nbsp;&#x20B9;'.$_SESSION["total_bill"].'
<br><br>Cash to be paid on delivery.
</div>
<div style="color:#ffffff;font-size:14px;border-radius:4px;background:#D60015;  font-family:Century Gothic;height:20px;width:720px;padding-top:1px;padding-left:3px;">Your Cart</div>			
<table cellpadding="2" style="width:500px;" cellspacing="1">
<tbody><span >
<tr>
<td style="font-size:1.2em;  font-family:Century Gothic;"><strong>Item</strong></td>
<td style="font-size:1.2em;  font-family:Century Gothic;"><strong>Code</strong></td>
<td style="font-size:1.2em;  font-family:Century Gothic;"><strong>Quantity</strong></td>
<td style="font-size:1.2em;  font-family:Century Gothic;"><strong>Pricing</strong></td></tr>'.$cart_table.'
</span></tbody></table>





<br/><div style=" background : #00B050;
  background : rgba(0, 176, 80, 1);
  position : absolute ;
  text-align:center;
  left : 17px;
  color:#ffffff;
  top : 900px;
  font-family:Century Gothic;
  width : 192px;
  padding-top:10px;
  height : 29px;
  border-radius : 4px;
  -moz-border-radius : 4px;
  -webkit-border-radius : 4px;"><a href="http://www.crazzybite.com" style="text-decoration:none;color:#ffffff;" >Make another order</a></div>


<div style="
  position : absolute ;
  text-align:center;
  left : 219px;
top : 900px;
  font-family:Century Gothic;
  width : 192px;
  padding-top:10px;
  height : 29px;
"><br/>Like us on Facebook &nbsp;<a title="Like us on facebook" target="_blank" href="http://www.facebook.com/crazzybite"><img src="http://www.crazzybite.com/assets/img/fb_small.png"></a></div>';

$mail->AltBody = 'Make another order from Crazzy Bite';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Verification mail sent';
}


//ENDING ACKNOWLEDGEMENT MAIL





header("Location:successful_order.php?order_ref={$order_number}&&customer={$_SESSION['name']}&&billing={$_SESSION['total_bill']}");	
		
}//end of isset case

else{
 mysql_close($gtx_connection);
header("Location:index.php?error=144;");
}
?>