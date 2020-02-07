<div class="modal" id="editTicketModal" tabindex="-1" role="dialog" aria-labelledby="editTicketModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
	  <div class="modal-header text-center">
		<h4 class="modal-title w-100 font-weight-bold" data-title="Add ticket">Edit ticket</h4>
		 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
	  </div>
	  <div class="modal-body mx-3">
		<input type="hidden" name="id" data-field="Id" value="0">
		<div class="md-form mb-5">
		  <i class="fas fa-user prefix grey-text"></i> <label data-error="wrong" data-success="right">Ticket Id</label>
		  <input type="text" name="Id" data-field="Id" class="form-control validate">
		  
		</div>
		
		
		<div class="md-form mb-5">
		  <i class="fas fa-envelope prefix grey-text"></i> <label data-error="wrong" data-success="right">Poseted by user</label>
		  <input type="text" name="userid" data-field="userid" class="form-control validate">
		</div>
		
		<div class="md-form mb-5">
		  <i class="far fa-eye"></i> <label data-error="wrong" data-success="right">Status</label>
		  <select name="status" data-field="status" class="form-control validate">
			<option>--</option>
			<option value="0">Inactive</option>
			<option value="1">Active</option>
		  </select>
		</div>
		
		<div class="md-form mb-5">
		  <i class="fas fa-envelope prefix grey-text"></i> <label data-error="wrong" data-success="right">Title</label>
		  <input type="text" name="about" data-field="about" class="form-control validate">
		  
		</div>
		
		<div class="md-form mb-5">
		  <i class="far fa-clock"></i> <label data-error="wrong" data-success="right">Start Date</label>
		  <input type="text" name="start_date" data-field="start_date" class="form-control validate">
		  
		</div>
		
		<div class="md-form mb-5">
		  <i class="far fa-clock"></i> <label data-error="wrong" data-success="right">Last Update</label>
		  <input type="text" name="last_update" data-field="last_update" class="form-control validate">
		  
		</div>
		
			
		<div class="md-form mb-5">
		 <i class="far fa-bookmark"></i> <label data-error="wrong" data-success="right">Content</label>
		  <input type="text" name="conv" data-field="conv" class="form-control validate"> 
		</div>
		
	  </div>
	  <div class="modal-footer d-flex justify-content-center">
		<button class="btn btn-warning" data-action="save">Save !</button>
		<button type="button" class="btn btn-danger" data-action="modalCancel">Cancel</button>
	  </div>
	</div>
  </div>
</div>




			