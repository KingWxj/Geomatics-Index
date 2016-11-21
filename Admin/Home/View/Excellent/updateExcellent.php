<extend name="Public/Admin/base_admin.php" />
<block name="title">修改优秀展示内容</block>
<block name="css_js">
	<script type="text/javascript">
		$().ready(function(){
			$("#excellentManager").attr('class','on');
		})
	</script>
</block>
<block name="main">
<form action="{:U('Excellent/runUpdateExcellent')}" method="post" style="margin: 10px 0 0 20px;">
		<input type="hidden" name="hidden_id" id="hidden_id" value="{$info['id']}" />
		<label for="title">标题：</label>
		<input type="text" name="title" id="title" value="{$info['title']}" style="width: 500px; padding: 5px; margin: 5px;" /><br />
		<label for="info">信息：</label>
		<input type="text" name="info" id="info" value="{$info['info']}"  style="width: 300px; padding: 5px; margin: 5px;"/><br />
		<label for="file">标题图片：</label>
		<input type="file" name="file" id="file"/><br />
		<input type="submit" id="submit" value="提交修改" style="padding: 5px;margin-top: 10px;" /><br />
		<div id="editor" style="margin-top: 10px;">
			<script id="content" name="content" type="text/plain" style="width: 95%;">{$info['content']}</script>
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
