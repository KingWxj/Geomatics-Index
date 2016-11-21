<extend name="Public/Admin/base_admin.php" />
<block name="title">新增成绩</block>
<block name="location">新增成绩</block>
<block name="css_js">
	<style>
		form {margin: 10px 0 10px 40px;}
	</style>
	<script type="text/javascript">
		$().ready(function(){
			$("#imgToggle").attr('class','on');
		})
		function ajaxSort($url,$id){
			$.post($url,{'id':$id},function(){
				location.reload(true);
			});
		}
	</script>
</block>
<block name="main">
	<p style="margin: 10px 0 0 40px; color: gray;font-size: 10px;">Tips：为了美观和布局，主页固定是4张图片轮播，默认显示下面的前四张，您可以在排序之后删除无用的图片轮播</p>
	<form action="{:U('Imgtoggle/runAdd')}" method="post" enctype="multipart/form-data">
		<p><label for="ttile">标&emsp;&emsp;题：</label><input type="text" id="title" name="title" />
		<label for="file">上传图片：</label><input type="file" id="file" name="file" />
		<input type="submit" value="提交" /></p>
	</form>
	<p style="margin: 10px 0 10px 40px; color: gray;font-size: 10px;">建议上传纵横比约为1:2的图片，效果较好</p>
	<table width="100%" border="1" cellspacing="0">
		<form action="{:U('Imgtoggle/sortImg')}" method="post">
		<tr>
			<th>标题</th>
			<th>轮播图片</th>
			<th>排序</th>
			<th>操作</th>
		</tr>
		<foreach name="data" item="arr">
			<tr>
				<td id="title">{$arr['title']}</td>
				<td id="picture" align="center"><img src="__ROOT__{$arr['route']}" width="360px" /></td>
				<td>
					<input type="button" name="up" id="up" value="上移" onclick="ajaxSort('{:U('Imgtoggle/sortImg')}',{$arr['id']})" />
				</td>
				<td>
					<a href="{:U('Imgtoggle/delImg',array('id'=>$arr['id']))}">[删除]</a>
				</td>
			</tr>
		</foreach>
		</form>
	</table>
</block>
