<extend name="Public/Geomatics/base_main_frame.php" />
<block name="title">
	咨询小屋
</block>
<block name="left_top">
	<img src="__PUBLIC__/Geomatics/images/2.png" width="25px" height="25px" style="vertical-align: middle;">
	咨询小屋
</block>
<block name="left_main_li">
	<li>
		<a href="{:U('Consult/index')}">
			发布话题
		</a>
	</li>
	<li>
		<a href="{:U('Consult/allTheme')}">
			所有话题
		</a>
	</li>
</block>
<block name="right_top">
	<p>
		<img src="__PUBLIC__/Geomatics/images/0.png" style="vertical-align: middle;">
		发布话题
	</p>
</block>
<block name="right_main">
		<if condition="$Think.cookie.stuId neq null">
			<p>
				<span>姓名：{$Think.cookie.stuName}</span>
				<br />
				<span>学号：{$Think.cookie.stuId}</span>
			</p>
			<form action="{:U('Consult/addTheme')}" method="post" style="margin: 0 0 0 20px;">
				<label for="title">问题标题：</label>
				<input type="text" name="title" id="title" style="width: 300px;padding: 5px;margin: 10px 0 10px 0;" />
				<br />
				<label for="content">问题详情：</label>
				<textarea name="content" id="content" style=" width: 600px;height: 400px; padding: 5px;" ></textarea>
				<br />
				<div style="margin: 10px 0 0 0;">
					<if condition="$noName eq '1'">
						<input type="checkbox" name="noName" id="noName" value="1" /><label for="noName"><font color="red">匿名发言</font><small>不记录发布者的任何信息</small></label>
					</if>
				</div>
				<input type="submit" value="提交问题" style="padding: 5px;width: 100px;"/>
			</form>
		<else />
		<h2>请登录之后进行操作！<a href="{:U('Index/index')}"><font color="red">立即登录</font></a></h2>
		</if>
</block>