<?php
if(isset($_SESSION['city']))
{
echo "<div class=\"logged_in\">
<a href=\"learner.php\" style=\"color:000000; font-size:1.1em; \">"."Hi, <b class=\"linky\">".$_SESSION['learner_name']."</b></a> </div>";
}?>

<div class="trainingtab"> <!--trainingtab starts-->
<menu id="cbp-tm-menu" class="cbp-tm-menu" style=" bottom: 2px;	 ">
<li><a href="../training.php" title="Get hands on training in Electronics" onclick=open('../training.php')> 
															Training</a><span Style="opacity:0.95;">
  	<ul class="cbp-tm-submenu" style="font-size:.65em; margin: 0 0 0 -6em;  " >
					    <li><a href="../pages/pcb.php" >PCB Board Design</a></li>
                        <li><a href="../pages/vlsi.php" >VLSI Design</a></li>
						<li><a href="../pages/vhdl.php" >VHDL</a></li>
						<li><a href="../pages/circuit.php" >Circuit Implementation</a></li>
						<li><a href="../pages/fabrication.php" >Fabrication</a></li>
						<li><a href="../pages/embedded.php" >Embedded Systems</a></li>
						<li><a href="../asteroid/mechatronics.php" >Automation and Robotics</a></li>
					</ul></span>
</li>
</menu>
   </div>
   <script src="../js/cbpTooltipMenu.min.js"></script>
		<script>
			var menu = new cbpTooltipMenu( document.getElementById( 'cbp-tm-menu' ) );
		</script> <!--trainingtab ends-->

		
		
<div class="projecttab">  <!--projecttab starts-->
<menu id="cbp-tm-menu" class="cbp-tm-menu" style=" bottom: 2px; ">
<li><a href="../asteroid/register_asteroid.php" title="Sign Up now for free" >Sign Up</a>
</li>
</menu>
   </div>
   <script src="../js/cbpTooltipMenu.min.js"></script>
		<script>
			var menu = new cbpTooltipMenu( document.getElementById( 'cbp-tm-menu' ) );
		</script> <!--projecttab ends-->


<div class="learningtab"> <!--Learningtab starts-->
<menu id="cbp-tm-menu" class="cbp-tm-menu" style=" bottom: 2px; ">
   <li > <a href="" title="Self learning kits for learners" >Learning Kits</a><span Style="opacity:0.95;">
    	<ul class="cbp-tm-submenu" style="font-size:.65em;">
						<li><a href="../pages/raspberry.php" >Raspberry Pi </a></li>
						<li><a href="../pages/galileo.php" >Intel Galileo Board</a></li>
						<li><a href="../pages/edison.php" >Edison Board</a></li>
								<li><a href="../pages/breadboard.php" >Bread Board</a></li>
						<li><a href="../pages/automation.php">Automation Kits</a></li>
						<li><a href="../pages/water.php" >Water Sensor</a></li>
						<li><a href="../pages/temprature.php" >Temperature Sensor</a></li>
			
			
					</ul></span>
</li>
</menu>
   </div>
   <script src="../js/cbpTooltipMenu.min.js"></script>
		<script>
			var menu = new cbpTooltipMenu( document.getElementById( 'cbp-tm-menu' ) );
		</script> <!--Learningtab ends-->

		
		
<div class="labtab"> <!--LabTab starts-->
<menu id="cbp-tm-menu" class="cbp-tm-menu" style=" bottom: 2px; ">
  <li ><a href="../howwework.php" title="How Asteroid Learning works to give you the best quality learning" onclick=open('../howwework.php')>
  How it works</a><span Style="opacity:0.95;">
 
</li>
</menu> </div>
<!--fortooltip-->
	<script src="../js/cbpTooltipMenu.min.js"></script>
		<script>
			var menu = new cbpTooltipMenu( document.getElementById( 'cbp-tm-menu' ) );
		</script>
<!--fortooltip ends-->
<!--labtoolends-->


<div class="electronics">   <!--electronics startss-->
<menu id="cbp-tm-menu" class="cbp-tm-menu" style=" bottom: 2px; ">
   <li > <a href="" title="Learn or Educate, whatever suits you better" >Login Roles</a><span Style="opacity:0.95;">
    	<ul class="cbp-tm-submenu" style="font-size:.65em;;">
					
					
						<li><a href="login.php" >Learner</a></li>
						<li><a href="">Educator</a></li>
						
			
					</ul></span>
</li>
</menu>
   </div>
   <script src="../js/cbpTooltipMenu.min.js"></script>
		<script>
			var menu = new cbpTooltipMenu( document.getElementById( 'cbp-tm-menu' ) );
		</script>
   <!--electronics ends-->
<div class="home" ><a href="../asteroidlearning.php" title="Home" style="color:#C6C1C4;">Home</a></div>
 <div class="exploreimg"><img src="../images/explore.png" height="80px" ></div>

<div class="explore"> <a href="../asteroid/bytes.php" title="What's happening in Computer Science"><span class="ExploreCharacterStyle">//BYTES/</span></a> </div>