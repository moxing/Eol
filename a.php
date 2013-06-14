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

	$hashedPassword = $hasher->HashPassword('1');
	echo $hashedPassword."<br/>";
	// 你现在可以安全地保存$hashedPassword到数据库中!
	// 通过比较用户输入内容（产生的哈希值）和我们之前计算出的哈希值，来判断用户是否输入了正确的密码
	echo "1:".$hasher->CheckPassword('the wrong password', $hashedPassword); // 返回假
	echo "2:".$hasher->CheckPassword('1', '$2a$08$niUr0.Q6mx7PWqW/3PoVJeq4jjeNN4g/aevQAFlLXLkAZN896a3Qa'); // 返回真