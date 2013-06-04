<!DOCTYPE html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <link href="assets/stylesheets/default.css" rel="stylesheet">
	<title>呦呦云课堂{if $title}$title{/if}</title>
</head>
<body>
  <div class="navbar">
    <div class="navbar-inner">
      <a class="brand">呦呦云课堂</a>
      <ul class="nav">
        <li><a href="index.php">首页</a></li>
        <li><a href="#">精品课程</a></li>
      </ul>
      <ul class="nav pull-right">
        {if $user}
          <li><a href="">设置</a></li>
          <li><a href="/logout.php">退出</a></li>
        {else}
          <li><a href="/login.php">登录</a></li>
          <li><a href="/signup.php">注册</a></li>
        {/if}
      </ul>
    </div>
  </div>
  <div class="container">