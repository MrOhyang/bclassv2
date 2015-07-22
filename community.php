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
<?php 
// $userAgent = strtolower($_SERVER["HTTP_USER_AGENT"]);
// if( @ereg("msie 7",$userAgent) || @ereg("msie 6",$userAgent) ){
	
// }
?>

<!-- css -->
<link rel="stylesheet" type="text/css" href="style/headfoot.css">
<link rel="stylesheet" type="text/css" href="style/community.css">


<!-- js -->
<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="js/myjs.js"></script>
<script type="text/javascript" src="js/community.js"></script>


</head>
<body>

<!-- top -->
<div id="d_top">
	<div id="top">
		<span><a href="#">注册</a></span>
		<span><a href="#">登陆</a></span>
	</div>
</div>

<!-- nav -->
<div id="d_nav">
	<div id="nav">
		<span id="s_logo">
			<a href="#"><img id="img_logo" src="images/logo.png"></a>
			<h1>卓越班</h1>
			<h2>因你而卓越</h2>
		</span>
		<span id="s_nav">
			<ul id="ul_nav">
				<li><a href="index.php">首页</a></li>
				<li><a href="news.php">新闻公告</a></li>
				<li class="nav_li_active"><a href="community.php">交流社区</a></li>
				<li><a href="#">问卷调查</a></li>
				<li><a href="#">事件历史</a></li>
				<li><a href="#">留言墙</a></li>
			</ul>
		</span>
	</div>
</div>

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
				<li><a href="http://wgy.njau.edu.cn">英语学习中心</a></li>
				<li><a href="http://www.zhihu.com/">知乎</a></li>
				<li><a href="http://stackoverflow.com/">StackOverFlow</a></li>
				<li><a href="https://github.com/">GitHub</a></li>
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
					<p>说点什么吧..</p>
				</div>
			</div>
			<div id="d_commu" class="d_cont_block">
				<div class="d_cont_block_title">
					<span class="d_cont_block_num">02<em></em></span>
					<span class="d_cont_block_name">全部动态</span>
					<span class="d_cont_block_san"></span>
					<span class="d_cont_block_more"><a href="#"></a></span>
				</div>
				<?php $i=0;while($i++<3){ ?>
				<div class="d_cont_block_body">
					<div class="cont_main">
						<div class="cont_main_face">
							<div class="d_cont_faceimg"><a href="#"><img src="images/face/face_Iam.png"></a></div>
							<h5><a href="#">I am</a></h5>
							<h6>16:48 浏览了</h6>
						</div>
						<div class="cont_main_cont">
							比如说
						</div>
					</div>
					<div class="cont_func">
						<ul class="ul_contfunc">
							<li><em class="em_contfunc_comments"></em>评论</li><b></b>
							<li><em class="em_contfunc_forward"></em>转发</li><b></b>
							<li><em class="em_contfunc_zan"></em>赞</li><b></b>
							<li><em class="em_contfunc_collection"></em>收藏</li>
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
		<div id="cont_right"></div>
		<div class="d_clear"></div>
	</div>
</div>

<!-- footer -->
<div id="f_footer">
	<div id="footer">
		<div class="footer_3fen">
			<h1>关于</h1>
			<p>关于卓越班</p>
			<p>版权声明</p>
			<p>关于隐私</p>
			<p>加入卓越班</p>
		</div>
		<div class="footer_3fen">
			<h1>联系</h1>
			<p>在线提问</p>
			<p>联系我们</p>
			<p>卓越班微博</p>
			<p>卓越班微信</p>
		</div>
		<div class="footer_3fen">
			<h1>版权信息</h1>
			<p>所发布展示“原创作品/文章”版权归原作者所有，任何商业用途均须联系作者。如未经授权用作他处，作者将保留追究侵权者法律责任的权利。</p>
			<br>
			<p>Design by ohyang.</p>
			<p>Copright 2014/7/20 - 2015/7/10</p>
		</div>
		<div class="d_clear"></div>
	</div>
</div>

</body>
</html>