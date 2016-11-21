<extend name="Public/Geomatics/base_main_frame.php" />
<block name="title">
	所有话题
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
		{$root['title'] | htmlspecialchars}——发布者：
		<if condition="$root['uid'] eq null">
			匿名
		<else />
			{$root['name'] | htmlspecialchars}
		</if>
	</p>
</block>
<block name="right_main">
	<div>
		<div id="root" style="padding: 10px;margin: 5px;border-bottom: 1px solid gray;">
			<h4>&emsp;&emsp;{$root['content'] | htmlspecialchars}</h4>
		</div>
		<div id="answer">
			<foreach name="floor" item="fl">
					<div class="floor" style="margin: 10px 0 10px 40px;border-bottom: 1px dotted gray; padding: 0 0 5px 5px;">
						<if condition="$fl['name'] eq null">
							<small><i>匿名：</i></small>
						<else />
							<small><i>{$fl['name'] | htmlspecialchars}:</i></small>
						</if>
						<br />
						<span>&emsp;&emsp;{$fl['content'] | htmlspecialchars}</span>
					</div>
			</foreach>
		</div>
		<!--回复-->
		<div>
			<form action="{:U('Consult/answer')}" method="post">
				<span style="font-size: 12px;">
					<if condition="$Think.cookie.stuName eq null">
						&emsp;您需要登录之后进行操作，<a href="{:U('Index/index')}"><font color="red">立即登录</font></a>
					</if>
				</span>
				<textarea name="content" style="width: 740px;height: 100px;margin: 0 0 0 5px;"></textarea>
				<input type="hidden" name="rootid" id="rootid" value="{$root['id']}" />
				<span>&emsp;请文明回复</span>
				<if condition="$noName eq '1'">
					<input type="checkbox" name="noName" id="noName" value="1" /><label for="noName"><font color="red">匿名发言</font><small>不记录发布者的任何信息&emsp;限制150字</small></label>
				</if>
				<input type="submit" id="answer" value="回复" style="padding: 5px 10px;float: right;" />
			</form>
		</div>
	</div>
</block>
