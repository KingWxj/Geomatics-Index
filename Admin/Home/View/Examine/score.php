<extend name="Public/Admin/base_admin.php" />
<block name="title">
	成绩审核
</block>
<block name="css_js">
	<script src="__PUBLIC__/Admin/js/Examine_score.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		$().ready(function(){
			$("#score_verify").attr('class','on');
		})
	</script>
</block>
<block name="location">
	成绩审核
</block>
<block name="main">
	<table border="1px" cellspacing="0" width="100%">
		<tr>
			<th>学号</th>
			<th>姓名</th>
			<th>学科</th>
			<th>原分数</th>
			<th>修改为</th>
			<th>操作</th>
		</tr>
		<foreach name="fixList" item="vo">
		    <tr>
		    	<td align="center">{$vo['stuid']}</td>
		    	<td align="center">{$vo['name']}</td>
		    	<td align="center">{$vo['subject']}</td>
		    	<td align="center">{$vo['score']}</td>
		    	<td align="center">{$vo['fixscore']}</td>
		    	<td align="center">
		    		<a href="javascript:void(0)" onclick="ajaxFixTrue('{:U('Examine/fixScore')}',{$vo['id']})"><font color="green">[通过]</font></a>&emsp;
		    		<a href="javascript:void(0)" onclick="ajaxFixFalse('{:U('Examine/fixScore')}',{$vo['id']})"><font color="red">[不通过]</font></a>
		    	</td>
		    </tr>
		</foreach>
	</table>
</block>