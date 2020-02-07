<?php

class Register extends BaseController
{
	private  $newUserData;
			
	function __construct()
	{
		parent::__construct();
		
		$this->newUserData = new DB\SQL\Mapper($this->db, 'user');
	}
	
	function get()
	{
		$this->f3->set('content', 'register.html');
	}
	
	function post()
	{
		$reqfields = array('firstName', 'lastName', 'email', 'password');
		
		foreach($reqfields as $field)
		{
			$$field = (isset($_POST[$field]) && $_POST[$field])?trim($_POST[$field]):null;
			
			if(!$field)
				die('0');
		}
		
		$repeatPassword = (isset($_POST['repeatPassword']) && $repeatPassword = trim($_POST['repeatPassword']))?$repeatPassword:null;
		
		if($repeatPassword != $password || !$email || !$password)
			die('0');
		
		
		$name = $firstName.' '.$lastName;
		
		if(empty($checkLoggedState = $this->newUserData->load(array('email=?',$email))))
		{
			
			$this->newUserData->name = $name;
			$this->newUserData->email = $email;
			$this->newUserData->token = md5($email);
			$this->newUserData->is_activ = 0;
			$this->newUserData->is_client = 1;
			$this->newUserData->username = $email;
			$this->newUserData->password = sha1($password);
			$this->newUserData->save();
			die('1');
		}	
		
		die('0');
	}
}

?>