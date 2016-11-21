<extend name="Public/Admin/base_admin.php" />
<block name="title">德育分证书评分</block>
<block name="css_js">
	<script type="text/javascript">
		$().ready(function(){
			$("#evaluate_character").attr('class','on');
		})
	</script>
</block>
<block name="location">
	德育分证书评分<a href="{:U('Examine/characterBin')}">证书回收站</a>
</block>
<block name="main">
	<table border="1px" cellspacing="0" width="100%" >
		<tr>
			<th>学号</th>
			<th>姓名</th>
			<th>评分情况(不含未通过)</th>
			<th>目前总得分</th>
			<th>操作</th>
		</tr>
		<foreach name="stuList" item="vo">
			<tr>
				<td align="center">{$vo['stuid']}</td>
				<td align="center">{$vo['name']}</td>
				<td align="center">{$vo['count1']}/{$vo['count01']}</td>
				<td align="center">{$vo['scoreCount']}</td>
				<!--使用超链接以GET方式传递学号，在showCertificate里获取并找到这个学生的证书详细信息，并打分-->
				<td align="center"><a href="{:U('Evaluate/showCharacter',array('stuId'=>$vo['stuid']))}">进入打分</a></td>
			</tr>
		</foreach>
	</table>
</block>
