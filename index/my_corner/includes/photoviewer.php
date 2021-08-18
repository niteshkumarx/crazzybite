<?php if(!$dp_result==NULL||!$dp_result=="")
{

echo"<script src=\"../js/jquery.min.js\"></script>
<script>	 
$(document).ready(function(){
        $(\".asteroid_photoviewer\").hide();
		  $(\".pic_control\").hide();
		  
		 $(\".dp\").click(function(){
        $(\".asteroid_photoviewer\").fadeIn(500);
			});
			
		 $(\".dp\").click(function(){
        $(\".pic_control\").delay(500).slideDown(500);
		});
		
			  $(\".asteroid_photoviewer\").click(function(){
        $(\".asteroid_photoviewer\").fadeOut(500);
			});
				  $(\".asteroid_photoviewer\").click(function(){
        $(\".pic_control\").slideUp(500);
			});
});
</script>";


echo "<div class=\"asteroid_photoviewer\" style=\"top:0px;\">
<center>
<img src=\"{$dp_result}\" class=\"enlarged_image\"/>
</center></div>";
echo
"<div class=\"pic_control\" style=\"top:0px;\"><br/><form class=\"uploadform\" method=\"post\" enctype=\"multipart/form-data\" action='includes/upload.php?del_old_pic=\"1\"&old_path=\"$dp_result\"'>
<center><label class=\"myLabel\">
    <input type=\"file\"  name=\"imagefile\" class=\"test_dp\"/>	
    <span style=\"font-size:12px; color:#000000;\ id=\"changedispic\">Change Display Pic</span>
</label></center>

<center><label class=\"myLabel\">
    <input type=\"submit\" value=\"Apply\"  name=\"submitbtn\" id=\"submitbtn\" class=\"test_dp\"/>	
</label></center>

</form></div>

";}
//photoviewer end?>
