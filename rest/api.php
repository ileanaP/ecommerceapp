
<?php


//DB connection
	
	//hearder("Content-Type:application/json");

	include('dbconn.php');
	
//----------------------

//INIT F3 FRAMEWORK


    
	
	$f3 = require('lib/base.php');
	
	$f3->config('config.ini');
	
	$f3->route('GET|POST rest/api.php?/ticket_id=/@id',
	function($f3){
		echo $f3->get('ticket_id');
		
	});
	
	
	

	
	$f3->run();


//---------------------	
	
	//GET TICKETS
	
	if(isset($_GET['ticket_id']) && !empty($_GET['ticket_id']))
	{
		$ticket_id = $_GET['ticket_id'];
		
		$response = mysqli_query($conn, "Select * FROM user where ticket_id = '$ticket_id'");
		
		if($response)
		{
			$result = mysqli_fetch_array($response);
			
			$ticket_id = $result['id'];
			
			$ticket_status =  $result['status'];
			
			$about_ticket =  $result['about'];
			
			$ticket_start_date = $result['start_date'];
			
			$ticket_last_update = $result['last_update'];
			
			$ticket_answare = $result['answare'];
		}
		else
		{
			resp_api(NULL, '404', 'No ticket found', NULL, NULL, NULL, NULL, NULL, NULL);
		}
		
		//GET CONVERSATION:
		
	$response = mysqli_query($conn, "Select * FROM conversation where ticket_id = '$ticket_id'");
		
		
		if($response)
		{
			$result = mysqli_fetch_array($response);
			
			$conversation_id =  $result['id'];
			
			$users_involved =  $result['user'];
			
			$conversation_ticket = $result['ticket_id'];
			
			//add date for each conversation in database !
			
			$conversation_messages = $result['conv'];
			
			
			
		}
		else
		{
			resp_api($ticket_id, $ticket_status, $about_ticket,
			        $ticket_start_date, $ticket_last_update, 
					$ticket_answare, NULL, 'No replays from users', 'No conversations');
		}		
				
		
	}
	else{
		resp_api(NULL, '404', 'No ticket found', NULL, NULL, NULL, NULL, NULL, NULL);
	}
		
	
	function resp_api($ticket_id, $ticket_status, $about_ticket, $ticket_start_date,
	$ticket_last_update, $ticket_answare, $conversation_id, $users_involved, $conversation_messages)
	{
		
		$api_resp['ticket_id'] = $ticket_id;
		
		$api_resp['ticket_status'] = $ticket_status;
		
		$api_resp['about_ticket'] = $about_ticket;
		
		$api_resp['ticket_start_date'] = $ticket_start_date;
		
		$api_resp['ticket_last_update'] = $ticket_last_update;
		
		$api_resp['ticket_answare'] = $ticket_answare;
		
		$api_resp['conversation_id'] = $conversation_id;
		
		$api_resp['users_involved'] = $users_involved;
		
		$$api_resp['conversation_messages'] = $conversation_messages;
		
		
		
		$json_format = json_encode($api_resp);
				
		
	}
	
	
	
	


?>