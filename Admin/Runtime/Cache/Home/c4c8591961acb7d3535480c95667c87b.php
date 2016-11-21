<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh-CN">
<head>
	<Link Rel="SHORTCUT ICON" href="/Project/Public/logo.png">
	<meta charset="UTF-8">
	<meta name="renderer" content="webkit">
    <link rel="stylesheet" href="/Project/Public/Admin/css/login.css">
    <script type="text/javascript" src="/Project/Public/Admin/js/jquery.min.js"></script>
    <script src="/Project/Public/Admin/js/base_login.js" type="text/javascript" charset="utf-8"></script>
	<title>后台登陆</title>
</head>
<body>
	<div id="login_top">
		<div id="welcome">
			欢迎来到测绘与国土信息工程学院管理系统
		</div>
		<div id="back">
			<a href="/">返回官网首页</a>
		</div>
	</div>
	<div id="login_center">
		<div id="login_area">
			<div id="login_form">
				<form action="<?php echo U('Login/checkInfo');?>" id="form_login" method="post">
					<div id="login_tip">
						用户登录&nbsp;&nbsp;UserLogin
					</div>
					<div id="info_name" style="position: relative;">
						<input type="text" class="username" name="username">
						<p id="tips" oncontextmenu="return false" onselectstart="return false" style="position: absolute; right: 30px;top: 35px;"></p>
					</div>
					<div><input type="password" class="pwd" name="password"></div>
					<div id="btn_area">
						<input type="button" id="sub_btn" onclick="ajaxLogin('<?php echo U('Login/login');?>')" value="登&nbsp;&nbsp;录">&nbsp;&nbsp;
						<input type="text" name="verify" class="verify">
						<img id="verifyImg" src="<?php echo U('Login/verifyImg');?>" alt="" width="100" height="40">
					</div>
				</form>
			</div>
		</div>
	</div>
	<div id="login_bottom">
		&copy;河南理工大学<br/>测绘与国土信息工程学院&emsp;技术支持&nbsp;<a href="http://www.xsgzs.org/">行思工作室</a>
	</div>
</body>
</html>