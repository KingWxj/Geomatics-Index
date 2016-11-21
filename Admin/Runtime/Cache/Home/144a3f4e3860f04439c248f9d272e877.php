<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh-CN">
	<head>
		<Link Rel="SHORTCUT ICON" href="/Project/Public/logo.png">
		<meta charset="UTF-8">
		<meta name="renderer" content="webkit">
		<title>
			新增成绩</title>
		<link rel="stylesheet" href="/Project/Public/Admin/css/common.css">
		<link rel="stylesheet" href="/Project/Public/Admin/css/style.css">
		<script type="text/javascript" src="/Project/Public/Admin/js/jquery.min.js"></script>
		<script type="text/javascript" src="/Project/Public/Admin/js/jquery.SuperSlide.js"></script>
		<script type="text/javascript" src="/Project/Public/Admin/js/base_admin.js"></script>
		
	<script type="text/javascript">
//	去除空格的函数
		function Trim(str){ 
            return str.replace(/(^\s*)|(\s*$)/g, ""); 
     		}
//   		执行往html中追加新标签项目的函数，点击按钮之后再select的开头追加
		$().ready(function(){
			$("#addSubject").click(function(){
				$newSubject=Trim($("#newSubject").val());
				if($newSubject!=''){
					$("#subject").prepend("<option selected='selected' value='"+$newSubject+"'>"+$newSubject+"</option>");
				}
				$("#newSubject").val("");
			});
		});
	</script>
	<script type="text/javascript">
		$().ready(function(){
			$("#add_score").attr('class','on');
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
					新增成绩
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
			
	<div style="margin: 10px 0 0 20px;">
		<h3>学生成绩添加</h3>
		<form action="<?php echo U('Import/addScore');?>" method="post">
			<label for="stuId">学号：</label>
			<input type="text" name="stuId" id="stuId"/>*<br />
			<label for="name">姓名：</label>
			<input type="text" name="name" id="name"/>*<br />
			<label for="subject">学科：</label>
			<select name="subject" id="subject">
				<?php if(is_array($subjectList)): foreach($subjectList as $key=>$vo): ?><option value="<?php echo ($vo['subject']); ?>"><?php echo ($vo['subject']); ?></option><?php endforeach; endif; ?>
			</select>
			<input type="text" name="newSubject" id="newSubject" style="width: 80px;" />
			<input type="button" id="addSubject" value="新增" />
			<br />
			<label for="score">成绩：</label>
			<input type="text" name="score" id="score"/>*<br />
			<label for="mark">备注：</label>
			<input type="text" name="mark" id="mark"/><br />
			<input type="submit" value="添加学生成绩"/>
		</form>
		<br />
		<hr />
		<h3>导入Excel成绩表</h3>
		<form action="<?php echo U('Import/upload');?>" method="post" enctype="multipart/form-data">
			<input type="file" name="file" id="file" />
			<input type="submit" value="导入"/>
		</form>
		<div id="tips" style="color: red;">
			<p>导入的Excel格式如下图所示（从头到尾不要有任何合并单元格！）</p>
			<p>每一列必须按照如图所示的数据相互对应，比如，第一列必须是学号</p>
			<p>Excel的第一行是表头，默认跳过第一行</p>
			<p>请务必按照如下的格式整理好之后再上传导入，否则就会给数据库添加错误的信息条目，需要手动删除！</p>
		</div>
		<img src="/Project/Public/Admin/images/demoExcel1.png" width="700px" height="200px"/>
	</div>

		</div>
		<div class="bottom">
			<div id="bottom_bg">
				版权所有 河南理工大学测绘与国土信息工程学院 中国 河南 焦作 高新区 世纪路2001号 [454000] 校ICP备03050
				&emsp;技术支持&nbsp;<a href="http://www.xsgzs.org/">行思工作室</a>
			</div>
		</div>
	</body>

</html>