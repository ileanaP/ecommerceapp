<!-- DataTales Example -->

<div class="card shadow mb-4">
<div class="card-header py-3">
  <h6 class="m-0 font-weight-bold text-primary">
	  <?php if ($isClient): ?>
		<?php else: ?>
			Admin 
		
	  <?php endif; ?>
	  Tickets</h6>
  <div style="width:100%;">
	<button class="btn btn-danger" style="float: right;" id="addTickets" >Add Tickets</button>
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
<?php if ($isClient): ?>
	<?php else: ?>
	      <th>Status</th>
	
<?php endif; ?>
		  <th>Start Date</th>
		  <th>Last Update</th>
		  <th>User</th>
		  <th>Actions </th>
		</tr>
	  </thead>
	</table>
  </div>
</div>
</div>
<?php if ($isClient): ?>
	<?php else: ?>
		
	
<?php endif; ?>
</div>