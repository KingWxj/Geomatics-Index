<extend name="Public/Admin/base_admin.php" />
<block name="css_js">
	<script src="__PUBLIC__/Admin/js/Upload_index.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		$().ready(function(){
			$("#down_area").attr('class','on');
		})
	</script>
</block>
<block name="title">
	下载园地——列表
</block>
<block name="location">
	下载园地——列表
</block>
<block name="main">
	<form action="{:U('Upload/runUpload')}" method="post" enctype="multipart/form-data">
		<label for="title">文件标题：</label>
		<input type="text" name="title" id="title" placeholder="输入文件的标题" />
		<label for="file">选择文件：</label>
		<input type="file" name="file" id="file" />
		<input type="submit" value="上传文件"/>
	</form>
	<table border="1px" cellspacing="0" width="100%">
		<tr>
			<th>文件id</th>
			<th>文件标题</th>
			<th>文件名</th>
			<th>文件大小</th>
			<th>发布时间</th>
			<th>操作</th>
		</tr>
		<foreach name="fileList" item="list">
			<tr>
				<td>{$list['id']}</td>
				<td>{$list['title']}</td>
				<td>{$list['name']}</td>
				<td>{$list['size']} kb</td>
				<td>{$list['date']}</td>
				<td>
					<a href="javascript:void(0)" onclick="ajaxDelFile('{:U('Upload/delFile')}','{$list['id']}')">
						[删除]
					</a></td>
			</tr>
		</foreach>
	</table>
</block>
