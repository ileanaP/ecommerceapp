<?php

class ViewTicket extends BaseController
{
	private $ticket;
	private $conversation;
	private $joinedData;
	
	function __construct()
	{
		parent::__construct();
		$this->ticket = new DB\SQL\Mapper($this->db, 'ticket');
		$this->conversation = new DB\SQL\Mapper($this->db, 'conversation');
		$this->joinedData = new DB\SQL\Mapper($this->db, 'jsondata');
	}
	
	function get()
	{
		$this->loadJs('/js/common.js');
		$this->f3->set('content', 'viewTicket.html');
	}
	
	function getTicketData()
	{
		
		
		$id = $this->f3->get('PARAMS.id');
		
		//die($id);
		
		if(isset($id) && $id)
		{
			if($data = $this->joinedData->load(array('Id=?', $id)))
				die(json_encode($data->cast(), JSON_PRETTY_PRINT));
		}
		//var_dump($id);
		
		
	}
	

		
	function post()
	{
		$id = $_POST['viewTicketId'];
		
		die($id);
		var_dump($id);
	}
	
	
}










?>
