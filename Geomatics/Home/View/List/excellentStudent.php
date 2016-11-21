<extend name="Public/Geomatics/base_index_frame.php" />
<block name="title">优秀学生</block>
<block name="css_js">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Geomatics/css/page.css"/>
	<style type="text/css">
			#mainbody{
			width: 1000px;
			margin:0 auto;
			}	
			#context{
				margin: 10px 0 0 0;
				width: 710px;
				border: 2px solid rgb(62,108,165);
		    	float: left;
			}
			.listbody a {
				color: #333;
			}
		    .listbody{
			    width: 680px;
			   	height: 168px;
			    border-bottom: dashed 2px rgb(62,108,165);
			    padding: 15px;	
			    display: block;
			    /*padding: 10px 0 20px;*/
		    }
		    .listbody:after {
		    	display: block;
		    	height: 0;
		    	clear: both;
		    }
		    .listbody h3{
		    	font-size: 20px;
		    	font-weight: bold;
		    	line-height: 40px;
		    	padding-bottom: 10px;
		    }
		    .listbody h3 a:hover {
		    	color: #c00;
		    	text-decoration: underline;
		    }
		    .listbody .twpic {
		    	float: left;
		    	text-align: center;
		    	width: 150px;
		    	margin: 0 15px 0 0;
		    }
			.listmessage {
				overflow: hidden;
			}
			.listmessage p {
				color: #252525;
		    	font-size: 14px;
		    	line-height: 24px;	
		    	text-align: justify;  
		    	padding: 0 20px 15px 0;  	
			}
			.listmessage .date {
				font-size: 13px;
				color: #666;
			}
			.float{
				float: left;
			}
			.listcontent{
				width: 670px;
				font-size: 15px;
			}
			.listcontent a{
				color: gray;
			}
			.listcontent a:hover{
				color: gray;
				text-decoration: underline;
			}
			
			/*右导航栏设计*/
			#rightlist{
				width: 270px;
				margin: 10px 0 0 5px;
				padding: 10px 0;
				float: left;
				border: 1px solid #326696;
			}
			#rightlist h3{
				margin-left: 5px;
				color: #326696;
			}
			#rightlist li{
				margin: 5px 0 0 20px;
				list-style: none;
			}
			#rightlist a{
				border-radius: 2px;
				color: #333;
				font-size: 13px;
				padding: 3px 2px;
				text-decoration: none;
			}
			#rightlist a:hover {
				background: #cccccc;
			}
			#more a{
				background: #326696;
				color: white;
			}
			#more a:hover{
				background: #326696;
				color: white;
			}			
	</style>
</block>
<block name="main">
	<div id="mainbody">
		<p style="margin-top: 5px; font-size: 14px;color: #666;">当前位置：优秀学生列表</p>
		<div id="context">
		<foreach name="list" item="vo">
			<div class="listbody">
				<!--title-->
        		<h3><a href="{:U('Show/excellent',array('id'=>$vo['id']))}" target="_blank">{$vo['title'] | mb_substr=0,25,utf8}</a></h3>
        		<!--主要内容-->
        		<a href="{:U('Show/excellent',array('id'=>$vo['id']))}" target="_blank" class="twpic">
        		<img src="__ROOT__{$vo['picroute']}" width="150" height="100" alt="{$vo['title']}" /></a>		
        		<div class="listmessage">
					<p><a href="{:U('Show/excellent',array('id'=>$vo['id']))}" target="_blank" style="text-decoration:none; color:#333333;">{$vo['content'] |  mb_substr=0,85,utf8}...</a> 
						<a href="{:U('Show/excellent',array('id'=>$vo['id']))}" target="_blank" style="color: blue;">[详细]</a></p>
	           	<!--info-->
	           		<div class="date">
	           			<span class="w-date">{$vo['date'] | mb_substr=0,10,utf8}</span>
	           		</div>
				</div>
			</div>
		</foreach>
			<div id="page_tab" style="margin-top: 10px;">{$page}</div>
		</div>
		<div id="rightlist"><!--右边连接栏-->
			<h3>优秀事迹列表</h3>
			<ul >
				<foreach name="list2" item="vo">
					<li><a href="{:U('Show/excellent',array('id'=>$vo['id']))}">{$vo['title'] | mb_substr=0,18,utf8}</a></li>
				</foreach>
			<li id="more"><a href="{:U('List/excellentEvent')}">更多»</a></li>
			</ul>
		</div>
	</div>
</block>
