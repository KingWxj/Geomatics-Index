<!--德育分评定模块-->
<extend name="Public/Geomatics/base_index_frame.php"/>
<block name="title">
	上传证书
</block>
<block name="css_js">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Geomatics/css/Personal_common.css"/>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Geomatics/css/Personal_character.css"/>
</block>
<block name="main">
	<!--侧边的导航栏，个人中心，证书等-->
	<div id="aside">
		<ul>
			<a href="{:U('Personal/index')}">
				<li class="aside_li">
					个人中心
				</li>
			</a>
			<a href="{:U('Personal/certificate')}">
				<li class="aside_li">
					素质拓展分评定
				</li>
			</a>
			<a href="{:U('Personal/character')}">
				<li class="aside_li menu_on">
					德育分评定
				</li>
			</a>
			<a href="{:U('Personal/score')}">
				<li class="aside_li">
					成绩管理
				</li>
			</a>
			<a href="{:U('Personal/setting')}">
				<li class="aside_li">
					账户设置
				</li>
			</a>
			<a href="{:U('Login/logout')}">
				<li class="aside_li">
					退出登录
				</li>
			</a>
		</ul>
	</div>
	<!--侧边导航栏结束-->
	<div id="content">
		<div id="tips">
			<span>证书名一栏写证书名，少于30字，然后选择自己的证书照片，点击上传，会显示审核状态，当管理员审核完毕即可生效</span>
		</div>
		<div id="upload_bar">
			<!--上传表单开始-->
			<form action="{:U('Personal/uploadCharacter')}" method="post" enctype="multipart/form-data">
				<div id="select_box">
					<span>请选择证书类别</span>
					<select name="root1" id="root1">
						<option class="option_first" value="none">请选择</option>
					</select>
				</div>
				
			</form>
			<!--上传表单结束-->
		</div>
		<div id="show_certificate">
			<foreach name="character_list" item="vo">
				<div class="certificate_box">
					<img src="__ROOT__{$vo['route']}" width="200px" height="110px"/>
					<p>{$vo['name']}</p>
					<p>{$vo['grade']}</p>
					<p class="verify_info">
						<if condition="$vo['verify'] eq 0">
							<font color="blue">待审核</font>
							<elseif condition="$vo['verify'] eq 1"/>
							<font color="green">审核通过</font>
							<else/>
							<font color="red">审核未通过</font>
						</if>
					</p>
					<p>
						得分：{$vo['score']}
						<if condition="$vo['scorelevel'] eq '4'">
							<font color="red">未评分</font>
							<elseif condition="$vo['scorelevel'] eq '3'"/>
							&emsp;辅导员评分
							<elseif condition="$vo['scorelevel'] eq '2'"/>
							&emsp;班主任评分
							<elseif condition="$vo['scorelevel'] eq '1'"/>
							&emsp;学院审核
							<elseif condition="$vo['scorelevel'] eq '0'"/>
							&emsp;学校终审
						</if>
					</p>
				</div>
			</foreach>
		</div>
	</div>
	<script>
		//		当页面加载的时候加载root1
		$().ready(function () {
			$.post("{:U('Personal/getScoreRules')}", {'level': 'root1'}, function (data) {
				$.each(eval(data), function (key, val) {
					$("#root1").append('<option value=' + val.root1 + '>' + val.root1 + '</option>');
				});
			});
		});
		//		当root1改变的时候追加root2
		$("#root1").change(function () {
			$(".option_first").remove();
			$("#root2").remove();
			$("#root3").remove();
			$("#root4").remove();
			$("#score").remove();
			$("#update_box").remove();
			$.post("{:U('Personal/getScoreRules')}", {'level': 'root2', 'root1': $("#root1").val()}, function (data) {
				$("#select_box").append('<select name="root2" id="root2"></select>');
				$("#root2").append('<option class="option_first" value="none">请选择</option>');
				$.each(eval(data), function (key, val) {
					$("#root2").append('<option value=' + val.root2 + '>' + val.root2 + '</option>');
				});
				$("#root2").bind("change", function () {
					root3();
				});
			});
		});
		//		当root2改变的时候追加root3
		function root3() {
			$(".option_first").remove();
			$("#root3").remove();
			$("#root4").remove();
			$("#score").remove();
			$("#update_box").remove();
			$.post("{:U('Personal/getScoreRules')}", {'level': 'root3', 'root1': $("#root1").val(), 'root2': $("#root2").val()}, function (data) {
				$("#select_box").append('<select name="root3" id="root3"></select>');
				$("#root3").append('<option class="option_first" value="none">请选择</option>');
				$.each(eval(data), function (key, val) {
					if(val.root3==null){
						$("#root3").remove();
						$("#root4").remove();
						$("#update_box").remove();
						$.post("{:U('Personal/getFullScoreRule')}", {'root1': $("#root1").val(), 'root2': $("#root2").val()}, function (data) {
							$("#select_box").append(data);
							submitBtn();
						});
						return false;
					}else{
						$("#root3").append('<option value=' + val.root3 + '>' + val.root3 + '</option>');
					}
				});
				$("#root3").bind("change", function () {
					root4();
				});
			});
		}
		//		当root3改变的时候追加root4
		function root4() {
			$(".option_first").remove();
			$("#root4").remove();
			$("#score").remove();
			$("#update_box").remove();
			$.post("{:U('Personal/getScoreRules')}", {'level': 'root4', 'root1': $("#root1").val(), 'root2': $("#root2").val(), 'root3': $("#root3").val()}, function (data) {
				$("#select_box").append('<select name="root4" id="root4"></select>');
				$("#root4").append('<option class="option_first" value="none">请选择</option>');
				$.each(eval(data), function (key, val) {
					if(val.root4==null){
						$("#root4").remove();
						$("#update_box").remove();
						$.post("{:U('Personal/getFullScoreRule')}", {'root1': $("#root1").val(), 'root2': $("#root2").val() , 'root3': $("#root3").val()}, function (data) {
							$("#select_box").append(data);
							submitBtn();
						});
						return false;
					}else{
						$("#root4").append('<option value=' + val.root4 + '>' + val.root4 + '</option>');
					}
				});
				$("#root4").bind("change", function () {
					$("#score").remove();
					$("#update_box").remove();
					$.post("{:U('Personal/getFullScoreRule')}", {'root1': $("#root1").val(), 'root2': $("#root2").val(), 'root3': $("#root3").val(), 'root4': $("#root4").val()}, function (data) {
						$("#select_box").append(data);
						submitBtn();
					});
				});
			});
		}
		function submitBtn() {
			$(".option_first").remove();
			$("#select_box").append('<div id="update_box">证书名：<input type="text" name="name" id="name" required/><input type="file" name="file" id="file"/><input type="submit" id="submit" value="上传证书"/></div>');
		}
	</script>
</block>

