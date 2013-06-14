<?php

	// if (!isset($_SESSION['current_user'])) {
	// 	header('Location: /login.php');
	// }
	session_start();
	var_dump($_SESSION['current_user']);