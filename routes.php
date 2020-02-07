<?php
$f3 = Base::instance();

$f3->map('/', 'Home');	

$f3->route('GET /logout', function($f3)
{
	$f3->clear('SESSION');
	$f3->reroute('/');
});

$f3->route('GET /cucu','DebugDb->get');
	
$f3->set('ONERROR',function($f3){
  echo Template::instance()->render('app/view/error.html');
});

/* $f3->route('GET /register',
	function($f3){
		$f3->set('content', 'register.html');
	}); */
	

	
$f3->map('/login','Login');

$f3->route('GET /tickets/@id                    ','Ticket->getById');

$f3->route('GET /tickets/@id/toggleStatus [ajax]','Ticket->toggleStatus');

$f3->route('GET /tickets/all              [ajax]', 'Ticket->getAll');

$f3->route('GET /tickets/conv/@id         [ajax]', 'Ticket->getByIdConv');

$f3->map('/tickets','Ticket');

$f3->map('/create_ticket', 'CreateTicket');

$f3->map('/register', 'Register');

$f3->map('/users', 'Users');

$f3->route('GET /users [ajax]', 'Users->getlist');

$f3->route('GET /user/@id [ajax]', 'User->get');

$f3->map('/user', 'User');

$f3->map('/userdelete', 'UserDelete');

$f3->map('/viewTicket', 'ViewTicket');

$f3->route('GET /viewTicket/@id [ajax]', 'ViewTicket->getTicketData');

$f3->route('GET /@pluginName/@controller/@method', '@pluginName\@controller->@method');

$f3->map('/plugins', 'PluginHandler');

$f3->route('GET /plugins [ajax]', 'PluginHandler->get');


$f3->route('GET /plugins/status/@id/@status','PluginHandler->ToggleStatus');
	

//$f3->route('GET /userdelete/@id [ajax]', 'UserDelete->get');

//$f3->route('POST /adminTickets', 'Admin->post');

/* /user/id -> GET
/user -> POST
/user -> PUT
/user -> DELETE */


	
	

//
?>