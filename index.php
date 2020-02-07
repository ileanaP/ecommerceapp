<?php
  
require('config.php');
require('lib/session.php');
$f3 = require('lib/base.php');
require('routes.php');

$f3->set('AUTOLOAD',$autoloadPaths['core']);

foreach(glob($autoloadPaths['plugins'].'*') as $file)
{
    if (is_dir($file))
        $f3->AUTOLOAD.=';'.$file.'/';
}


$f3->set('DEBUG',3);
$f3->set('CACHE',false);
//setting bdd connection
if(DbPassword != null)
	$db = new DB\SQL("mysql:host=".DbServer.";port=3306;dbname=".DbName,"'".DbUser."'","'".DbPassword."'");
else
	$db = new DB\SQL("mysql:host=".DbServer.";port=3306;dbname=".DbName,"'".DbUser."'");

$plugin = new PluginHandler();
$plugin->loadActive();
/* print_r($f3->hive());
exit; */
$f3->run();
$template = new Template;
echo $template->render('app/view/index.html');



?>