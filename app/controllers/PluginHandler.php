<?php

class PluginHandler extends BaseController
{
	
	private $plugins;
		
	function __construct()
	{
		parent::__construct($path);
		$this->plugins = new DB\SQL\Mapper($this->db, 'plugins');
		$this->registerPlugins();
	}
	
	function registerPlugins()
	{
		global $autoloadPaths;
		
		$scanned_directory = array_diff(scandir($autoloadPaths['plugins']), array('..', '.'));
		$plugins 		   = $this->db->exec('SELECT baseClass FROM plugins;');
		$basePath 		   = array_chunk(explode(DIRECTORY_SEPARATOR, __DIR__), 3);
		$basePath = join('/',$basePath[0]);
		$baseClassArr = null;
		
		$basePath .= '/'.$autoloadPaths['plugins'];
		
		// print_r($plugins);
		// exit;

		if($scanned_directory && count($scanned_directory))
		{
			
			foreach($scanned_directory as $sdir)
			{
				$pluginCfgFile = $basePath.$sdir.'/config.php';
				
				
				if(file_exists($pluginCfgFile))
				{
					$pconfig = include($pluginCfgFile);
					$flag = 0;
					
					for($i = 0; $i < sizeof($plugins); $i++)
					{
						if($pconfig['baseClass'] == $plugins[$i]['baseClass'])
							$flag = 1;
						
					}
					
					if(isset($pconfig['baseClass']) && $pconfig['baseClass'] && ($flag == 0))
					{
						$baseClassArr[$pconfig['baseClass']] = array('baseClass' => $pconfig['baseClass'],
																	 'name' => (isset($pconfig['name']) && $pconfig['name'])?$pconfig['name']:$pconfig['baseClass'],
																	 'description' => (isset($pconfig['description']) && $pconfig['description'])?$pconfig['description']:null,
																	 'db_tables' => (isset($pconfig['db_tables']) && $pconfig['db_tables'])?$pconfig['db_tables']:null
																	);
						$plugin = new PluginModel($this->db);
						$plugin->add($baseClassArr[$pconfig['baseClass']]);
					}
				}
			}
					
			// print_r($baseClassArr);
			// print_r($plugins);
		}
	}
	
	function get()
	{
		$this->loadJs('/js/util.js');
        $this->loadJs('/js/plugins.js');

		$plugins = array();

		for($this->plugins->load(); !$this->plugins->dry(); $this->plugins->next())
		{
			$tmp = $this->plugins->cast();
			$plugins[] = $tmp;
		}

		$this->f3->set('plugins', $plugins);
		$this->f3->set('asdff', 123);
		$this->f3->set('content', 'plugins.html');

	}
	
	function loadActive()
	{
		$activePlugins = $this->db->exec('SELECT Id FROM plugins WHERE is_active = 1;');
		
		foreach($activePlugins as $active)
		{
			$this->loadRoutes($active['Id']);
		}		
	}
	
	function toggleStatus()
	{	
		$id = intval($this->f3->get('PARAMS.id'));
		$status = intval($this->f3->get('PARAMS.status'));
		$pluginHandler = new PluginHandler();

		if($status)
		{
			$this->setStatus($id, 0);
			die('0');
		}
		else
		{
			$this->setStatus($id, 1);
			die('1');
		}
	}

	function setStatus($pluginId, $status)
	{
		$pluginId = intval($pluginId);
		$status = $status ? 1 : 0;

		$activatePlugin = $this->plugins->load(array('Id=?', $pluginId));
		$activatePlugin->is_active = $status;
		$activatePlugin->save();
		
		if(class_exists($activatePlugin->baseClass))
		{
			$pluginObj = new $activatePlugin->baseClass();
			($status == 1)?$pluginObj->install():$pluginObj->remove();
		}
	}

	function loadRoutes($pluginId)
	{
		
		$plugin = $this->plugins->load(array('Id=?', $pluginId));
		$pluginName = $plugin->baseClass;
			
		foreach(glob('app/plugins/'.$pluginName) as $file)
		{	
			
			if($file && is_dir($file))
			{
				$dirFiles = scandir($file);			
				
				foreach($dirFiles as $f)
				{
					
					if($f == 'config.php')
					{
						$fullFilePath = 'app/plugins/'.$pluginName.'/'.$f;
						$this->parseRoutes($fullFilePath);
					}
		
				}
				
			}
		} 
	}
	
	function parseRoutes($file)
	{
		$config = include($file);
		$baseUrl = '/plugin/'.strtolower($config['baseClass']).'/';
		$routes = $config['routes'];
		
		for($i = 0; $i < sizeof($routes); $i++)                 
		{                     
			$way = $baseUrl.$routes[$i]['way']; //final route URL
			
			if($routes[$i]['method'] == 'map')
				$this->f3->map(rtrim($baseUrl, '/'), $routes[$i]['call']);
			else
			{				
				$route = str_replace('//','/',$routes[$i]['method'].' '.$way.$routes[$i]['params'].' '.$routes[$i]['ajax']);
				$this->f3->route(rtrim($route, '/'), $routes[$i]['call']);
			}
		}
	}
	
	/* function updateDatabase($pluginId)
	{
		$plugin = $this->plugins->load(array('Id=?', $pluginId));
		$pluginName = $plugin->name;
		$fullPathName = 'app/plugins/'.$pluginName.'/'.'dataBase/'.'sqlScripts.php';
		// print_r($fullPathName);exit;
		
		if($fullPathName != null)
		{	
			$sqlQuery = include($fullPathName);
			
			for($i = 0; $i < sizeof($sqlQuery); $i++)
			{
				if($sqlQuery[$i] != null)
				{
					// print_r($sqlQuery[$i][0]["Create Table"]);exit;	
					$this->db->exec($sqlQuery[$i]);
					
				}	
				
			}
			
			$this->loadSqlData($pluginName);
		}
	}

	function loadSqlData($pluginName)
	{
		$fullPathName = 'app/plugins/'.$pluginName.'/'.'dataBase/'.'loadTableContent.php';
		
		if($fullPathName != null)
		{
			$tableContent = include($fullPathName);
			
			if($tableContent)
			{
			   for($i = 0; $i < sizeof($tableContent); $i++)
			   {
				  $this->db->exec($tableContent[$i]);
			   }
			}
		}
	}	
	
	function removeDbTables($pluginId)
	{
		$plugin = $this->plugins->load(array('Id=?', $pluginId));
		$pluginName = $plugin->name;
		$fullPathName = 'app/plugins/'.$pluginName.'/'.'dataBase/'.'removeSqlTables.php';
		
		if($fullPathName != null)
		{
			$removeSqlTables = include ($fullPathName);
			// print_r($removeSqlTables['tables_to_delete']);exit;	
			
			for($i = 0; $i < sizeof($removeSqlTables); $i++)
			{
				if($removeSqlTables[$i] != null)
				{
					// print_r($removeSqlTables['tables_to_delete']);exit;	
					$this->db->exec('DROP TABLE'.' '.strval($removeSqlTables[$i]).';');
					
				}	
				
			}
		}
	}	

	
	function delete()
	{
		die('function delete');
	} */
}

// Declare the interface 'Plugin'
interface Plugin
{
    public function install();
    public function remove();
}
?>