<?php
return array(
	//数据库配置
	'DB_TYPE'=>'mysql',
	'DB_HOST'=>'127.0.0.1',
	'DB_USER'=>'root',
	'DB_PWD'=>'root',
	'DB_NAME'=>'geomatics',
	'DB_PREFIX'=>'map_',
	//修改模版中的文件的后缀
	'TMPL_TEMPLATE_SUFFIX'=>'.php',
	//设置伪静态后缀，默认为html
	'URL_HTML_SUFFIX'=>'html',
	//设置模块以及默认模块
	'MODULE_ALLOW_LIST' => array('Home'),
	'DEFAULT_MODULE' => 'Home', // 默认模块，可以省去模块名输入
//	'URL_MODEL'=>1,
	//自定义成功和错误提示模版页面
	'TMPL_ACTION_SUCCESS'=>'Public/success',
	'TMPL_ACTION_ERROR'=>'Public/error',
);