<?php

class Home extends BaseController
{
    function __contruct() {}

    function get()
    {
        $session_data = $this->f3->get('SESSION');
		
		if(isset($session_data['is_logged']) && $session_data['is_logged'])
			$this->f3->reroute('/tickets');
			
		$this->f3->set('content', 'home.html');
    }
}