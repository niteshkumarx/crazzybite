<?php
session_start();
require_once("../../of_course/dbcontroller.php");
$db_handle = new DBController();

if(!empty($_POST["action"])) {
switch($_POST["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM product_list WHERE code='" . $_POST["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'available_half'=>$productByCode[0]["available_half"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],$_SESSION["cart_item"])) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k)
								$_SESSION["cart_item"][$k]["quantity"] = $_POST["quantity"];
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_POST["code"] == $k)
						unset($_SESSION["cart_item"][$k]);
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;		
}
}
?>
<?php
if(isset($_SESSION["cart_item"])){
    $item_total = 0;
?>	
<link href="style_product.css" type="text/css" rel="stylesheet" />
<table cellpadding="10" class="shopping-cart-visibility-width" cellspacing="1">
<tbody>
<tr>
<th><strong>&nbsp;Name</strong></th>
<th><strong>Action</strong></th>
<th class="shopping-cart-visibility"><strong>Code</strong></th>
<th class="shopping-cart-visibility "><strong>Quantity</strong></th>
<th class="shopping-cart-visibility"><strong>Pricing</strong></th>


</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
		?>
				<tr>
				<td><?php echo "&nbsp;".$item["name"]; ?></td>
		<td align=left><a onClick="cartAction('remove','<?php echo $item["code"]; ?>')" class="btnRemoveAction cart-action">Remove Item</a></td>
				
			<td class="shopping-cart-visibility"><?php echo $item["code"]; ?></td>
				<td class="shopping-cart-visibility">
				<?php 	if($item["available_half"]=='YES'){
				 if($item["quantity"]>0 && $item["quantity"]<=0.5){echo "HALF";}
				 else if($item["quantity"]>0.5 && $item["quantity"]<=1){echo "1";}
				 else if($item["quantity"]>1){echo floor($item["quantity"]);}
				 else{echo "1";}}
				 
				 else if($item["available_half"]=='NO'){
				 	 if($item["quantity"]>0 && $item["quantity"]<=1){echo "1";}
				 else if($item["quantity"]>1){echo floor($item["quantity"]);}
				 else{echo "1";}
				 
				 }?></td>
				<td class="shopping-cart-visibility"><?php echo "&#x20B9;".$item["price"]; ?></td>
			
				</tr>
				<?php
//First Algorithm for items which are available as half	as well
				if($item["available_half"]=='YES'){
				if($item["quantity"]<=.5 && $item["quantity"]>0)
				{$item["quantity"]=.5;
				 $item_total += (($item["price"]*$item["quantity"])+10);
				 $item_total=ceil($item_total);
				}
				else if($item["quantity"]<.5 && $item["quantity"]<=1)
				{$item["quantity"]=1;
				 $item_total += ($item["price"]*$item["quantity"]);
				 $item_total=ceil($item_total);
				}
				else if($item["quantity"]>1){
				$item["quantity"]=floor($item["quantity"]);
				$item_total += ($item["price"]*$item["quantity"]);
				$item_total=ceil($item_total);
		         }
				 else{$item["quantity"]=1;
				 $item_total += ($item["price"]*$item["quantity"]);
				 $item_total=ceil($item_total);}}
				 
//Second Algorithm for items which are not available as half				 
				else if($item["available_half"]=='NO'){
				 if($item["quantity"]<=1 && $item["quantity"]>0)
				{$item["quantity"]=1;
				 $item_total += ($item["price"]*$item["quantity"]);
				 $item_total=ceil($item_total);
				}
				
				else if($item["quantity"]>1){
				$item["quantity"]=floor($item["quantity"]);
				$item_total += ($item["price"]*$item["quantity"]);
				$item_total=ceil($item_total);
		         }
				 else{$item["quantity"]=1;
				 $item_total += ($item["price"]*$item["quantity"]);
				 $item_total=ceil($item_total);}
				 
				  }
				  
				  $_SESSION["total_bill"]=$item_total;
		}
		?>
<tr><td colspan="5"><span style="color:#fff">&nbsp;</span></td></tr>
<tr>
<td colspan="5" align=left><strong>&nbsp;Total:</strong> <?php echo "&#x20B9;".$item_total; ?></td>
</tr>
</tbody>
</table>		
  <?php
}
?>