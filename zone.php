<?php

$userAgent = strtolower($_SERVER["HTTP_USER_AGENT"]);
if( @ereg("msie 7",$userAgent) || @ereg("msie 6",$userAgent) ){
}

// 定义个常量，用来授权调用includes里面的文件
define('IN_TG',true);
// define('WEB_KIND','community');

//引入公共文件
require dirname(__FILE__).'/includes/common.inc.php'; 	// 转换成硬路径，速度更快 

if( count(@$_GET)>0 && !!$_GET['id'] ){
}else{
	_alert_back("网址出错！");
}

?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta http-equiv="expires" content="0">
<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="cache-control" content="no-cache">

<meta name="viewport" content="width=device-width, initial-scale=1">
<title>卓越班——交流社区</title>


<!-- css -->
<link rel="stylesheet" type="text/css" href="style/headfoot.css">
<link rel="stylesheet" type="text/css" href="style/zone.css">


<!-- js -->
<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="js/myjs.js"></script>


</head>
<body>

<!-- header -->
<?php
	require ROOT_PATH.'includes/header.inc.php';
?>

<!-- content -->
<div id="dd_zone">
	<div id="d_zone">
		<div id="zone_top">
			<div id="zone_t_title">
				<h1>名字</h1>
				<h2>http://localhost/bclassv2/zone.php?id=stu_number</h2>
			</div>
			<div id="zone_t_nav">
				<img id="img_t" src="images/face/<?php echo $_COOKIE['user_face']; ?>">
				<h3><?php echo $_COOKIE['user_name']; ?></h3>
				<ul id="ul_zone_nav">
					<li><a href="#">主页</a></li>
					<li><a href="#">说说</a></li>
					<li><a href="#">相册</a></li>
					<li><a href="#">个人项目</a></li>
					<li><a href="#">个人资料</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>

<!-- footer -->
<?php
	require ROOT_PATH.'includes/footer.inc.php';
?>

<!-- ueditor 配置文件 -->
<script type="text/javascript" src="ueditor/ueditor.config.js"></script>
<!-- ueditor 编辑器源码文件 -->
<script type="text/javascript" src="ueditor/ueditor.all.min.js"></script>

</body>
</html>