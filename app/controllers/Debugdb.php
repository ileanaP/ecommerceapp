<?php

class DebugDb extends BaseController
{
	
	function get()
	{
		$this->f3->set('result',$this->db->exec('SELECT * FROM user WHERE id = 2'));
		$this->f3->set('content', 'debugdb.html');
	}
}

?>