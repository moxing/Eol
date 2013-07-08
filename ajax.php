<?php
	require_once('common.php');

	$do = $_GET['do'];
	if( in_array($do,array('teacher')) && identity()==ADMIN ){
		if( $do=='teacher'){
			// $list = Teacher::find('all',array('order'=>'updated_at'));
			// $GLOBALS['smarty']->assign('list',$list);
			$GLOBALS['smarty']->display('tpl/a_teacher.tpl');
		}
    }