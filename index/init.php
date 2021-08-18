<?php 
session_start();
require_once('facebook-php-sdk-v4-5.0.0/src/Facebook/autoload.php');

require_once('login.php');
//Please Make a Facebook App and enter your App ID and App Secret
$fb= new Facebook\Facebook([
  'app_id' => ' ',
  'app_secret' => ' ',
  'default_graph_version' => 'v2.6',
]);

$fbauth= new FacebookAuth($fb);
//init.php
?>