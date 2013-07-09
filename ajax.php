<?php
	require_once('common.php');

	$do = $_GET['do'];
	if( in_array($do,array('teacher')) && identity()==ADMIN ){
		if( $do=='teacher'){
			if($_POST['op']!=null && $_POST['op']==='add'){

				$name=$_POST['name'];
				$school=$_POST['school'];
				$desc=$_POST['desc'];

				$newpwd = mt_rand(10000000,99999999);
				$new_user = new User();
				$new_user->name =$name;
				$new_user->password = $hasher->HashPassword($newpwd);
				$new_user->type = TEACHER;
				$new_user->save();
				$teacher = $new_user->create_teacher(array('ori_pwd'=>$newpwd,'desc'=>$desc));
				echo json_encode(array('user' => $new_user));
				exit();
			}else{
				$list = Teacher::find('all',array('order'=>'updated_at'));
				$smarty->assign('teacher_list', $list);
				$GLOBALS['smarty']->display('tpl/a_teacher.tpl');
			}
		}
    }