<extend name="Public/Admin/base_admin.php" />
<block name="title">新增成绩</block>
<block name="location">新增成绩</block>
<block name="css_js">
	<script type="text/javascript">
//	去除空格的函数
		function Trim(str){ 
            return str.replace(/(^\s*)|(\s*$)/g, ""); 
     		}
//   		执行往html中追加新标签项目的函数，点击按钮之后再select的开头追加
		$().ready(function(){
			$("#addSubject").click(function(){
				$newSubject=Trim($("#newSubject").val());
				if($newSubject!=''){
					$("#subject").prepend("<option selected='selected' value='"+$newSubject+"'>"+$newSubject+"</option>");
				}
				$("#newSubject").val("");
			});
		});
	</script>
	<script type="text/javascript">
		$().ready(function(){
			$("#add_score").attr('class','on');
		})
	</script>
</block>
<block name="main">
	<div style="margin: 10px 0 0 20px;">
		<h3>学生成绩添加</h3>
		<form action="{:U('Import/addScore')}" method="post">
			<label for="stuId">学号：</label>
			<input type="text" name="stuId" id="stuId"/>*<br />
			<label for="name">姓名：</label>
			<input type="text" name="name" id="name"/>*<br />
			<label for="subject">学科：</label>
			<select name="subject" id="subject">
				<foreach name="subjectList" item="vo">
					<option value="{$vo['subject']}">{$vo['subject']}</option>
				</foreach>
			</select>
			<input type="text" name="newSubject" id="newSubject" style="width: 80px;" />
			<input type="button" id="addSubject" value="新增" />
			<br />
			<label for="score">成绩：</label>
			<input type="text" name="score" id="score"/>*<br />
			<label for="mark">备注：</label>
			<input type="text" name="mark" id="mark"/><br />
			<input type="submit" value="添加学生成绩"/>
		</form>
		<br />
		<hr />
		<h3>导入Excel成绩表</h3>
		<form action="{:U('Import/upload')}" method="post" enctype="multipart/form-data">
			<input type="file" name="file" id="file" />
			<input type="submit" value="导入"/>
		</form>
		<div id="tips" style="color: red;">
			<p>导入的Excel格式如下图所示（从头到尾不要有任何合并单元格！）</p>
			<p>每一列必须按照如图所示的数据相互对应，比如，第一列必须是学号</p>
			<p>Excel的第一行是表头，默认跳过第一行</p>
			<p>请务必按照如下的格式整理好之后再上传导入，否则就会给数据库添加错误的信息条目，需要手动删除！</p>
		</div>
		<img src="__PUBLIC__/Admin/images/demoExcel1.png" width="700px" height="200px"/>
	</div>
</block>
