<extend name="Public/Geomatics/base_index_frame.php" />
<block name="title">
	我的成绩
</block>
<block name="css_js">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Geomatics/css/Personal_common.css"/>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Geomatics/css/Personal_score.css"/>

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
				<li class="aside_li menu_on">
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
		<form action="{:U('Personal/scoreFix')}" method="post">
			<table id="score_table" cellspacing="0" border="1px">
				<tr>
					<th>科目</th>
					<th>分数&emsp;
						<button id="submit_fix">
						提交修改
						</button></th>
					<th>审核状态</th>
					<th>备注</th>
				</tr>
				<foreach name="score" item="vo">
					<tr>
						<td align="center">{$vo['subject']}</td>
						<td align="center">{$vo['score']}→
							<input type="text" name="{$vo['id']}" class="fixScore" value="{$vo['fixscore']}" />
						</td>
						<td align="center">
							<if condition="$vo['verify'] eq 0">
								<font color="orange">待审核</font>
								<elseif condition="$vo['verify'] eq 1"/>
								<font color="green">审核通过</font>
								<elseif condition="$vo['verify'] eq 2"/>
								<font color="red">未通过</font>
							</if></td>
						<td align="center">{$vo['mark']}</td>
					</tr>
				</foreach>
			</table>
		</form>
	</div>
</block>
