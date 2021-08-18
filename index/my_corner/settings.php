<?php
ob_start();
session_start();
//security divert
      date_default_timezone_set('Asia/Calcutta'); //Change as per your default time
require("../../../of_course/constants_2.php");// -->on server

if(!isset($_GET['yes_its_in_index'])||!isset($_SESSION['admin_id'])||!isset($_SESSION['admin_name'])||!isset($_SESSION['restaurant_branch']))
{
header("Location:../");}
//security divert


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
<!DOCTYPE html>
<html>
<head>
 
 
 
 
<script src="../js/jquery.min.js"></script>
<script>

function loadDoc(nex) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("demo").innerHTML = xhttp.responseText;
    }
  }
  xhttp.open("POST", "includes/unblock_site.php?val="+nex+"&req=32", true);
  xhttp.send();
}

</script>

  <link rel="stylesheet" type="text/css" href="../css/form.css" />

 
	
<style>
label{font-size:14px;}
form.register input[type=text]{background:#ffffff; color:#000000;font-size:14px; height:22px; width:230px;}
 form.register select{background:#ffffff; font-size:14px;color:#000000; height:22px; width:230px;}
  form.register input[type=date]{background:#ffffff; font-size:14px;color:#000000; height:22px; width:230px;  
    border: 1px solid #E1E1E1; border-radius:4px;}
	.upload{opacity:1;
		color:#000;
		font-size:20px;
		border-radius:4px;
		
		font-family:museo;
		height:30px;width:300px;
		padding-top:3px;padding-left:5px;
		text-align:left;
		cursor:pointer;
		}
	.upload:hover{opacity:.8;background:#0DAACE;
			color:#ffffff;
	}
	.setting{
	padding: 0px 5px 5px 5px;
	display:none;
	border:1px solid #27AAE1;
	position:relative;
	margin-top:5px;
	margin-bottom:5px;
	width:100%;
	color:#fff;
	height:200px;
 background : linear-gradient(180deg, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 1) 88.17%, rgba(253, 254, 255, 1) 91.71%, rgba(245, 251, 254, 1) 93.41%, rgba(232, 246, 252, 1) 94.72%, rgba(214, 239, 249, 1) 95.82%, rgba(190, 229, 246, 1) 96.81%, rgba(160, 218, 242, 1) 97.7%, rgba(125, 204, 237, 1) 98.52%, rgba(85, 188, 231, 1) 99.28%, rgba(40, 171, 225, 1) 99.98%, rgba(39, 170, 225, 1) 100%);border-radius:4px;
	}
	
	
.admin_caption{color:#fff;
  background : rgba(0, 0, 0, .3);
display:inline;float:left;
   overflow: auto;
margin-left:5px;
padding: 5px 5px 5px 5px;
background-size: cover;    background-repeat: no-repeat;
  left : 0px;
  top : 0px;
  width : 90px;
min-height : 90px;
  border-radius : 4px;
  -moz-border-radius : 4px;
  -webkit-border-radius : 4px
	}
</style>

<script src="../js/jquery.min.js"></script>
<script> 

$(document).ready(function(){ 
$("#s1").click(function(){
        $("#sb1").slideToggle("fast");
	     $("#sb2").slideUp("fast");$("#sb3").slideUp("fast");
		 $("#sb4").slideUp("fast");$("#sb5").slideUp("fast");
		 $("#sb6").slideUp("fast");$("#sb7").slideUp("fast");
    });
$("#s2").click(function(){
        $("#sb2").slideToggle("fast");
	    $("#sb1").slideUp("fast");$("#sb3").slideUp("fast");
		 $("#sb4").slideUp("fast");$("#sb5").slideUp("fast");
		 $("#sb6").slideUp("fast");$("#sb7").slideUp("fast");
});
$("#s3").click(function(){
        $("#sb3").slideToggle("fast");
		    $("#sb2").slideUp("fast");$("#sb1").slideUp("fast");
		 $("#sb4").slideUp("fast");$("#sb5").slideUp("fast");
		 $("#sb6").slideUp("fast");$("#sb7").slideUp("fast");
	
});$("#s4").click(function(){
        $("#sb4").slideToggle("fast");
	    $("#sb2").slideUp("fast");$("#sb3").slideUp("fast");
		 $("#sb1").slideUp("fast");$("#sb5").slideUp("fast");
		 $("#sb6").slideUp("fast");$("#sb7").slideUp("fast");
});
$("#s5").click(function(){
        $("#sb5").slideToggle("fast");
	    $("#sb2").slideUp("fast");$("#sb3").slideUp("fast");
		 $("#sb4").slideUp("fast");$("#sb1").slideUp("fast");
		 $("#sb6").slideUp("fast");$("#sb7").slideUp("fast");
});
$("#s6").click(function(){
        $("#sb6").slideToggle("fast");
	    $("#sb2").slideUp("fast");$("#sb3").slideUp("fast");
		 $("#sb4").slideUp("fast");$("#sb5").slideUp("fast");
		 $("#sb1").slideUp("fast");$("#sb7").slideUp("fast");
 });
 
 $("#s7").click(function(){
        $("#sb7").slideToggle("fast");
	    $("#sb2").slideUp("fast");$("#sb3").slideUp("fast");
		 $("#sb4").slideUp("fast");$("#sb5").slideUp("fast");
		 $("#sb1").slideUp("fast");$("#sb6").slideUp("fast");
 });
 

	    $("#trim3").click(function(){
        $("#trim3").hide();	
});
    $("#trim3").click(function(){
        $("#trim4").show();	
});
});
	
	</script>
</head>
<body>


           	<span style="font-size:40px; color:#058AA8; font-family:Museo;"> Settings</span><br>
			
  <br/>
  				
			   <?php	if(isset($_GET['user_block_failed']))
			   
			   {echo"<br> <div style=\"color:#ffffff;font-size:14px;margin-bottom:5px;border-radius:4px;background:#0DAACE;height:20px;width:100%;padding-top:1px;padding-left:3px;\">User blocking failed. Either you entered a wrong password or wrong user id, please recheck both.</div>";
				 }
		
		
			 ?>
			 
			 	   <?php	if(isset($_GET['user_block_success']))
			   
			   {echo"<br> <div style=\"color:#ffffff;font-size:14px;margin-bottom:5px;border-radius:4px;background:#0DAACE;height:20px;width:100%;padding-top:1px;padding-left:3px;\">User successfully blocked.</div>";
				 }
		
		
			 ?>
			 
			 
			   <?php if(isset($_GET['admin_info_updated']))
			   {echo"<br> <div style=\"color:#ffffff;font-size:14px;margin-bottom:5px;border-radius:4px;background:#0DAACE;height:20px;width:100%;padding-top:1px;padding-left:3px;\">Admin information updated successfully.</div>";
		   	
			 }
			  ?>
			  
			     <?php if(isset($_GET['site_shutdown_failed']))
			   {echo"<br> <div style=\"color:#ffffff;font-size:14px;margin-bottom:5px;border-radius:4px;background:#0DAACE;height:20px;width:100%;padding-top:1px;padding-left:3px;\">Site shutdown failed. You entered an incorrect password.</div>";
		   	
			 }
			  ?>
			  
	   <?php if(isset($_GET['site_shutdown_success']))
			   {echo"<br> <div style=\"color:#ffffff;font-size:14px;margin-bottom:5px;border-radius:4px;background:#0DAACE;height:20px;width:100%;padding-top:1px;padding-left:3px;\">The site is now temporarly shutdown. You can make it live anytime.</div>";
		   	
			 }
		 ?>
		 
  	     <?php if(isset($_GET['password_change_successful']))
			   {echo"<br> <div style=\"color:#ffffff;font-size:14px;margin-bottom:5px;border-radius:4px;background:#0DAACE;height:20px;width:100%;padding-top:1px;padding-left:3px;\">Password change successful.</div>";
		   	
			 }
			  ?>
			  
	   <?php if(isset($_GET['password_change_failed']))
			   {echo"<br> <div style=\"color:#ffffff;font-size:14px;margin-bottom:5px;border-radius:4px;background:#0DAACE;height:20px;width:100%;padding-top:1px;padding-left:3px;\">Password change failed.</div>";
		   	
			 }
		 ?>
		 
 <!-- Edit you informations option starts-->   
<div class="upload" id="s1" >Edit your information</div> 
<div class="setting" id="sb1">
<span style="font-size:24px; color:#000; font-family:Museo;"> Edit details</span>
<form action="admin_personal_info_edit.php?admin_id=<?php echo $_SESSION['admin_id'];?>" class="register" enctype="multipart/form-data" method="POST" name="modify_process">
<br/><?php 
$gtx_query="SELECT * from admin_database";
$gtx_query.=" where admin_id='".$_SESSION['admin_id']."'";
$gtx_result=mysql_query($gtx_query,$gtx_connection);

 while($row=mysql_fetch_assoc($gtx_result))
{
$new_name=$row['admin_name'];	
$new_contact=$row['contact_1'];
	
echo"
 
 <p>
                    <label >Admin Name
                    </label>
                    <input type=\"text\" required name=\"admin_name\" value=\"".$new_name."\" />
</p>
 <p>
                    <label >Contact
                    </label>
                    <input type=\"text\" required name=\"admin_contact\" pattern=\"[[0-9]{10}\" maxlength=\"10\" value=\"".$new_contact."\"/>
</p>

<p>
	
<input class=\"button\" type=\"submit\" value=\"Save\" name=\"submit_personal_info\">
</p>				
				</form>";}?>

 </div>
 <!-- Edit you information option ends-->  

 <!-- View other admins option starts--> 
  <div class="upload"id="s2" >Other admins</div>
<div class="setting" style="  height:300px;background : linear-gradient(180deg, rgba(2, 110, 127, 1) 0%, rgba(102, 45, 145, 1) 100%);" id="sb2"> 
<?php
$gtx_query="SELECT * from admin_database";
$gtx_query.=" where super_admin<>'TRUE' AND verification='TRUE'";
$gtx_result=mysql_query($gtx_query,$gtx_connection);

 while($row=mysql_fetch_assoc($gtx_result))
{ 
$trim1=rand(100000,999999);
$trim2=rand(100000,999999);
$trim3=rand(100000,999999);
echo"

	<br><div class=\"admin_caption\" style=\"border-radius:100px; background-image:url('{$row['gtx_dp']}')\"></div>
		<div class=\"admin_caption\" style=\"margin-top:10px; width:135px;font-size:14px;\">	{$row['admin_name']}<br>
		<span style=\"font-size:8px;\"><a class=\"linky\"style=\"color:#ffffff;\" href=\"mailto:{$row['admin_id']}\"> {$row['admin_id']} </a></span>
		<br><span style=\"font-size:8px;\">{$row['contact_1']}</span>
</div>
		";
}

?>
 </div>  
 <!-- View other admins option ends-->  
 
 <!-- Block a user option starts-->
   <div class="upload"id="s3" >Block a user 
   </div> 
   <div class="setting" id="sb3"> 
  <span style="font-size:24px; color:#000; font-family:Museo;">A blocked user can not order anything |</span>

   <span style="color:#ffffff;font-size:14px;border-radius:4px;background:#3784F4;height:20px;width50px;padding:0px 10px 1px 10px;">
			<a class="linky" title="List of blocked users, you can unblock them as well" style="color:#fff;"href="index.php?blocked_users_list=1">Blocked Users<a></span>
			
<form action="block_a_user.php?yes_its_in_index=1>" class="register" enctype="multipart/form-data" method="POST" name="modify_process">
<br/><?php 
$gtx_query="SELECT * from admin_database";
$gtx_query.=" where admin_id='".$_SESSION['admin_id']."'";
$gtx_result=mysql_query($gtx_query,$gtx_connection);

 while($row=mysql_fetch_assoc($gtx_result))
{
$new_name=$row['admin_name'];	
$new_contact=$row['contact_1'];
	
echo"<form>
 
 <p>
                    <label >Enter User's Id
                    </label>
                    <input type=\"text\" required name=\"block_user\" title=\"You can find User Id in user database\" />
</p>
 <p>
                    <label >Your Password
                    </label>
                    <input type=\"password\" style=\"height:21px;background:#fff; width:230px;\"required name=\"your_password\"/>
</p>

<p>
	
<input class=\"button\" type=\"submit\" value=\"Block\" name=\"submit_block\">
</p>				
				</form>";}?>

 </div> 
   
   </div>
 <!-- Block a user option ends-->
   
<!-- Changing Language option starts-->
   <div class="upload" id="s4">Language</div> 
   <div class="setting" style="display:block;" id="sb4"> 

  <span style="font-size:24px; color:#000; font-family:Museo;">Set your language</span>
<br/><br/> 
<form class="register">
 <p>
                    <label >
                    </label>
<div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'hi'}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                     
</p>
	</form>		
<p style="color:#000;">We <b>do not recommend</b> changing the language. However for some instances you can change the language. To revert back to original language please restart the brower.</p>		
   </div>
   
<!-- Changing Language option ends-->

<!-- Payment option starts-->

<?php 
$gtx_query="SELECT base_charge, percentage_per_order, last_payment_date from system_control where restaurant_name_id='CRAZZYBITEGKP'";
$gtx_result=mysql_query($gtx_query,$gtx_connection);
 while($row=mysql_fetch_assoc($gtx_result))
{
$base_charge=$row['base_charge'];
$percentage_commission=$row['percentage_per_order']/100;
$last_payment_date=$row['last_payment_date'];}	?>

   <div class="upload"id="s5" >Payments</div> 
   <div class="setting" style="height:250px;" id="sb5"> 
     <span style="font-size:24px; color:#000; font-family:Museo;">One year subscription details</span>
<form class="register">	 
	    <span style=" color:#000; font-size:14px; ">
<label> Base Charge:</label> <b> &#x20B9;<?php echo $base_charge-500;?></b>
<br> <label>Hosting:</label> <b> Free</b>
<br> <label>Domain:</label> <b> &#x20B9;500</b>
<br>

<?php 
$total_sales=0;
$total_payable_amt=0;
$gtx_query="SELECT total_sales from cash_counter";
$gtx_result=mysql_query($gtx_query,$gtx_connection);
 while($row=mysql_fetch_assoc($gtx_result))
{
$total_sales=$total_sales+$row['total_sales'];}	?>





<!-- calculation for subscription charge -->
<label>Charging:</label><b> <?php echo $percentage_commission*100;?> % </b>of per order value<br>

<label>Total Sales:</label><b> &#x20B9;<?php echo $total_sales;?>  </b>as of <?php echo date('j F, Y ');?><br>

<label><?php echo $percentage_commission*100;?> % of total sales:</label><b> &#x20B9;<?php echo ceil($total_sales*$percentage_commission);?> </b><br>
 
 
<?php $total_payable_amt=$base_charge+ceil($total_sales*$percentage_commission);?>

<!-- calculation for subscription charge -->
 
<br><label>Payment due:</label><span style="font-family:museo; font-size:24px;"> &#x20B9;<?php echo $total_payable_amt;?> </span>
<br><label>Last Date:</label> <b><?php echo $last_payment_date;?></b>
</span> 
</form>
   </div>
  
<!-- Payment option ends--> 


<!-- Temporarily shutdown site option starts-->
<div class="upload"id="s6" >Temporarily shutdown site</div> 	
<div class="setting" style="height:250px;" id="sb6">

<?php 
$what_is_current_time=date('Y-m-d H:i:s');
$gtx_query="SELECT * from system_control where restaurant_name_id='CRAZZYBITEGKP'";
$gtx_result=mysql_query($gtx_query,$gtx_connection);

while($row=mysql_fetch_assoc($gtx_result))
{$boot_time=$row['boot_up_if_time'];
}

?>
<?php
$restaurant_id='CRAZZYBITEGKP';//set the restaurant id to make it live.
if(($what_is_current_time>$boot_time)||($boot_time==''))//boot_timecheck
{
echo"
<span style=\"color:#000; font-size:11px;\">
<br/>Shutting down the site makes it temporarily out of service and no user will be allowed to order anything during that period. 
<br><span style=\"color:#000; font-size:20px; font-family:museo;\">When should I shut down the site?</span>
<br> If due to some reason you're not operating your restaurant and thus not willing to accept orders, you may temporarily shut down the website to avoid any confusion 
or bad experience among users.
</span>


<form class=\"register\" method=\"post\" action=\"submit_shutdown.php?yes_its_in_index=1\">
<p>
<label>Autorestart After:</label>
<select name=\"auto_restart_time\">
  <option value=\"1\">1 hour</option>
  <option value=\"2\">2 hour</option>
  <option value=\"6\">6 hour</option>
    <option value=\"12\">12 hour</option>
  <option value=\"24\">Tomorrow</option>
</select>
</p>
 <p>
                    <label >Your Password
                    </label>
                    <input type= \"password\" style= \"height:21px;background:#fff;width:230px; \"required name=\"your_password\"/>
</p>
 <p>
	
<input class=\"button\" type= \"submit\" value= \"Shut Down\" name= \"submit_shutdown\">
 </p>
</form>";

}

else
{
	echo"<br><span style=\"color:#000; font-size:24px; font-family:museo;\">The site is temporarily shut down.</span>";
	echo"<br><br><span style=\"color:#000;font-size:14px; \">Its temporarily out of service and currently no user is allowed to order anything.
	However if you're ready to initialize your service again you, can make it live to public now. Else it will automatically become live at autorestart time.</span>";
	
	echo"<br><br><form class=\"register\">
		<button type=\"button\" class=\"button\" id=\"trim3\" style=\"background:#99CC33; width:180px;\" onclick=\"loadDoc('".$restaurant_id."')\">&nbsp;Make it live&nbsp; </button>
		<div id=\"trim4\" style=\"display:none;\"><br/><span style=\"color:#ccc;\">The site is now live.</span></div>
	</form>";
}
?>
 </div>  

<!-- Temporarily shutdown site option ends-->

 <!-- changing password option starts-->   
<div class="upload" id="s7" >Change password</div> 
<div class="setting" id="sb7">
<span style="font-size:24px; color:#000; font-family:Museo;">Keep your password safe</span>
<form action="admin_auth_edit.php" class="register" enctype="multipart/form-data" method="POST" name="change_pass">
<br/>

 <p>
                    <label >Original
                    </label>
                    <input  required type= "password" style= "height:21px;background:#fff;width:230px;" name="admin_old_password" />
</p>
 <p>
                    <label >Modified
                    </label>
                    <input required type="password" style= "height:21px;background:#fff;width:230px;" name="admin_new_password"  />
</p>

<p>
	
<input class="button" type="submit" value="Change" name="submit_password">
</p>				
				</form>

 </div>
 <!-- Changing Password option ends--> 			

			 
			 <br><br><div style="background: #E1E1E1; height:2px;width:100%; display:inline-block;"></div>
			  


Setting modifies the <b>critical options</b> of the website. Please be careful while doing any changes.<br><br/>


<?php		mysql_close($gtx_connection); ?>	  
			</body></html>