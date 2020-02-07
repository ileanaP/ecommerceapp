$(document).ready(function(){

	var args = {
		table: "User",
		columns: ["id", "email", "is_activ"],
		buttons: [
			{"text" : "Edit", "class" : "btn-info"},
					  {"text" : "Delete", "class" : "btn-danger"}
		],
		ajaxUrl: "/users",
		createdRow: createdRowUser,
		drawCallback: drawCallbackUser
	}


	$('[data-action = confirmDelete]').click(function()
	{
		$('[data-title]').text('Are you sure you want to delete an user ?');
		console.log('confirmDeleteButtonPressed');
		deleteUser(deleteid);
	});

	populateDataTable(args);
});

function drawCallbackUser(settings)
{
	$('#DTUser .js-edit').click(function() { 
		console.log('ID client selectat', $(this).parents('tr').data('client'));
		loadUser($(this).parents('tr').data('user'));	
	});
	
	$('#DTUser .js-delete').click(function() {
		//alert('Se sterge userul cu ID-ul:'+$(this).parents('tr').data('user'));
		var deleteid = $(this).parents('tr').data('user');
		
		$('#deleteUserModal').modal('show');

		// else
		// {
			// if('[data-action = cancelDelete]')
				// alert("User has not been deleted !");
		// }
	});
}

function createdRowUser(row, data, dataIndex) 
{
	$(row).attr('data-user', data.id);
}

function saveUser()
{
	console.log('Called');
	var userData = {};
	var formFields = $('#editClientModal [data-field]');
	
	for(var i = 0; i < formFields.length; i++)
	{
		userData[formFields[i]['name']] = $(formFields[i]).val();
	}
	
	$.ajax({
		url: '/user',
		method: 'POST',
		data: userData,
		success: function(response)
		{
			$('#editClientModal').on('hidden.bs.modal', function()
			{
				$('#DTUser').DataTable().ajax.reload(); //OK, DataTable reloaded
				
			});
			
		}
	});
	
	
}

function loadUser(id)
{
	$.get('/user/'+id, function( data ) 
	{
		//console.log("loadUserFcn",data);
	  if(data != '0')
	  {
		  $.each(JSON.parse(data), function(key, value)
		  {
			  if(key != 'password')
				$('#editClientModal [data-field="'+key+'"]').val(value);
		  });
		  
		  $('#editClientModal [data-action="save"]').click(function()
		  {
			saveUser();  
		  });
		  
		  $('[data-title]').text('Edit user');
		  $('[data-field="username"],[data-field="is_client"]').attr('readonly', 'readonly');
		  $('[data-field="username"],[data-field="is_client"]').attr('disabled', 'disabled');
	
		  $('[data-field="password"],[data-field="cpassword"]').val(null);
		  
		  $('#editClientModal').modal('show');
	  }
	});
}

function addUser()
{
	$('[data-title]').text('Add user');
	$('[data-field]').val(null);
	$('[data-field="id"]').val('0');
	$('[data-field="username"],[data-field="is_client"]').attr('readonly', null);
	$('[data-field="username"],[data-field="is_client"]').attr('disabled', null);
	$('#editClientModal [data-action="save"]').click(function()
	  {
		saveUser();  
	  });
	$('#editClientModal').modal('show');
}

function deleteUser(id)
{
	// console.log('deleteUserFunction');
	// $.get('/userdelete/'+id, function( data ) 
	// {
	  
	  console.log('userdel', id);	
	  // if(data != '0')
	  // {
		$.ajax({
		url: '/userdelete',
		method: 'POST',
		data: {'deleteUser': id},
		success: function(response)
		{
			// console.log('success_function_data', id);
			$('#deleteUserModal').on('hidden.bs.modal', function()
			{
				$('#DTUser').DataTable().ajax.reload(); //OK, DataTable reloaded
				
			});	
		}});
		 
	  // }
	// });
	
}