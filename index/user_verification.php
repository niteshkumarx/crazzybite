			
			 <link rel="stylesheet" type="text/css" href="css/login.css" />
			 <?php
			 require("../../of_course/constants_2.php");
			//customer verification QUERY STARTS
			$gtx_connection=mysql_connect(DB_SERVER,DB_USER,DB_PASS);
			if(!$gtx_connection)
			{
			die(" Database Connection Failed".mysql_error());}
			
			$gtx_select=mysql_select_db(DB_NAME,$gtx_connection);
			if(!$gtx_select)
			{	die("Database Selection Failed ".mysql_error());
			}
			
			if(isset($_SESSION['id_facebook']))
			{
			$v_query="SELECT verified_user,block from user_database";
			$v_query.=" WHERE app_scoped_user_id='{$_SESSION['id_facebook']}'";
			$v_result=mysql_query($v_query,$gtx_connection);
			while($v_row=mysql_fetch_assoc($v_result))
			{$v=$v_row['verified_user'];
			 $user_block_status=$v_row['block'];	}			
			if($v=="VERIFIED"){echo"<div class=\"verified\" style=\"z-index:0;\"title=\"This user is verified\" ></div>";}//verified icon 
			}
			else
			{
				 $user_block_status='';
			}
			mysql_close($gtx_connection);
			//customer verification QUERY ENDS
			?>