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
	<form action="{:U('Consult/noName')}" method="post" style="margin: 10px 0 0 20px;">
		是否启用匿名发表
		<if condition="$status['value'] eq '1'">
			<input type="radio" name="status" id="yes" value="1" checked="checked" />
			<label for="yes">启用</label>
			<input type="radio" name="status" id="no" value="0" />
			<label for="no">禁用</label>	
		<elseif condition="$status['value'] eq '0'"/>
			<input type="radio" name="status" id="yes" value="1" />
			<label for="yes">启用</label>
			<input type="radio" name="status" id="no" value="0" checked="checked" />
			<label for="no">禁用</label>	
		</if>		
		<input type="submit" value="立即设置"/>
	</form>
	<table border="1px" cellspacing="0" width="100%">
		<tr>
			<th>主题</th>
			<th>发布者(学号)</th>
			<th>发布时间</th>
			<th>操作</th>
		</tr>
		<foreach name="allTheme" item="vo">
			<tr>
				<td align="center"><a href="{:U('Consult/showFull',array('id'=>$vo['id']))}">{$vo['title'] | htmlspecialchars}</a></td>
				<td align="center">{$vo['uid']}</td>
				<td align="center">{$vo['date']}</td>
				<td align="center"><a href="{:U('Consult/delData',array('id'=>$vo['id']))}">[删除]</a></td>
			</tr>
		</foreach>
	</table>
</block>
