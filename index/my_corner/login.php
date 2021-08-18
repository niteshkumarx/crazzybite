<?php
session_start();
if(isset($_SESSION['admin_id'])&&isset($_SESSION['admin_name'])&&isset($_SESSION['restaurant_branch']))
{header("Location:index.php");}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     	<meta name="description" content="Order Food Online | Crazzy Bite" />
		<meta name="keywords" content="MMMUT, Food, Food Ordering Online, Gorakhpur, Crazy Bite, Crazzy Bite, MMMEC, mmmec, mmmut, crazzy, crazzy bite
										chilli paneer, Manchurian, south indian dishes, chinese food, uttar pradesh, subhash bhawan, saraswati bhawan,
										chicken, mutton, engineering, anuradha, maggi point, kudaghat, mohaddipur, ranidiha, fried rice, chicken masala,
										veg biriyani, restaurant, hungry, salt restaurant, clark grannd, mess, diet, vegetarian, non vegetarian" />
		<meta name="author" content="Nitesh" />
    <title>Login | Order your hot and spicy meals online </title>
		<meta name="author" content="Nitesh" />
		
		<link rel="stylesheet" type="text/css" href="../css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="../css/demo.css" />
		<link rel="stylesheet" type="text/css" href="../css/component.css" />
		<script src="../js/modernizr.custom.js"></script>

				<!--tooltip-->
			<link rel="stylesheet" type="text/css" href="../css/default.css" />
		<link rel="stylesheet" type="text/css" href="../css/component_tooltip.css" />
		<script src="../js/modernizr.custom.js"></script>
		
		<link rel="icon" href="../assets/img/favicon.ico" type="image/x-icon"/>
<script src="../js/jquery.min.js"></script>		
		<script>
		
$(document).ready(function(){



 $("#register_request").delay(500).click(function(){
        $("#already_registered").fadeOut("medium");
		});
		
 $("#register_request").click(function(){
        $("#register_now").delay(500).fadeIn("medium");
		});		
		
$("#cancel_register_request").delay(500).click(function(){
        $("#register_now").fadeOut("medium");
		});
		
 $("#cancel_register_request").delay(500).click(function(){
        $("#already_registered").fadeIn("medium");
		});
				
				
				
});
		
		
		</script>


</head>

<body onLoad="swapPic();">
<div class="topbarforprofile"><center><a href="../index.php" title="Back to Crazzy Bite"><img src="images/ast_white.png" style="padding-top:6px;"height="38px;"/></a></center></div>
<div class="midbarXX"></div>
<div id="wrapper">
<div class="laa"><br><br><img src="images/login/laa.png"/></div>
<link rel="stylesheet" type="text/css" href="../css/form.css" />
<link rel="stylesheet" type="text/css" href="../css/asteroidlearning.css" />
<link rel="stylesheet" type="text/css" href="../css/login.css" />

<!-- New start from here-->

 
<?php include("includes/tabsprofile.php"); ?>


<!-- Case of already registered -->
<div class="login_box" id="already_registered"><br><br><br>
        <form action="adminloginprocess.php" class="register" method="POST" name="admin_already_registered">
    <p>
                    <label style="color:#ffffff; font-size:20px;">Email 
                    </label>
                    <input type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required style="background:#ffffff; height:25px; width:250px;" placeholder="    Your Email" name="admin_email" autocomplete="off" title="Enter a valid email ID"/>
                </p>
                <p>
                    <label style="color:#ffffff; font-size:20px;">Password &nbsp;
                    </label>
                    <input type="password" required style="background:#ffffff; height:25px; width:250px;" id="password" placeholder="    Your Password" name="admin_password" autocomplete="off"/>
</p>
<p><center><button class="login_submit" type="submit" name="admin_login_submit" >Login</button></p></center>
</form><center>
<span style="font-size:10px;color:#ffffff;">Not yet registered | <a id="register_request" class="linky"style="color:#cccccc;cursor:pointer;">Register Now</a></span>

<?php if(isset($_GET['authentication_error']))
{
echo"<center><span style=\"font-size:10px;color:#ffffff;\">Oops, seems you entered an incorrect Email or Password | </span>
<span style=\"font-size:10px;\" class=\"linky\"><a title=\"In case you forgot password please call Casita Studios to reactivate your account\" style=\"color:#3399FF;cursor:pointer;\">Forgot Password</a></span><center>";
}

else if(isset($_GET['registration_error']))
{
echo"<center><span style=\"font-size:10px;color:#ffffff;\">There's already an account associated to this Email Id, please try another </span>";

}



?>

</center>
</div>
<!-- Case of already registered ends -->
<!-- Case of register now -->
<div class="login_box" id="register_now" style="display:none;"><br><br>


        <form action="adminregistrationprocess.php" class="register" method="POST" name="admin_login_registration">
					<p>
                    <label style="color:#ffffff; font-size:20px;">Name 
                    </label>
                    <input type="text" required style="background:#ffffff; height:25px; width:250px;" placeholder="    Your name" name="admin_name" autocomplete="off" title="Your name is essential"/>
					</p>
					<p>
                    <label style="color:#ffffff; font-size:20px;">Email 
                    </label>
                    <input type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required style="background:#ffffff; height:25px; width:250px;" placeholder="    Enter your email" name="admin_email" autocomplete="off" title="Enter a valid email ID"/>
					</p>
					<p>
                    <label style="color:#ffffff; font-size:20px;">Password &nbsp;
                    </label>
                    <input type="password" required style="background:#ffffff; height:25px; width:250px;" id="password" placeholder="    Choose a password" name="admin_password" autocomplete="off"/>
					</p>
<p><center><button class="login_submit" type="submit" name="admin_registration_submit" >Register Now</button></p></center>
</form><center>
<span style="font-size:10px;color:#ffffff;">Already registered | <a id="cancel_register_request" class="linky"style="color:#cccccc;cursor:pointer;">Go back </a></span>


</center>
</div>
<!-- Case of register now ends-->

<!--
 <div class="textbody"> </div>
<div class="bodycolumn1"  style="color:#000000;">  

<img src="images/loginwhy.png">

</div>
-->
</div>
<div class="copyleftXX">© 2017, <a href="http://casitastudios.com" target="_blank" style="color:#ffffff;">Powered by Casita Studios</a> | India</div>    



</body>

</html>