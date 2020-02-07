<?php
class Ticket extends BaseController
{
	/* private $tickets;
	private $conversations;
	private $users;
	private $json; */
	private $ticketsTb;
	private $conversation;
	private $ticketsViewTable;
	private $ticketApi;

	function __construct()
	{
		parent::__construct();

		$this->ticketApi = new TicketApi();
		
		$this->ticketsTb = new DB\SQL\Mapper($this->db,'ticket');
		$this->conversation = new DB\SQL\Mapper($this->db, 'conversation');
		// $this->ticketsViewTable = new DB\SQL\Mapper($this->db, 'jsondata');
		
	}
	
	function get()
	{
		$this->loadJs("/js/tickets.js");
		$this->loadJs("/js/util.js");
		$this->f3->set('content', 'tickets.html');
	}

	function getById()
	{
		$ticketId = intval($this->f3->get('PARAMS.id'));

		$ticketJson = $this->ticketApi->getById($ticketId);

		die($ticketJson);
	}

	function getAll()
	{
		$ticketsJson = $this->ticketApi->get();

		die($ticketsJson);
	}
	
	function getByIdConv() // TO DO - o metoda care intoarce un row din tabel in functie de id (eventual sa fie pusa intr-un Model)
	{
		$ticketId = intval($this->f3->get('PARAMS.id'));
		
		/*if(isset($ticketId) && $ticketId)
		{
			if($ticket = $this->ticketsTb->load(array('id=?', $ticketId)))
			{
				die(json_encode($ticket->cast(), JSON_PRETTY_PRINT));
			}
		}*/

		$res = $this->ticketApi->getByIdConv($ticketId);

		print_r($res);
		exit;
	}
	
	function post()
	{	
		$ticketId = intval($this->f3->get('POST.id'));
		$ticket = $this->ticketsTb->load(array('id=?',$ticketId));
		
		if($ticket)
		{
			$ticket->copyFrom('POST');
			$ticket->save();
			die($ticketId);
		}
		else // sa fac sa mearga partea asta :o daca nu merge // sa adaug conv corespunzator unui ticket in tbl. conversations cand adaug un ticket nou
		{
			echo '~ticket is~';
			$this->ticketsTb->Id = $this->f3->get('POST.Id');
			$this->ticketsTb->startDate = $this->f3->get('POST.startDate');
			$this->ticketsTb->lastUpate = $this->f3->get('POST.lastUpate');
			$this->ticketsTb->title = $this->f3->get('POST.title');
			$this->ticketsTb->userid = $this->f3->get('POST.userid');
	
			print_r($this->ticketsTb);
			$this->userTb->save();
			die($this->ticketsTb->id);
			
			$this->conversation->convdate = date('Y-m-d H:i:s');
			$this->conversation->user = $this->f3->get('POST.userid');
			$this->conversation->conv = $this->f3->get('POST.conv');
			$this->conversation->ticketId = $this->f3->get('POST.Id');
			
			print_r($this->conversation);
			$this->conversation->save();
			
			
			
			
		}
	}
	
	function toggleStatus()
	{
		$ticketId = intval($this->f3->get('PARAMS.id'));

		$newStatus = $this->ticketApi->toggleStatus($ticketId);

		die(strval($newStatus));
	}
}

?>
