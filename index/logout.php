<?php
require_once('init.php');
 
 $fbauth->signout();
 
 header("Location: index.php");
//logout.php
 ?>