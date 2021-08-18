<?php
session_start();
?>
<?php

if(isset($_GET['logout_requwst'])){
// remove all session variables
unset($_SESSION['admin_id']);
unset($_SESSION['admin_name']);
unset($_SESSION['restaurant_branch']);
header("Location: login.php");
}


else{
header("Location: login.php");

}

?>