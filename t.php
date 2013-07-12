<?php
	require_once('common.php');
	if ( identity() === false ) {
		header('Location: /login.php');
	}
	$user_id = $_SESSION['current_user']['id'];
	$user = User::find($user_id);
	$teacher = $user->teacher;
	$course_list = $teacher->course;
	$GLOBALS['smarty']->assign('course_list', $course_list);
	if($course_list && $course_list[0]){
		$GLOBALS['smarty']->assign('lesson_list', $course_list[0]->lesson);
	}
	$GLOBALS['smarty']->display('tpl/t.tpl');
