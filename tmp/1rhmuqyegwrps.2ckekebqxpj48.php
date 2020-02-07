<div class="modal" id="editClientModal" tabindex="-1" role="dialog" aria-labelledby="editClientModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
	  <div class="modal-header text-center">
		<h4 class="modal-title w-100 font-weight-bold" data-title="Add user">Edit user</h4>
		 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
	  </div>
	  <div class="modal-body mx-3">
		<input type="hidden" name="id" data-field="id" value="0">
		<div class="md-form mb-5">
		  <i class="fas fa-user prefix grey-text"></i> <label data-error="wrong" data-success="right">User Name</label>
		  <input type="text" name="name" data-field="name" class="form-control validate">
		  
		</div>
		<div class="md-form mb-5">
		  <i class="fas fa-envelope prefix grey-text"></i> <label data-error="wrong" data-success="right">Email</label>
		  <input type="text" name="email" data-field="email" class="form-control validate">
		  
		</div>
		<div class="md-form mb-5">
		  <label data-error="wrong" data-success="right">Is active</label>
		  <select name="is_activ" data-field="is_activ" class="form-control validate">
			<option>--</option>
			<option value="0">No</option>
			<option value="1">Yes</option>
		  </select>
		</div>
		
		<div class="md-form mb-5">
		  <i class="far fa-flag"></i> <label data-error="wrong" data-success="right">Is client</label>
		  <select name="is_client" data-field="is_client" class="form-control" readonly="readonly" disabled="disabled">
			<option>--</option>
			<option value="0">No</option>
			<option value="1">Yes</option>
		  </select>
		</div>
		
		
		
		<div class="md-form mb-4">
		  <i class="far fa-user"></i> <label data-error="wrong" data-success="right">Username</label>
		  <input type="text" name="username" data-field="username" class="form-control" readonly="readonly" disabled="disabled">
		</div>
		
		<div class="md-form mb-4">
		  <i class="fas fa-lock prefix grey-text"></i> <label data-error="wrong" data-success="right">Password</label>
		  <input type="password" name="password" data-field="password" class="form-control validate">
		  
		</div>
		
		<div class="md-form mb-4">
		  <i class="fas fa-lock prefix grey-text"></i> <label data-error="wrong" data-success="right">Confirm password</label>
		  <input type="password" name="cpassword" data-field="cpassword" class="form-control validate">
		 
		</div>

	  </div>
	  <div class="modal-footer d-flex justify-content-center">
		<button class="btn btn btn-warning" data-action="save">Save !</button>
		<button type="button" class="btn btn-danger" data-action="modalCancel">Cancel</button>
	  </div>
	</div>
  </div>
</div>




			