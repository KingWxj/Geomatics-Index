<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<link rel="shortcut icon" href="/Public/Geomatics/Personal/img/space.ico">
		<link rel="stylesheet" type="text/css" href="/Public/Geomatics/Personal/css/jquery-ui.css"/>
		<link href="/Public/Geomatics/Personal/css/style1.css"  rel="stylesheet" type="text/css"/>
		<link rel="stylesheet" href="/Public/Geomatics/css/index.css" type="text/css">
		<link rel="stylesheet" href="/Public/Geomatics/css/main.css" type="text/css">
		<script src="/Public/Geomatics/Personal/js/jquery-1.12.2.js"></script>
		<script src="/Public/Geomatics/Personal/js/jquery-ui.js"></script>
		<title>
	我的消息
</title>
		
	</head>
	<body>
		<!--头部-->
		<div id="header">
			<img src="/Public/Geomatics/images/logo.png" alt="">
		<span>测绘与国土信息工程学院</span>
		</div>
		<div class="header_nav">
		<ul class="nav_menu">
			<li><a href="#">首页</a></li>
			<li onmouseover='show(this)' onmouseout='hide(this)'><a href="#">学院概况</a>
				<ul>
					<li><a href="#">学院简介</a></li>
					<li><a href="#">机构设置</a></li>
					<li><a href="#">发展规划</a></li>
					<li><a href="#">学院领导</a></li>
				</ul>
			</li>
			<li onmouseover='show(this)' onmouseout='hide(this)'><a href="#">专业设置</a>
				<ul>
					<li><a href="#">测绘工程专业</a></li>
					<li><a href="#">地理信息科学专业</a></li>
					<li><a href="#">资源环境与城乡规划管理专业</a></li>
					<li><a href="#">土地资源专业</a></li>
					<li><a href="#">遥感科学与技术专业</a></li>
				</ul>
			</li>
			<li onmouseover='show(this)' onmouseout='hide(this)'><a href="#">师资队伍</a>
				<ul>
					<li><a href="#">院士名录</a></li>
					<li><a href="#">博导名录</a></li>
					<li><a href="#">教授风采</a></li>
					<li><a href="#">博士风采</a></li>
					<li><a href="#">外聘专家</a></li>
				</ul>
			</li>
			<li onmouseover='show(this)' onmouseout='hide(this)'><a href="#">教学工作</a>
				<ul>
					<li><a href="#">公告通知</a></li>
					<li><a href="#">教学通知</a></li>
					<li><a href="#">教学活动</a></li>
					<li><a href="#">文件下载</a></li>
				</ul>
			</li>
			<li onmouseover='show(this)' onmouseout='hide(this)'><a href="#">科研工作</a>
				<ul>
					<li><a href="#">科研活动</a></li>
					<li><a href="#">文件下载</a></li>
				</ul>
			</li>
			<li onmouseover='show(this)' onmouseout='hide(this)'><a href="#">党建工作</a>
				<ul>
					<li><a href="#">党建动态</a></li>
					<li><a href="#">支部设置</a></li>
					<li><a href="#">支部生活</a></li>
					<li><a href="#">党员风采</a></li>
					<li><a href="#">反腐倡廉</a></li>
					<li><a href="#">党务政务公开</a></li>
				</ul>
			</li>
			<li onmouseover='show(this)' onmouseout='hide(this)'><a href="#">学生园地</a>
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
			<li onmouseover='show(this)' onmouseout='hide(this)'><a href="#">招生就业</a>
				<ul>
					<li><a href="#">招聘信息</a></li>
					<li><a href="#">就业信息</a></li>
				</ul>
			</li>
			<li onmouseover='show(this)' onmouseout='hide(this)'><a href="#">友情链接</a>
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
		<!--菜单栏-->
		<span id="asider">
		<ul id="meun">
			<li>
				<a href="<?php echo U('Personal/index');?>" id="perinfor">
					个人信息
					<img src="/Public/Geomatics/Personal/img/house.png"/>
				</a>
			</li>
			<li>
				<a href="<?php echo U('Personal/score');?>" id="wascor">
					查看成绩
					<img src="/Public/Geomatics/Personal/img/report.png"/>
				</a>
			</li>
			<li>
				<a href="<?php echo U('Personal/certificate');?>" id="upcerti">
					上传证书
					<img src="/Public/Geomatics/Personal/img/certificate.png"/>
				</a>
			</li>
			<li>
				<a href="<?php echo U('Personal/message');?>" id="lookme">
					查看消息
					<img src="/Public/Geomatics/Personal/img/message.png"/>
				</a>
			</li>
		</ul> </span>
		<!--菜单栏结束-->
		
	<div id="message"><!--消息记录-->
        	<div id="mhead">我的消息：</div>
        	<div id="mbody">
        		<div class="box">
 <ul class="tab">
       <li class="one">未读信息</li>  
       <li class="two">已读信息</li> 
       <li class="three">全部信息</li> 
 </ul>
 <div id="one_1"><table>
<tr><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;题目&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>&nbsp;&nbsp;作者&nbsp;&nbsp;</th><th>&nbsp;&nbsp;时间&nbsp;&nbsp;</th></tr>
 	<tr><td><a href="#">啊啊啊啊啊啊啊啊啊啊</a></td><td>pat</td><td>2013-9-8</td></tr>
	<tr><td><a href="#">啊啊啊啊啊啊啊啊啊啊</a></td><td>pat</td><td>2013-9-8</td></tr>
	<tr><td><a href="#">啊啊啊啊啊啊啊啊啊啊</a></td><td>pat</td><td>2013-9-8</td></tr>
	<tr><td><a href="#">啊啊啊啊啊啊啊啊啊啊</a></td><td>pat</td><td>2013-9-8</td></tr>
	<tr><td><a href="#">啊啊啊啊啊啊啊啊啊啊</a></td><td>pat</td><td>2013-9-8</td></tr>
 </table>
 </div>
 <div id="two_1"><table>
<tr><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;题目&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>&nbsp;&nbsp;作者&nbsp;&nbsp;</th><th>&nbsp;&nbsp;时间&nbsp;&nbsp;</th></tr>
 	<tr><td><a href="#">啊啊啊啊啊啊啊啊啊啊</a></td><td>pat</td><td>2013-9-8</td></tr>
	<tr><td><a href="#">啊啊啊啊啊啊啊啊啊啊aa</a></td><td>pat</td><td>2013-9-8</td></tr>
	<tr><td><a href="#">啊啊啊啊啊啊啊啊啊啊</a></td><td>pat</td><td>2013-9-8</td></tr>
	<tr><td><a href="#">啊啊啊啊啊啊啊啊啊啊</a></td><td>pat</td><td>2013-9-8</td></tr>
	<tr><td><a href="#">啊啊啊啊啊啊啊啊啊啊</a></td><td>pat</td><td>2013-9-8</td></tr>
 </table>
 </div>
 <div id="three_1"><table>
<tr><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;题目&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>&nbsp;&nbsp;作者&nbsp;&nbsp;</th><th>&nbsp;&nbsp;时间&nbsp;&nbsp;</th></tr>
 	<tr><td><a href="#">啊啊啊啊啊啊啊啊啊啊</a></td><td>pat</td><td>2013-9-8</td></tr>
	<tr><td><a href="#">啊啊啊啊啊啊啊啊啊啊</a></td><td>pat</td><td>2013-9-8</td></tr>
	<tr><td><a href="#">啊啊啊啊啊啊啊啊啊啊</a></td><td>pat</td><td>2013-9-8</td></tr>
	<tr><td><a href="#">啊啊啊啊啊啊啊啊啊啊</a></td><td>pat</td><td>2013-9-8</td></tr>
	<tr><td><a href="#">啊啊啊啊啊啊啊啊啊啊</a></td><td>pat</td><td>2013-9-8</td></tr>
 </table>
 </div>
 </div>
        	</div>
        </div>
	</body>
	<script src="/Public/Geomatics/Personal/js/jquery-1.12.2.js"></script>
	<script type="text/javascript">
 $("#two_1").hide();
 $("#three_1").hide();
 $(".tab li").mouseover(
 	function(){
 		var now=$(this).attr("class");
 		 $(this).addClass("current").siblings().removeClass("current");
 		$(".box div").hide();
   		$("div#"+now+"_1").show();
 	}
 );
 </script>

	</body>
</html>