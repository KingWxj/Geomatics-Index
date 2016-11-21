<extend name="Public/Admin/base_admin.php" />
<block name="title">修改导航链接内容</block>
<block name="location">修改导航链接内容</block>
<block name="css_js">
	<style>
		input,textarea {margin-top: 5px;}
	</style>
	<script type="text/javascript">
		$().ready(function(){
			$("#mgr_nav").attr('class','on');
		})
	</script>
</block>
<block name="main">
	这里控制着修改链接的地方
</block>