<?php
	require_once('common.php');
	if ( identity() === false ) {
		header('Location: /login.php');
	}

	$does = array('sub','favorite','center');

	$do = in_array($_GET['do'], $does)?$_GET['do']:'sub';

	$user_id = $_SESSION['current_user']['id'];
	$user = User::find($user_id);

	$course_list = Course::find('all',array('order'=>'updated_at desc'));

	$GLOBALS['smarty']->assign('course_list', $course_list);
	$GLOBALS['smarty']->display('tpl/u.tpl');
