<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh-CN">
	<head>
		<Link Rel="SHORTCUT ICON" href="/Project/Public/logo.png">
		<meta charset="UTF-8">
		<meta name="renderer" content="webkit">
		<title>
			
	学生账户管理
</title>
		<link rel="stylesheet" href="/Project/Public/Admin/css/common.css">
		<link rel="stylesheet" href="/Project/Public/Admin/css/style.css">
		<script type="text/javascript" src="/Project/Public/Admin/js/jquery.min.js"></script>
		<script type="text/javascript" src="/Project/Public/Admin/js/jquery.SuperSlide.js"></script>
		<script type="text/javascript" src="/Project/Public/Admin/js/base_admin.js"></script>
		
	<script type="text/javascript">
	function ajaxToggleStatus($url,$stuid){
		$.post($url,{'stuId':$stuid},function(){
			location.reload(true);
		});
	}
	function ajaxDelStu($url,$stuid){
		$.post($url,{'stuId':$stuid},function(){
			location.reload(true);
		});
	}
	</script>
	<script type="text/javascript">
		$().ready(function(){
			$("#stu_manager").attr('class','on');
		})
	</script>

		<title>后台首页</title>
		<style type="text/css">
			.sideMenu a{
				color: #003399;
			}
		</style>
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
							<img src="/Project/Public/Admin/images/a.png" alt="" width="60" height="60">
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
					
	学生账户管理

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
			
	<!--导入学生的Excel文件-->
	<div id="import_stu" style="margin: 10px 0 10px 20px;">
		<form action="<?php echo U('Stu/uploadStu');?>" method="post" enctype="multipart/form-data">
		<p><span style="font-weight: bold;">学生账户导入</span><span style="color: red;">(Excel第一列为学号,第二列为姓名,文档内不能有合并单元格之类的特殊格式,第一行表头默认忽略)</span></p>
		<input type="file" name="file" id="file" />
		<input type="submit" value="导入"/>
		</form>
	</div>
	<hr />
	<div id="" style="margin: 10px 0 10px 20px;">
		<form action="<?php echo U('Stu/addStu');?>" method="post">
			<h3>添加学生账户</h3>
			<label for="stuName">学生姓名：<input type="text" name="stuName" id="stuName" /></label>
			<label for="stuId">学生学号：<input type="text" name="stuId" id="stuId" /></label>
			<label for="password">密码：<input type="text" name="password" id="password" /></label>
			<input type="submit" value="执行添加"/>
		</form>
	</div>
	<table border="1px" cellspacing="0" width="100%"> 
		<tr>
			<form action="<?php echo U('Stu/searchStu');?>" method="post">
			<td colspan="4" align="center"><label for="name">姓名：<input type="text" name="stuName" /></label>
			<label for="stuId">学号：<input type="text" name="stuId" /></label>
			<input type="submit" value="搜索" style="padding: 3px 20px;"/></td>
			</form>
		</tr>
		<tr>
			<th>学号</th>
			<th>姓名</th>
			<th>是否可用</th>
			<th>操作</th>
		</tr>
	<?php if(is_array($stuList)): foreach($stuList as $key=>$list): ?><tr>
			<td align="center"><?php echo ($list['stuid']); ?></td>
			<td align="center"><?php echo ($list['stuname']); ?></td>
			<td align="center"><?php if($list['avaliable'] == 0): ?>已禁用
				    <?php else: ?>
				    已启用<?php endif; ?></td>
			<td align="center"><a href="javascript:void(0)" onclick="ajaxToggleStatus('<?php echo U('Stu/statusToggle');?>','<?php echo ($list['stuid']); ?>')">
				<!--判断账户的启用状态，输出不同的按钮-->
				<?php if($list['avaliable'] == 1): ?>[禁用]
				    <?php else: ?>
				    [启用]<?php endif; ?>
			</a> 
				<a href="javascript:void(0)" onclick="ajaxDelStu('<?php echo U('Stu/delStu');?>','<?php echo ($list['stuid']); ?>')">
					[删除]
				</a></td>
		</tr><?php endforeach; endif; ?>
	<tr>
		<td colspan="4" align="center">
			<?php if($stuList == null): ?><font color="red">请输入检索条件</font>
				<?php else: ?>
				搜索完成！<?php endif; ?>
		</td>
	</tr>
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