<extend name="Public/Geomatics/base_index_frame.php" />
<block name="title">{$info['title']}</block>
<block name="main">
	<div id="show" style="border: 1px solid black; margin: 10px auto; padding: 10px;">
		<h2 align="center">{$info['title']}</h2>
		<p align="center" style="margin: 5px 0 5px 0;"><font size="1" color="gray">{$info['info']}&emsp;发布日期：{$info['date']}</font></p>
		<hr />
		<div id="content" style="padding: 20px 40px;">
			{$info['content']}
		</div>
	</div>
</block>
