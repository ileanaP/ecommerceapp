<?php


class UserDelete extends BaseController
{
	
	private $userToDelete;
	
	function __construct()
	{
		parent::__construct();
		$this->userToDelete = new DB\SQL\Mapper($this->db,'user');
	}
	
	function get()
	{	
		
		$this->loadJs('/js/user.js');
		if(isset($id) && $id)
		{
			if($user = $this->userToDelete->load(array('id=?', $id)))
				die(json_encode($user->cast(), JSON_PRETTY_PRINT));
		}
		
	}
	
	function post()
	{	

		$id = $_POST['deleteUser'];
		
		var_dump($id);
		
		
			
		if($id)
		{
			$user = $this->userToDelete->load(array('id=?', $id));
			print_r($user);
			$user->erase();
			

		}
		
	}
	
	
}

?>