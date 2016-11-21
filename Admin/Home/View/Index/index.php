<extend name="Public/Admin/base_admin.php" />
<block name="title">后台管理-首页</block>
<block name="css_js">
	<script type="text/javascript">$().ready(function() {
	$("#index").attr('class', 'on');
})</script>
	<style type="text/css">
		p{ padding: 5px 0 5px 40px; border-bottom: 1px dotted skyblue; color: gray; font-size: 18px; font-family: "微软雅黑";}
		font{padding: 10px 0 0 40px; font-size: 15px;display: block;}
	</style>
</block>
<block name="location">首页</block>
<block name="main">
	<font color="orangered">后台管理仅限管理员使用，请谨慎使用，在删除数据前进行确认，以免误删！</font>
	<font color="orangered">Excel表格的导入一定要按照规定的行列格式来上传，否则将会给数据库添加错误的信息！</font>
	<p>当前管理员：<?php echo cookie('adminName') ?></p>
	<p>管理员ID：<?php echo cookie('adminId') ?></p>
	<p>管理员级别：<?php $level=cookie('adminLevel');
 if ($level=='0') {
 	echo '校级';
 }
 
 elseif ($level=='1') {
 	echo '院级';
 }
 
 elseif ($level=='2') {
 	echo '班主任';
 }
 
 elseif ($level=='3') {
 	echo '辅导员';
 }?>
	</p>
	<p>当前主机名：<?php echo $_SERVER['SERVER_NAME']; ?> </p>
	<p>网站运行环境：<?php echo $_SERVER['SERVER_SOFTWARE']; ?></p>
	<p>浏览器信息：<?php echo $_SERVER['HTTP_USER_AGENT']; ?> </p>
	<p>文件根目录：<?php echo $_SERVER['DOCUMENT_ROOT']; ?> </p>
	<p>CGI规范版本：<?php echo $_SERVER['GATEWAY_INTERFACE']; ?> </p>
	<p>网络通信协议：<?php echo $_SERVER['SERVER_PROTOCOL']; ?> </p>
	<p>当前登录IP：<?php echo $_SERVER['REMOTE_ADDR']; ?> </p>
</block>
