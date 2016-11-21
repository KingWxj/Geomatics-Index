<extend name="Public/Geomatics/base_main_frame.php" />
<block name="title">{$title}</block>
<block name="css_js">
	<link rel="stylesheet" href="__PUBLIC__/Geomatics/css/page.css" />
</block>
<block name="left_top">
	{$root}
</block>
<block name="left_main_li">
	<foreach name="brother" item="vo">
		<li><a href="{:U('Show/showNav',array('id'=>$vo['id']))}">{$vo['title']}</a></li>
	</foreach>	
</block>
<block name="right_top">
	<p>{$title}列表</p>
</block>
<block name="right_main_li">
	<foreach name="list" item="vo">
		<a href="{:U('Show/showNavListArt',array('id'=>$vo['id']))}"><li style="padding: 5px;cursor: pointer;"><span>{$vo['title'] | mb_substr=0,35,utf8}</span><span style="float: right;">{$vo['date'] | mb_substr=0,10,utf8}</span></li></a>
	</foreach>
	<div id="page_tab">{$page}</div>
</block>
