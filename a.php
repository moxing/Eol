<?php
require_once('common.php');

if( identity()!=ADMIN ){
	header('Location: /index.php');
}

// if($_POST['do'] == 't'){
// 	$new_user = new User();
// 	$pwd = hash('md5', microtime());
// 	$new_user->name = "小红老师";
// 	$new_user->password = crypt($pwd);
// 	$new_user->save();
// 	$teacher = $new_user->create_teacher(array('ori_pwd'=>$pwd));
// }

if($_GET['do'] === 't'){

}

if($_POST['do'] === 'addteacher'){
	
}

$GLOBALS['smarty']->display('tpl/a.tpl');
