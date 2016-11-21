<extend name="Public/Admin/base_admin.php" />
<block name="title">
	添加管理员
</block>
<block name="location">
	添加管理员
</block>
<block name="css_js">
	<script type="text/javascript">
		$().ready(function(){
			$("#add_admin").attr('class','on');
		})
	</script>
</block>
<block name="main">
	<if condition="$Think.cookie.adminLevel eq 3">
		对不起，只有学校管理员和学院管理员有权限添加账户
		<elseif condition="$Think.cookie.adminLevel eq 2"/>
		对不起，只有学校管理员和学院管理员有权限添加账户
		<else />
		<form action="{:U('Admin/runAddAdmin')}" method="post">
			<label for="name">管理员姓名：</label>
			<input type="text" id="name" name="name" />
			<br />
			<label for="password">管理员密码：</label>
			<input type="password" id="password" name="password" />
			<br />
			<label for="level">选择级别：</label>
			<select name="level">
				<if condition="$Think.cookie.adminLevel eq 0">
					<option value="0">学校</option>
					<option value="1">学院</option>
					<option value="2">班主任</option>
					<option value="3">辅导员</option>
					<elseif condition="$Think.cookie.adminLevel eq 1"/>
					<option value="1">学院</option>
					<option value="2">班主任</option>
					<option value="3">辅导员</option>
				</if>
			</select>
			<br />
			<input type="radio" name="avaliable" id="adminOn" class="avaliable" value="1" />
			<label for="adminOn">启用</label>
			<input type="radio" name="avaliable" id="adminOff" class="avaliable" value="0" />
			<label for="adminOff">禁用</label>
			<br  />
			<input type="submit" id="submit" value="添加管理员" />
		</form>
	</if>
</block>