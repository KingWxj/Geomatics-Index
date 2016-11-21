<extend name="Public/Geomatics/base_index_frame.php" />
<block name="title">评优评先专栏</block>
<block name="css_js">
	<script language="Javascript"> 
		document.oncontextmenu=new Function("event.returnValue=false"); 
		document.onselectstart=new Function("event.returnValue=false"); 
	</script> 
</block>
<block name="main">
	<div id="info" style="margin:10px 0;padding: 20px;border: 1px solid black;" oncontextmenu="event.returnValue=false" onselectstart="event.returnValue=false">
		<h1 align="center">{$info['title']}</h1>
		<p align="center" style="margin: 10px 0;"><small><span>{$info['info']}</span><span style="margin-left: 20px;">发布日期：{$info['date']}</span></small></p>
		<hr />
		<div id="content" style="padding: 20px 60px;">
			{$info['content']}
		</div>
	</div>
</block>
