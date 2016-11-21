<extend name="Public/Geomatics/base_index_frame.php" />
<block name="title">测绘学院学生工作网站</block>
<block name="css_js">
	<script src="__PUBLIC__/Geomatics/js/Index_index.js" type="text/javascript" charset="utf-8"></script>
</block>
<block name="main">
	<div class="photo_show">
		<!--图片轮播-->
		<div class="photo_show_left">
			<ul class='photo_list'>
				<foreach name="image" item="arr">
					<li><img src="__ROOT__{$arr['route']}" alt="{$arr['title']}" width="500px" height="250px" /></li>
				</foreach>
			</ul>
			<ul class='num_list'>
				<li class="indexon">1</li>
				<li>2</li>
				<li>3</li>
				<li>4</li>
			</ul>
		</div>
		<!--图片轮播结束-->
		<!--图片轮播右边第一块-->
		<div class="photo_show_right_one">
			<span class="photo_show_right_style">最新公告</span>
						<span class="more"><a href="{:U('List/xydt')}">更多>></a></span>
			<ul>
				<foreach name="zxgg" item="zxgg">
				    <li><a href="{:U('Show/index',array('id'=>$zxgg['id']))}" title="{$zxgg['title']}">{$zxgg['title'] }</a><span style="float: right;margin: 0 20px 0 0;">{$zxgg['date'] | mb_substr=0,10,utf8 | str_replace='-','.',###}</span></li>
				</foreach>
				
			</ul>
		</div>
		<!--图片轮播右边第一块结束-->
		<!--图片轮播右边第二块-->
		<div class="photo_show_right_two">			
			<if condition="$Think.cookie.stuId neq null and $Think.cookie.stuName neq null">
				<p>欢迎你,{$Think.cookie.stuName}</p>
				<p>学号：{$Think.cookie.stuId}</p>
				<a href="{:U('Personal/index')}">进入个人空间</a>
				<a href="{:U('Login/logout')}">注销</a>
			<else />
				<form action="{:U('Login/check')}" id="form_login" method="post">
					<span class="new_notice">个人空间</span>
					<p>账号</p><input type="text" id="stuId" name="stuId" placeholder="输入学号" />
					<p>密码</p><input type="password" id="password" name="password" placeholder="输入密码" />
					<p>请输入验证码</p>
					<input type="text" name="verify" id="verify" class="validate" required="required" style="width: 50px ; height: 20px;">
					<img src="{:U('Login/verifyImg')}"  id="verifyImg" style="vertical-align: middle; width: 80px;"/>
					<input type="button" class="register" onclick="ajaxLogin('{:U('Login/login')}')" value="登录" />
				</form>	
			</if>
		</div>
		<!--图片轮播右边第二块结束-->
		<div style="clear:both"></div>
	</div> 
	<!--中间信息区-->
	<div class="college_main_new">
		<div class="college_photo" style="clear:both">
			<a href="{:U('List/excellentEvent')}" class="college_href_left">
				<h3><img src="__PUBLIC__/Geomatics/images/1.png" alt="">优秀展示</h3>
			</a>
			<a href="{:U('Certificate/index')}" class="college_href">
				<h3><img src="__PUBLIC__/Geomatics/images/4.png" alt="">证书评分专栏</h3>
			</a>
			<a href="{:U('Evaluate/index')}" class="college_href">
				<h3><img src="__PUBLIC__/Geomatics/images/0.png" alt="">评优评先专栏</h3>
			</a>
			<a href="{:U('Consult/index')}" class="college_href_right">
				<h3><img src="__PUBLIC__/Geomatics/images/2.png" alt="">咨询小屋</h3>
			</a>
		</div>
		<div class="college_notice">
			<span class="new_notice">学院动态</span>
			<ul>
				<foreach name="xydt" item="xydt">
				    <li><a href="{:U('Show/index',array('id'=>$xydt['id']))}" title="{$xydt['title']}">{$xydt['title'] }</a><span class="timer">{$xydt['date'] | mb_substr=0,10,utf8 | str_replace='-','.',###}</span></li>
				</foreach>
			</ul>
			<span class="more"><a href="{:U('List/zxgg')}">更多>></a></span>
		</div>
		<div class="college_new">
			<span class="new_notice">国内外新闻</span>
				<ul>
					<foreach name="xnxw" item="xnxw">
				    	<li><a href="{:U('Show/index',array('id'=>$xnxw['id']))}" title="{$xnxw['title']}">{$xnxw['title'] }</a><span class="timer">{$xnxw['date'] | mb_substr=0,10,utf8 | str_replace='-','.',###}</span></li>
					</foreach>
				</ul>
			<span class="more"><a href="{:U('List/xnxw')}">更多>></a></span>
		</div>
		<div class="college_media">
			<span class="new_notice">下载园地</span>
				<ul>
					<foreach name="down" item="down">
					    <li><span>{$down['title']}</span><a href="__ROOT__{$down['route']}" download><span class="timer">[下载]</span></a></li>
					</foreach>
				</ul>
			<span class="more"><a href="{:U('List/download')}">更多>></a></span>
		</div>
	</div>
	<div style="clear:both"></div>
</block>
