<?php
require("../../../of_course/constants_2.php"); //-->on server not required here
//require("../includes/constants.php"); //-->on local machine  not required here
session_start();
 date_default_timezone_set('Asia/Calcutta'); //Change as per your default time
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
  xhttp.open("POST", "includes/verify_user.php?val="+nex+"&req=32", true);
  xhttp.send();
}

function loadDocCancel(nex) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("demo").innerHTML = xhttp.responseText;
    }
  }
  xhttp.open("POST", "includes/remove_user.php?val="+nex+"&req=32", true);
  xhttp.send();
}
</script>

</head>
<body>

           	<span style="font-size:40px; color:#058AA8; font-family:Museo;"> Customer Database </span><br><br>
<div id="demo"></div>



 <link href="../style_product.css" type="text/css" rel="stylesheet" />

			<?php 
			
			//require_once('includes/functions.php');
			
$gtx_connection=mysql_connect(DB_SERVER,DB_USER,DB_PASS);
if(!$gtx_connection)
{die(" Database Connection Failed".mysql_error());
}?>

<?php 
$gtx_select=mysql_select_db(DB_NAME,$gtx_connection);
if(!$gtx_select)
{	die("Database Selection Failed ".mysql_error());
}
?>

<?php
echo" <div style=\"color:#ffffff;font-size:14px;border-radius:4px;background:#0DAACE;height:120px;width:100%;padding: 2px 4px 2px 4px;\">
<b>Warning:</b> This database is solely meant for the commercial reference of the users. Any attempt to share, broadcast, spam or misuse the data directly or indirectly 
for personal or commercial use is a punishable offence.
<br><br> 
<b>चेतावनी: </b>यह डेटाबेस पूरी तरह से उपयोगकर्ताओं के वाणिज्यिक संदर्भ के लिए है। इसका किसी भी ढंग से साझा करने, प्रसारण करने, स्पैम करने या व्यक्तिगत अथवा व्यावसायिक उपयोग के लिए दुरुपयोग करने का
सीधे या परोक्ष रूप से प्रयास , एक दंडनीय अपराध है।
</div>";
//require("includes/timedifference.php");

//$now=date("Y").date("m").date("d");
$gtx_query="SELECT * from user_database where block<>'TRUE' ORDER BY RAND()";
//$gtx_query.=" WHERE now='{$now}' and whether_taken='NO'";
$gtx_result=mysql_query($gtx_query,$gtx_connection);

if(mysql_num_rows($gtx_result)==0 )
{ 
echo "<br> You dont have any customer in the database.";
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



//$time = date('g:i A ', $timestamp);//displaying current time using this
//end of messing up with time function
			
			
echo"
			<script> 
$(document).ready(function(){


    $(\"#{$trim3}\").click(function(){
        $(\"#{$trim3}\").hide();

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
			
			<div class=\"its_a_customer\"id=\"{$trim1}\">

			<div class=\"customer_info\" >";
			 if($row['verified_user']=="VERIFIED"){echo"<div class=\"verified\" title=\"This user is verified\" id=\"{$trim2}\"></div>";}//verified icon
			echo"<span style=\"font-size:24px; font-family:Museo \">{$row['fb_name']}| </span> <span style=\"font-size:14px; font-family:Museo \">{$row['contacts']}</span>
			<span style=\"font-size:14px; \"><br/>Address(Delivery): {$row['delivary_address']}, {$row['location']}
			<br/>Email: {$row['email_id']}
			<br/>User ID: {$row['app_scoped_user_id']}
		 </span>";
		 
	
		 echo"<br/>";
	
		 if($row['verified_user']=="UNVERIFIED"||$row['verified_user']=="")
		 {
		 		echo"
				<button type=\"button\" class=\"button\" id=\"{$trim3}\" style=\"background:#99CC33;\" onclick=\"loadDoc('".$row['app_scoped_user_id']."')\">&nbsp;Verify&nbsp; </button>";
				}
				
			else if($row['verified_user']=="VERIFIED"){
			echo"	<button type=\"button\" class=\"button\" id=\"{$trim5}\" style=\"background:#99CC33; width:250px;\" onclick=\"loadDocCancel('".$row['app_scoped_user_id']."')\">&nbsp;Remove verification&nbsp; </button>";
				}
			echo"	<div id=\"{$trim4}\" style=\"display:none;\"><br/><span style=\"color:#ccc; \">You have successfully verified identity of this user.</span></div>
				<div id=\"{$trim6}\" style=\"display:none;\"><br/><span style=\"color:#ccc; \">You have successfully removed verification for this user.</span></div>";
				
		 





 
		echo" </div>
			<div class=\"dp_customer\" style=\"background:url('{$row['picture_url']}');background-size: cover; \"></div>
			
		
		
			</div>
				";
				
				}
			mysql_close($gtx_connection);
				}
					
				
		?>	
		

              
	  
			</body></html>