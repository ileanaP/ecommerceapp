function populateDataTable(args)
{
	console.log("here");
	var columnsOptions = [], columnDefs = [], btns = "";
	var rowCallback = undefined;
	 
	if(Array.isArray(args["columns"]))
    {
		for(var i = 0; i < args["columns"].length; i++)
    	    columnsOptions.push({ data : args["columns"][i] });
	}

	if(Array.isArray(args["buttons"]))
	{
		console.log("~ got to here - buttons ~");
		var btn;
		for(var i = 0; i < args["buttons"].length; i++)
		{
			btn = args["buttons"][i];
			if(typeof btn["text"] === "string" && typeof btn["class"] == "string")
				btns += drawBtn(btn["text"], btn["class"]);
		}

		columnsOptions.push({
			data:null, 
			defaultContent: btns
		});	
	}

	console.log("++ " + typeof args["lastColumnRender"]  + "++")

	if(typeof args["lastColumnRender"] !== "undefined")
	{
		console.log("~ got to here - lastColumnRender ~ " + (typeof args["lastColumnRender"]));

		columnsOptions.push({
			data:null, 
			defaultContent: ""
		});

		columnDefs.push({
			render: args["lastColumnRender"],
			targets: args["columns"].length
		});

	}

	var tmpTbl = $("#DT" + args["table"]).DataTable({
		createdRow: window["createdRow" + args["table"]],
		drawCallback: window["drawCallback" + args["table"]],
		processing: true,
		ajax: "data.json", // to fetch ajax data in drawCallbackPlugin()
		//serverSide: true,
		//paging: true,
		//pageLength: 10,
		dom:'Bfrtip',
		ajax: {
           url: args["ajaxUrl"],
           method: 'GET',
		   dataFilter: filterAjaxData
        },
		columns: columnsOptions,
		columnDefs: columnDefs
	});
	
	/*tmpTbl.on( 'xhr', function () {
		var json = tmpTbl.ajax.json();
		console.log("###");
		console.log(json.data);
	} );*/

}

function filterAjaxData(data)
{
	 var json = jQuery.parseJSON( data );
	 json.recordsTotal = json.total;
	 json.recordsFiltered = json.total;
	 json.data = json.data;
	  return JSON.stringify( json ); // return JSON string
 }