<?php

class PluginTest extends BaseController implements Plugin
{
	function __construct()
	{
		parent::__construct();
	}
	
	function get()
	{
		$this->loadView('index.html');
		/* $pluginTemplate = new Template();
		echo  $template->render('app/plugins/pluginTest/views/index.html'); */
	}
	
	function post()
	{
		die('method POST');
		/* $pluginTemplate = new Template();
		echo  $template->render('app/plugins/pluginTest/views/index.html'); */
	}
	
	function getAjax()
	{
		die('method getAjax');
	}
	
	function getNotAjax()
	{
		die('getNotAjax');
		
	}
	
	function install()
	{
		$fullPathName = __DIR__;
		$fullPathName = str_replace(DIRECTORY_SEPARATOR, "/", $fullPathName);
		$fullPathName = $fullPathName.'/*.sql';
		
		if($fullPathName != null)
		{				
			foreach(glob($fullPathName) as $gl) // sa se incarce fisierele cu numele tabel.sql din plugins/db_tables
			{
				$sqlQuery = file_get_contents($gl);
				$this->db->exec(strval($sqlQuery));
			}			
		}
	}
	
	function remove()
	{
		$configFile = __DIR__.DIRECTORY_SEPARATOR.'config.php';
		
		if(file_exists($configFile))
		{
			$tmp = include($configFile);

			foreach($tmp["db_tables"] as $dbTable)
			{
				$tmp_sql = "DROP table IF EXISTS ".$dbTable;
				$this->db->exec($tmp_sql);
			}
		}
	}
}


?>