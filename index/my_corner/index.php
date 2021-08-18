<?php
ob_start();
session_start();
if(!isset($_SESSION['admin_id'])&&!isset($_SESSION['admin_name'])&&!isset($_SESSION['restaurant_branch']))
{
header("Location:login.php");
}
$_SESSION['yes_its_index']=21;
?>
<!DOCTYPE html>
<html>
<head><title>Admin Panel | Crazzy Bite</title>
<?php include("includes/headerwithoutsession.php"); ?>


<!--script to print-->

<script type="text/javascript" src="../js/jquery-1.3.1.min.js" > </script> 
<script type="text/javascript">

    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'Database', 'height=400,width=600');
        mywindow.document.write('<html><head><title>Sales Database</title>');
      // mywindow.document.write('<link rel="stylesheet" href="../css/login_print.css" type="text/css" />');

        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10

        mywindow.print();
        mywindow.close();

        return true;
    }

</script>
<!--end of script to print-->
<?php if(!isset($_GET['site_shutdown_success'])&&!isset($_GET['site_shutdown_failed'])&&!isset($_GET['blocked_users_list'])&&!isset($_GET['user_block_success'])&&!isset($_GET['past_orders'])&&!isset($_GET['redundant_insert'])&&!isset($_GET['success_insert'])&&!isset($_GET['delete_success'])&&!isset($_GET['delete_fail'])&&!isset($_GET['modification_fail'])&&!isset($_GET['modification_process'])&&!isset($_GET['successfully_updated'])&&!isset($_GET['all_special_orders'])&&!isset($_GET['all_feedbacks'])&&!isset($_GET['success_feedback_admin'])&&!isset($_GET['admin_info_updated'])&&!isset($_GET['user_block_failed'])&&!isset($_GET['password_change_successful'])&&!isset($_GET['password_change_failed'])){                                                                  
	echo"
<script src=\"../js/jquery.min.js\"></script>
<script> 
/* Auto AJAX DB UPDATE */
//auto load page at ajax right
var myVar;

function autoupdateFunction(){
	$(\".ajaxright\").load(\"current_orders.php?yes_its_in_index=1\"); 
	myVar=setTimeout(autoupdateFunction,5000);
}

function stopAutoUpdateFunction(){
  clearTimeout(myVar);
}

/* Auto AJAX DB UPDATE ENDS */
//works improved
</script>";
}
else{	echo"
<script src=\"../js/jquery.min.js\"></script>
<script> 
/* Auto AJAX DB UPDATE */
//auto load page at ajax right
var myVar;

function autoupdateFunction(){
	
}

function stopAutoUpdateFunction(){
  clearTimeout(myVar);
}

/* Auto AJAX DB UPDATE ENDS */
//works improved
</script>";}
?>

<script src=\"../js/jquery.min.js\"></script>
<script> 
/* Auto AJAX DB UPDATE */
//auto load page at ajax right
var myVar;

function autoupdateFunctionReboost(){
		$(".ajaxright").load("current_orders.php?yes_its_in_index=1"); 
	myVar=setTimeout(autoupdateFunctionReboost,5000);
}

function stopAutoUpdateFunction(){
  clearTimeout(myVar);
}

/* Auto AJAX DB UPDATE ENDS */
//works improved
</script>

<script src="../js/jquery.min.js"></script>
<script> 

$(document).ready(function(){
  $("#nb1").delay(500).slideToggle("fast");
$(".ajaxright").html("<br><br><br><br><br><center><img src=\"images/loadinganimwhite.gif\"/></center>");
$(".ajaxright").load("current_orders.php?yes_its_in_index=1");// ajax page onload() of the carrier index
autoupdateFunction();// starting update function
    $("#bn1").click(function(){
        $("#nb1").slideToggle("fast");
	
    });
	 $("#bn2").click(function(){
        $("#nb2").slideToggle("fast");

    });
	 $("#bn5").click(function(){
        $("#nb5").slideToggle("fast");

    });
	
//the only case to allow auto_update function, rest all case will stop the auto update for this case 
//file names may misguide... since this code has been part of a different program as well
	 $("#class_nav_1").click(function(){
$(".ajaxright").html("<br><br><br><br><br><center><img src=\"images/loadinganimwhite.gif\"/></center>");
        $(".ajaxright").load("current_orders.php?yes_its_in_index=1");
autoupdateFunctionReboost();// starting update function

    });	

	
	 $("#class_nav_2").click(function(){
$(".ajaxright").html("<br><br><br><br><br><center><img src=\"images/loadinganimwhite.gif\"/></center>");
  $(".ajaxright").load("cancelled_orders.php?yes_its_in_index=1");
stopAutoUpdateFunction();//stopping autoupdate function
    });	
	
	
	 $("#class_nav_3").click(function(){
$(".ajaxright").html("<br><br><br><br><br><center><img src=\"images/loadinganimwhite.gif\"/></center>");
  $(".ajaxright").load("all_orders.php?yes_its_in_index=1");
stopAutoUpdateFunction();//stopping autoupdate function
    });	
	
		 $("#class_nav_4").click(function(){
$(".ajaxright").html("<br><br><br><br><br><center><img src=\"images/loadinganimwhite.gif\"/></center>");
  $(".ajaxright").load("total_sales.php?yes_its_in_index=1");
stopAutoUpdateFunction();//stopping autoupdate function
    });	

	
		 $("#class_nav_5").click(function(){
$(".ajaxright").html("<br><br><br><br><br><center><img src=\"images/loadinganimwhite.gif\"/></center>");
  $(".ajaxright").load("past_orders_date_select.php?yes_its_in_index=1");
stopAutoUpdateFunction();//stopping autoupdate function
    });
	
	
	 $("#learn_nav_1").click(function(){
$(".ajaxright").html("<br><br><br><br><br><center><img src=\"images/loadinganimwhite.gif\"/></center>");
        $(".ajaxright").load("food_menu.php?yes_its_in_index=1");
stopAutoUpdateFunction();//stopping autoupdate function
    });	
	
	
		 $("#learn_nav_2").click(function(){
$(".ajaxright").html("<br><br><br><br><br><center><img src=\"images/loadinganimwhite.gif\"/></center>");
        $(".ajaxright").load("add_products.php?yes_its_in_index=1");
stopAutoUpdateFunction();//stopping autoupdate function
    });	

	
		 $("#learn_nav_3").click(function(){
$(".ajaxright").html("<br><br><br><br><br><center><img src=\"images/loadinganimwhite.gif\"/></center>");
        $(".ajaxright").load("delete_product.php?yes_its_in_index=1");
stopAutoUpdateFunction();//stopping autoupdate function
    });	

	
		 $("#learn_nav_4").click(function(){
$(".ajaxright").html("<br><br><br><br><br><center><img src=\"images/loadinganimwhite.gif\"/></center>");
		$(".ajaxright").load("modify_product.php?yes_its_in_index=1");
stopAutoUpdateFunction();//stopping autoupdate function
    });	

	
		 $("#learn_nav_5").click(function(){
$(".ajaxright").html("<br><br><br><br><br><center><img src=\"images/loadinganimwhite.gif\"/></center>");
        $(".ajaxright").load("top_selling.php?yes_its_in_index=1");
stopAutoUpdateFunction();//stopping autoupdate function
    });	

	
	 $("#bn3").click(function(){
$(".ajaxright").html("<br><br><br><br><br><center><img src=\"images/loadinganimwhite.gif\"/></center>");
        $(".ajaxright").load("special_orders.php?yes_its_in_index=1");
stopAutoUpdateFunction();//stopping autoupdate function
    });	

	
	 $("#bn4").click(function(){
$(".ajaxright").html("<br><br><br><br><br><center><img src=\"images/loadinganimwhite.gif\"/></center>");
        $(".ajaxright").load("cash_counters.php?yes_its_in_index=1");
stopAutoUpdateFunction();//stopping autoupdate function
    });	

		
	 $("#edu_nav_1").click(function(){
$(".ajaxright").html("<br><br><br><br><br><center><img src=\"images/loadinganimwhite.gif\"/></center>");
        $(".ajaxright").load("customer_database.php?yes_its_in_index=1");
stopAutoUpdateFunction();//stopping autoupdate function
    });
	
		 $("#edu_nav_2").click(function(){
$(".ajaxright").html("<br><br><br><br><br><center><img src=\"images/loadinganimwhite.gif\"/></center>");
        $(".ajaxright").load("customer_database_by_name.php?yes_its_in_index=1");
stopAutoUpdateFunction();//stopping autoupdate function
    });
	
		 $("#edu_nav_3").click(function(){
$(".ajaxright").html("<br><br><br><br><br><center><img src=\"images/loadinganimwhite.gif\"/></center>");
        $(".ajaxright").load("customers_feedback.php?yes_its_in_index=1");
stopAutoUpdateFunction();//stopping autoupdate function
    });
	
		 $("#edu_nav_4").click(function(){
$(".ajaxright").html("<br><br><br><br><br><center><img src=\"images/loadinganimwhite.gif\"/></center>");
        $(".ajaxright").load("customer_database_top.php?yes_its_in_index=1");
stopAutoUpdateFunction();//stopping autoupdate function
    });
	
			 $("#edu_nav_5").click(function(){
$(".ajaxright").html("<br><br><br><br><br><center><img src=\"images/loadinganimwhite.gif\"/></center>");
        $(".ajaxright").load("verified_customers.php?yes_its_in_index=1");
stopAutoUpdateFunction();//stopping autoupdate function
    });
	
		 $("#bn7").click(function(){
$(".ajaxright").html("<br><br><br><br><br><center><img src=\"images/loadinganimwhite.gif\"/></center>");
        $(".ajaxright").load("admin_feedback.php?yes_its_in_index=1");
stopAutoUpdateFunction();//stopping autoupdate function
    });	

	
			 $("#bn6").click(function(){
$(".ajaxright").html("<br><br><br><br><br><center><img src=\"images/loadinganimwhite.gif\"/></center>");
        $(".ajaxright").load("settings.php?yes_its_in_index=1");
stopAutoUpdateFunction();//stopping autoupdate function
    });	

	
	$(".notify").mouseenter(function(){
    $(".notifybox").fadeIn();
});

	$(".notify").mouseleave(function(){
    $(".notifybox").delay(1500).fadeOut();
});
});
</script>
<?php
//cases for AJAXRIGHT on $_GET Super global requests
//checking past requests
	if(isset($_GET['past_orders']))
			  {echo"
			  <script src=\"../js/jquery.min.js\"></script>
			  <script>
			  stopAutoUpdateFunction();
			  $(document).ready(function(){
			  stopAutoUpdateFunction();
			    $(\".ajaxright\").load(\"past_orders.php?yes_its_in_index=1&&select_date_here=".$_POST['select_date']."\");
				});</script>";
				}
				
				?>
				
<?php
//redundant insert into product_list
	if(isset($_GET['redundant_insert']))
			  {echo"
			  <script src=\"../js/jquery.min.js\"></script>
			  <script>
			  stopAutoUpdateFunction();
			  $(document).ready(function(){
			  stopAutoUpdateFunction();
			    $(\".ajaxright\").load(\"add_products.php?yes_its_in_index=1&&redundant_insert=2\");
				});</script>";
				}
				
				?>
				
<?php
//successful insert in the product_list
	if(isset($_GET['success_insert']))
			  {echo"
			  <script src=\"../js/jquery.min.js\"></script>
			  <script>
			  stopAutoUpdateFunction();
			  $(document).ready(function(){
			  stopAutoUpdateFunction();
			    $(\".ajaxright\").load(\"add_products.php?yes_its_in_index=1&&success_insert=1\");
				});</script>";
				}
				
				?>
				
<?php
//delete fail
	if(isset($_GET['delete_fail']))
			  {
				  echo"
			  <script src=\"../js/jquery.min.js\"></script>
			  <script>
			  stopAutoUpdateFunction();
			  $(document).ready(function(){
			  stopAutoUpdateFunction();
			    $(\".ajaxright\").load(\"delete_product.php?yes_its_in_index=1&delete_fail=1\");
				});</script>";
			
				}
				
				?>
				
<?php
//delete success
	if(isset($_GET['delete_success']))
			  {
				  echo"
			  <script src=\"../js/jquery.min.js\"></script>
			  <script>
			  stopAutoUpdateFunction();
			  $(document).ready(function(){
			  stopAutoUpdateFunction();
			    $(\".ajaxright\").load(\"delete_product.php?yes_its_in_index=1&delete_success=1\");
				});</script>";
				   	 }
				
				?>				

<?php
//modification fail
	if(isset($_GET['modification_fail']))
			  {
				  echo"
			  <script src=\"../js/jquery.min.js\"></script>
			  <script>
			  stopAutoUpdateFunction();
			  $(document).ready(function(){
			  stopAutoUpdateFunction();
			    $(\".ajaxright\").load(\"modify_product.php?yes_its_in_index=1&modification_fail=1\");
				});</script>";
			
				}
				
				?>
				
<?php
//modification success
	if(isset($_GET['modification_process']))
			  {
				  echo"
			  <script src=\"../js/jquery.min.js\"></script>
			  <script>
			  stopAutoUpdateFunction();
			  $(document).ready(function(){
			  stopAutoUpdateFunction();
			    $(\".ajaxright\").load(\"modify_stage_2.php?yes_its_in_index=1&modification_process=1&product_code={$_GET['product_code']}\");
				});</script>";
				   	 }
				
				?>	
<?php
//modification success
	if(isset($_GET['successfully_updated']))
			  {
				  echo"
			  <script src=\"../js/jquery.min.js\"></script>
			  <script>
			  stopAutoUpdateFunction();
			  $(document).ready(function(){
			  stopAutoUpdateFunction();
			    $(\".ajaxright\").load(\"modify_product.php?yes_its_in_index=1&successfully_updated=1\");
				});</script>";
				   	 }
				
				?>		

<?php
//get all special orders
	if(isset($_GET['all_special_orders']))
			  {
				  echo"
			  <script src=\"../js/jquery.min.js\"></script>
			  <script>
			  stopAutoUpdateFunction();
			  $(document).ready(function(){
			  stopAutoUpdateFunction();
			    $(\".ajaxright\").load(\"all_special_orders.php?yes_its_in_index=1\");
				});</script>";
				   	 }
				
				?>		

<?php
//get all feedbacks
	if(isset($_GET['all_feedbacks']))
			  {
				  echo"
			  <script src=\"../js/jquery.min.js\"></script>
			  <script>
			  stopAutoUpdateFunction();
			  $(document).ready(function(){
			  stopAutoUpdateFunction();
			    $(\".ajaxright\").load(\"all_feedbacks.php?yes_its_in_index=1\");
				});</script>";
				   	 }
				
				?>	

<?php
//admin feedbacks
	if(isset($_GET['success_feedback_admin']))
			  {
				  echo"
			  <script src=\"../js/jquery.min.js\"></script>
			  <script>
			  stopAutoUpdateFunction();
			  $(document).ready(function(){
			  stopAutoUpdateFunction();
			    $(\".ajaxright\").load(\"admin_feedback.php?yes_its_in_index=1&success_feedback_admin=1\");
				});</script>";
				   	 }
				
				?>	

<?php
//admin info update
	if(isset($_GET['admin_info_updated']))
			  {
				  echo"
			  <script src=\"../js/jquery.min.js\"></script>
			  <script>
			  stopAutoUpdateFunction();
			  $(document).ready(function(){
			  stopAutoUpdateFunction();
			    $(\".ajaxright\").load(\"settings.php?yes_its_in_index=1&admin_info_updated=1\");
				});</script>";
				   	 }
				
				?>	

<?php
//block a user failed
	if(isset($_GET['user_block_failed']))
			  {
				  echo"
			  <script src=\"../js/jquery.min.js\"></script>
			  <script>
			  stopAutoUpdateFunction();
			  $(document).ready(function(){
			  stopAutoUpdateFunction();
			    $(\".ajaxright\").load(\"settings.php?yes_its_in_index=1&user_block_failed=1\");
				});</script>";
				   	 }
				
				?>		

<?php
//block a user suceeded
	if(isset($_GET['user_block_success']))
			  {
				  echo"
			  <script src=\"../js/jquery.min.js\"></script>
			  <script>
			  stopAutoUpdateFunction();
			  $(document).ready(function(){
			  stopAutoUpdateFunction();
			    $(\".ajaxright\").load(\"settings.php?yes_its_in_index=1&user_block_success=1\");
				});</script>";
				   	 }
				
				?>	

<?php
//block a user suceeded
	if(isset($_GET['blocked_users_list']))
			  {
				  echo"
			  <script src=\"../js/jquery.min.js\"></script>
			  <script>
			  stopAutoUpdateFunction();
			  $(document).ready(function(){
			  stopAutoUpdateFunction();
			    $(\".ajaxright\").load(\"blocked_users_list.php?yes_its_in_index=1\");
				});</script>";
				   	 }
				
				?>	

<?php
//site shutdown failed
	if(isset($_GET['site_shutdown_failed']))
			  {
				  echo"
			  <script src=\"../js/jquery.min.js\"></script>
			  <script>
			  stopAutoUpdateFunction();
			  $(document).ready(function(){
			  stopAutoUpdateFunction();
			    $(\".ajaxright\").load(\"settings.php?yes_its_in_index=1&site_shutdown_failed=0\");
				});</script>";
				   	 }
				
				?>	

<?php
//site shutdown suceeded
	if(isset($_GET['site_shutdown_success']))
			  {
				  echo"
			  <script src=\"../js/jquery.min.js\"></script>
			  <script>
			  stopAutoUpdateFunction();
			  $(document).ready(function(){
			  stopAutoUpdateFunction();
			    $(\".ajaxright\").load(\"settings.php?yes_its_in_index=1&site_shutdown_success=1\");
				});</script>";
				   	 }
				
				?>	
				
<?php
//password change failed
	if(isset($_GET['password_change_failed']))
			  {
				  echo"
			  <script src=\"../js/jquery.min.js\"></script>
			  <script>
			  stopAutoUpdateFunction();
			  $(document).ready(function(){
			  stopAutoUpdateFunction();
			    $(\".ajaxright\").load(\"settings.php?yes_its_in_index=1&password_change_failed=1\");
				});</script>";
				   	 }
				
				?>	
				
<?php
//password change successfull
	if(isset($_GET['password_change_successful']))
			  {
				  echo"
			  <script src=\"../js/jquery.min.js\"></script>
			  <script>
			  stopAutoUpdateFunction();
			  $(document).ready(function(){
			  stopAutoUpdateFunction();
			    $(\".ajaxright\").load(\"settings.php?yes_its_in_index=1&password_change_successful=1\");
				});</script>";
				   	 }
				
				?>	
				
<!--end of cases fro AJAXRIGHT on $_GET Super global requests	-->			
<!-- live Clock -->


<script language="JavaScript">
<!--
function clock(){
var time = new Date()
var hr = time.getHours()
var min = time.getMinutes()
var sec = time.getSeconds()
var ampm = " PM "
if (hr < 12){
ampm = " AM "
}
if (hr > 12){
hr -= 12
}
if (hr < 10){
hr = " " + hr
}
if (min < 10){
min = "0" + min
}
if (sec < 10){
sec = "0" + sec
}
document.clockForm.clockButton.value = hr + ":" + min + ":" + sec + ampm
setTimeout("clock()", 1000)
}
function showDate(){
var date = new Date()
var year = date.getYear()
if(year < 1000){
year += 1900
}
var monthArray = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December")
alert( monthArray[date.getMonth()] + " " + date.getDate() + ", " + year)
}
window.onload=clock;
//-->
</script>


<!-- end of live clock -->

  <link rel="stylesheet" type="text/css" href="../css/form.css" />
</head>

<body>
<div class="topbarforprofile"><center><a href="../index.php" title="Back to Crazzy Bite"><img src="images/ast_white.png" style="padding-top:6px;"height="38px;"/></a></center></div>
<div class="midbar" style="background-image:url(../assets/img/macchi.png);"></div>

<div id="wrapper">

<link rel="stylesheet" type="text/css" href="../css/asteroidlearning.css" />
<link rel="stylesheet" type="text/css" href="../css/login.css" />

<!-- New start from here-->

 
<?php include("includes/tabsprofile.php"); ?>
<div class="learner_background">
<img src="images/login/class.jpg" width="999"   alt=""> 
<div class="myclock">
<form name="clockForm">
<input type="button" name="clockButton"  onClick="showDate()" style="font-size:3.5em; color:#fff; background:rgba(0,0,0,0); text-shadow: 0 5px 10px rgba(0, 0, 0, .7); "/>
</form>
</div>
</div>

<div class="notify"><img src="images/classicons/notification.png" height="25px"/></div>
<div class="notifybox" style="color:#fff;">Welcome to Crazzy Bite</div>
<div class="notify_number" style="color:#fff;">1</div>
<div class="logo_login"></div>
<div class="login_box"><br><br><br>
   
                    <label style="color:#ffffff; font-size:20px;">Welcome <span Style="font-family:Museo; font-size:35;"><?php echo $_SESSION['admin_name'];?></span>
					<br><span class="linky" Style=" font-size:15px; color:#FFF100; cursor:pointer;"><?php echo $_SESSION['restaurant_branch'];?></span><br/>
					
                    </label>

<span style="font-size:10px;color:#ffffff;">Done for now | <a href="logout.php?logout_requwst=79" style="color:#cccccc;">Logout</a></span></center>
<!--page print utility-->
<br><input type="button" value="Print" style="padding:2px 2px 2px 2px; width:60px;font-size:.8em; border-radius:4px;" onclick="PrintElem('.ajaxright')" />
<!--page print utility-->

</div>


<!--uploading display pic here---------------------------------------->
<?php include("includes/dp_complete_func.php"); ?>
<!--uploading display pic here----------------------------------------->


 <div class="textbody2"> </div>
<div class="bodycolumn2"  style="color:#000000;">  

<div class="subjectleft">
<div class="bluenav" id="bn1">Today's Orders</div><img src="images/navicon/cart.png" class="bluenavpic"/>
<div  class="navbox" id="nb1">
<div class="navlink" id="class_nav_1">Current Orders</div>
<div class="navlink" id="class_nav_2">Cancelled Orders</div>
<div class="navlink" id="class_nav_3">All Orders</div>
<div class="navlink" id="class_nav_4">Total Sales</div>
<div class="navlink" id="class_nav_5">Past Orders</div>
</div >
<div  class="bluenav" id="bn2">Menu Items</div ><img src="images/navicon/spoon.png" class="bluenavpic"/>
<div  class="navbox" id="nb2">
<div class="navlink" id="learn_nav_1">See List</div>
<div class="navlink" id="learn_nav_2">Add New Items</div>
<div class="navlink" id="learn_nav_3">Delete Item</div>
<div class="navlink" id="learn_nav_4">Modify Menu</div>
<div class="navlink" id="learn_nav_5">Top Selling Items</div>

</div >
<div  class="bluenav" id="bn3">Special Orders</div ><img src="images/navicon/wish.png" class="bluenavpic"/>
<div  class="bluenav" id="bn4">Cash Counters</div ><img src="images/navicon/rupee.png" class="bluenavpic"/>
<div  class="bluenav" id="bn5">Customers</div ><img src="images/navicon/user.png" class="bluenavpic"/>
<div  class="navbox" id="nb5">
<div class="navlink" id="edu_nav_1">Database</div>
<div class="navlink" id="edu_nav_2">By Name</div>
<div class="navlink" id="edu_nav_3">Customer's Feedback</div>
<div class="navlink" id="edu_nav_4">Top Customers</div>
<div class="navlink" id="edu_nav_5">Verified Customers</div>
</div >
<div  class="bluenav" id="bn6">Settings</div ><img src="images/navicon/settings.png" class="bluenavpic"/>
<div  class="bluenav" id="bn7">Report Problem</div ><img src="images/navicon/feed.png" class="bluenavpic"/>
</div>


<div class="ajaxright" id="style-4">

</div><!-- All AJAX requests ends here-->
</div>




</div><!--wrapper ends here-->
<?php include("includes/photoviewer.php"); ?>
<div class="copyleft">© 2017, <a href="http://casitastudios.com" target="_blank" style="color:#ffffff;">Powered by Casita Studios</a> | India</div>
</body>
</html>