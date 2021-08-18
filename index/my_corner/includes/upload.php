<?php
session_start();
ob_start();
if(isset($_GET['del_old_pic']))
{
$del_pic=$_GET['old_path'];
unlink('../'.$del_pic);
}
$file_formats = array("jpg", "png", "gif", "bmp");

$filepath = "../upload_images/";
$filepath_one_level_up="upload_images/";
if ($_POST['submitbtn']=="Apply")  {

 $name = $_FILES['imagefile']['name']; // filename to get file's extension
 $size = $_FILES['imagefile']['size'];
 
 if (strlen($name)) {
 	$extension = substr($name, strrpos($name, '.')+1);
 	if (in_array($extension, $file_formats)) { // check it if it's a valid format or not
 		if ($size < (2048 * 1024)) { // check it if it's bigger than 2 mb or no
 			$imagename = md5(uniqid() . time()) . "." . $extension;
 			$tmp = $_FILES['imagefile']['tmp_name'];
			
						
 				if (move_uploaded_file($tmp, $filepath . $imagename)) {
 					echo '<img class="preview" alt="" src="'.$filepath.'/'. $imagename .'" />';
 				} else {
 					echo "Could not move the file.";
 				}
 		} else {
 			echo "Your image size is larger than 2MB.";
 		}
 	} else {
 			echo "Invalid file format.";
 	}
 } else {
 	echo "Please select image";
 }

}
 $_SESSION['tempimagepath']="{$filepath_one_level_up}"."{$imagename}";
 $i=0;
 if($i<3)
 {$i=$i+1;
 
 if($i=2)
 {header("Location:pathsto_db.php");
 }
 
 }
	?>
			


	
			
			
	