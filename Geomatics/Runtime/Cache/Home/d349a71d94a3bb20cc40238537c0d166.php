<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
	<Link Rel="SHORTCUT ICON" href="/Project/Public/logo.png">
	<title>
	个人空间主页
</title>
	<link rel="stylesheet" href="/Project/Public/Geomatics/css/index.css" type="text/css">
	<link rel="stylesheet" href="/Project/Public/Geomatics/css/main.css" type="text/css">
	<script src="/Project/Public/Geomatics/js/jquery-1.12.2.js"></script>
	<script src="/Project/Public/Geomatics/js/js.js"></script>
	<script src="/Project/Public/Geomatics/js/main.js" type="text/javascript" charset="utf-8"></script>
	
	<link rel="stylesheet" type="text/css" href="/Project/Public/Geomatics/css/Personal_common.css"/>
	<style type="text/css">
	#info_box{
		float: left;
		margin: 10px 0 0 40px;
	}
	#status{
		float: left;
		margin: 10px 0 0 40px;
	}
	#status p{
		margin: 10px 0;
	}
	.personal_info {
		margin: 10px 0 10px 40px;
	}
	
	</style>

</head>
<body>
	<!--头部logo-->
	<div class="header">
	<img src="/Project/Public/Geomatics/images/logo.png" alt="">
		<span>测绘学院学生工作网站</span>
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
	<div id="main" style="width: 1000px; margin: 0 auto;"><!--overflow: hidden;-->
		<div style="clear: both;"></div>
		
	<!--侧边的导航栏，个人中心，证书等-->
	<div id="aside">
		<ul>
			<a href="<?php echo U('Personal/index');?>">
				<li class="aside_li menu_on">
					个人中心
				</li>
			</a>
			<a href="<?php echo U('Personal/certificate');?>">
				<li class="aside_li">
					素质拓展分评定
				</li>
			</a>
			<a href="<?php echo U('Personal/character');?>">
				<li class="aside_li">
					德育分评定
				</li>
			</a>
			<a href="<?php echo U('Personal/score');?>">
				<li class="aside_li">
					成绩管理
				</li>
			</a>
			<a href="<?php echo U('Personal/setting');?>">
				<li class="aside_li">
					账户设置
				</li>
			</a>
			<a href="<?php echo U('Login/logout');?>">
				<li class="aside_li">
					退出登录
				</li>
			</a>
		</ul>
	</div>
	<!--侧边导航栏结束-->
	<!--右侧主体内容开始-->
	<div id="content">
		<div id="info_box">
			<h3>欢迎来到测绘学院个人中心！</h3>
			<p class="personal_info">
				姓名：<?php echo ($info['stuname']); ?>
			</p>
			<p class="personal_info">
				学号：<?php echo ($info['stuid']); ?>
			</p>
		</div>
		<div id="status">
			<h3>素质拓展分</h3>
			<p>您一共上传了<span style="color: orangered;">&nbsp;<?php echo ($cer_count); ?>&nbsp;</span>张证书</p>
			<p>其中<span style="color: blue;">&nbsp;<?php echo ($cer_pass); ?>&nbsp;</span>张已通过审核并评分</p>
			<p>当前素质拓展分总分：<span style="color: blue;">&nbsp;<?php echo ($cer_score); ?>&nbsp;</span></p>
			<h3>德育分</h3>
			<p>您一共上传了<span style="color: orangered;">&nbsp;<?php echo ($cha_count); ?>&nbsp;</span>张证书</p>
			<p>其中<span style="color: blue;">&nbsp;<?php echo ($cha_pass); ?>&nbsp;</span>张已通过审核并评分</p>
			<p>当前德育分总分：<span style="color: blue;">&nbsp;<?php echo ($cha_score); ?>&nbsp;</span></p>
			<p style="font-size: small;color: #888;">请在个人中心相应选项中查看详细信息</p>
		</div>
	</div>
	<!--右侧主体内容结束-->

		<div style="clear: both;"></div>
	</div>
	<!--底部信息-->
	<div class="footer"><p>版权所有 河南理工大学测绘与国土信息工程学院&nbsp;中国 河南 焦作 高新区 世纪路2001号 [454000] 校ICP备03050</p>
		<p>技术支持&nbsp;<a href="http://www.xsgzs.org/" target="_blank">行思工作室</a></p>
	</div>
	<!--底部信息结束-->
</body>
</html>