<?php
ob_start();
session_start();
$_SESSION['restaurant']=$_GET['restaurant_name'];
require_once("../../of_course/dbcontroller.php");
$db_handle = new DBController();
?>

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
</div> 

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