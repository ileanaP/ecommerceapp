
function getTicketContent()
{
	$('#dTconv').DataTable({
		createdRow: function (row, data, dataIndex) 
		{
            $(row).attr('data-user', data.id);
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
            {data:'id' },
            {data:'status' },
            {data:'start_date'},
			{data:'last_update'},
			{data:'conv'},
			{data:null,defaultContent:'<button class="btn btn-sm btn-info">Add response</button> '}
        ]
	});
	
}





$( document ).ready(function()
{
	getTicketContent();
	
});