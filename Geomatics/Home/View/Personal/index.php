<extend name="Public/Geomatics/base_index_frame.php" />
<block name="title">
	个人空间主页
</block>
<block name="css_js">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Geomatics/css/Personal_common.css"/>
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
</block>
<block name="main">
	<!--侧边的导航栏，个人中心，证书等-->
	<div id="aside">
		<ul>
			<a href="{:U('Personal/index')}">
				<li class="aside_li menu_on">
					个人中心
				</li>
			</a>
			<a href="{:U('Personal/certificate')}">
				<li class="aside_li">
					素质拓展分评定
				</li>
			</a>
			<a href="{:U('Personal/character')}">
				<li class="aside_li">
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
	<!--右侧主体内容开始-->
	<div id="content">
		<div id="info_box">
			<h3>欢迎来到测绘学院个人中心！</h3>
			<p class="personal_info">
				姓名：{$info['stuname']}
			</p>
			<p class="personal_info">
				学号：{$info['stuid']}
			</p>
		</div>
		<div id="status">
			<h3>素质拓展分</h3>
			<p>您一共上传了<span style="color: orangered;">&nbsp;{$cer_count}&nbsp;</span>张证书</p>
			<p>其中<span style="color: blue;">&nbsp;{$cer_pass}&nbsp;</span>张已通过审核并评分</p>
			<p>当前素质拓展分总分：<span style="color: blue;">&nbsp;{$cer_score}&nbsp;</span></p>
			<h3>德育分</h3>
			<p>您一共上传了<span style="color: orangered;">&nbsp;{$cha_count}&nbsp;</span>张证书</p>
			<p>其中<span style="color: blue;">&nbsp;{$cha_pass}&nbsp;</span>张已通过审核并评分</p>
			<p>当前德育分总分：<span style="color: blue;">&nbsp;{$cha_score}&nbsp;</span></p>
			<p style="font-size: small;color: #888;">请在个人中心相应选项中查看详细信息</p>
		</div>
	</div>
	<!--右侧主体内容结束-->
</block>
