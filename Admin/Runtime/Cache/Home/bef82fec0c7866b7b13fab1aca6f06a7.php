<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">

    <link rel="stylesheet" href="/Public/Admin/css/login.css">
    <script type="text/javascript" src="/Public/Admin/js/jquery.min.js"></script>
    <script src="/Public/Admin/js/base_login.js" type="text/javascript" charset="utf-8"></script>
	<title>后台登陆</title>
</head>
<body>
	<div id="login_top">
		<div id="welcome">
			欢迎来到测绘与国土信息工程学院管理系统
		</div>
		<div id="back">
			<a href="#">返回首页</a>&nbsp;&nbsp; | &nbsp;&nbsp;
			<a href="#">帮助</a>
		</div>
	</div>
	<div id="login_center">
		<div id="login_area">
			<div id="login_form">
				<form action="<?php echo U('Login/login');?>" method="post">
					<div id="login_tip">
						用户登录&nbsp;&nbsp;UserLogin
					</div>
					<div><input type="text" class="username" name="username"></div>
					<div><input type="password" class="pwd" name="password"></div>
					<div id="btn_area">
						<input type="button" id="sub_btn" value="登&nbsp;&nbsp;录">&nbsp;&nbsp;
						<input type="text" class="verify">
						<img src="/Public/Admin/images/login/verify.png" alt="" width="80" height="40">
					</div>
				</form>
			</div>
		</div>
	</div>
	<div id="login_bottom">
		&copy;河南理工大学<br/>测绘与国土信息工程学院
	</div>
</body>
</html>