<?php
include_once 'config/Database.php';
include_once 'class/User.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

if(!$user->loggedIn()) {
	header("Location: index.php");
}
include('inc/header.php');
?>
<title>Quadrascent CRM System</title>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>		
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
<script src="js/leads.js"></script>	
<script src="js/general.js"></script>
<?php include('inc/container.php');?>
<div class="container" style="background-color:#f4f3ef;">  
	<h2>Customer Relationship Management (CRM) System</h2>			
	<?php include('top_menus.php'); ?>	
	<br>
	
	
	<div> 	
	<?php if($_SESSION["role"] == 'client') { ?>
		<div>
		<h4 class="panel-heading" style="text-decoration: underline;">Your Shipment Orders</h4>
			<div class="row">
				<div class="col-md-10">
					<h5 >Check under the Tracking column to see updates on your Orders.</h5>
				</div>
				<div class="col-md-2" align="right">
					<button type="button" id="addLeads" class="btn btn-info" title="Add Leads"><span class="glyphicon glyphicon-plus"></span></button>
				</div>
			</div>
		</div>
		<?php }?>
		<?php if($_SESSION["role"] == 'admin') { ?>
		<div>
		<h4 class="panel-heading" style="text-decoration: underline;">Shipment Orders</h4>
			<div class="row">
				<div class="col-md-10">
					<h5>Click the Edit button to change the Tracking of Shipments.</h5>
				</div>
				<div class="col-md-2" align="right">
					<button type="button" id="addLeads" class="btn btn-info" title="Add Leads"><span class="glyphicon glyphicon-plus"></span></button>
				</div>
			</div>
		</div>
		<?php }?>
		<table id="leadsListing" class="table table-bordered table-striped">
			<thead>
				<tr>						
					<th>Id</th>					
					<th>Name</th>					
					<th>Company</th>
					<th>Industry</th>
					<th>Phone</th>
					<th>Email</th>
					<th>Tracking</th>
					<th>Status</th>
					<th>Contact Date</th>
					<th></th>	
					<th></th>	
					<th></th>						
				</tr>
			</thead>
		</table>
	</div>
	
	<div id="leadsDetails" class="modal fade">
		<div class="modal-dialog">    		
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"><i class="fa fa-plus"></i> Tasks Details</h4>
				</div>
				<div class="modal-body">
					<table id="" class="table table-bordered table-striped">
						<thead>
							<tr>						
								<th>Id</th>					
								<th>Created</th>					
								<th>Task Type</th>
								<th>Description</th>	
								<th>Due Date</th>
								<th>Status</th>	
								<th>Contact</th>
								<th>Sales Rep</th>														
							</tr>
						</thead>
						<tbody id="leadsList">							
						</tbody>
					</table>								
				</div>    				
			</div>    		
		</div>
	</div>	
	<?php if($_SESSION["role"] == 'client') { ?>
	<div id="leadsModal" class="modal fade">
		<div class="modal-dialog">
			<form method="post" id="leadsForm">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><i class="fa fa-plus"></i> Edit Leads</h4>
					</div>
					<div class="modal-body">
						<div class="form-group"
							<label for="project" class="control-label">Contact First</label>
							<input type="text" class="form-control" id="lead_first" name="lead_first" placeholder="contact name" required>			
						</div>

						<div class="form-group"
							<label for="project" class="control-label">Contact Last</label>
							<input type="text" class="form-control" id="lead_last" name="lead_last" placeholder="contact last" >			
						</div>	
						
						<div class="form-group">
							<label for="address" class="control-label">Company</label>							
							<input type="text" class="form-control" id="lead_company" name="lead_company" placeholder="company" required>									
						</div>

						<div class="form-group">
							<label for="address" class="control-label">Industry</label>							
							<input type="text" class="form-control" id="lead_industry" name="lead_industry" placeholder="industry" required>									
						</div>
						
						<div class="form-group">
							<label for="address" class="control-label">Budget</label>							
							<input type="text" class="form-control" id="lead_budget" name="lead_budget" placeholder="budget" required>									
						</div>
						
						<div class="form-group">
							<label for="country" class="control-label">Status</label>							
							<select class="form-control" id="lead_status" name="lead_status"/>							
								<option value="Order" selected>Order</option>
							</select>							
						</div>
						
						<div class="form-group">
							<label for="address" class="control-label">Email</label>							
							<input type="text" class="form-control" id="lead_email" name="lead_email" placeholder="Email" required>									
						</div>
						
						<div class="form-group">
							<label for="address" class="control-label">Phone</label>							
							<input type="text" class="form-control" id="lead_phone" name="lead_phone" placeholder="Phone" required>									
						</div>
						
						<div class="form-group">
							<label for="address" class="control-label">Tracking</label>							
							<select class="form-control" id="lead_tracking" name="lead_tracking"/>							
								<option value="Waiting to Pick Up" selected>Waiting to Pick Up</option>
															
							</select>										
						</div>					
					</div>
					<div class="modal-footer">
						<input type="hidden" name="id" id="id" />
						<input type="hidden" name="action" id="action" value="" />
						<input type="submit" name="save" id="save" class="btn btn-info" value="Save" />
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<?php }?>
	<?php if($_SESSION["role"] == 'admin') { ?>
	<div id="leadsModal" class="modal fade">
		<div class="modal-dialog">
			<form method="post" id="leadsForm">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><i class="fa fa-plus"></i> Edit Leads</h4>
					</div>
					<div class="modal-body">
						<div class="form-group"
							<label for="project" class="control-label">Contact First</label>
							<input type="text" class="form-control" id="lead_first" name="lead_first" placeholder="contact name" required>			
						</div>

						<div class="form-group"
							<label for="project" class="control-label">Contact Last</label>
							<input type="text" class="form-control" id="lead_last" name="lead_last" placeholder="contact last" >			
						</div>	
						
						<div class="form-group">
							<label for="address" class="control-label">Company</label>							
							<input type="text" class="form-control" id="lead_company" name="lead_company" placeholder="company" required>									
						</div>

						<div class="form-group">
							<label for="address" class="control-label">Industry</label>							
							<input type="text" class="form-control" id="lead_industry" name="lead_industry" placeholder="industry" required>									
						</div>
						
						<div class="form-group">
							<label for="address" class="control-label">Budget</label>							
							<input type="text" class="form-control" id="lead_budget" name="lead_budget" placeholder="budget" required>									
						</div>
						
						<div class="form-group">
							<label for="country" class="control-label">Status</label>							
							<select class="form-control" id="lead_status" name="lead_status"/>							
								<option value="Order" selected>Order</option>
							</select>							
						</div>
						
						<div class="form-group">
							<label for="address" class="control-label">Email</label>							
							<input type="text" class="form-control" id="lead_email" name="lead_email" placeholder="Email" required>									
						</div>
						
						<div class="form-group">
							<label for="address" class="control-label">Phone</label>							
							<input type="text" class="form-control" id="lead_phone" name="lead_phone" placeholder="Phone" required>									
						</div>
						
						<div class="form-group">
							<label for="address" class="control-label">Tracking</label>							
							<select class="form-control" id="lead_tracking" name="lead_tracking"/>							
								<option value="Waiting for Pick Up" selected>Waiting for Pick Up</option>
								<option value="Arrived at Warehouse" selected>Arrived at Warehouse</option>
								<option value="Shipped" selected>Shipped</option>
								<option value="Delivered" selected>Delivered</option>
															
							</select>										
						</div>					
					</div>
					<div class="modal-footer">
						<input type="hidden" name="id" id="id" />
						<input type="hidden" name="action" id="action" value="" />
						<input type="submit" name="save" id="save" class="btn btn-info" value="Save" />
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<?php }?>		
</div>
 <?php include('inc/footer.php');?>
