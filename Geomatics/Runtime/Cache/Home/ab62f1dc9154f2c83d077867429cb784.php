<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title><?php echo ($info['title']); ?></title>
	<link rel="stylesheet" href="/Public/Geomatics/css/index.css" type="text/css">
	<link rel="stylesheet" href="/Public/Geomatics/css/main.css" type="text/css">
	<script src="/Public/Geomatics/js/jquery-1.12.2.js"></script>
	<script src="/Public/Geomatics/js/js.js"></script>
	<script src="/Public/Geomatics/js/main.js" type="text/javascript" charset="utf-8"></script>
	
</head>
<body>
	<!--头部logo-->
	<div class="header">
	<img src="/Public/Geomatics/images/logo.png" alt="">
		<span>测绘与国土信息工程学院</span>
	</div>
	<!--头部logo结束-->
	<!--头部导航栏-->
		<div class="header_nav">
		<ul class="nav_menu">
			<li><a href="<?php echo U('Index/index');?>">首页</a></li>
			<li><a href="#">学院概况</a>
				<ul>
					<li><a href="tabpage_two.html">学院简介</a></li>
					<li><a href="#">机构设置</a></li>
					<li><a href="#">发展规划</a></li>
					<li><a href="#">学院领导</a></li>
				</ul>
			</li>
			<li><a href="#">专业设置</a>
				<ul>
					<li><a href="#">测绘工程专业</a></li>
					<li><a href="#">地理信息科学专业</a></li>
					<li><a href="#">资源环境与城乡规划管理专业</a></li>
					<li><a href="#">土地资源专业</a></li>
					<li><a href="#">遥感科学与技术专业</a></li>
				</ul>
			</li>
			<li><a href="#">师资队伍</a>
				<ul>
					<li><a href="#">院士名录</a></li>
					<li><a href="#">博导名录</a></li>
					<li><a href="#">教授风采</a></li>
					<li><a href="#">博士风采</a></li>
					<li><a href="#">外聘专家</a></li>
				</ul>
			</li>
			<li><a href="#">教学工作</a>
				<ul>
					<li><a href="#">公告通知</a></li>
					<li><a href="#">教学通知</a></li>
					<li><a href="#">教学活动</a></li>
					<li><a href="#">文件下载</a></li>
				</ul>
			</li>
			<li><a href="#">科研工作</a>
				<ul>
					<li><a href="#">科研活动</a></li>
					<li><a href="#">文件下载</a></li>
				</ul>
			</li>
			<li><a href="#">党建工作</a>
				<ul>
					<li><a href="#">党建动态</a></li>
					<li><a href="#">支部设置</a></li>
					<li><a href="#">支部生活</a></li>
					<li><a href="#">党员风采</a></li>
					<li><a href="#">反腐倡廉</a></li>
					<li><a href="#">党务政务公开</a></li>
				</ul>
			</li>
			<li><a href="#">学生园地</a>
				<ul>
					<li><a href="#">团委概况</a></li>
					<li><a href="#">学生办概况</a></li>
					<li><a href="#">研究生</a></li>
					<li><a href="#">新闻公告</a></li>
					<li><a href="#">检查公示</a></li>
					<li><a href="#">网上团校</a></li>
					<li><a href="#">精品活动</a></li>
				</ul>
			</li>
			<li><a href="#">招生就业</a>
				<ul>
					<li><a href="#">招聘信息</a></li>
					<li><a href="#">就业信息</a></li>
				</ul>
			</li>
			<li><a href="#">友情链接</a>
				<ul>
					<li><a href="#">学校主页</a></li>
					<li><a href="#">数字化校园</a></li>
					<li><a href="#">教务处</a></li>
					<li><a href="#">科技处</a></li>
					<li><a href="#">校团委</a></li>
					<li><a href="#">招生办公室</a></li>
					<li><a href="#">就业指导中心</a></li>
				</ul>
			</li>
		</ul>
		<input type="text" value="" name="">
		<button>站内搜索</button>
	</div>
	<!--导航栏结束-->
	<div id="main" style="width: 1000px; margin: 0 auto;overflow: hidden;">
		<div style="clear: both;"></div>
		
	<div id="show" style="border: 1px solid black; margin: 10px auto; padding: 10px;">
		<h2 align="center"><?php echo ($info['title']); ?></h2>
		<p align="center"><small>发布日期：<?php echo ($info['date']); ?></small> <span style="float: right;"><small><a href="<?php echo U('List/school');?>">返回新闻列表</a></small></span></p>
		<hr />
		<div id="content" style="padding: 20px 40px;">
			<?php echo ($info['content']); ?>
		</div>
	</div>

		<div style="clear: both;"></div>
	</div>
	<!--底部信息-->
	<div class="footer"><p>版权所有 河南理工大学测绘与国土信息工程学院&nbsp;中国 河南 焦作 高新区 世纪路2001号 [454000] 校ICP备03050</p>
		<p>技术支持&nbsp;行思工作室</p>
	</div>
	<!--底部信息结束-->
</body>
</html>