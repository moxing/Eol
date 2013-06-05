<?php
	require_once('common.php');

	if($_POST['submit']){
		if($_POST['inputEmail']){
			$email = $_POST['inputEmail'];
			$smarty->assign('email',$email);
			if(filter_var($email, FILTER_VALIDATE_EMAIL)==false){
				$smarty->assign('signup_erro', '邮箱地址错误');
				$smarty->display('tpl/signup.tpl');
				exit;
			}
			if(User::find_by_email($email)){
				$smarty->assign('signup_erro', '邮箱已被其他用户使用，请换一个新邮箱');
				$smarty->display('tpl/signup.tpl');
				exit;
			}
		}else{
			$smarty->assign('signup_erro', '邮箱不能为空');
			$smarty->display('tpl/signup.tpl');
			exit;	
		}

		if($_POST['inputName']){
			$name = $_POST['inputName'];
			$smarty->assign('name',$name);
			if(User::find_by_name($name)){
				$smarty->assign('signup_erro', '用户名已被其他用户使用，请换一个新用户名');
				$smarty->display('tpl/signup.tpl');
				exit;
			}
		}else{
			$smarty->assign('signup_erro', '用户名不能为空');
			$smarty->display('tpl/signup.tpl');
			exit;
		}


		if($_POST['inputPassword']){
			$password = $_POST['inputPassword'];
			$smarty->assign('password',$password);
		}else{
			$smarty->assign('signup_erro', '密码不能为空');
			$smarty->display('tpl/signup.tpl');
			exit;		
		}

		if($_POST['inputCode']){
			$code = $_POST['inputCode'];
			$smarty->assign('code',$code);
			$type = 1;
		}else{
			$type = 0;
		}
		// $email = 'email1';
		// $name = 'name1';
		// $password = 'pwd1';

		$new_user = new User();
		$new_user->email = $email;
		$new_user->name =$name;
		$new_user->password = crypt($password);
		$new_user->type = $type;
		$new_user->save();

		if( $new_user->id ){
			$_SESSION['current_user'] = array('id'=>$new_user->id,'name' => $new_user->name,'type' => $new_user->type);
		}
		header("Location: /u.php");		
	}else{
		$smarty->display('tpl/signup.tpl');
	}



	