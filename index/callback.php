<?php
require_once('init.php'); 

if($fbauth->login()){

header('Location:index.php');

}
else{

die('Error logging in, Please Retry');
}

//callback.php

?>