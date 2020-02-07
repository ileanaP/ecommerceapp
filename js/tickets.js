var ticketId = 0;

$(document).ready(function(){
	populateTicketDataTable();

	$('#createNewTicket').click(function()
	{
		 location.href = '/create_ticket'; 
	});

	$('#submitNewTicket').click(function()
	{
		createTicket();
	});

	$('[data-action="confirmTicketDisable"]').click(function()
	{
		toggleTicketStatus(ticketId);
		$('#deleteTicketModal').modal('hide');

		var enableBtn = $("*[data-ticket='" + ticketId + "']").find(".js-disable").eq(0);
		toggleEnableDisableBtn(enableBtn);
	});

	$('#viewTicketContent').modal('show');
});

function viewTicket(id)
{
	$.ajax({
		url: '/viewTicket',
		method: 'POST',
		data: {'viewTicketId': id},
		success: function(response)
		{
			displayTicketContent(id);			
		}
	});
}

function ticketsLastColumnRender(data, type, row)
{
	var tmpButtons = [];


	tmpButtons.push({"text" : "View Content", "class" : "btn-light"});
	if(!isClient)
	{
		tmpButtons.push({"text" : "Edit", "class" : "btn-light"});
		
		if(parseInt(data["status"]))
			tmpButtons.push({"text" : "Disable", "class" : "btn-danger"});
		else
			tmpButtons.push({"text" : "Enable", "class" : "btn-success"});
	}

	tmpButtons = drawBtnList(tmpButtons);

	return tmpButtons;
}

function populateTicketDataTable()
{
	var columns = ["id", "about", "start_date", "last_update", "username"];
	
	if(!isClient)
		columns.splice(2, 0, "status");

	var args = {
					table: "Ticket",
					columns: columns,
					lastColumnRender: ticketsLastColumnRender,
					ajaxUrl: "/tickets/all",
					createdRow: createdRowTicket,
					drawCallback: drawCallbackTicket
				}

	populateDataTable(args); // #DTTicket populated - sa nu dea eroare daca nu sunt rows in tabel
}

function createdRowTicket(row, data, dataIndex)
{
	$(row).attr('data-ticket', data.id);
}

function drawCallbackTicket(settings) 
{
	$('#DTTicket .js-edit').click(function()
	{
		loadTicket($(this).parents('tr').data('ticket'));		
	});

	$('#DTTicket .js-enable, #DTTicket .js-disable').click(function(){
		ticketId = $(this).parents('tr').data('ticket');
		
		if($(this).hasClass('js-disable'))
		{
			$('#deleteTicketModal').modal('show');
		}
		else
		{
			toggleTicketStatus(ticketId);
			toggleEnableDisableBtn($(this));
		}
	});
	
	$('#DTTicket .js-view-content').click(function()
	{
		ticketId = $(this).parents('tr').data('ticket');
		console.log("ticketID - ~ " + ticketId);

		console.log("ajax url - " + '/tickets/conv/' + ticketId);

		$.ajax({
			method: "GET",
			url: '/tickets/conv/' + ticketId,
			data: {'id' : ticketId},
			success: function(data) {
				data = JSON.parse(data)
				console.log(data);

				$('#viewTicketContent').modal('show');
			},
			error: function(msg){
				console.log("error - " + msg);
			}
		});

		//
		
		// $.get('/tickets/'+ticketId, function( data ) 
		// {
			// location.href='/viewTicket';
		// });	
		
	});
}

function toggleEnableDisableBtn(elem)
{
	var newText = elem.text() == "Enable" ? "Disable" : "Enable";
	
	elem.text(newText);
	elem.toggleClass("js-enable");
	elem.toggleClass("js-disable");
	elem.toggleClass("btn-success");
	elem.toggleClass("btn-danger");
}

function saveTicket() // sa se updateze Last Update automat (si sa nu se poata modifica din modalul de Edit Ticket)
{
	var userData = {};
	var formFields = $('#editTicketModal [data-field]');

	for(var i = 0; i < formFields.length; i++)
	{
		userData[formFields[i]['name']] = $(formFields[i]).val();
	}
	
	$.ajax({
		url: '/tickets',
		method: 'POST',
		data: userData,
		success: function(response)
		{
			$('#editTicketModal').on('hidden.bs.modal', function()
			{
				$('#DTTicket').DataTable().ajax.reload(); //OK, DataTable reloaded
				
			});
			
		}
	});
	
}

function loadTicket(id)
{
	$.get('/tickets/'+id, function( data ) 
	{
	  if(data != '0')
	  {
		  $.each(JSON.parse(data), function(key, value)
		  { 
			$('#editTicketModal [data-field="'+key+'"]').val(value);
			
		  });
		  
		  $('#editTicketModal [data-action="save"]').click(function()
		  {
			saveTicket();
			$('#editTicketModal').modal('hide');
		  });
		  
		  $('[data-title]').text('Edit ticket');
			  
		  $('#editTicketModal').modal('show');
	  }
	});
}

function createTicket()
{
	var email = $('#email').val();
	var title = $('#title').val();
	var date = $('#date').val();
	var ticketcontent = $('#ticketcontent').val();
	
	$.post('/create_ticket', { email:email , title:title, date:date, ticketcontent:ticketcontent }, function(response)
	{
		if(response == 1)
			location.href = '/create_ticket';
		alert(response);
	});
		
}

function addTicket()
{
	$('[data-title]').text('Add user');
	$('[data-field]').val(null);
	$('[data-field="status"]').val('0');
	$('[data-field="title"],[data-field="start_date"]').attr('readonly', null);
	$('[data-field="last_update"],[data-field="user"]').attr('disabled', null);
	$('#editClientModal [data-action="save"]').click(function()
	  {
		saveUser();  
	  });
	$('#editClientModal').modal('show');
}

function toggleTicketStatus(id)
{
	$.ajax({
		url: '/tickets/' + id + '/toggleStatus',
		method: 'GET',
		data: {'id': id},
		success: function(data)
		{
			console.log("toggle status DATA :o :o -~ " + data + " ~-");

			$("*[data-ticket='" + id + "']").children().eq(2).text(data);
			//$('#DTTicket').DataTable().ajax.reload();
		},
		error: function(data){ }
	});
}

function displayTicketContent(id)
{
	//location.href = '/viewTicket'
	$.get('/viewTicket/'+id, function( data )
	{
		$('#dTconv').DataTable({
			createdRow: function (row, data, dataIndex) 
			{
				$(row).attr('data-ticket', data.id);
			},
			processing: true,
			serverSide: true,
			dom:'Bfrtip',
			ajax: {
			   url: '/viewTicket',
			   method: 'GET',
			   
			   dataFilter: function(data)
			   {
					var json = jQuery.parseJSON( data );
					json.recordsTotal = json.total;
					json.recordsFiltered = json.total;
					json.data = json.data;
					return JSON.stringify( json ); // return JSON string
				}
			},
			columns: [
				{data:'id'},
				{data:'about'},
				{data:'start_date'},
				{data:'last_update'},
				{data:'conv'},
				{data:null,defaultContent:'<button class="btn btn-sm btn-info">Add response</button> '}
			]
		});
	});
	
		
}