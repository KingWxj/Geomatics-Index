<extend name="Public/Admin/base_admin.php" />
<block name="css_js">
	<script src="__PUBLIC__/Admin/js/Admin_index.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		$().ready(function(){
			$("#admin_list").attr('class','on');
		})
	</script>
</block>
<block name="title">管理员列表</block>
<block name="location">管理员列表</block>
<block name="main">
	<p>您只能查看比您的账号等级低的账户</p>
	<table border="1px" cellspacing="0"> 
	<th>管理员id</th>
	<th>管理员姓名</th>
	<th>级别</th>
	<th>是否可用</th>
	<th>操作</th>
	<foreach name="adminList" item="list">
		<tr>
			<td>{$list['id']}</td>
			<td>{$list['name']}</td>
			<td><if condition="$list.level eq 0"> 
			        学校
			    <elseif condition="$list.level eq 1"/>
			        学院
			    <elseif condition="$list.level eq 2"/>
			        班主任    
			    <elseif condition="$list.level eq 3"/>
			        辅导员			        
			</if>
			</td>
			<td><if condition="$list['avaliable'] eq 0">
				    已禁用
				    <else />
				    已启用
				</if></td>
			<td><a href="javascript:void(0)" onclick="ajaxSwapAvaliable('{:U('Admin/swapAvaliable')}','{$list['id']}')">
				<!--判断账户的启用状态，输出不同的按钮-->
				<if condition="$list['avaliable'] eq 1">
				    [禁用]
				    <else />
				    [启用]
				</if>
			</a> 
				<a href="javascript:void(0)" onclick="ajaxDelAdmin('{:U('Admin/delAdmin')}','{$list['id']}')">
					[删除]
				</a></td>
		</tr>
	</foreach>
</table>
</block>