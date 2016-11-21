<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh-CN">
  <head>
    <meta charset="UTF-8">
    	<title>
		    
    		
    	</title>
    <link rel="stylesheet" href="/Public/Admin/css/common.css">
    <link rel="stylesheet" href="/Public/Admin/css/style.css">
    <script type="text/javascript" src="/Public/Admin/js/jquery.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.SuperSlide.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/base_admin.js"></script>
    
    <title>后台首页</title></head>
  
  <body>
    <div class="top">
      <div id="top_t">
        <div id="logo" class="fl">&emsp;&emsp;测绘学院后台管理</div>
        <div id="photo_info" class="fr">
          <div id="photo" class="fl">
            <a href="#">
              <img src="/Public/Admin/images/a.png" alt="" width="60" height="60"></a>
          </div>
          <div id="base_info" class="fr">
            <div class="help_info">
              <a href="1" id="hp">&nbsp;</a>
              <a href="2" id="gy">&nbsp;</a>
              <a href="3" id="out">&nbsp;</a></div>
            <div class="info_center">admin
              <!--<span id="nt">通知</span>
              <span>
                <a href="#" id="notice">3</a></span>-->
            </div>
          </div>
        </div>
      </div>
      <div id="side_here">
        <div id="side_here_l" class="fl"></div>
        <div id="here_area" class="fl">当前位置：</div></div>
    </div>
    <div class="side">
      <div class="sideMenu" style="margin:0 auto">
        <h3>公告管理</h3>
        <ul>
          <li class="on"><a href="<?php echo U('News/index');?>">公告列表</a></li>
          <li><a href="<?php echo U('News/addNews');?>">添加公告</a></li>
          <li>导航菜单</li>
          <li>导航菜单</li>
          <li>导航菜单</li></ul>
        <h3>管理员账户</h3>
        <ul>
          <li>管理员列表</li>
          <li>添加管理员</li>
          <li>导航菜单</li>
          <li>导航菜单</li>
          <li>导航菜单</li></ul>
        <h3>导航菜单</h3>
        <ul>
          <li>导航菜单</li>
          <li>导航菜单</li>
          <li>导航菜单</li>
          <li>导航菜单</li></ul>
        <h3>导航菜单</h3>
        <ul>
          <li>导航菜单</li>
          <li>导航菜单</li>
          <li>导航菜单</li>
          <li class="on">导航菜单</li>
          <li>导航菜单</li></ul>
        <h3>导航菜单</h3>
        <ul>
          <li>导航菜单</li>
          <li>导航菜单</li>
          <li>导航菜单</li>
          <li>导航菜单</li>
          <li>导航菜单</li></ul>
        <h3>导航菜单</h3>
        <ul>
          <li>导航菜单</li>
          <li>导航菜单</li>
          <li>导航菜单</li>
          <li>导航菜单</li>
          <li>导航菜单</li></ul>
      </div>
    </div>
    <div class="main">
    	
    </div>
    <div class="bottom">
      <div id="bottom_bg">版权</div></div>
    <div class="scroll">
      <a href="javascript:;" class="per" title="使用鼠标滚轴滚动侧栏" onclick="menuScroll(1);"></a>
      <a href="javascript:;" class="next" title="使用鼠标滚轴滚动侧栏" onclick="menuScroll(2);"></a>
    </div>
  </body>

</html>