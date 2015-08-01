<?php

$userAgent = strtolower($_SERVER["HTTP_USER_AGENT"]);
if( @ereg("msie 7",$userAgent) || @ereg("msie 6",$userAgent) ){
}

// 定义个常量，用来授权调用includes里面的文件
define('IN_TG',true);
define('WEB_KIND','wall');

//引入公共文件
require dirname(__FILE__).'/includes/common.inc.php'; 	// 转换成硬路径，速度更快 
require ROOT_PATH.'/action/wallController.php'; 	// 转换成硬路径，速度更快 

// $wallCon->SelWall(4);

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
<link rel="stylesheet" type="text/css" href="style/wall.css">


<!-- js -->
<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
<!-- ueditor 配置文件 -->
<!-- <script type="text/javascript" src="ueditor/ueditor.config.js"></script> -->
<!-- ueditor 编辑器源码文件 -->
<!-- <script type="text/javascript" src="ueditor/ueditor.all.min.js"></script> -->
<script type="text/javascript" src="js/myjs.js"></script>
<script type="text/javascript" src="js/wall.js"></script>


</head>
<body>

<!-- header -->
<?php
	require ROOT_PATH.'includes/header.inc.php';
?>

<!-- content -->
<div id="wall_content">
	<div id="d_wallsay"></div>
	<ul class="wall_col" style="position:relative;top:210px;">
		<!-- <?php
		foreach ($wallCon->arrdate as $value) { ?>
		
		<li>
			<div class="d_wall_cont"><?php echo $value['cont']; ?></div>
			<div class="d_wallimg_block">
				<a href="#">
					<img class="face_img" src="images/face/<?php echo $value['face']; ?>">
				</a>
				<a class="dwallimg_name" href="#">
					<h6><?php echo $value['name']; ?></h6>
				</a>
				<h5><?php echo $value['date']; ?></h5>
			</div>
		</li>
		<?php } ?> -->

	</ul>
	<ul class="wall_col" style="position:relative;top:210px;"></ul>
	<ul class="wall_col"></ul>
	<ul class="wall_col"></ul>
	<div class="d_clear" style="height:220px;"></div>
</div>


<!-- footer -->
<?php
	require ROOT_PATH.'includes/footer.inc.php';
?>

</body>
</html>