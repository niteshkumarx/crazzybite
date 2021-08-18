<?php 

//login.php
class FacebookAuth
{	 protected $fb;
//Please Replace your Domain here
	 protected $facebookUrl="http://yourdomain.com/callback.php";
	 
	 public function __construct(Facebook\Facebook $fb){
		$this->facebook= $fb;
		}
		
	
	 public function getHelper(){
		return $this->facebook->getRedirectLoginHelper();
		
	 }
	 
	  public function getAuthUrl(){
		return $this->getHelper()->getLoginUrl($this->facebookUrl, array('email'));
		
	 }
	 
	 public function isLogin(){
	 return isset($_SESSION['id_facebook']);
	 }
	 
	  public function login(){
	try {
	$response=$this->facebook->get('me?fields=id,name,picture,email,link,gender,age_range', $this->getHelper()->getAccessToken());
	 
	 //you gotta list things you want $response=$this->facebook->get('me?fields=id,name,picture,email,link,gender', $this->getHelper()->getAccessToken());////
	 //here------------------------------------------------------------------^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
	 //capturing user details
	 $user=$response->getGraphUser();
	 //getGraphObject(); for emails
	 $user_obj=$response->getGraphObject();

	 
	$_SESSION['id_facebook']=$user->getId();
	$_SESSION['name']=$user->getName();
	$_SESSION['link']=$user->getLink();
	$_SESSION['email']=$user_obj->getProperty('email');
	$_SESSION['gender']=$user_obj->getProperty('gender');
	//$_SESSION['birthday']=$user_obj->getProperty('birthday');
	//there are lot more informations that can be retrieved but you will require permissions from Facebook for that.
	 return true;
	}
	
	catch(Exception $e){
	
	}
	
	return false;
	 }
	 
	 public function signout(){
		unset($_SESSION['id_facebook']);
	 }
	 
	 }
	 
	 


?>