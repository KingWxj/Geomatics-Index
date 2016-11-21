<extend name="Public/Admin/base_admin.php" />
<block name="title">添加优秀展示</block>
<block name="css_js">
	<link href="__PUBLIC__/umeditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
		<script type="text/javascript">
		$().ready(function(){
			$("#addExcellent").attr('class','on');
		})
	</script>
</block>
<block name="location">添加优秀展示</block>
<block name="main">
	<!--发布公告的表单，写入数据库-->
	<form action="{:U('Excellent/runAddExcellent')}" method="post" style="margin: 10px 0 0 20px;" enctype="multipart/form-data">
		<p style="margin: 10px 0 10px 0;">
			<span>模块：</span>
			<input type="radio" name="type" id="yxsj" value="优秀事迹" checked="checked"/><label for="yxsj">优秀事迹</label>
			<input type="radio" name="type" id="yxxs" value="优秀学生"/><label for="yxxs">优秀学生</label>
			<input type="submit" value="提交并添加" style="padding: 5px;"/>
		</p>
		<label for="title">标题：</label>
		<input type="text" name="title" id="title" placeholder="小于50字" style="width: 500px; padding: 5px; margin: 5px;" /><br />
		<label for="info">信息：</label>
		<input type="text" name="info" id="info" style="width: 300px; padding: 5px; margin: 5px;" /><br />
		<label for="file">标题图片：</label>
		<input type="file" name="file" id="file"/>
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
