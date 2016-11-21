<extend name="Public/Admin/base_admin.php" />
<block name="title">证书评分</block>
<block name="css_js">
	<script type="text/javascript" src="__PUBLIC__/Admin/js/Examine_certificate.js"></script>
	<script type="text/javascript">
		$().ready(function(){
			$("#evaluate_character").attr('class','on');
			$("#table").find('img').mousemove(function(e){
				$("#big").attr('src',$(this).attr('src')).show(300).css('left',e.pageX-200).css('top',e.pageY-100);
			});
			$("#table").find('img').mouseout(function(){
				$("#big").attr('src',$(this).attr('src')).hide(200);
			});
		});
		function ajaxFixScore($url,$id){\
			if($('#score'+$id).val()!=''){
				$.post($url,{'id':$id,'score':$('#score'+$id).val()},function(data){
					alert(data);
					location.reload(true);
				});
			}
		}
	</script>
</block>
<block name="location">证书评分&emsp;学号：<?php echo $_GET['stuId']; ?></block>
<block name="main">
	<table border="1px" cellspacing="0" width="100%" id="table" >
		<tr>
			<th>证书标题</th>
			<th>证书图片</th>
			<th>学年</th>
			<th>当前评分级别</th>
			<th>分数</th>
			<th>操作</th>
		</tr>
		<foreach name="allCertificate" item="vo">
			<tr>
				<td align="center">{$vo['name']}</td>
				<td align="center"><img src="__ROOT__{$vo['route']}" width="400px" height="200px"/></td>
				<td align="center">{$vo['grade']}</td>
				<td align="center">
					<if condition="$vo['scorelevel'] eq '0'">
						分数已通过<font color="red">学校</font>最终审核
					<elseif condition="$vo['scorelevel'] eq '1'"/>
						分数已通过<font color="red">学院</font>审核
					<elseif condition="$vo['scorelevel'] eq '2'"/>
						分数已通过<font color="red">班主任</font>审核
					<elseif condition="$vo['scorelevel'] eq '3'"/>
						已通过<font color="red">辅导员</font>评分
					<elseif condition="$vo['scorelevel'] eq '4'"/>
						未评分
					</if>
				</td>
				<td align="center"><input type="text" name="score" id="score{$vo['id']}" value="{$vo['score']}" style="width:50px;" /></td>
				<td align="center">
					<a href="javascript:void(0)" onclick="ajaxFixScore('{:U('Evaluate/runEvaluateCha')}',{$vo['id' ]})">[确认此评分]</a>
					<a href="javascript:void(0)" onclick="ajaxDisAgree('{:U('Examine/verifyCharacter')}',{$vo['id']})"><font color="red">[不通过]</font></a>	
				</td>
			</tr>
		</foreach>
	</table>
	<img src="" id="big" width="600px" style="display: none;position: absolute;top: 0;left: 0;"/>
</block>
