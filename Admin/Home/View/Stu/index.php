<extend name="Public/Admin/base_admin.php" />
<block name="title">
	学生账户管理
</block>
<block name="css_js">
	<script type="text/javascript">
	function ajaxToggleStatus($url,$stuid){
		$.post($url,{'stuId':$stuid},function(){
			location.reload(true);
		});
	}
	function ajaxDelStu($url,$stuid){
		$.post($url,{'stuId':$stuid},function(){
			location.reload(true);
		});
	}
	</script>
	<script type="text/javascript">
		$().ready(function(){
			$("#stu_manager").attr('class','on');
		})
	</script>
</block>	
<block name="location">
	学生账户管理
</block>
<block name="main">
	<!--导入学生的Excel文件-->
	<div id="import_stu" style="margin: 10px 0 10px 20px;">
		<form action="{:U('Stu/uploadStu')}" method="post" enctype="multipart/form-data">
		<p><span style="font-weight: bold;">学生账户导入</span><span style="color: red;">(Excel第一列为学号,第二列为姓名,文档内不能有合并单元格之类的特殊格式,第一行表头默认忽略)</span></p>
		<input type="file" name="file" id="file" />
		<input type="submit" value="导入"/>
		</form>
	</div>
	<hr />
	<div id="" style="margin: 10px 0 10px 20px;">
		<form action="{:U('Stu/addStu')}" method="post">
			<h3>添加学生账户</h3>
			<label for="stuName">学生姓名：<input type="text" name="stuName" id="stuName" /></label>
			<label for="stuId">学生学号：<input type="text" name="stuId" id="stuId" /></label>
			<label for="password">密码：<input type="text" name="password" id="password" /></label>
			<input type="submit" value="执行添加"/>
		</form>
	</div>
	<table border="1px" cellspacing="0" width="100%"> 
		<tr>
			<form action="{:U('Stu/searchStu')}" method="post">
			<td colspan="4" align="center"><label for="name">姓名：<input type="text" name="stuName" /></label>
			<label for="stuId">学号：<input type="text" name="stuId" /></label>
			<input type="submit" value="搜索" style="padding: 3px 20px;"/></td>
			</form>
		</tr>
		<tr>
			<th>学号</th>
			<th>姓名</th>
			<th>是否可用</th>
			<th>操作</th>
		</tr>
	<foreach name="stuList" item="list">
		<tr>
			<td align="center">{$list['stuid']}</td>
			<td align="center">{$list['stuname']}</td>
			<td align="center"><if condition="$list['avaliable'] eq 0">
				    已禁用
				    <else />
				    已启用
				</if></td>
			<td align="center"><a href="javascript:void(0)" onclick="ajaxToggleStatus('{:U('Stu/statusToggle')}','{$list['stuid']}')">
				<!--判断账户的启用状态，输出不同的按钮-->
				<if condition="$list['avaliable'] eq 1">
				    [禁用]
				    <else />
				    [启用]
				</if>
			</a> 
				<a href="javascript:void(0)" onclick="ajaxDelStu('{:U('Stu/delStu')}','{$list['stuid']}')">
					[删除]
				</a></td>
		</tr>
	</foreach>
	<tr>
		<td colspan="4" align="center">
			<if condition="$stuList eq null">
				<font color="red">请输入检索条件</font>
				<else/>
				搜索完成！
			</if>
		</td>
	</tr>
</table>
</block>
