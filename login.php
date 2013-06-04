<?php
	require_once('common.php');

	if( $_POST['inputName'] && $_POST['inputPassword']){
		$name = $_POST['name'];
		$password = crypt($_POST['inputPassword']);
		$user = User::find_by_name($name);
		if (crypt($user_input, $password) == $password) {


		}
	}
	$smarty->display('tpl/login.tpl');