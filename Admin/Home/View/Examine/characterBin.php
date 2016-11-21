<extend name="Public/Admin/base_admin.php" />
<block name="title">
	证书回收站
</block>
<block name="css_js">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Admin/css/Examine_certificate.css"/>
	<script type="text/javascript" src="__PUBLIC__/Admin/js/Examine_certificate.js"></script>
	<script type="text/javascript">
		$().ready(function(){
			$("#evaluate_character").attr('class','on');
		})
	</script>
</block>
<block name="location">
	德育分证书回收站
</block>
<block name="main">
	<table width="100%" border="1px" cellspacing="0" >
		<tr>
			<th>学号</th>
			<th>姓名</th>
			<th>证书简介</th>
			<th>证书图片</th>
			<th>上传日期</th>
			<th>操作</th>
		</tr>
		<foreach name="character_list" item="vo">
			    <tr>
			    	<td align="center">{$vo['stuid']}</td>
			    	<td align="center">{$vo['stuname']}</td>
			    	<td align="center">{$vo['name']}</td>
			    	<td align="center"><img src="{$vo['route']}" width="400px" height="220px"/></td>
			    	<td align="center">{$vo['date']}</td>
			    	<td align="center">
			    		<a href="javascript:void(0)" onclick="ajaxAgree('{:U('Examine/verifyCharacter')}',{$vo['id']})"><font color="blue">[重新通过]</font></a>
			    	</td>
			    </tr>
			</foreach>
	</table>
</block>