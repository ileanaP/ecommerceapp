<?php

class Users extends BaseController
{
	
	private $client;
	
	function __construct()
	{
		parent::__construct();
		$this->client = new DB\SQL\Mapper($this->db,'user');
	}
	
	function get()
	{
		$this->loadJs('/js/util.js');
		$this->loadJs('/js/user.js');
		$this->f3->set('content','users.html');
	}
	
	function getlist()
	{
		//$clients = $this->client->load(array('is_client=?', 1));
		//foreach( as  $userData)
		//$response = $this->client->paginate(0,10); // results in $response['subset']
		
		$res['data'] = array();

		for ($this->client->load(); !$this->client->dry(); $this->client->next()) {
			$res['data'][] = $this->client->cast();
		}

		die(json_encode($res, JSON_PRETTY_PRINT));
	}
}

?>