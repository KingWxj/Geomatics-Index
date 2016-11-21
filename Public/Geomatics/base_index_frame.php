<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
	<Link Rel="SHORTCUT ICON" href="__PUBLIC__/logo.png">
	<title><block name="title"></block></title>
	<link rel="stylesheet" href="__PUBLIC__/Geomatics/css/index.css" type="text/css">
	<link rel="stylesheet" href="__PUBLIC__/Geomatics/css/main.css" type="text/css">
	<script src="__PUBLIC__/Geomatics/js/jquery-1.12.2.js"></script>
	<script src="__PUBLIC__/Geomatics/js/js.js"></script>
	<script src="__PUBLIC__/Geomatics/js/main.js" type="text/javascript" charset="utf-8"></script>
	<block name="css_js"></block>
</head>
<body>
	<!--头部logo-->
	<div class="header">
	<img src="__PUBLIC__/Geomatics/images/logo.png" alt="">
		<span>测绘学院学生工作网站</span>
	</div>
	<!--头部logo结束-->
	<!--头部导航栏-->
		<div class="header_nav">
		<ul class="nav_menu">
			<li><a href="{:U('Index/index')}">首页</a></li>
			<!--<li><a href="#">学院概况</a>
				<ul>
					<li><a href="{:U('Show/showNav',array('id'=>1))}">学院简介</a></li>
					<li><a href="{:U('Show/showNav',array('id'=>2))}">机构设置</a></li>
					<li><a href="{:U('Show/showNav',array('id'=>3))}">发展规划</a></li>
					<li><a href="{:U('Show/showNav',array('id'=>4))}">学院领导</a></li>
				</ul>
			</li>
			<li><a href="#">专业设置</a>
				<ul>
					<li><a href="{:U('Show/showNav',array('id'=>5))}">测绘工程专业</a></li>
					<li><a href="{:U('Show/showNav',array('id'=>6))}">地理信息科学专业</a></li>
					<li><a href="{:U('Show/showNav',array('id'=>7))}">资源环境与城乡规划管理专业</a></li>
					<li><a href="{:U('Show/showNav',array('id'=>8))}">土地资源专业</a></li>
					<li><a href="{:U('Show/showNav',array('id'=>9))}">遥感科学与技术专业</a></li>
				</ul>
			</li>
			<li><a href="#">师资队伍</a>
				<ul>
					<li><a href="{:U('Show/showNav',array('id'=>10))}">院士名录</a></li>
					<li><a href="{:U('Show/showNav',array('id'=>11))}">博导名录</a></li>
					<li><a href="{:U('Show/showNav',array('id'=>12))}">教授风采</a></li>
					<li><a href="{:U('Show/showNav',array('id'=>13))}">博士风采</a></li>
					<li><a href="{:U('Show/showNav',array('id'=>14))}">外聘专家</a></li>
				</ul>
			</li>
			<li><a href="#">教学工作</a>
				<ul>
					<li><a href="{:U('Show/showNav',array('id'=>15))}">公告通知</a></li>
					<li><a href="{:U('Show/showNav',array('id'=>16))}">教学通知</a></li>
					<li><a href="{:U('Show/showNav',array('id'=>17))}">教学活动</a></li>
					<li><a href="{:U('Show/showNav',array('id'=>18))}">文件下载</a></li>
				</ul>
			</li>
			<li><a href="#">科研工作</a>
				<ul>
					<li><a href="{:U('Show/showNav',array('id'=>19))}">科研活动</a></li>
					<li><a href="{:U('Show/showNav',array('id'=>20))}">文件下载</a></li>
				</ul>
			</li>
			<li><a href="{:U('Show/showNav',array('id'=>21))}">党建工作</a>
				<ul>
					<li><a href="{:U('Show/showNav',array('id'=>21))}">党建动态</a></li>
					<li><a href="{:U('Show/showNav',array('id'=>22))}">支部设置</a></li>
					<li><a href="{:U('Show/showNav',array('id'=>23))}">支部生活</a></li>
					<li><a href="{:U('Show/showNav',array('id'=>24))}">党员风采</a></li>
					<li><a href="{:U('Show/showNav',array('id'=>25))}">反腐倡廉</a></li>
					<li><a href="{:U('Show/showNav',array('id'=>26))}">党务政务公开</a></li>
				</ul>
			</li>
			<li><a href="#">学生园地</a>
				<ul>
					<li><a href="{:U('Show/showNav',array('id'=>27))}">团委概况</a></li>
					<li><a href="{:U('Show/showNav',array('id'=>28))}">学生办概况</a></li>
					<li><a href="{:U('Show/showNav',array('id'=>29))}">研究生</a></li>
					<li><a href="{:U('Show/showNav',array('id'=>30))}">新闻公告</a></li>
					<li><a href="{:U('Show/showNav',array('id'=>31))}">检查公示</a></li>
					<li><a href="{:U('Show/showNav',array('id'=>32))}">网上团校</a></li>
					<li><a href="{:U('Show/showNav',array('id'=>33))}">精品活动</a></li>
				</ul>
			</li>
			<li><a href="#">招生就业</a>
				<ul>
					<li><a href="{:U('Show/showNav',array('id'=>34))}">招聘信息</a></li>
					<li><a href="{:U('Show/showNav',array('id'=>35))}">就业信息</a></li>
				</ul>
			</li>
			<li><a href="#">友情链接</a>
				<ul>
					<li><a href="http://www.hpu.edu.cn">学校主页</a></li>
					<li><a href="http://218.196.240.25/dsl">数字化校园</a></li>
					<li><a href="http://jwc.hpu.edu.cn">教务处</a></li>
					<li><a href="http://kxc.hpu.edu.cn">科技处</a></li>
					<li><a href="http://tw.hpu.edu.cn">校团委</a></li>
					<li><a href="http://www.heao.gov.cn">招生办公室</a></li>
					<li><a href="http://u.yjbys.com/hnlg">就业指导中心</a></li>
				</ul>
			</li>-->
		</ul>
	</div>
	<!--导航栏结束-->
	<div id="main" style="width: 1000px; margin: 0 auto;"><!--overflow: hidden;-->
		<div style="clear: both;"></div>
		<block name="main">
		
		</block>
		<div style="clear: both;"></div>
	</div>
	<!--底部信息-->
	<div class="footer"><p>版权所有 河南理工大学测绘与国土信息工程学院&nbsp;中国 河南 焦作 高新区 世纪路2001号 [454000] 校ICP备03050</p>
		<p>技术支持&nbsp;<a href="http://www.xsgzs.org/" target="_blank">行思工作室</a></p>
	</div>
	<!--底部信息结束-->
</body>
</html>