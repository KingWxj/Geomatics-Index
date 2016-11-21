<?php if (!defined('THINK_PATH')) exit(); if (C('LAYOUT_ON')) { echo ''; } ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>操作成功！</title>
<style type="text/css">
	div,p,b,a{ padding: 0; margin: 0; }
	body{font-family: '微软雅黑';}
	#tip_box{
		width: 300px;
		height: 200px;
		border: 2px solid #3E6DA5;
		margin: 50px auto;
		text-align: center;
	}
	#title{
		font-size: 20px;
		font-weight: 800;
		padding: 10px;
		background: #3E6DA5;
		color: white;
		text-align: center;
	}
	#info{
		margin-top: 50px;
		text-align: center;
	}

</style>
</head>
<body>
	
	
<div id="tip_box">
<!--提示信息-->
<p id="title">
	\(^o^)/
	<?php echo($message); ?>
</p>
<!--跳转等待时间-->
<p id="info">
	<b id="wait"><?php echo($waitSecond); ?></b>秒之后自动<a id="href" href="<?php echo($jumpUrl); ?>">跳转</a>
</p>
</div>


<script type="text/javascript">(function() {
	var wait = document.getElementById('wait'),
		href = document.getElementById('href').href;
	var interval = setInterval(function() {
		var time = --wait.innerHTML;
		if(time <= 0) {
			location.href = href;
			clearInterval(interval);
		};
	}, 1000);
})();
</script>
</body>
</html>