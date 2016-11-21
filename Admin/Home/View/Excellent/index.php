<extend name="Public/Admin/base_admin.php" />
<block name="title">
	主页内容管理
</block>
<block name="css_js">
	<script type="text/javascript">
		$().ready(function(){
			$("#excellentManager").attr('class','on');
		})
	</script>
</block>
<block name="location">
	主页内容管理
</block>
<block name="main">
		<form action="{:U('Excellent/index')}" method="post" style="padding: 10px;">
			<span>您需要管理</span>
			<select name="type">
			<option value="优秀学生">优秀学生</option>
			<option value="优秀事迹">优秀事迹</option>
			</select>
			<span>显示数量</span>
			<select name="limit">
			<option value="10">最新10条</option>
			<option value="20">最新20条</option>
			<option value="50">最新50条</option>
			<option value="100">最新100条</option>
			<option value="">显示所有</option>
			</select>
		<input type="submit" id="submit" value="进入" /></form>
	<table border="1px" cellspacing="0" width="100%">
		<tr>
			<th>发布人</th>
			<th>类别</th>
			<th>标题</th>
			<th>信息</th>
			<th>发布时间</th>
			<th>操作</th>
		</tr>
		<if condition="$excellent eq null">
			<tr>
				<td colspan="6" align="center">请选择您要管理的内容类型</td>
			</tr>
		<else />
			<foreach name="excellent" item="vo">
			<tr>
				<td align="center">{$vo['admin']}</td>
				<td align="center">{$vo['type']}</td>
				<td align="center">{$vo['title']}</td>
				<td align="center">{$vo['info']}</td>
				<td align="center">{$vo['date']}</td>
				<td align="center">
					<a href="{:U('Excellent/updateExcellent',array('id'=>$vo['id']))}">[修改]</a>
					<a href="{:U('Excellent/delExcellent',array('id'=>$vo['id']))}">[删除]</a>
				</td>
			</tr>
			</foreach>
		</if>
	</table>
</block>