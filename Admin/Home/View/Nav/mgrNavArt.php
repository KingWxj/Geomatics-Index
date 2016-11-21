<extend name="Public/Admin/base_admin.php" />
<block name="title">修改导航内容</block>
<block name="location">修改导航链接内容</block>
<block name="css_js">
	<style>
		
	</style>
	<script type="text/javascript">
		$().ready(function(){
			$("#mgr_nav").attr('class','on');
		})
	</script>
</block>
<block name="main">
	<form action="{:U('Nav/runUpdateNav')}" method="post" style="margin: 10px 0 10px 20px;">
		<!--设置隐藏表单是为了，将修改项的id传过来，这样runUpdateNav控制器中也能再次接收到该id值，id值要作为查询数据的条件-->
		<input type="hidden" name="hid_id" value="{$info['id']}" />
		<label for="info">发布人：<input type="text" name="info" id="info" value="{$info['info']}" />&emsp;<input type="submit" value="提交" style="padding: 2px 10px;" /></label>
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