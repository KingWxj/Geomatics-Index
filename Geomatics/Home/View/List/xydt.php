<extend name="Public/Geomatics/base_main_frame.php" />
<block name="title">学院动态</block>
<block name="css_js">
	<link rel="stylesheet" href="__PUBLIC__/Geomatics/css/page.css" />
</block>
<block name="left_top">
	学院动态
</block>
<block name="left_main_li">
	<li><a href="{:U('List/xydt')}">学院动态</a></li>
	<li><a href="{:U('List/zxgg')}">最新公告</a></li>
	<li><a href="{:U('List/xnxw')}">校内新闻</a></li>
	<li><a href="{:U('List/download')}">下载园地</a></li>
</block>
<block name="right_top">
	<p>学院动态列表</p>
</block>
<block name="right_main_li">
	<foreach name="list" item="vo">
		<a href="{:U('Show/index',array('id'=>$vo['id']))}"><li style="padding: 5px;cursor: pointer;"><span>{$vo['title'] | mb_substr=0,35,utf8}</span><span style="float: right;">{$vo['date'] | mb_substr=0,10,utf8}</span></li></a>
	</foreach>
		<div id="page_tab">{$page}</div>
</block>
