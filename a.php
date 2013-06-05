<?php
require_once('common.php');


// if($_POST['do'] == 't'){
	// $new_user = new User();
	// $pwd = hash('md5', microtime());
	// $new_user->name = "小红老师";
	// $new_user->password = crypt($pwd);
	// $new_user->save();
	// $teacher = $new_user->create_teacher(array('ori_pwd'=>$pwd));
// }
	var_dump(Teacher::first());