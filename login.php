<?php
	require_once('common.php');

	$name = get_post_var('inputName');
	$password = get_post_var('inputPassword');

	if( $name!=null && $password!=null){
		$user = User::find_by_name($name);

		if ($hasher->CheckPassword($password,$user->password)) {
			session_start();
			$_SESSION['current_user'] = array('id'=>$user->id,'name' => $user->name,'type' => $user->type);
			if( $user->type == USER || $user->type == AUSER){
				header("Location: /u.php");	
			}
			if( $user->type == TEACHER){
				header("Location: /t.php");	
			}
			if( $user->type == ADMIN){
				header("Location: /a.php");	
			}
		}else{
			$GLOBALS['smarty']->assign('login_erro', '用户名与密码不符合');
			$GLOBALS['smarty']->display('tpl/login.tpl');
		}
	}else{
		$GLOBALS['smarty']->display('tpl/login.tpl');		
	}
