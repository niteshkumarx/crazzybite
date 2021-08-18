<?php 
ob_start();
require_once('init.php');


date_default_timezone_set('Asia/Kolkata'); //Change as per your default time
  

?>
<!-- Facebook Login Ends # Required files, init.php, login.php, callback.php, logout.php-->
<!-- # Requires facebook SDK v4.5xx/\ HERE as DIR facebook-php-sdk-v4-5.0.0 -->
<!-- # Copyrights Casita Studios -->
<?php
require_once("../../of_course/dbcontroller.php");
$db_handle = new DBController();
?>


<!DOCTYPE html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     	<meta name="description" content="Order Food Online | Crazzy Bite" />
		<meta name="keywords" content=" " />
		<meta name="author" content="Nitesh" />
    <title>Crazzy Bite | Order your hot and spicy meals online </title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">

    <!-- Font awesome -->
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">   
    <!-- Slick slider -->
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css">    
    <!-- Date Picker -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datepicker.css">    
    <!-- Fancybox slider -->
    <link rel="stylesheet" href="assets/css/jquery.fancybox.css" type="text/css" media="screen" /> 
    <!-- Theme color -->
    <link id="switcher" href="assets/css/theme-color/red-theme.css" rel="stylesheet">     

    <!-- Main style sheet -->
    <link href="style.css" rel="stylesheet">    

   
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Tangerine' rel='stylesheet' type='text/css'>        
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Prata' rel='stylesheet' type='text/css'>
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<!-- script for AJAX based carting -->
	<script src="assets/js/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
function showEditBox(editobj,id) {
	$('#frmAdd').hide();
	$(editobj).prop('disabled','true');
	var currentMessage = $("#message_" + id + " .message-content").html();
	var editMarkUp = '<textarea rows="5" cols="80" id="txtmessage_'+id+'">'+currentMessage+'</textarea><button name="ok" onClick="callCrudAction(\'edit\','+id+')">Save</button><button name="cancel" onClick="cancelEdit(\''+currentMessage+'\','+id+')">Cancel</button>';
	$("#message_" + id + " .message-content").html(editMarkUp);
}
function cancelEdit(message,id) {
	$("#message_" + id + " .message-content").html(message);
	$('#frmAdd').show();
}
function cartAction(action,product_code) {
	var queryString = "";
	if(action != "") {
		switch(action) {
			case "add":
				queryString = 'action='+action+'&code='+ product_code+'&quantity='+$("#qty_"+product_code).val();
			break;
			case "remove":
				queryString = 'action='+action+'&code='+ product_code;
			break;
			case "empty":
				queryString = 'action='+action;
			break;
		}	 
	}
	jQuery.ajax({
	url: "ajax_action.php",
	data:queryString,
	type: "POST",
	success:function(data){
		$("#cart-item").html(data);
		if(action != "") {
			switch(action) {
				case "add":
					$("#add_"+product_code).hide();
					$("#added_"+product_code).show();
				break;
				case "remove":
					$("#add_"+product_code).show();
					$("#added_"+product_code).hide();
				break;
				case "empty":
					$(".btnAddAction").show();
					$(".btnAdded").hide();
				break;
			}	 
		}
	},
	error:function (){}
	});
}
</script>
	<!-- Script for AJAX based carting ends -->

  </head>
  <body>  
  <!-- Pre Loader -->
  <div id="aa-preloader-area">
    <div class="mu-preloader">
      <img src="assets/img/preloader.gif" alt="Please Wait">
    </div>
  </div>
  <!--START SCROLL TOP BUTTON --
    <a class="scrollToTop" href="#">
      <i class="fa fa-angle-up"></i>
      <span>Top</span>
    </a>
  <!-- END SCROLL TOP BUTTON -->

  <!-- Start header section -->
  
  <?php if(isset($_GET['error'])){
 echo" <div style=\"background-color:#D60015; font-family:museo;color:#fff; text-align:center;\">&nbsp;You have not ordered anything</div>";
  }
 else  if(isset($_GET['customer_reservation'])){
 echo" <div style=\"background-color:#AA00F9; font-family:museo;color:#fff; text-align:center;\">&nbsp;Thank you <b>".$_GET['customer_reservation']."</b>
		for giving us chance to make your treat awesome. Someone from us will contact you soon.</div>";
  }
  
   else  if(isset($_GET['customer_feedback'])){
 echo" <div style=\"background-color:#08A504; font-family:museo;color:#fff; text-align:center;\">&nbsp;Thank you <b>".$_GET['customer_feedback']."</b>. Your feedback is valuable to us :)</div>";
  }
  
     else  if(isset($_GET['registration_success'])){
 echo" <div style=\"background-color:#08A504; font-family:museo;color:#fff; text-align:center;\">&nbsp;Thank you for registering with us. We will need to verify your account before you can access administrative services.</div>";
  }
  ?>
  <header id="mu-header">  
    <nav class="navbar navbar-default mu-main-navbar" role="navigation">  
      <div class="container">
        <div class="navbar-header">
          <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- LOGO -->                                                        
          <a class="navbar-brand" href=" "><img src="assets/img/logo.png" style="max-height:100px;max-width:400px;" alt=" "></a>

<span style="color:#ffffff;font-family:century gothic;margin-left:3px;font-size:10px;border-radius:4px;background:rgba(0,0,0,.5);height:24px;width:150px;padding-top:1px;padding-left:3px; padding-bottom:1px;">&nbsp;&nbsp;<a style="color:#ffffff;" target="_blank" href="https://www.google.co.in/maps/place/" class="linky">Your City</a>&nbsp;&nbsp;</span> 

        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul id="top-menu" class="nav navbar-nav navbar-right mu-main-nav">
            <li><a href="#mu-slider">HOME</a></li>
            <li><a href="#mu-about-us2">ORDER NOW</a></li>                       
           <li><a href="#mu-restaurant-menu2">SPECIAL BOOKING</a></li>                      
            <!-- <li><a href="#mu-reservation2">SPECIAL BOOKING</a></li> -->                       
        
            <li><a href="#mu-chef2">CUSTOMER'S FEEDBACK</a></li>
    <!--        <li><a href="#mu-latest-news">BLOG</a></li>    -->
            <li><a href="#mu-contact2">CONTACT</a></li> 
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">MY CORNER <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">      

                <li><a href="my_corner">CRAZZY PANEL</a></li>                                            
              </ul>
            </li>
          </ul>                            
        </div><!--/.nav-collapse -->       
      </div>          
    </nav> 
  </header>
  <!-- End header section -->
 

  <!-- Start slider  -->
  <section id="mu-slider">
       <?php include("pages/slider.php"); ?>
  </section>
  <!-- End slider  -->
  
  

   
   
   
  <!-- Start About us -->
  <section id="mu-about-us" style="padding:10px; background-image:url(assets/img/macchi.png);">
    
	
	
	<link type="text/css" rel="stylesheet" href="./css">
		
<!-- Select Food Type functionality-->
	<style type="text/css">
    .box{
        padding: 20px;
        display: none;
		height:700px;
overflow:auto;

		position:relative;
        margin-top: 20px;
    
    }
	.box_item{position:absolute;      }
    .vegbox{ color:#000; }
    .nonvegbox{ color:#000; }
    .chinesebox{  color:#000; }
     .southindianbox{ color:#000;  }
</style>
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("#manu").change(function(){
        $(this).find("option:selected").each(function(){
            if($(this).attr("value")=="Veg"){
                $(".box").not(".vegbox").slideUp(500);
                $(".vegbox").delay(600).slideDown(500);
            }
            else if($(this).attr("value")=="NonVeg"){
                $(".box").not(".nonvegbox").slideUp(500);
                $(".nonvegbox").delay(600).slideDown(500);
            }
            else if($(this).attr("value")=="Chinese"){
                $(".box").not(".chinesebox").slideUp(500);
                $(".chinesebox").delay(600).slideDown(500);
            }
            else if($(this).attr("value")=="SouthIndian"){
                $(".box").not(".southindianbox").slideUp(500);
                $(".southindianbox").delay(600).slideDown(500);
            }
            else{
                $(".box").hide();
            }
        });
    }).change();
});
</script>

<!-- Changing the restaurant -->
	
<script>

function getRestaurant(str) {
  var xhttp;
  if (str == "") {
    document.getElementById("restaurant_select").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("restaurant_select").innerHTML = xhttp.responseText;
    }
  };
  xhttp.open("GET", "get_restaurant.php?restaurant_name="+str, true);
  xhttp.send();
}
</script>

<?php

   $_SESSION['restaurant'] = "Crazzy Bite"; //Set your default restaurant here with location ex. Crazzy Bite | Churchgate
 
?>

<!-- Changing the restaurant ends -->



<!-- Select Food Type functionality ends-->


<!-- Start Formoid form-->

<link rel="stylesheet" href="./formoid-metro-purple.css" type="text/css">

<form enctype="multipart/form-data" class="formoid-metro-purple" style="background-color: #FFFFFF; font-size: 14px; font-family: 'Open Sans','Helvetica Neue','Helvetica',Arial,Verdana,sans-serif; color: #666666; max-width: 880px; min-width: 200px" action="order_process.php" method="post" >
<div class="title"><h2>Place your order</h2></div>
	
	<div class="element-input"><label class="title"><br/></label>

<!--testing login with Facebook starts-->
	
				<?php if($fbauth->isLogin()):   
				//echo $_SESSION['id_facebook']."</br>";
				echo "<span style=\"font-family:museo;font-size:1.2em;\">Hi <b>".$_SESSION['name']."</b>, We will love serving you.</span> <br/>";
				//echo $_SESSION['link']."</br>";
				echo"<img src=\"https://graph.facebook.com/".$_SESSION['id_facebook']."/picture?width=110&height=110\" style=\"border-radius:4px; margin-top:4px; margin-bottom:4px;  box-shadow: 0 0 5px rgba(0,0,0,.5);\"><br/>";
				//echo $_SESSION['email']."</br>";
				//echo $_SESSION['gender']."</br>";
				//echo $_SESSION['birthday']."</br
				//Permissions required for birthday
				?>

<a href="logout.php" class="text-line" style="color:#969696;">Logout</a> 

<?php else: ?>
<a href="<?php echo $fbauth->getAuthUrl(); ?>"><img src="assets/img/loginfacebook.png" height="30px"/></a> 

<?php endif; ?>	

<!--testing login with Facebook ends-->
		
<?php include('user_verification.php');

?>
	</div>
<!--testing login with Facebook end-->

<!--choosing Restaurant -->
	<div class="element-select"><label class="title">Choose Restaurant</label><div class="large"><span>
		<select name="select_restaurant" required id="tanu" onChange="getRestaurant(this.value);">
		<option value="Crazzy Bite">Crazzy Bite </option>
		<option value="Clark">Clark</option>
		<option value="Cinnemon" >Cinnemon</option>
		<option value="President" >President </option>
		</select></div></div>
		
		
<!--choosing Restaurant ends -->		
	<!-- Element select starts-->
	<div class="element-select"><label class="title">Choose Meal Type</label><div class="large"><span>
	
<?php 
//require("../../of_course/constants_2.php");
$what_is_current_time=date('Y-m-d H:i:s');?>

 <?php  
$gtx_connection=mysql_connect(DB_SERVER,DB_USER,DB_PASS);
if(!$gtx_connection)
{die(" Database Connection Failed".mysql_error());
}?>


<?php 
$gtx_select=mysql_select_db(DB_NAME,$gtx_connection);
if(!$gtx_select)
{	die("Database Selection Failed ".mysql_error());
}?>


<?php 
$gtx_query="SELECT * from system_control where restaurant_name_id='CRAZZYBITEGKP'";
$gtx_result=mysql_query($gtx_query,$gtx_connection);

while($row=mysql_fetch_assoc($gtx_result))
{$boot_time=$row['boot_up_if_time'];
}

?>
<?php
if($user_block_status==''&&(($what_is_current_time>$boot_time)||($boot_time=='')))//boot_timecheck
{	
echo"
	
	
	
	<select name=\"select_food\" required id=\"manu\">
		<option value=\"Selectx\">Select</option>
		<option value=\"Veg\">Vegetarian &nbsp;&#127807;</option>
		<option value=\"NonVeg\">Non-Vegetarian &nbsp;&#127831;</option>
		<option value=\"Chinese\" >Chinese &nbsp;&#127836;</option>
		<option value=\"SouthIndian\" >South Indian &nbsp;&#127835;</option>
		</select>";
}	
else{	
	echo"Our service is currently out of order.<br/>We're sorry for the inconvenience caused.";	
}

	?> 
		<div class="btn-group select">
	 
	 
	 
	 
		<!--<button class="btn dropdown-toggle clearfix btn-huge btn-primary" data-toggle="dropdown">
		<span class="filter-option pull-left">select 3</span>&nbsp;</button>
		 <ul class="dropdown-menu dropdown-inverse" style="margin-top:45px;"  style="max-height: 900.938px; overflow-y: auto; min-height: 120px;">
		
		<li rel="0" class=""><a tabindex="-1"  class=""><span class="pull-left">select 1</span></a></li><!-- href attribute inc in anchor tag--
		<li rel="1"><a tabindex="-1"   class=""><span class="pull-left">select 2</span></a></li>
		<li rel="2"  ><a tabindex="-1"   class=""><span class="pull-left">select 3</span></a></li> 
		</ul>-->
		
		
		
		
		 </div><i></i></span></div></div>
<!-- Select Food Type functionality apparent DIVS-->
<link href="style_product.css" type="text/css" rel="stylesheet" />
<!-- Testing for E-commerce Begins-->
<div id="restaurant_select"> 
		  <div class="vegbox box" id="#vegbox" style="color:#000;"><!--You have selected <strong>red option</strong> so i am here-->
		 <div class="foodtype"><img src="assets/img/veg.png" height=35px/></div>

		  <div id="product-grid">
	<!--<div class="txt-heading">Products</div>-->
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM product_list where cuisine_type='VEG' and availability='YES' and hide='NO' and restaurant='".$_SESSION['restaurant']."'");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?><div class="product-item-container">
		<div class="product-item">
			<!--<form id="frmCart">-->
			<div class="product-image" style="background-image:url('<?php echo $product_array[$key]["image"]; ?>');"></div>
			<div class="product-name"><?php echo $product_array[$key]["name"]; ?></div>
			<div class="product-price"><?php echo "&#x20B9;".$product_array[$key]["price"]; ?></div>
			<div ><input class="input_quant" title="Enter quantity, use 0.5 to order HALF" style="border-radius:4px;font-size:10px;" type="text" id="qty_<?php echo $product_array[$key]["code"]; ?>" name="quantity" value="1" size="2" />
			<?php
				$in_session = "0";
				if(!empty($_SESSION["cart_item"])) {
					$session_code_array = array_keys($_SESSION["cart_item"]);
				    if(in_array($product_array[$key]["code"],$session_code_array)) {
						$in_session = "1";
				    }
				}
			?>
			<input style="border-radius:4px; text-align:center; " type="button" id="add_<?php echo $product_array[$key]["code"]; ?>" value="Add to cart" class="btnAddAction cart-action" onClick = "cartAction('add','<?php echo $product_array[$key]["code"]; ?>')" <?php if($in_session != "0") { ?>style="display:none" <?php } ?> />
			<input style="border-radius:4px;  text-align:center; color:#fff; background-color:#8B3BF2;   display:none;" type="button" id="added_<?php echo $product_array[$key]["code"]; ?>" value="Added" class="btnAdded" <?php if($in_session != "1") { ?>style="display:none" <?php } ?> />
			</div>
			<!--</form> -- no need of form nesting-->
		</div></div>
	<?php
			}
	}
	?>
</div>



		  
		  
		  </div> <!--testing for e commerce ends-->
    <div class="nonvegbox box" style="color:#000;">
			 <div class="foodtype"><img src="assets/img/nonveg.png" height=35px/></div>
	 <div id="product-grid">
	<!--<div class="txt-heading">Products</div>-->
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM product_list where cuisine_type='NONVEG' and availability='YES' and hide='NO' and restaurant='".$_SESSION['restaurant']."'");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?><div class="product-item-container">
		<div class="product-item">
			<!--<form id="frmCart">-->
			<div class="product-image" style="background-image:url('<?php echo $product_array[$key]["image"]; ?>');"></div>
			<div class="product-name"><?php echo $product_array[$key]["name"]; ?></div>
			<div class="product-price"><?php echo "&#x20B9;".$product_array[$key]["price"]; ?></div>
			<div ><input class="input_quant" title="Enter quantity, use 0.5 to order HALF" style="border-radius:4px;font-size:10px;" type="text" id="qty_<?php echo $product_array[$key]["code"]; ?>" name="quantity" value="1" size="2" />
			<?php
				$in_session = "0";
				if(!empty($_SESSION["cart_item"])) {
					$session_code_array = array_keys($_SESSION["cart_item"]);
				    if(in_array($product_array[$key]["code"],$session_code_array)) {
						$in_session = "1";
				    }
				}
			?>
			<input style="border-radius:4px; text-align:center; " type="button" id="add_<?php echo $product_array[$key]["code"]; ?>" value="Add to cart" class="btnAddAction cart-action" onClick = "cartAction('add','<?php echo $product_array[$key]["code"]; ?>')" <?php if($in_session != "0") { ?>style="display:none" <?php } ?> />
			<input style="border-radius:4px;  text-align:center; color:#fff; background-color:#8B3BF2;   display:none;" type="button" id="added_<?php echo $product_array[$key]["code"]; ?>" value="Added" class="btnAdded" <?php if($in_session != "1") { ?>style="display:none" <?php } ?> />
			</div>
			<!--</form> -- no need of form nesting-->
		</div></div>
	<?php
			}
	}
	?>
</div>



	</div>
	
    <div class="chinesebox box" style="color:#000;">
		 <div class="foodtype"><img src="assets/img/veg.png" height=35px/><br/>
		 		<img src="assets/img/nonveg.png" height=35px style="margin-top:5px;"/></div>
			  <div id="product-grid">
	<!--<div class="txt-heading">Products</div>-->
		<?php
	$product_array = $db_handle->runQuery("SELECT * FROM product_list where cuisine_type='CHINESE' and availability='YES' and hide='NO' and restaurant='".$_SESSION['restaurant']."'");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?><div class="product-item-container">
		<div class="product-item">
			<!--<form id="frmCart">-->
			<div class="product-image" style="background-image:url('<?php echo $product_array[$key]["image"]; ?>');"></div>
			<div class="product-name"><?php echo $product_array[$key]["name"]; ?></div>
			<div class="product-price"><?php echo "&#x20B9;".$product_array[$key]["price"]; ?></div>
			<div ><input class="input_quant" title="Enter quantity, use 0.5 to order HALF" style="border-radius:4px;font-size:10px;" type="text" id="qty_<?php echo $product_array[$key]["code"]; ?>" name="quantity" value="1" size="2" />
			<?php
				$in_session = "0";
				if(!empty($_SESSION["cart_item"])) {
					$session_code_array = array_keys($_SESSION["cart_item"]);
				    if(in_array($product_array[$key]["code"],$session_code_array)) {
						$in_session = "1";
				    }
				}
			?>
			<input style="border-radius:4px; text-align:center; " type="button" id="add_<?php echo $product_array[$key]["code"]; ?>" value="Add to cart" class="btnAddAction cart-action" onClick = "cartAction('add','<?php echo $product_array[$key]["code"]; ?>')" <?php if($in_session != "0") { ?>style="display:none" <?php } ?> />
			<input style="border-radius:4px;  text-align:center; color:#fff; background-color:#8B3BF2;   display:none;" type="button" id="added_<?php echo $product_array[$key]["code"]; ?>" value="Added" class="btnAdded" <?php if($in_session != "1") { ?>style="display:none" <?php } ?> />
			</div>
			<!--</form> -- no need of form nesting-->
		</div></div>
	<?php
			}
	}
	?>
</div>


	</div>
        <div class="southindianbox box" style="color:#000;">
		 <div class="foodtype"><img src="assets/img/veg.png" height=35px/></div>
					  <div id="product-grid">
	<!--<div class="txt-heading">Products</div>-->
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM product_list where cuisine_type='SOUTHINDIAN' and availability='YES' and hide='NO' and restaurant='".$_SESSION['restaurant']."'");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?><div class="product-item-container">
		<div class="product-item">
			<!--<form id="frmCart">-->
			<div class="product-image" style="background-image:url('<?php echo $product_array[$key]["image"]; ?>');"></div>
			<div class="product-name"><?php echo $product_array[$key]["name"]; ?></div>
			<div class="product-price"><?php echo "&#x20B9;".$product_array[$key]["price"]; ?></div>
			<div ><input class="input_quant" title="Enter quantity, use 0.5 to order HALF" style="border-radius:4px; font-size:10px;" type="text" id="qty_<?php echo $product_array[$key]["code"]; ?>" name="quantity" value="1" size="2" />
			<?php
				$in_session = "0";
				if(!empty($_SESSION["cart_item"])) {
					$session_code_array = array_keys($_SESSION["cart_item"]);
				    if(in_array($product_array[$key]["code"],$session_code_array)) {
						$in_session = "1";
				    }
				}
			?>
			<input style="border-radius:4px; text-align:center; " type="button" id="add_<?php echo $product_array[$key]["code"]; ?>" value="Add to cart" class="btnAddAction cart-action" onClick = "cartAction('add','<?php echo $product_array[$key]["code"]; ?>')" <?php if($in_session != "0") { ?>style="display:none" <?php } ?> />
			<input style="border-radius:4px;  text-align:center; color:#fff; background-color:#8B3BF2;  display:none;" type="button" id="added_<?php echo $product_array[$key]["code"]; ?>" value="Added" class="btnAdded" <?php if($in_session != "1") { ?>style="display:none" <?php } ?> />
			</div>
			<!--</form> -- no need of form nesting-->
		</div></div>
	<?php
			}
	}
	?>
</div>

		
		
		
		</div>
		</div><!-- end of restaurant select-->
	
 <!-- Select Food Type functionality apparent DIVS ends-->
 <!-- Element select starts ends-->
 
 
 
 
 
		<!-- checkbox and ratio buttons---
	<div class="element-checkbox"><label class="title">Checkboxes</label>		<div  ><label><input type="checkbox" name="checkbox[]" value="Checkbox 1"><span>Checkbox 1</span></label></div><span class="clearfix"></span>
		<div class="column column3"><label><input type="checkbox" name="checkbox[]" value="Checkbox 2"><span>Checkbox 2</span></label></div><span class="clearfix"></span>
		<div class="column column3"><label><input type="checkbox" name="checkbox[]" value="checkbox 3"><span>checkbox 3</span></label></div><span class="clearfix"></span>
</div>
	<div class="element-radio"><label class="title">Radio Buttons</label>		<div class="column column3"><label><input type="radio" name="radio" value="Radio Button 1"><span>Radio Button 1</span></label></div><span class="clearfix"></span>
		<div class="column column3"><label><input type="radio" name="radio" value="Radio Button 2"><span>Radio Button 2</span></label></div><span class="clearfix"></span>
		<div class="column column3"><label><input type="radio" name="radio" value="Radio Button 3"><span>Radio Button 3</span></label></div><span class="clearfix"></span>
</div>
 
	<!-- Shopping Cart Table Starts-->
	<div class="clear-float"></div>
<div id="shopping-cart">
<div class="txt-heading" style="font-family:Museo; font-size:1.5em;">Shopping Cart <a id="btnEmpty" class="cart-action" onClick="cartAction('empty','');"><span class="emptcrt">Empty Cart</span></a></div>
<div id="cart-item"></div>
</div>
<script>
$(document).ready(function () {
	cartAction('','');
})
</script>

		<!-- Shopping Cart Table ends-->

	<div class="element-phone"><label class="title">Phone</label><input class="large" type="tel" pattern="[[0-9]{10}" maxlength="10" title="Enter a valid Phone number" required name="phone" value="">
	<span class="state"  ><br/>City: Your City &#9989;
	</span>
	</div>
	
	<div class="element-address"><label class="title">Address/Room Number</label>
	<span class="addr1"><input type="text" required name="address_line1">
	<label class="subtitle">Street Address/Hostel</label></span>
	
	<span class="addr2"><input type="text" name="address_line2">
	<label class="subtitle">Location</label></span>
	
		<!-- location selector in style-->
	<div class="country"><select required name="delivary_location"  >
	<option value="Your Places">Your Places</option>
	<option value="Your Places">Your Places</option>
	<option value="Your Places">Your Places</option>

	
	</select>
	
	<div class="btn-group select">
	
	<!-- <i class="dropdown-arrow dropdown-arrow-inverse"></i>
	
	<button class="btn dropdown-toggle clearfix btn-huge btn-primary" data-toggle="dropdown">
	<span class="filter-option pull-left"></span>&nbsp;</button>
	
	<ul class="dropdown-menu dropdown-inverse" role="menu" style="max-height: 81.625px; overflow-y: auto; min-height: 102px;">
	 <li rel="1"><a tabindex="-1"   class=""><span class="pull-left">United States</span></a></li>
	 <li rel="2"><a tabindex="-1"   class=""><span class="pull-left">United Kingdom</span></a></li>

	 </ul>
	 
	 <div class="caret"></div>--></div><i></i>
	</div>

		<!-- location selector in style ends-->
	<span class="state" >Minimum delivery time is assumed to be 30 minutes &#9989;
	</span>
	<!--
	<span class="zip"><input type="text" maxlength="15" name="address[zip]">
	<label class="subtitle">Postal / Zip Code</label></span>-->
	
	</div>
	
	<?php if(isset($_SESSION['id_facebook'])){
echo"<div class=\"submit\"><input type=\"submit\" name=\"submit_order\" value=\"Order\"></div>";
}
else{echo"<div class=\"submit\" style=\"padding-right:25px;\"><b><a href=\"#mu-about-us2\">Please Login</a></b></div>";}
?>
	
	</form>
	
	
	
	
	
	
  </section>
  
  
  
  
  <!-- End About us -->

  <!-- Start Counter Section -->
  <section id="mu-counter">
   <?php include("pages/counter.php"); ?>
  </section>
  <!-- End Counter Section --> 
  

   
  <!-- Start Restaurant Menu --
  <section id="mu-restaurant-menu">
   <?php //include("pages/menu.php"); ?>
  </section> 
  <!-- End Restaurant Menu -->

  
  
  <!-- Start Reservation section -->
  <section id="mu-reservation">
     <?php include("pages/reservation.php"); ?>
  </section>  
  <!-- End Reservation section -->

  
  <!-- Start Client Testimonial section -->
  <section id="mu-client-testimonial">
    
  </section>
  <!-- End Client Testimonial section -->

  <!-- Start Subscription section -->
  <section id="mu-subscription">
   <?php include("pages/subscribe_us.php");?>   
  </section>
  <!-- End Subscription section -->

  <!-- Start Chef Section -->
  <section id="mu-chef">
        <?php include("pages/starfeeds.php"); ?>
  </section>
  <!-- End Chef Section -->

  <!-- Start Latest News
  <section id="mu-latest-news">
    
  </section>
  <!-- End Latest News -->

  <!-- Start Contact section -->
  <section id="mu-contact" style="background-color:#EFEFEF;">
  <?php include("pages/contact_us.php"); ?>
  </section>
  <!-- End Contact section -->


  <!-- Start Footer -->
 <?php include("pages/footer.php");
mysql_close($gtx_connection); //closing all open connections
//unset($_SESSION['restaurant']);?>
  <!-- End Footer -->
  </body>
</html>