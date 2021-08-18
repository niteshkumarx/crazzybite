<?php
ob_start();
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

	.upload{opacity:1;background:#0DAACE;}
	.upload:hover{opacity:.8;background:#0DAACE;}
</style>


</head>
<body>
        <form action="add_products_process.php" class="register" enctype="multipart/form-data" method="POST" name="add_new_items">
		

           	<span style="font-size:40px; color:#058AA8; font-family:Museo;"> Add new items</span><br>
			
  <br/>
                <p>
                    <label >Item Name
                    </label>
                    <input type="text" required name="item_name" placeholder=" Anything " title="Item name can not be left blank"/>
                </p>
               
			   <p>
                    <label>Cuisine 
                    </label>
                    <select  name="cuisine" name="course"  required >
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
                    <label >Product Code
                    </label>
             		
					 
      <input type="text" value="" title="Product Code should be unique, should be preceded by restaurant initials to avoid confusion"   class="long" autocomplete="off" required name="product_code"/>
 </p>
 <p>
               
		      <label >Pricing &#x20B9;
                    </label>
  <input type="range" name="set_price"  id="pricing"  onchange="textbox1.value = pricing.value" min="5" max="995" step="10" title="Pricing per one serve for this item"  >
 
    <input id="textbox1" required style="width:85px;"type="text" pattern="[0-9]{1,3}" name="pricing_this" title="Pricing per one serve for this item"/>
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
                    <label>Restaurant <!-- More restaurants can be added from here-->
                    </label>
                    <select  name="restaurant_name"  required >
                <option value="Crazzy Bite">Crazzy Bite </option>
		<option value="Clark">Clark</option>
		<option value="Cinnemon" >Cinnemon</option>
		<option value="President" >President </option>
                <!-- Be careful the restaurant names should be exactly same with one in the home page index.php -->
                    </select>
                </p>
				
			   <?php if(isset($_GET['redundant_insert']))
			   
			   {echo"<br> <div style=\"color:#ffffff;font-size:14px;border-radius:4px;background:#0DAACE;height:20px;width:100%;padding-top:1px;padding-left:3px;\">An item with the same product code is already existing in the database, Please use different code.</div>";}
			   else{
             echo" <br>";}?>
			 
			   <?php if(isset($_GET['success_insert']))
			   
			   {echo"<br> <div style=\"color:#ffffff;font-size:14px;border-radius:4px;background:#0DAACE;height:20px;width:100%;padding-top:1px;padding-left:3px;\">You have successfully added one item to the database.</div>";}
			   else{
             echo" <br>";}?>
			 
			 <div style="background: #E1E1E1; height:2px;width:100%; display:inline-block;"></div>
			  


Set a <b>picture</b> for your food item<br><br/>
<p>
<label class="upload" style="color:#ffffff;font-size:14px;border-radius:4px;height:30px;width:150px;padding-top:5px;padding-left:5px;padding-right:17px;" for="fileToUpload"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span style="color:#fff;">Choose a file</span></label>
   <input type="file" name="fileToUpload" required style="opacity:0;"  id="fileToUpload"></p><br/>
<p>
	
<input class="button" type="submit" value="Add Item" name="submit">
</p>

</form>

	  
			</body></html>