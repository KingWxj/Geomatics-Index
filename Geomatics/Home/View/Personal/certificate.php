<!--素质拓展分评定-->
<extend name="Public/Geomatics/base_index_frame.php" />
<block name="title">
	素质拓展分证书
</block>
<block name="css_js">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Geomatics/css/Personal_common.css"/>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Geomatics/css/Personal_certificate.css"/>
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
				<li class="aside_li menu_on">
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
	<div id="content">
		<div id="tips">
			<span>证书名一栏写证书名，少于30字，然后选择自己的证书照片，点击上传，会显示审核状态，当管理员审核完毕即可生效</span>
		</div>
		<div id="upload_bar">
			<form action="{:U('Personal/uploadCertificate')}" method="post" enctype="multipart/form-data">
				证书名：<input type="text" name="name" id="name" />
				<input type="file" name="file" id="file"/>
				<input type="submit" id="submit" value="上传证书" />
			</form>
		</div>
		<div id="show_certificate">
			<foreach name="certificate_list" item="vo">
			    <div class="certificate_box">
			    	<img src="__ROOT__{$vo['route']}" width="200px" height="110px"/>
			    	<p>{$vo['name']}</p>
			    	<p class="verify_info"><if condition="$vo['verify'] eq 0"> 
			    		<font color="blue">待审核</font>
			    	    <elseif condition="$vo['verify'] eq 1"/>
			    	    <font color="green">审核通过</font>
			    	    <else /> 
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
</block>
