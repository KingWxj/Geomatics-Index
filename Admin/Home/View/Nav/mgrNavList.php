<extend name="Public/Admin/base_admin.php" />
<block name="title">
	{$root}列表项管理
</block>
<block name="css_js">
	<script type="text/javascript">
		$().ready(function(){
			$("#mgr_nav").attr('class','on');
		})
	</script>
</block>
<block name="location">
	{$root}列表项管理
	<span style="margin: 0 0 0 30px;"><a href="{:U('Nav/addListView',array('root'=>$root,'rootid'=>$rootid))}"><button style="padding: 3px 5px; background: lightskyblue; border: none;">添加列表项的内容</button></a></span>
</block>
<block name="main">
	<table border="1px" cellspacing="0" width="100%">
		<tr>
			<th>标题</th>
			<th>信息</th>
			<th>发布时间</th>
			<th>操作</th>
		</tr>
		<foreach name="list" item="vo">
			<tr>
				<td align="center">{$vo['title']}</td>
				<td align="center">{$vo['info']}</td>
				<td align="center">{$vo['date']}</td>
				<td align="center">
					<a href="{:U('Nav/updateListView',array('rootid'=>$rootid,'id'=>$vo['id']))}">[修改]</a>
					&emsp;<a href="{:U('Nav/delListItem',array('id'=>$vo['id']))}">[删除]</a>
				</td>
			</tr>
		</foreach>
		<tr><td colspan="4" align="center">
			{$page}
			<if condition="$page eq null">
				没有数据！
			</if>
		</td></tr>
	</table>
</block>
