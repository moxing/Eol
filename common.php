<?php
	define('USER', 0);
	define('AUSER', '1');
	define('TEACHER', '2');
	define('ADMIN', '3');

	date_default_timezone_set("PRC");
	require_once('lib/smarty/Smarty.class.php');
    $GLOBALS['smarty'] = new Smarty();
 	
	require_once('lib/activerecord/ActiveRecord.php');
	$cfg = ActiveRecord\Config::instance();
	$cfg->set_model_directory('models');
	$cfg->set_connections(array('development' => 'mysql://root:@127.0.0.1/eol;charset=utf8'));

	require_once('lib/PasswordHash.php');
	$hasher = new PasswordHash(8, false);
	
	function get_post_var($var)
	{
		$val = $_POST[$var];
		if (get_magic_quotes_gpc())
			$val = stripslashes($val);
		return $val;
	}

	function msg($msg,$type=0){
		$GLOBALS;
		$GLOBALS['smarty']->assign('message',$msg);
		$GLOBALS['smarty']->display('tpl/msg.tpl');
		exit;
	}

