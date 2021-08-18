<?php
require("../../../of_course/constants_2.php"); //-->on server not required here
//require("../includes/constants.php"); //-->on local machine  not required here
session_start();

//security divert
$_SESSION['yes_its_index']==22;
if(!($_SESSION['yes_its_index']==21)||!isset($_GET['yes_its_in_index'])||!isset($_SESSION['admin_id'])||!isset($_SESSION['admin_name'])||!isset($_SESSION['restaurant_branch']))
{
header("Location:../");}
//security divert
?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>

           	<span style="font-size:40px; color:#058AA8; font-family:Museo;"> Top selling items  </span><br><br>
<div id="demo"></div>



 <link href="../style_product.css" type="text/css" rel="stylesheet" />

			<?php 
			
			//require_once('includes/functions.php');
			
$gtx_connection=mysql_connect(DB_SERVER,DB_USER,DB_PASS);
if(!$gtx_connection)
{
	die(" Database Connection Failed".mysql_error());
}?>

<?php 
$gtx_select=mysql_select_db(DB_NAME,$gtx_connection);
if(!$gtx_select)
{	die("Database Selection Failed ".mysql_error());
}
?>

<?php
 
echo"<span style=\"font-size:20px; color:#000; font-family:Museo;\"> Top selling items statistics displays the items which are more in demand, this information can remarkably improve your business operation.</b></span>

<br/><br/>	<div style=\"color:#ffffff;font-size:14px;border-radius:4px;background:#0DAACE;height:20px;width:100%;padding-top:1px;padding-left:3px;\">Sales Summary</div>			
<br><table cellpadding=\"10\" class=\"shopping-cart-visibility-width-admin\" cellspacing=\"1\">
<tbody><span >
<tr>
<th style=\"font-size:.8em;\"><strong>Item Name</strong></th>
<th style=\"font-size:.8em;\"><strong>Product Code</strong></th>
<th style=\"font-size:.8em;\"><strong>Pricing</strong></th>
<th style=\"font-size:.8em;\"><strong>Sold</strong></th></tr>";

// query to extract the order details using order_number 			 
$gtx_query="SELECT * from product_list";
$gtx_query.=" ORDER BY selling_frequency DESC LIMIT 10";
$gtx_result=mysql_query($gtx_query,$gtx_connection);
	
	while($row=mysql_fetch_assoc($gtx_result))
	{
	
	echo"
<tr>
<td style=\"font-size:.8em;\">{$row['name']}</td>
<td style=\"font-size:.8em;\">{$row['code']}</td>
<td style=\"font-size:.8em;\">&#x20B9;{$row['price']}</td>
<td style=\"font-size:.8em;\">{$row['selling_frequency']} Times</td>
</tr>";


}

		echo"</span></tbody></table>";
		
//this following query is to display the chart for frequency distribution

$gtx_query="SELECT * from product_list";
$gtx_query.=" ORDER BY selling_frequency DESC LIMIT 10";
$gtx_result=mysql_query($gtx_query,$gtx_connection);

   echo" <br><script type=\"text/javascript\" src=\"../js/chart.js\"></script>
    <script type=\"text/javascript\">
      google.charts.load(\"current\", {packages:[\"corechart\"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
		          ['Task', 'Hours per Day'],";

	while($row=mysql_fetch_assoc($gtx_result))
	{
    echo"['".$row['name']."',     ".$row['selling_frequency']."],";
	}
	
	echo" ]);

        var options = {
          title: ' ',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
	<div id=\"donutchart\" style=\"width: 725px; height: 500px;\"></div>";
	
	
//end of this following query is to display the chart for frequency distribution	
			mysql_close($gtx_connection);
			
				
				
		?>	






              
	  
			</body></html>