<?php
	require_once('common.php');

	$do = $_GET['do'];
	if( in_array($do,array('teacher')) && identity()==ADMIN ){
		if( $do=='teacher'){
			$list = Teach::find('')
			$GLOBALS['smarty']->display('tpl/a_teacher.tpl');
		}
    }