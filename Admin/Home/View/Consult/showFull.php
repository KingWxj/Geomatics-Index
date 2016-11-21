<extend name="Public/Admin/base_admin.php" />
<block name="title">咨询小屋管理</block>
<block name="location">咨询小屋管理</block>
<block name="css_js">
	<script type="text/javascript">
		$().ready(function(){
			$("#consult").attr('class','on');
		})
	</script>
</block>
<block name="main">
	<table border="1px" cellspacing="0" width="100%">
		<tr>
			<th>内容</th>
			<th>发布者</th>
			<th>发布日期</th>
			<th>操作</th>
		</tr>
		<tr>
			<th>标题：{$root['title'] | htmlspecialchars}<br />详细内容：{$root['content']}</th>
			<th>{$root['uid']}</th>
			<th>{$root['date']}</th>
			<th><a href="{:U('Consult/delData',array('id'=>$root['id']))}">[删除]</a></th>
		</tr>
		<foreach name="floor" item="vo">
			<tr>
				<td align="left">{$vo['content'] | htmlspecialchars}</td>
				<td align="center">{$vo['uid']}</td>
				<td align="center">{$vo['date']}</td>
				<td align="center"><a href="{:U('Consult/delData',array('id'=>$vo['id']))}">[删除]</a></td>
			</tr>
		</foreach>
	</table>
</block>