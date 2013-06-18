<?php
	require_once('common.php');
	if (!isset($_SESSION['current_user'])) {
		header('Location: /login.php');
	}

	$GLOBALS['smarty']->display('tpl/u.tpl');
