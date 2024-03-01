<h4><?php if($_SESSION["userid"]) { echo "Logged in as: ".ucfirst($_SESSION["name"]); } ?>  
<a class="btn btn-danger" role="button" style="font-size:20px;float: right" href="logout.php">Logout</a> </h4><br>
<h3><strong>Welcome <?php echo ucfirst($_SESSION["role"]); ?></strong></h3>	
<ul class="nav nav-tabs">	
	<?php if($_SESSION["role"] == 'admin') { ?>		
		<li id="sales_people"><a href="sales_people.php">Sales Rep</a></li>
		<li id="tasks"><a href="leads.php">Orders</a></li> 
		<li id="contact"><a href="contact.php">Clients</a></li> 		
	<?php } ?>
	
	<?php if($_SESSION["role"] == 'client') { ?>
		<!-- <li id="tasks"><a href="tasks.php">Ongoing Shipments</a></li>  -->
		<li id="leads"><a href="leads.php">Orders</a></li>
		<li id="opportunity"><a href="opportunity.php">Quotes</a></li>	
	<?php } ?>
</ul>