<?php
	date_default_timezone_set("PRC");
	require_once('lib/smarty/Smarty.class.php');
    $smarty = new Smarty();
	
	require_once('lib/activerecord/ActiveRecord.php');
	$cfg = ActiveRecord\Config::instance();
	$cfg->set_model_directory('models');
	$cfg->set_connections(array('development' => 'mysql://root:@127.0.0.1/eol;charset=utf8'));

	session_start();



