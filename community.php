<?php

$userAgent = strtolower($_SERVER["HTTP_USER_AGENT"]);
if( @ereg("msie 7",$userAgent) || @ereg("msie 6",$userAgent) ){
}

// 定义个常量，用来授权调用includes里面的文件
define('IN_TG',true);
define('WEB_KIND','community');

//引入公共文件
require dirname(__FILE__).'/includes/common.inc.php'; 	// 转换成硬路径，速度更快 

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
<link rel="stylesheet" type="text/css" href="style/community.css">


<!-- js -->
<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
<!-- ueditor 配置文件 -->
<script type="text/javascript" src="ueditor/ueditor.config.js"></script>
<!-- ueditor 编辑器源码文件 -->
<script type="text/javascript" src="ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="js/myjs.js"></script>
<script type="text/javascript" src="js/community.js"></script>


</head>
<body>

<!-- header -->
<?php
	require ROOT_PATH.'includes/header.inc.php';
?>

<!-- content -->
<div id="df_community_content">
	<div id="community_content">
		<div id="cont_top">
			<span><img src="images/face/face_Iam.png"></span>
			<span></span>
		</div>
		<div id="cont_left">
			<ul class="ul_cont_left_block">
				<li class="active"><a href="#">全部动态</a></li>
				<li><a href="#">与我相关</a></li>
			</ul>
			<ul class="ul_cont_left_block">
				<li><a href="http://wgy.njau.edu.cn" target="_blank">英语学习中心</a></li>
				<li><a href="http://www.zhihu.com/" target="_blank">知乎</a></li>
				<li><a href="http://segmentfault.com/" target="_blank">SegmentFault</a></li>
				<li><a href="http://stackoverflow.com/" target="_blank">StackOverFlow</a></li>
				<li><a href="https://github.com/" target="_blank">GitHub</a></li>
			</ul>
		</div>
		<div id="cont_middle">
			<div id="d_say" class="d_cont_block">
				<div class="d_cont_block_title">
					<span class="d_cont_block_num">01<em></em></span>
					<span class="d_cont_block_name">添加动态</span>
					<span class="d_cont_block_san"></span>
					<span class="d_cont_block_more"><a href="#"></a></span>
				</div>
				<div class="d_cont_block_body">
					<p id="say_p">说点什么吧..</p>
					<div id="d_say_container"></div>
				</div>
			</div>
			<div id="d_commu" class="d_cont_block">
				<div class="d_cont_block_title">
					<span class="d_cont_block_num">02<em></em></span>
					<span class="d_cont_block_name">全部动态</span>
					<span class="d_cont_block_san"></span>
					<span class="d_cont_block_more"><a href="#"></a></span>
				</div>
				<!-- 失遇 -->
				<div class="d_cont_block_body">
					<div class="cont_main">
						<div class="cont_main_face">
							<div class="d_cont_faceimg"><a href="#"><img src="images/face/face_shiyu.png"></a></div>
							<h5><a href="#">矢遇@</a></h5>
							<h6>14:22 浏览了(108)</h6>
						</div>
						<div class="cont_main_cont">
							<p>神器拍出来的效果就是不一样</p>
							<p><img src="images/topic/3.png"></p>
						</div>
					</div>
					<div class="cont_func">
						<ul class="ul_contfunc">
							<li><em class="em_contfunc_comments"></em>评论(4)</li><b></b>
							<li><em class="em_contfunc_forward"></em>转发</li><b></b>
							<li><em class="em_contfunc_zan"></em>赞(12)</li><b></b>
							<li><em class="em_contfunc_collection"></em>收藏</li>
						</ul>
						<ul class="ul_comments">
							<li class="li_commu_yuan">
								<span class="sleft"><a href="#"><img src="images/face/face_Iam.png"></a></span>
								<span class="sright">
									<h3><a href="#">I am</a> : 买买买</h3>
									<h4>7月23号 14:55<em class="em_comments"></em></h4>
								</span>
								<div class="d_clear"></div>
							</li>
							<li class="li_commu_hui">
								<span class="sleft"><a href="#"><img src="images/face/face_shiyu.png"></a></span>
								<span class="sright">
									<h3><a href="#">矢遇@</a> 回复 <a href="#">I am</a> : 其实不用神器也是一样哦~</h3>
									<h4>7月23号 14:55<em class="em_comments"></em></h4>
								</span>
								<div class="d_clear"></div>
							</li>
						</ul>
						<div class="cont_say">
							<form name="" method="post" action="">
								<input class="myinput cont_say_cont" type="text">
								<!-- <input class="mybutton cont_say_submit" type="submit" value="发表"> -->
								<div class="d_clear"></div>
							</form>
						</div>
					</div>
				</div>
				<?php $i=0;while($i++<3){ ?>
				<!-- 循环显示 动态 block -->
				<div class="d_cont_block_body">
					<div class="cont_main">
						<div class="cont_main_face">
							<div class="d_cont_faceimg"><a href="#"><img src="images/face/face_Iam.png"></a></div>
							<h5><a href="#">I am</a></h5>
							<h6>16:48 浏览了</h6>
						</div>
						<div class="cont_main_cont">
							<p>比如说</p>
							<p><img src="images/topic/2.png"></p>
						</div>
					</div>
					<div class="cont_func">
						<ul class="ul_contfunc">
							<li><em class="em_contfunc_comments"></em>评论</li><b></b>
							<li><em class="em_contfunc_forward"></em>转发</li><b></b>
							<li><em class="em_contfunc_zan"></em>赞</li><b></b>
							<li><em class="em_contfunc_collection"></em>收藏</li>
						</ul>
						<ul class="ul_comments">
							<?php $j=0;while($j++<1){ ?>
							<li class="li_commu_yuan">
								<span class="sleft"><a href="#"><img src="images/face/face_Iam.png"></a></span>
								<span class="sright">
									<h3><a href="#">I am</a> : 好好玩(´இ皿இ｀)好好好好好好好好好好好好好好好好好好好好好好好好好好好好好好好好好好好好好好好好好好</h3>
									<h4>7月23号 14:55<em class="em_comments"></em></h4>
								</span>
								<div class="d_clear"></div>
							</li>
							<li class="li_commu_yuan">
								<span class="sleft"><a href="#"><img src="images/face/face_Iam.png"></a></span>
								<span class="sright">
									<h3><a href="#">I am</a> : 或者这样呢？</h3>
									<h4>7月23号 14:55<em class="em_comments"></em></h4>
								</span>
								<div class="d_clear"></div>
							</li>
							<li class="li_commu_hui">
								<span class="sleft"><a href="#"><img src="images/face/face_Iam.png"></a></span>
								<span class="sright">
									<h3><a href="#">I am</a> : 或者这样呢？</h3>
									<h4>7月23号 14:55<em class="em_comments"></em></h4>
								</span>
								<div class="d_clear"></div>
							</li>
							<li class="li_commu_hui">
								<span class="sleft"><a href="#"><img src="images/face/face_Iam.png"></a></span>
								<span class="sright">
									<h3><a href="#">I am</a> : 或者这样呢？</h3>
									<h4>7月23号 14:55<em class="em_comments"></em></h4>
								</span>
								<div class="d_clear"></div>
							</li>
							<?php } ?>
						</ul>
						<div class="cont_say">
							<form name="" method="post" action="">
								<input class="myinput cont_say_cont" type="text">
								<!-- <input class="mybutton cont_say_submit" type="submit" value="发表"> -->
								<div class="d_clear"></div>
							</form>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
		<div id="cont_right">
			广告位招租
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