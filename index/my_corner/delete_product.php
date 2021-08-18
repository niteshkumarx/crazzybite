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

</style>


</head>
<body>
        <form action="delete_product_process.php" class="register" enctype="multipart/form-data" method="POST" name="delete_items">
		

           	<span style="font-size:40px; color:#058AA8; font-family:Museo;"> Delete an item</span><br>
			
  <br/>
               
               
			  
<p>
                    <label >Product Code
                    </label>			 
      <input type="text" value="" title="Every product code is unique, you may refer product code from See List tab"   class="long" autocomplete="off" required name="product_code"/>
 </p>

			
				
			   <?php	if(isset($_GET['delete_fail']))
			   
			   {echo"<br> <div style=\"color:#ffffff;font-size:14px;border-radius:4px;background:#0DAACE;height:20px;width:100%;padding-top:1px;padding-left:3px;\">Deleting Failed. The product code does not match with any item in the menu.</div>";
				 }
			   else{
             echo" <br>";
			 }
		
			 ?>
			 
			   <?php if(isset($_GET['delete_success']))
			   {echo"<br> <div style=\"color:#ffffff;font-size:14px;border-radius:4px;background:#0DAACE;height:20px;width:100%;padding-top:1px;padding-left:3px;\">Item successfully deleted from the database.</div>";
		   	
			 }
			   else{
             echo" <br>";
			       }?>
			 
			 <div style="background: #E1E1E1; height:2px;width:100%; display:inline-block;"></div>
			  


Deleting an item will <b>permanently remove</b> it from your menu. Please be careful.<br><br/>

<p>
	
<input class="button" type="submit" value="Delete Item" name="submit">
</p>

</form>

	  
			</body></html>