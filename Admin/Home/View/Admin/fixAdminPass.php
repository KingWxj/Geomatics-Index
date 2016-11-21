<extend name="Public/Admin/base_admin.php" />
<block name="css_js">
	<script type="text/javascript">
		$().ready(function(){
			$("#fix_pass").attr('class','on');
		})
	</script>
</block>
<block name="title">管理员密码修改</block>
<block name="location">管理员密码修改</block>
<block name="main">
		<form action="{:U('Admin/runFixAdminPass')}" method="post">
			当前管理员：{$Think.cookie.adminName}
			<br />
			新密码：<input type="password" name="newPassword" id="newPassword" />
			<br />
			重复密码：<input type="password" name="rePassword" id="rePassword" />
			<br />
			<input type="submit" value="修改密码"/>
		</form>
</block>
