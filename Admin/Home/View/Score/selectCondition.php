<extend name="Public/Admin/base_admin.php" />
<block name="title">
	查询结果
</block>
<block name="css_js">
	<script type="text/javascript">
		function ajaxFixScore($url,$id){
			$newScore=$('#'+'s'+$id).val();
			$.post($url,{'id':$id,'score':$newScore},function(data){
				if(data!=''){
					alert(data);
				}
				location.reload(true);
			});
		}
		function ajaxDelScore($url,$id){
			$.post($url,{'id':$id},function(data){
				if(data!=''){
					alert(data);
				}
				location.reload(true);
			});
		}
	</script>
	<script type="text/javascript">
		$().ready(function(){
			$("#score_manager").attr('class','on');
		})
	</script>
</block>
<block name="location">
	查询结果
	<span>
		<a href="{:U('Score/export')}"><button>导出当前检索结果</button></a>
	</span>
</block>
<block name="main">
	<?php
		if(!$_GET['page']){
			$page=1;
		}
	?>
	<table border="1px" cellspacing="0" width="100%">
			<tr>
				<th>学号</th>
				<th>姓名</th>
				<th>科目</th>
				<th>成绩</th>
				<th>备注</th>
				<th>操作</th>
			</tr>
			<if condition="$count eq 0">
			       <td align="center" colspan="7"><font color="red">没有查询到数据，请更改搜索条件</font></td>
			</if>
			<foreach name="list" item="vo">
				<tr>
					<td align="center">{$vo['stuid']}</td>
					<td align="center">{$vo['name']}</td>
					<td align="center">{$vo['subject']}</td>
					<td align="center">
						<if condition="$vo['score'] eq ''">
							0
						</if>
						    {$vo['score']}    
					→<input type="text" style="width: 50px;" id="s{$vo['id']}" /></td>
					<td align="center">{$vo['mark']}</td>
					<td align="center">
						<a href="javascript:void(0)" onclick="ajaxFixScore('{:U('Score/ajaxFixScore')}',{$vo['id']})">
							[修改]
						</a>
						<a href="javascript:void(0)" onclick="ajaxDelScore('{:U('Score/ajaxDelScore')}',{$vo['id']})">
							[删除]
						</a>
					</td>
				</tr>
			</foreach>
			<tr>
				<td align="center">
					<if condition="$page gt 1">
					<a href="{:U('Score/selectList',array('page'=>1))}">
						首页
					</a>
					</if></td>
				<td align="center">
					<if condition="$page gt 1">
						<a href="{:U('Score/selectList',array('page'=>$page-1))}">
							上一页
						</a>
					</if></td>
				<td align="center" colspan="2">本次查询共检索到<font color="red">{$count}</font>条记录，每页显示{$pageLimit}条，当前是第<font color="red">{$page}</font>页</td>
				<td align="center">
					<if condition="$page lt $pageCount">
						<a href="{:U('Score/selectList',array('page'=>$page+1))}">
							下一页
						</a>
					</if></td>
				<td align="center">
					<if condition="$page lt $pageCount">
					<a href="{:U('Score/selectList',array('page'=>$pageCount))}">
						尾页
					</a>
					</if></td>
			</tr>
		</table>
</block>
