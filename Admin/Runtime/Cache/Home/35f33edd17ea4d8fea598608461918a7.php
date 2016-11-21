<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh-CN">
	<head>
		<meta charset="UTF-8">
		<title>
			修改公告</title>
		<link rel="stylesheet" href="/Public/Admin/css/common.css">
		<link rel="stylesheet" href="/Public/Admin/css/style.css">
		<script type="text/javascript" src="/Public/Admin/js/jquery.min.js"></script>
		<script type="text/javascript" src="/Public/Admin/js/jquery.SuperSlide.js"></script>
		<script type="text/javascript" src="/Public/Admin/js/base_admin.js"></script>
		
	<script type="text/javascript">
		$().ready(function(){
			$("#news").attr('class','on');
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
						<div class="help_info">
							<a href="1" id="hp">
								&nbsp;
							</a>
							<a href="2" id="gy">
								&nbsp;
							</a>
							<a href="<?php echo U('Login/logout');?>" id="out">
								&nbsp;
							</a>
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
					<a href="javascript:history.go(-1);location.reload()" style="font-size: 16px; padding: 2px;">
						<button>
						◀返回
						</button>
					</a>
					当前位置：
					
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
					<li id="news">
						<a href="<?php echo U('News/index');?>">
							公告管理
						</a>
					</li>
					<li id="school">
						<a href="<?php echo U('School/index');?>">
							校内新闻
						</a>
					</li>
					<li id="event">
						<a href="<?php echo U('Event/index');?>">
							学院动态
						</a>
					</li>
					<li id="add_news">
						<a href="<?php echo U('News/addNews');?>">
							添加主页内容
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
						<a href="<?php echo U('Evaluate/showStu');?>">
							证书评分
						</a>
					</li>
					<li id="certificate_verify">
						<a href="<?php echo U('Examine/certificate');?>">
							证书回收站
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
					<li>
						学院大事件
					</li>
					<li>
						优秀作品
					</li>
					<li>
						学生事迹
					</li>
					<li class="on">
						导航菜单
					</li>
					<li>
						导航菜单
					</li>
				</ul>
				<h3>导航菜单</h3>
				<ul>
					<li>
						导航菜单
					</li>
					<li>
						导航菜单
					</li>
					<li>
						导航菜单
					</li>
					<li>
						导航菜单
					</li>
					<li>
						导航菜单
					</li>
				</ul>
				<h3>导航菜单</h3>
				<ul>
					<li>
						导航菜单
					</li>
					<li>
						导航菜单
					</li>
					<li>
						导航菜单
					</li>
					<li>
						导航菜单
					</li>
					<li>
						导航菜单
					</li>
				</ul>
			</div>
		</div>
		<div class="main">
			
<form action="<?php echo U('News/runUpdateNews');?>" method="post">
		<label>公告id:</label><span><?php echo ($info['id']); ?></span><br />
		<input type="hidden" name="hidden_id" id="hidden_id" value="<?php echo ($info['id']); ?>" />
		<label for="title">公告标题：</label>
		<input type="text" name="title" id="title" value="<?php echo ($info['title']); ?>" /><br />
		<!--<label for="content">公告内容：</label>
		<textarea  name="content" id="content"><?php echo ($info['content']); ?></textarea><br />-->
		<div id="editor" style="margin-top: 10px;">
			<script id="content" name="content" type="text/plain" style="width: 95%;"><?php echo ($info['content']); ?></script>
			<!-- 配置文件 -->
			<script type="text/javascript" src="/Public/uEditor/ueditor.config.js">
			</script>
			<!-- 编辑器源码文件 -->
			<script type="text/javascript" src="/Public/uEditor/ueditor.all.js">
			</script>
			<!-- 实例化编辑器 -->
			<script type="text/javascript">
			var ue = UE.getEditor('content',{
				initialFrameHeight:300,
			});
			</script>
		</div>
		<input type="submit" id="submit" value="提交修改" />
</form>

		</div>
		<div class="bottom">
			<div id="bottom_bg">
				版权所有 河南理工大学测绘与国土信息工程学院 中国 河南 焦作 高新区 世纪路2001号 [454000] 校ICP备03050
				&emsp;技术支持&nbsp;行思工作室
			</div>
		</div>
		<div class="scroll">
			<a href="javascript:;" class="per" title="使用鼠标滚轴滚动侧栏" onclick="menuScroll(1);"></a>
			<a href="javascript:;" class="next" title="使用鼠标滚轴滚动侧栏" onclick="menuScroll(2);"></a>
		</div>
	</body>

</html>