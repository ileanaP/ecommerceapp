<?php



class User extends BaseController
{
	
	public $userTb;
	
	function __construct()
	{
		parent::__construct();
		$this->userTb = new DB\SQL\Mapper($this->db,'user');
		
		
	}
	
	function get()
	{
		$id = $this->f3->get('PARAMS.id');
		
		if(isset($id) && $id)
		{
			
			if($user = $this->userTb->load(array('id=?', $id)))
				die(json_encode($user->cast(), JSON_PRETTY_PRINT));
		}
		
		
		die('0');
	}
	
	function post()
	{
		//echo('userPostMethod'); POST.id ?
		
		$id = ($this->f3->get('POST.id') && $id = abs(intval($this->f3->get('POST.id'))))?$id:null;
				
		if($id)
		{
			if($user = $this->userTb->load(array('id=?',$id)))
			{
				$user->copyFrom('POST');
				$user->save();
				die($id);
			}
		}
		else
		{
			if(!$checkLoggedState = $this->userTb->load(array('email=?', $this->f3->get('POST.email'))))
			{
				
				$this->userTb->name = $this->f3->get('POST.name');
				$this->userTb->email = $this->f3->get('POST.email');
				$this->userTb->token = md5($this->f3->get('POST.email'));
				$this->userTb->is_activ = $this->f3->get('POST.is_activ');
				$this->userTb->is_client = $this->f3->get('POST.is_client');
				$this->userTb->username = $this->f3->get('POST.email');
				$this->userTb->password = sha1($this->f3->get('POST.password'));
				
				print_r($this->userTb);
				$this->userTb->save();
				die($this->userTb->id);
			}	
		}
		die('Invalid data');
	}
	
	
	function manageUsers()
	{
		
		$clients = $this->client->load(array('is_client=?', 1));
		
		$activClients = $this->client->load(array('is_client=? and is_activ=?', 1, 1));
		
		$inactivClients = $this->client->load(array('is_client=? and is_activ=?', 1, 0));
					
		die($_POST['editedUserArray']);
	
	}
	
	
}

	











?>