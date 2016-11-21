<extend name="Public/Geomatics/base_main_frame.php" />
<block name="title">证书评分专栏</block>
<block name="css_js">
	<link rel="stylesheet" href="__PUBLIC__/Geomatics/css/page.css" />
	<style type="text/css">
		tr:hover{
			background: lightgray;
		}
		td{
			margin: 5px 0 5px 0;
			padding: 5px;
		}
	</style>
</block>
<block name="left_top">证书评分专栏</block>
<block name="left_main_li">
	<a href="{:U('Certificate/index')}"><li>德育分</li></a>
	<a href="{:U('Certificate/certificate')}"><li>素质拓展分</li></a>
</block>
<block name="right_main_li">
	<p>素质拓展分评分表</p>
</block>
<block name="right_main">
	<table cellspacing="0" width="100%">
		<tr>
			<th>学号</th>
			<th>姓名</th>
			<th>证书总数</th>
			<th>当前总分</th>
			<th></th>
		</tr>
		<foreach name="stuList" item="vo">
			<tr>
				<td align="center">{$vo['stuid']}</td>
				<td align="center">{$vo['name']}</td>
				<td align="center">{$vo['count']}</td>
				<td align="center">{$vo['scoreCount']}</td>
				<td align="center"><a href="{:U('Certificate/showCer',array('stuId'=>$vo['stuid']))}">【查看详情】</a></td>
			</tr>
		</foreach>
	</table>
	<div style="width: 100%;text-align: center;">{$page}</div>
</block>