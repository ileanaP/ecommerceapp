$(document).ready(function(){
	$('[data-plugin]').click(function()
	{
		
		var pluginId = $(this).data('plugin');
		var button = $(this);
		
		$.get('/plugins/status/'+pluginId+'/'+$(this).attr('rel-status'), // /plugins/status/1/0 - inactiv | /plugins/status/1/1 - activ
			function(response)
			{

				console.log("lovely response: " + response);
				
				if(response == '1')
				{
					button.html('Deactivate');
					button.attr('rel-status',1);
					$(".plugin-" + pluginId + "-status-text").text("Active");
				}
				else
				{
					button.html('Activate');
					button.attr('rel-status',0);
					$(".plugin-" + pluginId + "-status-text").text("Inactive");
				}

				console.log("and here.. ");

				button.toggleClass('btn-success');
				button.toggleClass('btn-secondary');

				console.log("and finally here.. ");
			}
		);
	})
	
});

/*function drawCallbackPlugin(settings)
{
	var tmpTable = $("#DTPlugin").DataTable();
	var jsonTmp = tmpTable.ajax.json();
	
	if(typeof jsonTmp !== "undefined") //drawCallback se apeleaza de doua ori
		console.log(jsonTmp.data);
}*/