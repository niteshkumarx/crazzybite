<?php
session_start();
date_default_timezone_set('Asia/Kolkata'); //Change as per your default time
?>
<!DOCTYPE html>
<html>
<head>

  <link rel="stylesheet" type="text/css" href="../css/form.css" />

 
	
<style>
label{font-size:14px;}
form.register input[type=text]{background:#ffffff; color:#000000;font-size:14px; height:22px; width:230px;}
 form.register select{background:#ffffff; font-size:14px;color:#000000; height:22px; width:230px;}
  form.register input[type=date]{background:#ffffff; font-size:14px;color:#000000; height:22px; width:230px;  
    border: 1px solid #E1E1E1; border-radius:4px;}

</style>


</head>
<body>
        <form action="submit_feedback_admin.php" class="register" method="POST" name="create_a_class">
		

           	<span style="font-size:40px; color:#058AA8; font-family:Museo;"> Admin Feedback</span><br>
			
  <br/><?php if(isset($_GET['success_feedback_admin']))
			   
			   {echo" <div style=\"color:#ffffff;font-size:14px;border-radius:4px;background:#0DAACE;height:20px;width:100%;padding-top:1px;padding-left:3px;\">Thank you so much for your valueable feedback, we will reply you soon.</div>";}
			   else{
             echo" <br>";}?>
                <p>
                    <label >Feed Title
                    </label>
                    <input type="text" required name="feed_name" placeholder=" Your feedback title " title="Feed title can not be left blank"/>
                </p>
               
			   <p>
                    <label>Rate Us 
                    </label>
                    <select  name="rating"  required >
                        <option value="1">1
                        </option>
                        <option value="2">2
                        </option>
                          <option value="3">3
                        </option>
                        <option value="4">4
                        </option>
                          <option value="5">5
                        </option>
                        <option value="6">6 
                        </option>
                          <option value="7">7 Awesome
                        </option>
                        <option value="8">8 Incredible
                        </option>
                          <option value="9">9 We love U
                        </option>
                        <option value="10">10 Casita will change World
                        </option>

                    </select>
                </p>
				  <p>
                    <label >Worst Thing
                    </label>

      <input type="text" value=""  name="worst"/>
 </p>
				  <p>
                    <label >Best Thing
                    </label>

      <input type="text" value=""  name="best"/>
 </p>
 	  <p><label >Long Feedback
                    </label>
 <textarea required placeholder="Seeking help, having queries or if you're willing to share anything with us, please write it down here. Your feedback is important to help us improve. Your queries will be answered shortly :)" 
 rows="20" cols="80"  name="comment"
 style="border-radius:4px;resize:none;border:solid 1px #99CCFF;font-face:Century Gothic;font-size:1.3em;color:#000000;padding:2px 2px 2px 2px;" >
</textarea>
   </p><label></label>
	  <input class="button" type="submit" value="Submit" name="submit"></form>
			</body></html>