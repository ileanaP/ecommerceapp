<?php

class Login extends BaseController
{
	

	function post()
	{
		$session_data = $this->f3->get('SESSION');
		
		if(isset($session_data['is_logged']) && $session_data['is_logged'])
			die('1');
		
		$password = (isset($_POST['password']) && $_POST['password'])?trim($_POST['password']):null;
		$username = (isset($_POST['username']) && $_POST['username'])?trim($_POST['username']):null;
		
		if($password && $username)
		{
			$user = new DB\SQL\Mapper($this->db,'user');
			$ucheck = $user->load(array('email =? AND password = ? AND is_activ = ?',$username,sha1($password),1));
		
			if($ucheck)
			{
				$this->f3->set('SESSION.is_logged',1);
				$this->f3->set('SESSION.is_logged', $user->id);
				$this->f3->set('SESSION.is_client', $user->is_client);
				die('1');
			}
		}
		die('Invalid login');
	}
}
?>

