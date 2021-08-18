<!--functions for life-->
<?php 
require("../../of_course/constants_2.php");// -->on server
//require("../includes/constants.php");// -->on local machine
//FIRST FUNCTION


//SECOND FUNCTION
function check_pre_invitation($this_learner)
{
$gtx_connection=mysql_connect(DB_SERVER,DB_USER,DB_PASS);
if(!$gtx_connection)
{
	die(" Database Connection Failed".mysql_error());
}

$gtx_select=mysql_select_db(DB_NAME,$gtx_connection);
if(!$gtx_select)
{	die("Database Selection Failed ".mysql_error());
}
	

$gtx_query="SELECT * FROM pre_invitations";
$gtx_query.=" WHERE senders_email_id='".$_SESSION['email']."' AND reciever_email_id='".$this_learner."'";

$gtx_result=mysql_query($gtx_query,$gtx_connection);

if(mysql_num_rows($gtx_result)>0 )
{ 
$_SESSION['button_switch_invitation']=1;	

}
else{$_SESSION['button_switch_invitation']=0;	}

}
?>