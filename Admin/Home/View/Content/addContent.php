<extend name="Public/Admin/base_admin.php" />
<block name="title">添加主页内容</block>
<block name="css_js">
	<link href="__PUBLIC__/umeditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
		<script type="text/javascript">
		$().ready(function(){
			$("#addContent").attr('class','on');
		})
	</script>
</block>
<block name="location">添加新内容</block>
<block name="main">
	<!--发布公告的表单，提交到News控制器的runAddNews方法，写入数据库-->
	<form action="{:U('Content/runAddContent')}" method="post" style="margin: 10px 0 0 20px;">
		<p style="margin: 10px 0 10px 0;">
			<span>模块：</span>
			<input type="radio" name="type" id="zxgg" value="最新公告" checked="checked"/><label for="zxgg">最新公告</label>
			<input type="radio" name="type" id="xnxw" value="校内新闻"/><label for="xnxw">国内外新闻</label>
			<input type="radio" name="type" id="xydt" value="学院动态"/><label for="xydt">学院动态</label>
			<input type="submit" value="提交并添加" style="padding: 5px;"/>
		</p>
		<label for="title">标题：</label>
		<input type="text" name="title" id="title" placeholder="小于50字" style="width: 500px; padding: 5px; margin: 5px;" /><br />
		<label for="info">信息：</label>
		<input type="text" name="info" id="info" style="width: 300px; padding: 5px; margin: 5px;" />
		<br />
		<div id="editor" style="margin-top: 10px;">
			<script id="content" name="content" type="text/plain" style="width: 95%;"></script>
			<!-- 配置文件 -->
			<script type="text/javascript" src="__PUBLIC__/uEditor/ueditor.config.js">
			</script>
			<!-- 编辑器源码文件 -->
			<script type="text/javascript" src="__PUBLIC__/uEditor/ueditor.all.js">
			</script>
			<!-- 实例化编辑器 -->
			<script type="text/javascript">
			var ue = UE.getEditor('content',{
				initialFrameHeight:300,
			});
			</script>

		</div>
	</form>
</block>
