<?php
ob_start();
require("../../../of_course/constants_2.php");// -->on server
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
 

  <link rel="stylesheet" type="text/css" href="../css/form.css" />

 
	
<style>
label{font-size:14px;}
form.register input[type=text]{background:#ffffff; color:#000000;font-size:14px; height:22px; width:230px;}
 form.register select{background:#ffffff; font-size:14px;color:#000000; height:22px; width:230px;}
  form.register input[type=date]{background:#ffffff; font-size:14px;color:#000000; height:22px; width:230px;  
    border: 1px solid #E1E1E1; border-radius:4px;}

</style>


</head>
<body>

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


//queries for inserting new item to database
$gtx_query="SELECT * from product_list";
$gtx_query.=" WHERE code='{$_GET['product_code']}'";
$gtx_result=mysql_query($gtx_query,$gtx_connection);

	while($row=mysql_fetch_assoc($gtx_result))
	{$new_name=$row['name'];
	$new_price=$row['price'];
	$new_cuisine_type=$row['cuisine_type'];
	$new_available_half=$row['available_half'];
		
	}
mysql_close($gtx_connection);
?>



        <form action="modify_stage_2_process.php?product_code=<?php echo $_GET['product_code'];?>" class="register" enctype="multipart/form-data" method="POST" name="modify_process">
		

           	<span style="font-size:40px; color:#058AA8; font-family:Museo;"> Modify product details</span><br>
			
  <br/>
                <p>
                    <label >Item Name
                    </label>
                    <input type="text" required name="item_name" value="<?php echo $new_name;?>" title="Item name can not be left blank"/>
                </p>
               
			   <p>
                    <label>Cuisine 
                    </label>
                    <select  name="cuisine" value="<?php echo $new_cuisine_type;?>" name="course"  required >
                        <option value="VEG">Vegetarian
                        </option>
                        <option value="NONVEG">Non-Vegetarian
                        </option>
                          <option value="CHINESE">Chinese
                        </option>
                        <option value="SOUTHINDIAN">South Indian
                        </option>

                 
                    </select>
                </p>

 <p>
               
		      <label >Pricing &#x20B9;
                    </label>
  <input type="range" name="set_price"  id="pricing"  onchange="textbox1.value = pricing.value" min="5" max="995" step="10" title="Pricing per one serve for this item"  >
 
    <input id="textbox1" required style="width:85px;"type="text" pattern="[0-9]{1,3}" name="pricing_this" value="<?php echo $new_price;?>" title="Pricing per one serve for this item"/>
    <br>

			   </p>
			    <p>
                    <label>Available Half 
                    </label>
                    <select  name="available_half"  required >
                        <option value="YES">Yes
                        </option>
                        <option value="NO">No
                        </option>
                  
                    </select>
                </p>
   <p>
                    <label>Hide Item
                    </label>
                    <select  name="hide"  required >
                        <option value="NO">No
                        </option>
                        <option value="YES">Yes
                        </option>
                  
                    </select>
 </p>
			   <?php 
			   
			   echo"<br> <div style=\"color:#ffffff;font-size:14px;border-radius:4px;background:#0DAACE;height:20px;width:100%;padding-top:1px;padding-left:3px;\">Please save the details after required modification</div>";
			?>
			 
		
			 
			 <div style="background: #E1E1E1; height:2px;width:100%; display:inline-block;"></div>
			  


To update the <b>picture</b> as well, you will need to delete this item and add it as a new item.<br><br/>
<br/>
<p>
	
<input class="button" type="submit" value="Save" name="submit">
</p>

</form>

	  
			</body></html>