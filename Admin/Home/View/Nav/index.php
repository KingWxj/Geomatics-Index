<extend name="Public/Admin/base_admin.php" />
<block name="title">导航栏内容管理</block>
<block name="location">导航栏内容管理</block>
<block name="css_js">
	<style>
		#second {margin:20px 50px;}
		td{
			padding: 5px;
		}
	</style>
	<script type="text/javascript">
		$().ready(function(){
			$("#mgr_nav").attr('class','on');
		})
	</script>
</block>
<block name="main">
		<foreach name ="info" item="arr">
	<table border="1px" cellspacing="0" width="95%" style="margin: 5px auto;">
		<tr>
			<th colspan="3" align="center" style="font-size: 18px;">{$arr[0]['root']}</th>
		</tr>
		<foreach name ="arr" item="vo">
					<tr>
						<td align="center" width="70%">{$vo['title']}</td>
						<td align="center" width="10%">类型：{$vo['type']}</td>
						<td align="center">
							<switch name="vo['type']">
								<case value="文章">
									<a href="{:U('Nav/mgrNavArt',array('id'=>$vo['id']))}">[修改文章]</a>
									</case>
								<case value="列表">
									<a href="{:U('Nav/mgrNavList',array('id'=>$vo['id']))}">[管理列表]</a>
									</case>
								<case value="链接">
									<a href="{:U('Nav/mgrNavLink',array('id'=>$vo['id']))}">[修改链接]</a>
									</case>
							</switch>	
						</td>
					</tr>
			</foreach>
	</table>
	<br />
		</foreach>
		
</block>