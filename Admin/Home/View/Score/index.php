<extend name="Public/Admin/base_admin.php" />
<block name="css_js">
	<!--<script src="__PUBLIC__/Admin/js/Score_index.js" type="text/javascript" charset="utf-8"></script>-->
</block>
<block name="title">
	成绩列表
</block>
<block name="css_js">
	<script type="text/javascript">
		$().ready(function(){
			$("#score_manager").attr('class','on');
		})
	</script>
</block>
<block name="location">
	成绩列表
</block>
<block name="main">
	<!--选择筛选条件-->
	<div id="select">
		<form action="{:U('Score/selectCondition')}" method="post">
			姓名：
			<input type="text" name="name" id="name" />
			学号：
			<input type="text" name="stuId" id="stuId" />
			科目：
			<select name="subject" id="subject">
				<option value="">所有科目</option>
				<foreach name="subjectList" item="vo">
					<option value="{$vo['subject']}">{$vo['subject']}</option>
				</foreach>
			</select>
			<br />
			分数段：
			<input type="text" name="score_min" id="score_min" />
			—
			<input type="text" name="score_max" id="score_max" />
			<br />
			<input type="submit" value="检索"/>
		</form>
	</div>
	<!--循环输出列表-->
	<!--<div id="list">
		<table border="1px" cellspacing="0" width="100%">
			<tr>
				<th>学号</th>
				<th>姓名</th>
				<th>性别</th>
				<th>科目</th>
				<th>成绩</th>
				<th>备注</th>
				<th>操作</th>
			</tr>
			<foreach name="scoreList" item="vo">
				<tr>
					<td align="center">{$vo['stuid']}</td>
					<td align="center">{$vo['name']}</td>
					<td align="center">{$vo['sex']}</td>
					<td align="center">{$vo['subject']}</td>
					<td align="center">{$vo['score']}</td>
					<td align="center">{$vo['mark']}</td>
					<td align="center">
						<a href="">
							[修改]
						</a></td>
				</tr>
			</foreach>
			<tr>
				<td align="center">
					<a href="{:U('Score/index',array('page'=>1))}">
						首页
					</a></td>
				<td align="center">
					<if condition="$page neq 1">
						<a href="{:U('Score/index',array('page'=>$page-1))}">
							上一页
						</a>
					</if></td>
				<td align="center" colspan="3"> 共{$countList}条数据&emsp;每页50条，共{$pageCount}页&emsp;当前是<font color="red">第{$page}页</font></td>
				<td align="center">
					<if condition="$page neq $pageCount">
						<a href="{:U('Score/index',array('page'=>$page+1))}">
							下一页
						</a>
					</if></td>
				<td align="center">
					<a href="{:U('Score/index',array('page'=>$pageCount))}">
						尾页
					</a></td>
			</tr>
		</table>
	</div>-->
</block>
