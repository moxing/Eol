<?php
	require_once('common.php');
	if ( identity() === false ) {
		header('Location: /login.php');
	}

	$GLOBALS['smarty']->display('tpl/u.tpl');
