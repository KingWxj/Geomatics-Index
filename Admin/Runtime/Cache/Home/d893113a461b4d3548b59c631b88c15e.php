<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh-CN">
	<head>
		<meta charset="UTF-8">
		<title>
			
	证书回收站
</title>
		<link rel="stylesheet" href="/Public/Admin/css/common.css">
		<link rel="stylesheet" href="/Public/Admin/css/style.css">
		<script type="text/javascript" src="/Public/Admin/js/jquery.min.js"></script>
		<script type="text/javascript" src="/Public/Admin/js/jquery.SuperSlide.js"></script>
		<script type="text/javascript" src="/Public/Admin/js/base_admin.js"></script>
		
	<link rel="stylesheet" type="text/css" href="/Public/Admin/css/Examine_certificate.css"/>
	<script type="text/javascript" src="/Public/Admin/js/Examine_certificate.js"></script>
	<script type="text/javascript">
		$().ready(function(){
			$("#evaluate_character").attr('class','on');
		})
	</script>

		<title>后台首页</title>
	</head>

	<body>
		<div class="top">
			<div id="top_t">
				<div id="logo" class="fl">
					&emsp;&emsp;测绘学院后台管理
				</div>
				<div id="photo_info" class="fr">
					<div id="photo" class="fl">
						<a href="#">
							<img src="/Public/Admin/images/a.png" alt="" width="60" height="60">
						</a>
					</div>
					<div id="base_info" class="fr">
						<div class="help_info" style="position: relative;">
							<span><a href="<?php echo U('Login/logout');?>" id="out" style="color: white;margin-left: 120px;">退出登录</a></span>
						</div>
						<div class="info_center">
							<?php echo (cookie('adminName')); ?>
						</div>
					</div>
				</div>
			</div>
			<div id="side_here">
				<div id="side_here_l" class="fl"></div>
				<div id="here_area" class="fl">
						<button onclick="history.back();">◀返回</button>
					当前位置：
					
	德育分证书回收站

				</div>
			</div>
		</div>
		<div class="side" style="overflow: scroll;overflow-x: hidden;">
			<div class="sideMenu" style="margin:0 auto;">
				<h3>内容管理</h3>
				<ul>
					<li id="index">
						<a href="<?php echo U('Index/index');?>">
							后台管理首页
						</a>
					</li>
					<li id="contentManager">
						<a href="<?php echo U('Content/index');?>">
							主页内容管理
						</a>
					</li>
					<li id="addContent">
						<a href="<?php echo U('Content/addContent');?>">
							添加主页内容
						</a>
					</li>
					<li id="mgr_nav">
						<a href="<?php echo U('Nav/index');?>">
							导航栏内容管理
						</a>
					</li>
					<li id="imgToggle">
						<a href="<?php echo U('Imgtoggle/index');?>">
							添加轮播图片
						</a>
					</li>
					<li id="down_area">
						<a href="<?php echo U('Upload/index');?>">
							下载园地
						</a>
					</li>
					<li id="consult">
						<a href="<?php echo U('Consult/index');?>">
							咨询小屋管理
						</a>
					</li>
					<li id="evaluate">
						<a href="<?php echo U('Evaluate/index');?>">
							评优评先专栏
						</a>
					</li>
				</ul>
				<h3>账户管理</h3>
				<ul>
					<li id="admin_list">
						<a href="<?php echo U('Admin/index');?>">
							管理员列表
						</a>
					</li>
					<li id="add_admin">
						<a href="<?php echo U('Admin/addAdmin');?>">
							添加管理员
						</a>
					</li>
					<li id="fix_pass">
						<a href="<?php echo U('Admin/fixAdminPass');?>">
							管理员密码修改
						</a>
					</li>
					<li id="stu_manager">
						<a href="<?php echo U('Stu/index');?>">
							学生账户管理
						</a>
					</li>
				</ul>
				<h3>评优评先管理</h3>
				<ul>
					<li id="evaluate_certificate">
						<a href="<?php echo U('Evaluate/showStuCer');?>">
							素质拓展分评定
						</a>
					</li>
					<li id="evaluate_character">
						<a href="<?php echo U('Evaluate/showStuCha');?>">
							德育分评定
						</a>
					</li>
					<li id="add_score">
						<a href="<?php echo U('Import/index');?>">
							添加学生成绩
						</a>
					</li>
					<li id="score_verify">
						<a href="<?php echo U('Examine/score');?>">
							成绩审核
						</a>
					</li>
					<li id="score_manager">
						<a href="<?php echo U('Score/index');?>">
							成绩管理
						</a>
					</li>
				</ul>
				<h3>优秀展览</h3>
				<ul>
					<li id="excellentManager">
						<a href="<?php echo U('Excellent/index');?>">优秀展示管理</a>
					</li>
					<li id="addExcellent">
						<a href="<?php echo U('Excellent/addExcellent');?>">添加优秀展示</a>
					</li>
					
				</ul>
			</div>
		</div>
		<div class="main">
			
	<table width="100%" border="1px" cellspacing="0" >
		<tr>
			<th>学号</th>
			<th>姓名</th>
			<th>证书简介</th>
			<th>证书图片</th>
			<th>上传日期</th>
			<th>操作</th>
		</tr>
		<?php if(is_array($character_list)): foreach($character_list as $key=>$vo): ?><tr>
			    	<td align="center"><?php echo ($vo['stuid']); ?></td>
			    	<td align="center"><?php echo ($vo['stuname']); ?></td>
			    	<td align="center"><?php echo ($vo['name']); ?></td>
			    	<td align="center"><img src="<?php echo ($vo['route']); ?>" width="400px" height="220px"/></td>
			    	<td align="center"><?php echo ($vo['date']); ?></td>
			    	<td align="center">
			    		<a href="javascript:void(0)" onclick="ajaxAgree('<?php echo U('Examine/verifyCharacter');?>',<?php echo ($vo['id']); ?>)"><font color="blue">[重新通过]</font></a>
			    	</td>
			    </tr><?php endforeach; endif; ?>
	</table>

		</div>
		<div class="bottom">
			<div id="bottom_bg">
				版权所有 河南理工大学测绘与国土信息工程学院 中国 河南 焦作 高新区 世纪路2001号 [454000] 校ICP备03050
				&emsp;技术支持&nbsp;<a href="http://www.xsgzs.org/">行思工作室</a>
			</div>
		</div>
	</body>

</html>