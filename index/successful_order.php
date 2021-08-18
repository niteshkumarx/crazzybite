<?php 
ob_start();
session_start();

if(!isset($_SESSION["cart_item"]) || !isset($_SESSION['id_facebook']) || !isset($_GET['customer']))
{
header("Location:index.php?error=144");
}
   date_default_timezone_set('Asia/Calcutta'); //Change as per your default time
// removing all required session variables
unset($_SESSION["cart_item"]); 
// destroy the session 

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     	<meta name="description" content="Order Food Online | Crazzy Bite" />
		<meta name="keywords" content=" " />
		<meta name="author" content="Nitesh" />
    <title>Order Successful | Order your hot and spicy meals online </title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">

    <!-- Font awesome -->
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">   
    <!-- Slick slider -->
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css">    
    <!-- Date Picker -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datepicker.css">    
    <!-- Fancybox slider -->
    <link rel="stylesheet" href="assets/css/jquery.fancybox.css" type="text/css" media="screen" /> 
    <!-- Theme color -->
    <link id="switcher" href="assets/css/theme-color/red-theme.css" rel="stylesheet">     

    <!-- Main style sheet -->
    <link href="style.css" rel="stylesheet">    

   
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Tangerine' rel='stylesheet' type='text/css'>        
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Prata' rel='stylesheet' type='text/css'>
    

  

  </head>
  <body>  
  <!-- Pre Loader -->
  <div id="aa-preloader-area">
    <div class="mu-preloader">
      <img src="assets/img/preloader.gif" alt="Please Wait">
    </div>
  </div>
  <!--START SCROLL TOP BUTTON --
    <a class="scrollToTop" href="#">
      <i class="fa fa-angle-up"></i>
      <span>Top</span>
    </a>
  <!-- END SCROLL TOP BUTTON -->

  <!-- Start header section -->
  
  <?php //notification for successful order
 echo" <div style=\"background-color:#D60015; padding: 5px 0 5px 0;font-family:museo;color:#fff; text-align:center;\">&nbsp;Thank you ".$_GET['customer']." for using our service, your order is on its way.</div>";

  ?>
  <header id="mu-header">  
    <nav class="navbar navbar-default mu-main-navbar" role="navigation">  
      <div class="container">
        <div class="navbar-header">
             <br>                                             
          <a class="navbar-brand" href="index.html"><img src="assets/img/logo.png" style="max-height:125px;max-width:500px;" alt="Crazzy Bite"></a> 
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul id="top-menu" class="nav navbar-nav navbar-right mu-main-nav">
                                           
              </ul>
            </li>
          </ul>                            
        </div><!--/.nav-collapse -->       
      </div>          
    </nav> 
  </header>
  <!-- End header section -->
 

  <!-- Start slider  -->
  <section id="mu-slider">
       <?php include("pages/slider_success.php"); ?>
	   
  </section>
   
  <!-- End slider  -->
  


  <!-- Start Footer -->
 <?php include("pages/footer.php"); ?>
  <!-- End Footer -->
  </body>
</html>