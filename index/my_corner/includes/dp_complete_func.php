<?php include("includes/loadimage.php");
if(!$dp_result==NULL||!$dp_result==""){
echo "<div class=\"dp\" style=\"background-image:url({$dp_result});\"></div>";
}
else{
echo "
<div class=\"dp\"><br><br><br><br>
<form class=\"uploadform\" method=\"post\" enctype=\"multipart/form-data\" action='includes/upload.php'>
<center><label class=\"myLabel\">
    <input type=\"file\"  name=\"imagefile\" class=\"test_dp\"/>	
    <span style=\"font-size:12px;\">Upload Display Picture</span>
</label></center>

<center><label class=\"myLabel\">
    <input type=\"submit\" value=\"Apply\"  name=\"submitbtn\" id=\"submitbtn\" class=\"test_dp\"/>	
</label></center>

</form></div>";
}
  ?>