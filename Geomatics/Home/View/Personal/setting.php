<extend name="Public/Geomatics/base_index_frame.php" />
<block name="title">
	账户设置
</block>
<block name="css_js">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Geomatics/css/Personal_common.css"/>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Geomatics/css/Personal_setting.css"/>
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
				<li class="aside_li menu_on">
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
		<div id="fixPass">
			<p id="box_title">修改密码</p>
			<form action="{:U('Personal/fixPass')}" method="post">
				<label for="nowPassword">原密码：</label>
				<input type="password" name="nowPassword" id="nowPassword" />
				<br />
				<label for="newPassword">新密码：</label>
				<input type="password" name="newPassword" id="newPassword"  />
				<br />
				<label for="rePassword">重复密码：</label>
				<input type="password" name="rePassword" id="rePassword" />
				<br />
				<input type="submit" value="提交修改" />
			</form>
		</div>
	</div>
</block>