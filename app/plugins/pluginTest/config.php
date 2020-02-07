<?php

$config = array('baseClass' => 'PluginTest',
				'name' => 'Plugin de Test ',
				'db_tables' => array('cart', 'products'), // sa fie precedate table names de pluginTest_...
				'description' => 'Lorem ipsum dolor sit amet... ceva aici',
				'routes'    => array(
									array('method' => 'map', 'way' => '@tmp', 'params'=> null, 'ajax' => null, 'call' => 'PluginTest'),
									array('method' => 'GET', 'way' => '@tmp', 'params'=>'@id', 'ajax' => '[ajax]', 'call' => 'PluginTest->getAjax'),
									array('method' => 'GET', 'way' => null, 'params'=>'@id/@id2/@id3', 'ajax' => null, 'call' => 'PluginTest->getNotAjax')
								),
				'menu'     => 'Plugin de test',
				'submenu'  => array('optiune 1', 'optiune 2', 'optiune 3')
		);
		
return $config;

////rerutare pt users
// $route = array(
			// array('method' => 'GET', 'way' => '/importantFu/@tmp', 'params'=>'null', 'ajax' => '0', 'call' => 'FlowerPlugin->importantPluginMethod'),
			// array('method' => 'GET', 'way' => '/importantFu/@tmp', 'params'=>'/@id', 'ajax' => '0', 'call' => 'FlowerPlugin->importantPluginMethod'),
			// array('method' => 'GET', 'way' => '/importantFu/@tmp', 'params'=>'/@id', 'ajax' => '[ajax]', 'call' => 'FlowerPlugin->importantPluginMethod'),
			// array('method' => 'GET', 'way' => '/plugins/testRoute', 'params'=>'null', 'ajax'=>'0', 'call' => 'TestRoute'),
			// array('method' => 'GET', 'way' => '/plugins/testRoute', 'params'=>'null', 'ajax'=>'0', 'call' => 'TestRoute'),
			// array('method' => 'GET', 'way' => '/plugins/testRoute2', 'params'=>'null', 'ajax'=>'', 'call' => 'TestRoute->close'),
			// array('method' => 'GET', 'way' => '/users', 'params'=>'null', 'ajax'=>'[ajax]', 'call' => 'Users->getList')
		// );
		
// return $route;				
?>