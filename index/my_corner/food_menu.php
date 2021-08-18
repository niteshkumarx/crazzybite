<?php
require("../../../of_course/constants_2.php");
require_once("../../../of_course/dbcontroller.php");
//require_once("../dbcontroller.php");
$db_handle = new DBController();
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

           	<span style="font-size:40px; color:#058AA8; font-family:Museo;"> Menu </span><br><br>
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
	<script type="text/javascript" src="../assets/js/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("#manu").change(function(){
        $(this).find("option:selected").each(function(){
            if($(this).attr("value")=="Veg"){
                $(".box").not(".vegbox").slideUp(200);
                $(".vegbox").delay(300).slideDown(200);
            }
            else if($(this).attr("value")=="NonVeg"){
                $(".box").not(".nonvegbox").slideUp(200);
                $(".nonvegbox").delay(300).slideDown(200);
            }
            else if($(this).attr("value")=="Chinese"){
                $(".box").not(".chinesebox").slideUp(200);
                $(".chinesebox").delay(300).slideDown(200);
            }
            else if($(this).attr("value")=="SouthIndian"){
                $(".box").not(".southindianbox").slideUp(200);
                $(".southindianbox").delay(300).slideDown(200);
            }
            else{
                $(".box").hide();
            }
        });
    }).change();
});
</script>

<!-- Select Food Type functionality ends-->


<!-- Start Formoid form-->

<link rel="stylesheet" href="../formoid-metro-purple.css" type="text/css">

<form enctype="multipart/form-data" class="formoid-metro-purple" style="background-color: #FFFFFF; font-size: 14px; font-family: 'Open Sans','Helvetica Neue','Helvetica',Arial,Verdana,sans-serif; color: #666666; max-width: 880px; min-width: 200px" action="order_process.php" method="post" >
<div class="title" style="background-color: #0070C0; color:#fff;"><h2>Current Live Menu</h2></div>
	
	<div class="element-input"><label class="title"><br/></label>

	
	<!-- Element select starts-->
	<div class="element-select"><label class="title">Choose Meal Type</label><div class="large"><span>
	
	<select name="select_food" required id="manu">
		<option value="Selectx">Select</option>
		<option value="Veg">Vegetarian </option>
		<option value="NonVeg">Non-Vegetarian </option>
		<option value="Chinese" >Chinese  </option>
		<option value="SouthIndian" >South Indian </option>
		</select>
		
		<div class="btn-group select">
	 
	 
	 
	 

		
		
		
		 </div><i></i></span></div></div>
<!-- Select Food Type functionality apparent DIVS-->
<link href="style_product.css" type="text/css" rel="stylesheet" />
<!-- Testing for E-commerce Begins-->
		  <div class="vegbox box" id="#vegbox" style="color:#000;"><!--You have selected <strong>red option</strong> so i am here-->
		 <div class="foodtype"><img src="../assets/img/veg.png" height=35px/></div>

		  <div id="product-grid">
	<!--<div class="txt-heading">Products</div>-->
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM product_list where cuisine_type='VEG' and availability='YES' and hide='NO' ");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?><div class="product-item-container">
		<div class="product-item">
			<!--<form id="frmCart">-->
			<div class="product-image" style="background-image:url('<?php echo"../". $product_array[$key]["image"]; ?>');"></div>
			<div class="product-name"><?php echo $product_array[$key]["name"]; ?></div>
			<div class="product-price"><?php echo "&#x20B9;".$product_array[$key]["price"]; ?></div>
		<div class="product-price"><?php echo "CODE: ".$product_array[$key]["code"]; ?></div>
			<!--</form> -- no need of form nesting-->
		</div></div>
	<?php
			}
	}
	?>
</div>



		  
		  
		  </div> <!--testing for e commerce ends-->
    <div class="nonvegbox box" style="color:#000;">
			 <div class="foodtype"><img src="../assets/img/nonveg.png" height=35px/></div>
	 <div id="product-grid">
	<!--<div class="txt-heading">Products</div>-->
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM product_list where cuisine_type='NONVEG' and availability='YES' and hide='NO' ");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?><div class="product-item-container">
		<div class="product-item">
			<!--<form id="frmCart">-->
			<div class="product-image" style="background-image:url('<?php echo"../". $product_array[$key]["image"]; ?>');"></div>
			<div class="product-name"><?php echo $product_array[$key]["name"]; ?></div>
			<div class="product-price"><?php echo "&#x20B9;".$product_array[$key]["price"]; ?></div>
				<div class="product-price"><?php echo "CODE: ".$product_array[$key]["code"]; ?></div>
			<!--</form> -- no need of form nesting-->
		</div></div></form>
	<?php
			}
	}
	?>
</div>



	</div>
	
    <div class="chinesebox box" style="color:#000;">
		 <div class="foodtype"><img src="../assets/img/veg.png" height=35px/><br/>
		 		<img src="../assets/img/nonveg.png" height=35px style="margin-top:5px;"/></div>
			  <div id="product-grid">
	<!--<div class="txt-heading">Products</div>-->
		<?php
	$product_array = $db_handle->runQuery("SELECT * FROM product_list where cuisine_type='CHINESE' and availability='YES' and hide='NO'");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?><div class="product-item-container">
		<div class="product-item">
			<!--<form id="frmCart">-->
			<div class="product-image" style="background-image:url('<?php echo"../". $product_array[$key]["image"]; ?>');"></div>
			<div class="product-name"><?php echo $product_array[$key]["name"]; ?></div>
			<div class="product-price"><?php echo "&#x20B9;".$product_array[$key]["price"]; ?></div>
				<div class="product-price"><?php echo "CODE: ".$product_array[$key]["code"]; ?></div>
			<!--</form> -- no need of form nesting-->
		</div></div>
	<?php
			}
	}
	?>
</div>


	</div>
        <div class="southindianbox box" style="color:#000;">
		 <div class="foodtype"><img src="../assets/img/veg.png" height=35px/></div>
					  <div id="product-grid">
	<!--<div class="txt-heading">Products</div>-->
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM product_list where cuisine_type='SOUTHINDIAN' and availability='YES' and hide='NO'");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?><div class="product-item-container">
		<div class="product-item">
			<!--<form id="frmCart">-->
			<div class="product-image" style="background-image:url('<?php echo "../".$product_array[$key]["image"]; ?>');"></div>
			<div class="product-name"><?php echo $product_array[$key]["name"]; ?></div>
			<div class="product-price"><?php echo "&#x20B9;".$product_array[$key]["price"]; ?></div>
				<div class="product-price"><?php echo "CODE: ".$product_array[$key]["code"]; ?></div>
			<!--</form> -- no need of form nesting-->
		</div></div>
	<?php
			}
	}
	?>
</div>
</div>
<div class="btn-group select"></div>

</form>











<?php
			mysql_close($gtx_connection);
			
		?>	
	</body></html>