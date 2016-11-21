<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
	<Link Rel="SHORTCUT ICON" href="/Project/Public/logo.png">
	<title>
	咨询小屋
</title>
	<link rel="stylesheet" href="/Project/Public/Geomatics/css/index.css" type="text/css">
	<link rel="stylesheet" href="/Project/Public/Geomatics/css/main.css" type="text/css">
	<script src="/Project/Public/Geomatics/js/jquery-1.12.2.js"></script>
	<script src="/Project/Public/Geomatics/js/js.js"></script>
	<script src="/Project/Public/Geomatics/js/main.js" type="text/javascript" charset="utf-8"></script>
	
	<style type="text/css">
		#left_list a{
			color: white;
			font-weight: 700;
		}
	</style>
</head>
<body>
	<!--头部logo-->
	<div class="header">
	<img src="/Project/Public/Geomatics/images/logo.png" alt="">
		<span>测绘与国土信息工程学院</span>
	</div>
	<!--头部logo结束-->
	<!--头部导航栏-->
		<div class="header_nav">
		<ul class="nav_menu">
			<li><a href="<?php echo U('Index/index');?>">首页</a></li>
			<!--<li><a href="#">学院概况</a>
				<ul>
					<li><a href="<?php echo U('Show/showNav',array('id'=>1));?>">学院简介</a></li>
					<li><a href="<?php echo U('Show/showNav',array('id'=>2));?>">机构设置</a></li>
					<li><a href="<?php echo U('Show/showNav',array('id'=>3));?>">发展规划</a></li>
					<li><a href="<?php echo U('Show/showNav',array('id'=>4));?>">学院领导</a></li>
				</ul>
			</li>
			<li><a href="#">专业设置</a>
				<ul>
					<li><a href="<?php echo U('Show/showNav',array('id'=>5));?>">测绘工程专业</a></li>
					<li><a href="<?php echo U('Show/showNav',array('id'=>6));?>">地理信息科学专业</a></li>
					<li><a href="<?php echo U('Show/showNav',array('id'=>7));?>">资源环境与城乡规划管理专业</a></li>
					<li><a href="<?php echo U('Show/showNav',array('id'=>8));?>">土地资源专业</a></li>
					<li><a href="<?php echo U('Show/showNav',array('id'=>9));?>">遥感科学与技术专业</a></li>
				</ul>
			</li>
			<li><a href="#">师资队伍</a>
				<ul>
					<li><a href="<?php echo U('Show/showNav',array('id'=>10));?>">院士名录</a></li>
					<li><a href="<?php echo U('Show/showNav',array('id'=>11));?>">博导名录</a></li>
					<li><a href="<?php echo U('Show/showNav',array('id'=>12));?>">教授风采</a></li>
					<li><a href="<?php echo U('Show/showNav',array('id'=>13));?>">博士风采</a></li>
					<li><a href="<?php echo U('Show/showNav',array('id'=>14));?>">外聘专家</a></li>
				</ul>
			</li>
			<li><a href="#">教学工作</a>
				<ul>
					<li><a href="<?php echo U('Show/showNav',array('id'=>15));?>">公告通知</a></li>
					<li><a href="<?php echo U('Show/showNav',array('id'=>16));?>">教学通知</a></li>
					<li><a href="<?php echo U('Show/showNav',array('id'=>17));?>">教学活动</a></li>
					<li><a href="<?php echo U('Show/showNav',array('id'=>18));?>">文件下载</a></li>
				</ul>
			</li>
			<li><a href="#">科研工作</a>
				<ul>
					<li><a href="<?php echo U('Show/showNav',array('id'=>19));?>">科研活动</a></li>
					<li><a href="<?php echo U('Show/showNav',array('id'=>20));?>">文件下载</a></li>
				</ul>
			</li>
			<li><a href="<?php echo U('Show/showNav',array('id'=>21));?>">党建工作</a>
				<ul>
					<li><a href="<?php echo U('Show/showNav',array('id'=>21));?>">党建动态</a></li>
					<li><a href="<?php echo U('Show/showNav',array('id'=>22));?>">支部设置</a></li>
					<li><a href="<?php echo U('Show/showNav',array('id'=>23));?>">支部生活</a></li>
					<li><a href="<?php echo U('Show/showNav',array('id'=>24));?>">党员风采</a></li>
					<li><a href="<?php echo U('Show/showNav',array('id'=>25));?>">反腐倡廉</a></li>
					<li><a href="<?php echo U('Show/showNav',array('id'=>26));?>">党务政务公开</a></li>
				</ul>
			</li>
			<li><a href="#">学生园地</a>
				<ul>
					<li><a href="<?php echo U('Show/showNav',array('id'=>27));?>">团委概况</a></li>
					<li><a href="<?php echo U('Show/showNav',array('id'=>28));?>">学生办概况</a></li>
					<li><a href="<?php echo U('Show/showNav',array('id'=>29));?>">研究生</a></li>
					<li><a href="<?php echo U('Show/showNav',array('id'=>30));?>">新闻公告</a></li>
					<li><a href="<?php echo U('Show/showNav',array('id'=>31));?>">检查公示</a></li>
					<li><a href="<?php echo U('Show/showNav',array('id'=>32));?>">网上团校</a></li>
					<li><a href="<?php echo U('Show/showNav',array('id'=>33));?>">精品活动</a></li>
				</ul>
			</li>
			<li><a href="#">招生就业</a>
				<ul>
					<li><a href="<?php echo U('Show/showNav',array('id'=>34));?>">招聘信息</a></li>
					<li><a href="<?php echo U('Show/showNav',array('id'=>35));?>">就业信息</a></li>
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
	<div id="main" style="width: 1000px; margin: 0 auto;">
		<div style="clear: both;"></div>
		<div class="main_body">
		<div class="main_body_left">
			<!--左栏的标题-->
			<h2>
	<img src="/Project/Public/Geomatics/images/2.png" width="25px" height="25px" style="vertical-align: middle;">
	咨询小屋
</h2>
				<ul id="left_list">
					<!--左栏的列表项-->
					
	<li>
		<a href="<?php echo U('Consult/index');?>">
			发布话题
		</a>
	</li>
	<li>
		<a href="<?php echo U('Consult/allTheme');?>">
			所有话题
		</a>
	</li>

				</ul>
		</div>
		
		<div class="main_body_right">
			<!--右侧的主要内容上方的标题性内容-->
			
	<p>
		<img src="/Project/Public/Geomatics/images/0.png" style="vertical-align: middle;">
		发布话题
	</p>

			<ul class="main_new_list">
				<!--右侧的主要内容列表-->
				
			</ul>
			
		<?php if($_COOKIE['stuId']!= null): ?><p>
				<span>姓名：<?php echo (cookie('stuName')); ?></span>
				<br />
				<span>学号：<?php echo (cookie('stuId')); ?></span>
			</p>
			<form action="<?php echo U('Consult/addTheme');?>" method="post" style="margin: 0 0 0 20px;">
				<label for="title">问题标题：</label>
				<input type="text" name="title" id="title" style="width: 300px;padding: 5px;margin: 10px 0 10px 0;" />
				<br />
				<label for="content">问题详情：</label>
				<textarea name="content" id="content" style=" width: 600px;height: 400px; padding: 5px;" ></textarea>
				<br />
				<div style="margin: 10px 0 0 0;">
					<?php if($noName == '1'): ?><input type="checkbox" name="noName" id="noName" value="1" /><label for="noName"><font color="red">匿名发言</font><small>不记录发布者的任何信息</small></label><?php endif; ?>
				</div>
				<input type="submit" value="提交问题" style="padding: 5px;width: 100px;"/>
			</form>
		<?php else: ?>
		<h2>请登录之后进行操作！<a href="<?php echo U('Index/index');?>"><font color="red">立即登录</font></a></h2><?php endif; ?>

		</div>
		<div style="clear: both;"></div>
	</div>
		<div style="clear: both;"></div>
	</div>
	<!--底部信息-->
	<div class="footer"><p>版权所有 河南理工大学测绘与国土信息工程学院&nbsp;中国 河南 焦作 高新区 世纪路2001号 [454000] 校ICP备03050</p>
		<p>技术支持&nbsp;<a href="http://www.xsgzs.org/">行思工作室</a></p>
	</div>
	<!--底部信息结束-->
</body>
</html>