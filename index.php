<?php

$userAgent = strtolower($_SERVER["HTTP_USER_AGENT"]);
if( @ereg("msie 7",$userAgent) || @ereg("msie 6",$userAgent) ){
}

// 定义个常量，用来授权调用includes里面的文件
define('IN_TG',true);
define('WEB_KIND','index');

//引入公共文件
require dirname(__FILE__).'/includes/common.inc.php'; 	// 转换成硬路径，速度更快
require ROOT_PATH.'action/newsController.php';			// 引用 news 控制器


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
<title>卓越班</title>
<!-- <?php 
// $userAgent = strtolower($_SERVER["HTTP_USER_AGENT"]);
// if( @ereg("msie 7",$userAgent) || @ereg("msie 6",$userAgent) ){
	
// }
?> -->

<!-- css -->
<link rel="stylesheet" type="text/css" href="style/headfoot.css">
<link rel="stylesheet" type="text/css" href="style/basic.css">


<!-- js -->
<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="js/myjs.js"></script>
<script type="text/javascript" src="js/index.js"></script>


</head>
<body>

<!-- header -->
<?php
	require ROOT_PATH.'includes/header.inc.php';
?>

<!-- focus -->
<div id="d_focus">
	<div id="focus">
		<ul id="ul_focus">
			<li><img src="images/focus1.png"></li>
			<li><img src="images/focus2.png"></li>
		</ul>
		<div id="focus_left_b"></div>
		<div id="focus_right_b"></div>
	</div>
</div>

<!-- content -->
<div id="d_content">
	<div id="content">
		<div id="cont_left">
			<div id="dc_info">
				<img src="images/logo.png">
				<h4>简介</h4>
				<h3>商标的内容为白色，图片的左上角背景是白色，所以商标移动图片就看不见内容了，只能移动到左下角位置。具体方法是：打开图片 文件--置入--置入商标，并把商标。欢迎您的加入！</h3>
			</div>
			<div id="d_news" class="d_cont_block">
				<div class="d_cont_block_title">
					<span class="d_cont_block_num">01<em></em></span>
					<span class="d_cont_block_name">新闻公告</span>
					<span class="d_cont_block_san"></span>
					<span class="d_cont_block_more"><a href="#">+</a></span>
				</div>
				<div class="d_cont_block_body">
					<div id="d_news_focus">
						<img src="images/news/1.png">
					</div>
					<div id="d_news_list">
						<ul id="ul_news_list">
							<?php
							// 新闻列表
							$newsCon->SelTitle(13);
							foreach ($newsCon->arrdate as $value) { ?>

							<li><a href="newdetail.php?id=<?php echo $value['id'] ?>"><b>[<?php echo $value['date'] ?>]</b><?php echo $value['title'] ?></a></li>
							<?php } ?>

						</ul>
					</div>
					<div class="d_clear"></div>
				</div>
			</div>
			<div id="d_project" class="d_cont_block">
				<div class="d_cont_block_title">
					<span class="d_cont_block_num">03<em></em></span>
					<span class="d_cont_block_name">班级作品展示</span>
					<span class="d_cont_block_san"></span>
					<span class="d_cont_block_more"><a href="#">+</a></span>
				</div>
				<div class="d_cont_block_body">
					<ul id="ul_project">
						<li>
							<a href="#"><img src="images/works/1.png"></a>
							<h4><a href="#">最酷的我</a></h4>
							<h5>类别：<a href="#">网页设计</a></h5>
							<h6>1小时前上传</h6>
							<h6><b>53</b> 评论 / <b>13</b> 人气</h6>
							<h1>
								<a href="#">Iam<img src="images/face/iam.png"></a>
							</h1>
						</li>
						<li>
							<a href="#"><img src="images/works/2.png"></a>
							<h4><a href="#">最酷的我</a></h4>
							<h5>类别：<a href="#">网页设计</a></h5>
							<h6>1小时前上传</h6>
							<h6><b>53</b> 评论 / <b>13</b> 人气</h6>
							<h1>
								<a href="#">Iam<img src="images/face/iam.png"></a>
							</h1>
						</li>
						<li style="margin-right:0">
							<a href="#"><img src="images/works/3.png"></a>
							<h4><a href="#">最酷的我</a></h4>
							<h5>类别：<a href="#">网页设计</a></h5>
							<h6>1小时前上传</h6>
							<h6><b>53</b> 评论 / <b>13</b> 人气</h6>
							<h1>
								<a href="#">Iam<img src="images/face/iam.png"></a>
							</h1>
						</li>
						<div class="d_clear"></div>
					</ul>
				</div>
			</div>
		</div>
		<div id="cont_right">
			<div id="d_today" class="d_cont_block">
				<div class="d_cont_block_title">
					<span class="d_cont_block_num">02<em></em></span>
					<span class="d_cont_block_name">今日提醒</span>
					<span class="d_cont_block_san"></span>
					<span class="d_cont_block_more"><a href="#">+</a></span>
				</div>
				<div class="d_cont_block_body">
					<h1>[07-11]</h1>
					<h2>在16号之前，所有人的100字感想统一发到班长的邮箱。</h2>
				</div>
			</div>
			<div id="d_wallspeak" class="d_cont_block">
				<div class="d_cont_block_title">
					<span class="d_cont_block_num">04<em></em></span>
					<span class="d_cont_block_name">留言墙</span>
					<span class="d_cont_block_san"></span>
					<span class="d_cont_block_more"><a href="#">+</a></span>
				</div>
				<div class="d_cont_block_body">
					<ul id="ul_wall">
					</ul>
				</div>
			</div>
		</div>
		<div class="d_clear"></div>
	</div>
</div>

<!-- footer -->
<?php
	require ROOT_PATH.'includes/footer.inc.php';
?>

</body>
</html>