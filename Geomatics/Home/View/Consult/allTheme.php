<extend name="Public/Geomatics/base_main_frame.php" />
<block name="title">
	所有话题
</block>
<block name="css_js">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Geomatics/css/page.css"/>
</block>
<block name="left_top">
	<img src="__PUBLIC__/Geomatics/images/2.png" width="25px" height="25px" style="vertical-align: middle;">
	咨询小屋
</block>
<block name="left_main_li">
	<li>
		<a href="{:U('Consult/index')}">
			发布话题
		</a>
	</li>
	<li>
		<a href="{:U('Consult/allTheme')}">
			所有话题
		</a>
	</li>
</block>
<block name="right_top">
	<p>
		<img src="__PUBLIC__/Geomatics/images/0.png" style="vertical-align: middle;">
		所有话题
	</p>
</block>
<block name="right_main_li">
	<foreach name="allTheme" item="vo">
		<li style="overflow: hidden;">
			<a href="{:U('Consult/showTheme',array('id'=>$vo['id']))}">{$vo['title'] | htmlspecialchars}</a>
			<span style="float: right;"><small>{$vo['date']}</small></span>
		</li>
	</foreach>
</block>
<block name='right_main'>
	<div id="page_tab">
		{$page}
	</div>
</block>
