<?php
ob_start();
require("../../../of_course/constants_2.php");// -->on server
//require("../includes/constants.php"); //-->on local machine
session_start();
//security divert

if(!isset($_POST['pricing_this'])||!isset($_SESSION['admin_id'])||!isset($_SESSION['admin_name'])||!isset($_SESSION['restaurant_branch']))
{
header("Location:../");}
//security divert
?>
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
//queries for uploading the image to website
$target_dir = "../product-images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
//end of queries for uploading the image to website

//queries for inserting new item to database
$gtx_query="SELECT * from product_list";
$gtx_query.=" WHERE code='{$_POST['product_code']}'";
$gtx_result=mysql_query($gtx_query,$gtx_connection);

if(!mysql_num_rows($gtx_result)==0)
{ 
header("Location:index.php?redundant_insert=2");
	mysql_close($gtx_connection);
}
else{
	$pic_loc="product-images/".basename($_FILES["fileToUpload"]["name"]);
$_POST['item_name']=ucwords($_POST['item_name']);
$_POST['product_code']=strtoupper($_POST['product_code']);
	
$gtx_query="INSERT INTO product_list";
$gtx_query.=" (code,name,price,image,cuisine_type,availability,available_half,hide,restaurant) ";
$gtx_query.="VALUES('{$_POST['product_code']}','{$_POST['item_name']}','{$_POST['pricing_this']}','{$pic_loc}','{$_POST['cuisine']}',";
$gtx_query.="'YES','{$_POST['available_half']}','NO','{$_POST['restaurant_name']}')";
$gtx_result=mysql_query($gtx_query,$gtx_connection);	

	mysql_close($gtx_connection);
	header("Location:index.php?success_insert=1");
}




?>