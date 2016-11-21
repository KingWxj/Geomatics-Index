<extend name="Public/Geomatics/base_index_frame.php" />
<block name="title">德育分详情</block>
<block name="css_js">
	<style type="text/css">
		#show_certificate{
			width: 1000px;
			min-height: 500px;
			margin: 10px 0 0 10px;
			overflow: hidden;
		}
		.certificate_box{
			float:left;
			width: 200px;
			margin: 10px 50px 0 0;
		}
		.certificate_box p{
			text-align: center;
		}
	</style>
</block>
<block name="main">
	<div id="show_certificate">
		<p><button style="padding: 5px 10px; cursor: pointer;background: #326696; border: none;color: white;" onclick="history.back()">返回列表</button>
			<span style="font-size: small; margin: 0 0 0 20px;">未评分或未审核通过的将不会被计算和显示</span></p>
			<foreach name="info" item="vo">
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
</block>
