<?php
require("../../../../of_course/constants.php");// -->on server
//require("../../includes/constants.php");// -->on local machine
   $db = new mysqli(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
	
	if(!$db) {
	
		echo 'Could not connect to the database.';
	} else {
	
		if(isset($_POST['queryString'])) {
			$queryString = $db->real_escape_string($_POST['queryString']);
			
			if(strlen($queryString) >0) {

				$query = $db->query("SELECT city,city_state FROM cities WHERE city LIKE '$queryString%' LIMIT 10");
				if($query) {
				echo '<ul>';
					while ($result = $query ->fetch_object()) {
	         			echo '<li onClick="fill(\''.addslashes($result->city)." | ".addslashes($result->city_state).'\');">'.$result->city." | ".$result->city_state.'</li>';
	         		}
				echo '</ul>';
					
				} else {
					echo 'OOPS we had a problem :(';
				}
			} else {
				// do nothing
			}
		} else {
			echo 'There should be no direct access to this script!';
		}
	}
?>