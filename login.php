<?php
	require_once('common.php');

	if( $_POST['inputName'] && $_POST['inputPassword']){
		$name = $_POST['name'];
		$password = crypt($_POST['inputPassword']);
		$user = User::find_by_name($name);
		if (crypt($user_input, $password) == $password) {
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
		$smarty->assign('login_erro', '缺少必要的登录信息');		
		$smarty->display('tpl/login.tpl');		
	}
