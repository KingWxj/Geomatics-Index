<extend name="Public/Admin/base_admin.php" />
<block name="title">评优评先公示</block>
<block name="location">评优评先板块-内容管理</block>
<block name="css_js">
	<script type="text/javascript">
		$().ready(function(){
			$("#evaluate").attr('class','on');
		})
	</script>
	<style type="text/css">
		#main_title{
			font-size: 20px;
			text-align: center;
			margin: 10px 0 20px 0;
		}
		#main_title input{
			font-size: 20px;
		}
		#title{
			width: 500px;
			border: 2px solid skyblue;
		}
	</style>
</block>
<block name="main">
	<form action="{:U('Evaluate/update')}" method="post" style="margin: 10px 0 0 20px;">
		<input type="hidden" name="id" id="id" value="{$info['id']}" />
		<p id="main_title"><label for="title">主标题：</label>
			<input type="text" name="title" id="title" value="{$info['title']}" /><br /></p>
		<p style="text-align: center;">
			<input type="submit" id="submit" value="提交修改" style="padding: 5px 10px;border-radius: 10px;background: skyblue; border: 1px solid skyblue;"/>
		<label for="info">信息</label>
		<input type="text" name="info" id="info" style="height: 20px;border: 2px solid skyblue;" value="{$info['info']}" />
		<label for="date">日期：<input type="text" style="height: 20px;border: 2px solid skyblue;" name="date" id="date" value="{$info['date']}" />(格式:2016-09-10)</label><br />
		</p>
		
		<div id="editor" style="margin-left: 30px; margin-top: 20px;">
			<script id="content" name="content" type="text/plain" style="width: 98%;">{$info['content']}</script>
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
