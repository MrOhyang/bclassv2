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
<?php 
// $userAgent = strtolower($_SERVER["HTTP_USER_AGENT"]);
// if( @ereg("msie 7",$userAgent) || @ereg("msie 6",$userAgent) ){
	
// }
?>

<!-- css -->
<link rel="stylesheet" type="text/css" href="style/headfoot.css">
<link rel="stylesheet" type="text/css" href="style/news.css">


<!-- js -->
<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="js/myjs.js"></script>
<script type="text/javascript" src="js/news.js"></script>


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
				<li class="nav_li_active"><a href="news.php">新闻公告</a></li>
				<li><a href="community.php">交流社区</a></li>
				<li><a href="#">问卷调查</a></li>
				<li><a href="#">事件历史</a></li>
				<li><a href="#">留言墙</a></li>
			</ul>
		</span>
	</div>
</div>

<!-- content -->
<div id="news_content">
	<div id="cont_left">
		<div id="news_func" class="d_cont_block">
			<div class="d_cont_block_title">
				<span class="d_cont_block_num">01<em></em></span>
				<span class="d_cont_block_name">新闻操作列表</span>
				<span class="d_cont_block_san"></span>
				<span class="d_cont_block_more"><a href="#">+</a></span>
			</div>
			<div class="d_cont_block_body">
				<ul id="ul_newsfunc">
					<li><a href="#">添加新闻/公告</a></li>
					<li><a href="#">开启删除修改按钮</a></li>
				</ul>
				<div id="slide_button"><em></em></div>
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
				<ul id="ul_newslist">
					<?php $i=0;while($i++<10){ ?>
					<li><a href="#">今天<?php echo $i; ?>卓越班有一个重大的新闻今天卓越班有一个重大的新闻今天卓越班有一个重大的新闻今天卓越班有一个重大的新闻今天卓越班有一个重大的新闻<em>[07-22]</em></a></li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
	<div class="d_clear"></div>
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