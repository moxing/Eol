<?php
	require_once('common.php');

	$name = $_POST['name'];
	$input_password = $_POST['inputPassword'];
	if( $name && $input_password){
		$password = crypt($input_password);
		$user = User::find_by_name($name);
		if ($user && crypt($input_password, $password) == $password) {
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
			$smarty->assign('signup_erro', '用户名与密码不符合');
			$smarty->display('tpl/login.tpl');
		}
	}else{	
		$smarty->display('tpl/login.tpl');		
	}
