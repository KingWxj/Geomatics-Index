<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh-CN">
	<head>
		<meta charset="UTF-8">
		<title>
			
	查询结果
</title>
		<link rel="stylesheet" href="/Public/Admin/css/common.css">
		<link rel="stylesheet" href="/Public/Admin/css/style.css">
		<script type="text/javascript" src="/Public/Admin/js/jquery.min.js"></script>
		<script type="text/javascript" src="/Public/Admin/js/jquery.SuperSlide.js"></script>
		<script type="text/javascript" src="/Public/Admin/js/base_admin.js"></script>
		
	<!--<script src="/Public/Admin/js/Score_index.js" type="text/javascript" charset="utf-8"></script>-->

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
							<?php echo (session('adminName')); ?>
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
					
	查询结果:<font color="red">本次查询共检索到<?php echo ($count); ?>条记录</font>

				</div>
			</div>
		</div>
		<div class="side" style="overflow: scroll;overflow-x: hidden;">
			<div class="sideMenu" style="margin:0 auto;">
				<h3>内容管理</h3>
				<ul>
					<li class="on">
						<a href="<?php echo U('News/index');?>">
							公告管理
						</a>
					</li>
					<li>
						<a href="<?php echo U('News/addNews');?>">
							添加公告
						</a>
					</li>
					<li>
						<a href="<?php echo U('Upload/index');?>">下载园地</a>
					</li>
					<li>
						<a href="<?php echo U('Upload/upload');?>">上传文件</a>
					</li>
					<li>
						导航菜单
					</li>
				</ul>
				<h3>账户管理</h3>
				<ul>
					<li>
						<a href="<?php echo U('Admin/index');?>">
							管理员列表
						</a>
					</li>
					<li>
						<a href="<?php echo U('Admin/addAdmin');?>">
							添加管理员
						</a>
					</li>
					<li>
						<a href="<?php echo U('Admin/fixAdminPass');?>">
							管理员密码修改
						</a>
					</li>
					<li>
						<a href="<?php echo U('Stu/index');?>">
							学生账户管理
						</a>
					</li>
				</ul>
				<h3>审核管理</h3>
				<ul>
					<li>
						证书审核
					</li>
					<li>
						<a href="<?php echo U('Import/index');?>">
							成绩导入
						</a>
					</li>
					<li>
						成绩审核
					</li>
					<li>
						<a href="<?php echo U('Score/index');?>">成绩管理</a>
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
			
	<table border="1px" cellspacing="0" width="100%">
			<tr>
				<th>学号</th>
				<th>姓名</th>
				<th>性别</th>
				<th>科目</th>
				<th>成绩</th>
				<th>备注</th>
				<th>操作</th>
			</tr>
			<?php if(is_array($selectInfo)): foreach($selectInfo as $key=>$vo): ?><tr>
					<td align="center"><?php echo ($vo['stuid']); ?></td>
					<td align="center"><?php echo ($vo['name']); ?></td>
					<td align="center"><?php echo ($vo['sex']); ?></td>
					<td align="center"><?php echo ($vo['subject']); ?></td>
					<td align="center"><?php echo ($vo['score']); ?></td>
					<td align="center"><?php echo ($vo['mark']); ?></td>
					<td align="center">
						<a href="">
							[修改]
						</a></td>
				</tr><?php endforeach; endif; ?>
			<!--<tr>
				<td align="center">
					<a href="<?php echo U('Score/selectScore',array('page'=>1));?>">
						首页
					</a></td>
				<td align="center">
					<?php if($page != 1): ?><a href="<?php echo U('Score/selectScore',array('page'=>$page-1));?>">
							上一页
						</a><?php endif; ?></td>
				<td align="center" colspan="3"> 共<?php echo ($countList); ?>条数据&emsp;每页50条，共<?php echo ($pageCount); ?>页&emsp;当前是<font color="red">第<?php echo ($page); ?>页</font></td>
				<td align="center">
					<?php if($page != $pageCount): ?><a href="<?php echo U('Score/selectScore',array('page'=>$page+1));?>">
							下一页
						</a><?php endif; ?></td>
				<td align="center">
					<a href="<?php echo U('Score/selectScore',array('page'=>$pageCount));?>">
						尾页
					</a></td>
			</tr>-->
		</table>

		</div>
		<div class="bottom">
			<div id="bottom_bg">
				版权
			</div>
		</div>
		<div class="scroll">
			<a href="javascript:;" class="per" title="使用鼠标滚轴滚动侧栏" onclick="menuScroll(1);"></a>
			<a href="javascript:;" class="next" title="使用鼠标滚轴滚动侧栏" onclick="menuScroll(2);"></a>
		</div>
	</body>

</html>