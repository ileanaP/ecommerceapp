<?php

class TicketApi extends BaseController
{
	private $tickets;
	private $conversations;
	private $users;
	private $json;
	private $ticketsTb;
		
	function __construct()
	{
		parent::__construct();
		
		$this->ticketsTb = new DB\SQL\Mapper($this->db, 'ticket');
		$this->json = new DB\SQL\Mapper($this->db, 'jsondata2');  //SQL_VIEW

	}
	
	
	function get()
	{
		/* $page = $this->f3->get('PARAMS.draw');
		
		if(!$page)
			$page = 0;
		 */
		 
		/*
		$response = $this->json->paginate(0,10); // sa facem paginatia din DataTables server side - SOON <3
		foreach($response['subset'] as  $jsonResponse)
		{
			$jsonRespArray[] = $jsonResponse->cast();			
		}
		*/

		$response['data'] = array();

		$queryParams = $this->isClient ? array('status=?', 1) : array();
		
		for($this->json->load($queryParams); !$this->json->dry(); $this->json->next())
		{
			$response['data'][] = $this->json->cast();
		}

		return json_encode($response, JSON_PRETTY_PRINT);
	}
	
	function getById($ticketId)
	{
		$ticketView = $this->json->load(array('id=?',$ticketId));
		if($ticketView)
		{			
			return json_encode($ticketView->cast());
		}
		else
			return 0;
	}

	function toggleStatus($ticketId)
	{
		$ticket = $this->ticketsTb->load(array('id=?', $ticketId));

		$newStatus = $ticket->status == 1 ? "0" : "1";

		$ticket->status = $newStatus;
		$ticket->last_update = date('Y-m-d H:i:s');
		$ticket->save();

		return $newStatus;

		// $conv = $this->conversationToDelete->load(array('ticketid=?', $id);
		// print_r($conv);
		// $conv->erase();
	}

	function getByIdConv($ticketId)
	{
		$ticketData = $this->getById($ticketId);

		$tmp = new ConversationModel($this->db, 'conversation');
		$convsData = $tmp->all(array('ticketid = ?', $ticketId));
		
		$res["ticketData"] = json_decode($ticketData);
		$res["convsData"] = $convsData;

		return json_encode($res);

		/*json_decode($convs);

		if(json_last_error() == JSON_ERROR_NONE)
			return 'is positively json';
		else
			return 'is not not negatively json';
			*/
	}

	// instantiez un Ticket Model ->  fac un call catre Conv Model dupa TicketId
}

?>