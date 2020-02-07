<!-- Page Heading -->
	  <h1 class="h3 mb-2 text-gray-800">Tickets</h1>
	  <div class="card shadow mb-4">
		<div class="card-header py-3">
		  <h6 class="m-0 font-weight-bold text-primary">Admin  Tickets</h6>
		  <div style="width:100%;">
			<button class="btn btn-danger" style="float: right;" id="showTickets" >Show Tickets</button>
		</div>
		</div>
			
	<div>			
	<div class="card-body">
	  <div class="table-responsive">
		<table class="table table-striped table-bordered" id="DTTicket" width="100%" cellspacing="0">
		  <thead>
			<tr>
			  <th>Id</th>
			  <th>Title</th>
			  <th>Status</th>
			  <th>Start Date</th>
			  <th>Last Update</th>
			  <th>User</th>
			  <th>Actions &nbsp;</th>
			</tr>
		  </thead>
		</table>
	  </div>
	</div>
  </div>
</div>
<?php echo $this->render('app/view/modals/modal_edit_ticket.html',NULL,get_defined_vars(),0); ?>
<?php echo $this->render('app/view/modals/modal_ticket_delete.html',NULL,get_defined_vars(),0); ?>







	