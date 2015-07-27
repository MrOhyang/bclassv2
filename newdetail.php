<?php

$userAgent = strtolower($_SERVER["HTTP_USER_AGENT"]);
if( @ereg("msie 7",$userAgent) || @ereg("msie 6",$userAgent) ){
}

// 定义个常量，用来授权调用includes里面的文件
define('IN_TG',true);
define('WEB_KIND','news');

//引入公共文件
require dirname(__FILE__).'/includes/common.inc.php'; 	// 转换成硬路径，速度更快 
require ROOT_PATH.'action/newsController.php';			// 引用news控制器

$newsCon->SelOnenew(@$_GET['id']);

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
<title>卓越班——新闻公告</title>


<!-- css -->
<link rel="stylesheet" type="text/css" href="style/headfoot.css">
<link rel="stylesheet" type="text/css" href="style/news.css">


<!-- js -->
<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="js/myjs.js"></script>
<script type="text/javascript" src="js/news.js"></script>


</head>
<body>

<!-- header -->
<?php
	require ROOT_PATH.'includes/header.inc.php';
?>

<!-- content -->
<div id="news_content">
	<div id="cont_left">
		<div class="d_cont_block news_func">
			<div class="d_cont_block_title">
				<span class="d_cont_block_num">03<em></em></span>
				<span class="d_cont_block_name">新闻/公告</span>
				<span class="d_cont_block_san"></span>
				<span class="d_cont_block_more"><a href="#">+</a></span>
			</div>
			<div class="d_cont_block_body">
				<ul id="ul_newsfunc" style="display:block;padding-bottom:1px;">
					<li><a href="#">新闻</a></li>
					<li><a href="#">公告</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div id="cont_right">
		<div id="news_maincont" class="d_cont_block">
			<div class="d_cont_block_title">
				<span class="d_cont_block_num">02<em></em></span>
				<span class="d_cont_block_name">新闻</span>
				<span class="d_cont_block_san"></span>
				<span class="d_cont_block_more"><a href="#">+</a></span>
			</div>
			<div class="d_cont_block_body">
				<h1 class="h1_newsd_title"><?php echo $newsCon->arrdate[0]['title']; ?></h1>
				<h2 class="h2_newsd_author">作者：<?php echo $newsCon->arrdate[0]['author']; ?><em><?php echo $newsCon->arrdate[0]['date']; ?></em></h2>
				<?php echo $newsCon->arrdate[0]['cont']; ?>
			</div>
		</div>
	</div>
	<div class="d_clear"></div>
</div>

<!-- footer -->
<?php
	require ROOT_PATH.'includes/footer.inc.php';
?>

</body>
</html>