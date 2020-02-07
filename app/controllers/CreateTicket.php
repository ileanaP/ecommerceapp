<?php


class CreateTicket extends BaseController
{
	public $users;
	public $tickets;
	public $conversation;

		
	function __construct()
	{
		parent::__construct();
		
		$this->tickets = new DB\SQL\Mapper($this->db,'ticket');
		$this->users = new DB\SQL\Mapper($this->db,'user');
		$this->conversations = new DB\SQL\Mapper($this->db,'conversation');
	}
	
	function get()
	{
		$this->f3->set('content', 'create_ticket.html');
		
		//var_dump($_POST);
	}
	
	

	function post()
	{
		if( (isset($_POST['email']) && !empty($_POST['email'])) && (isset($_POST['title']) && !empty($_POST['title'])) &&
			    (isset($_POST['date']) && !empty($_POST['date'])) && (isset($_POST['ticketcontent']) && !empty($_POST['ticketcontent'])))
		
		{
			$userId = $this->f3->get('SESSION.is_logged'); // get logged session user ID !	
					
			$this->tickets->userid = $userId;
			$this->tickets->about = $_POST['title'];
			$this->tickets->status = '1';
			$this->tickets->start_date = $_POST['date'];
			$this->tickets->last_update = $_POST['date'];
			$this->tickets->save();
			
			$newTicketId = $this->tickets->load(array('userid=? and about=? and start_date=? and last_update=?',$userId, $_POST['title'], $_POST['date'], $_POST['date'],));
			
			$this->conversations->user = $userId;
			$this->conversations->ticketid = $newTicketId;
			$this->conversations->conv = $_POST['ticketcontent'];
			$this->conversations->convdate = $_POST['date'];
			$this->conversations->save();
		}		
		die('error');
		
	} 
	
	
}














?>