<?php
ob_start();
require("../../../of_course/constants_2.php"); //-->on server not required here

session_start();

//security divert

if(!isset($_GET['yes_its_in_index'])||!isset($_SESSION['admin_id'])||!isset($_SESSION['admin_name'])||!isset($_SESSION['restaurant_branch']))
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
  xhttp.open("POST", "includes/take_order_reservation.php?val="+nex+"&req=32", true);
  xhttp.send();
}


</script>

</head>
<body>

           	<span style="font-size:40px; color:#058AA8; font-family:Museo;"> Special Orders </span><br>
			
				 <br><br>
<div id="demo"></div>



 <link href="../style_product.css" type="text/css" rel="stylesheet" />

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
require("includes/timedifference.php");
        date_default_timezone_set('Asia/Calcutta'); //Change as per your default time


$gtx_query="SELECT * from special_booking";
$gtx_query.=" WHERE date> DATE_SUB(NOW(), INTERVAL 1 MONTH)";
$gtx_result=mysql_query($gtx_query,$gtx_connection);

if(mysql_num_rows($gtx_result)==0 )
{ 
echo "There are no special orders for past one month.";
	mysql_close($gtx_connection);
}
else{
 while($row=mysql_fetch_assoc($gtx_result))
{ 

 
$trim1=rand(100000,999999);
$trim2=rand(100000,999999);
$trim3=rand(100000,999999);
$trim4=rand(100000,999999);
$trim5=rand(100000,999999);
$trim6=rand(100000,999999);

//messing up with time function

$diff=get_time_difference_php($row['date']);

//Well this remote server is storing time-stamp which is 12 Hr 30 minutes late thus we're adding 750 minutes to get correct timing
         
$timestamp = strtotime("+750 minutes", strtotime($row['date']));

//Well this remote server is storing time-stamp which is 12 Hr 30 minutes late thus we're adding 750 minutes to get correct timing

$time = date('d M g:i A ', $timestamp);//displaying current time using this
//end of messing up with time function
//setting order status
if($row['status']=='YES')
{$status="ATTENDED";
}

else{$status="ON QUEUE";
}
//end of setting order status			
$date_res=date('d M, Y', strtotime($row['date_reservation']));			
echo"
			<script> 
$(document).ready(function(){


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
			<div class=\"learner_more_info2\" id=\"{$trim2}\"><b>{$row['name']}</b><br/>&#9743; {$row['contact']}<p style=\"font-size:.8em;\"><br/>For {$row['purpose']}<br/>At {$row['venue']}</p></div>
			<span style=\"font-size:24px; font-family:Museo \">{$time}| </span> <span style=\"font-size:14px; font-family:Museo \">{$diff}</span>
			<br/><br/><b>Message:</b> <span style=\"font-size:16px; font-family:Museo \">{$row['message']}</span>
			<br/><br/><b>Reservation Date: </b>{$date_res}
			<br/><span style=\"font-size:16px;\"><b>Number of guests:</b> {$row['strength']}
		 </span>";
		 
	
		 
	
		 
		 		echo"		<div><span style=\"color:#cccccc; \">Status: {$status}</span></div>
				<br>"; 
				if(!$row['status']=="YES"){
				echo"<button type=\"button\" class=\"button\" id=\"{$trim3}\" style=\"background:#99CC33;\" onclick=\"loadDoc('".$row['serial']."')\">&nbsp;Attend&nbsp; </button>";
				}
			echo"	<div id=\"{$trim4}\" style=\"display:none;\"><br/><span style=\"color:#ccc; \">You have successfully taken the order</span></div>";

		echo" </div>
			<div class=\"dp_learner_search\" style=\"background:url('../assets/img/dome.png');background-size: cover; border:none; \"></div>
			
		
		
			</div>
				";
				
				}
			mysql_close($gtx_connection);
				}
					
				
		?>	
		

              
	  
			</body></html>