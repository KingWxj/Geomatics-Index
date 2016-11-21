<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
	<Link Rel="SHORTCUT ICON" href="/Project/Public/logo.png">
	<title>测绘学院学生工作网站</title>
	<link rel="stylesheet" href="/Project/Public/Geomatics/css/index.css" type="text/css">
	<link rel="stylesheet" href="/Project/Public/Geomatics/css/main.css" type="text/css">
	<script src="/Project/Public/Geomatics/js/jquery-1.12.2.js"></script>
	<script src="/Project/Public/Geomatics/js/js.js"></script>
	<script src="/Project/Public/Geomatics/js/main.js" type="text/javascript" charset="utf-8"></script>
	
	<script src="/Project/Public/Geomatics/js/Index_index.js" type="text/javascript" charset="utf-8"></script>

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
		
	<div class="photo_show">
		<!--图片轮播-->
		<div class="photo_show_left">
			<ul class='photo_list'>
				<?php if(is_array($image)): foreach($image as $key=>$arr): ?><li><img src="/Project<?php echo ($arr['route']); ?>" alt="<?php echo ($arr['title']); ?>" width="500px" height="250px" /></li><?php endforeach; endif; ?>
			</ul>
			<ul class='num_list'>
				<li class="indexon">1</li>
				<li>2</li>
				<li>3</li>
				<li>4</li>
			</ul>
		</div>
		<!--图片轮播结束-->
		<!--图片轮播右边第一块-->
		<div class="photo_show_right_one">
			<span class="photo_show_right_style">最新公告</span>
						<span class="more"><a href="<?php echo U('List/xydt');?>">更多>></a></span>
			<ul>
				<?php if(is_array($zxgg)): foreach($zxgg as $key=>$zxgg): ?><li><a href="<?php echo U('Show/index',array('id'=>$zxgg['id']));?>" title="<?php echo ($zxgg['title']); ?>"><?php echo ($zxgg['title']); ?></a><span style="float: right;margin: 0 20px 0 0;"><?php echo (str_replace('-','.',mb_substr($zxgg['date'] ,0,10,utf8 ))); ?></span></li><?php endforeach; endif; ?>
				
			</ul>
		</div>
		<!--图片轮播右边第一块结束-->
		<!--图片轮播右边第二块-->
		<div class="photo_show_right_two">			
			<?php if($_COOKIE['stuId']!= null and $_COOKIE['stuName']!= null): ?><p>欢迎你,<?php echo (cookie('stuName')); ?></p>
				<p>学号：<?php echo (cookie('stuId')); ?></p>
				<a href="<?php echo U('Personal/index');?>">进入个人空间</a>
				<a href="<?php echo U('Login/logout');?>">注销</a>
			<?php else: ?>
				<form action="<?php echo U('Login/check');?>" id="form_login" method="post">
					<span class="new_notice">个人空间</span>
					<p>账号</p><input type="text" id="stuId" name="stuId" placeholder="输入学号" />
					<p>密码</p><input type="password" id="password" name="password" placeholder="输入密码" />
					<p>请输入验证码</p>
					<input type="text" name="verify" id="verify" class="validate" required="required" style="width: 50px ; height: 20px;">
					<img src="<?php echo U('Login/verifyImg');?>"  id="verifyImg" style="vertical-align: middle; width: 80px;"/>
					<input type="button" class="register" onclick="ajaxLogin('<?php echo U('Login/login');?>')" value="登录" />
				</form><?php endif; ?>
		</div>
		<!--图片轮播右边第二块结束-->
		<div style="clear:both"></div>
	</div> 
	<!--中间信息区-->
	<div class="college_main_new">
		<div class="college_photo" style="clear:both">
			<a href="<?php echo U('List/excellentEvent');?>" class="college_href_left">
				<h3><img src="/Project/Public/Geomatics/images/1.png" alt="">优秀展示</h3>
			</a>
			<a href="<?php echo U('Certificate/index');?>" class="college_href">
				<h3><img src="/Project/Public/Geomatics/images/4.png" alt="">证书评分专栏</h3>
			</a>
			<a href="<?php echo U('Evaluate/index');?>" class="college_href">
				<h3><img src="/Project/Public/Geomatics/images/0.png" alt="">评优评先专栏</h3>
			</a>
			<a href="<?php echo U('Consult/index');?>" class="college_href_right">
				<h3><img src="/Project/Public/Geomatics/images/2.png" alt="">咨询小屋</h3>
			</a>
		</div>
		<div class="college_notice">
			<span class="new_notice">学院动态</span>
			<ul>
				<?php if(is_array($xydt)): foreach($xydt as $key=>$xydt): ?><li><a href="<?php echo U('Show/index',array('id'=>$xydt['id']));?>" title="<?php echo ($xydt['title']); ?>"><?php echo ($xydt['title']); ?></a><span class="timer"><?php echo (str_replace('-','.',mb_substr($xydt['date'] ,0,10,utf8 ))); ?></span></li><?php endforeach; endif; ?>
			</ul>
			<span class="more"><a href="<?php echo U('List/zxgg');?>">更多>></a></span>
		</div>
		<div class="college_new">
			<span class="new_notice">国内外新闻</span>
				<ul>
					<?php if(is_array($xnxw)): foreach($xnxw as $key=>$xnxw): ?><li><a href="<?php echo U('Show/index',array('id'=>$xnxw['id']));?>" title="<?php echo ($xnxw['title']); ?>"><?php echo ($xnxw['title']); ?></a><span class="timer"><?php echo (str_replace('-','.',mb_substr($xnxw['date'] ,0,10,utf8 ))); ?></span></li><?php endforeach; endif; ?>
				</ul>
			<span class="more"><a href="<?php echo U('List/xnxw');?>">更多>></a></span>
		</div>
		<div class="college_media">
			<span class="new_notice">下载园地</span>
				<ul>
					<?php if(is_array($down)): foreach($down as $key=>$down): ?><li><span><?php echo ($down['title']); ?></span><a href="/Project<?php echo ($down['route']); ?>" download><span class="timer">[下载]</span></a></li><?php endforeach; endif; ?>
				</ul>
			<span class="more"><a href="<?php echo U('List/download');?>">更多>></a></span>
		</div>
	</div>
	<div style="clear:both"></div>

		<div style="clear: both;"></div>
	</div>
	<!--底部信息-->
	<div class="footer"><p>版权所有 河南理工大学测绘与国土信息工程学院&nbsp;中国 河南 焦作 高新区 世纪路2001号 [454000] 校ICP备03050</p>
		<p>技术支持&nbsp;<a href="http://www.xsgzs.org/" target="_blank">行思工作室</a></p>
	</div>
	<!--底部信息结束-->
</body>
</html>