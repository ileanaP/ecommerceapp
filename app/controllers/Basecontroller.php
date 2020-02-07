<?php
class BaseController
{
	
	protected $db;
	protected $f3;
	protected $isLogged = false;
	protected $isClient = 0;
	protected $jsPath = "js/";
	
	function __construct()
	{
		global $f3, $db;
		$this->f3 = $f3;
		$this->db = $db;
		
		$session_data = $this->f3->get('SESSION');
		
		if(isset($session_data['is_logged']) && $session_data['is_logged'])
		{
			$this->f3->set('islogged', true);	
			$this->isLogged = true;
			
			$this->isClient = ($this->f3->get('SESSION.is_client')) ? true : false;
			$this->f3->set('isClient', $this->isClient);
		}

		$pageTitle = "SB Admin 2 - ".($this->isLogged ? "Dashboard" : "Login");
		$this->f3->set("pageTitle", $pageTitle);

		$this->f3->set('jsPath', "js/");
	}
	
	function loadJs($jsPath)
	{
		if($this->f3->exists('loadJs'))
			$this->f3->push('loadJs', $jsPath);
		else
			$this->f3->set('loadJs',array($jsPath));
	}
}

?>