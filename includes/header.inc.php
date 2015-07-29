<?php
$webkd = array("","","","","","");
switch (WEB_KIND) {
	case 'index':
		$webkd[0] = 'class="nav_li_active"';
		break;
	case 'news':
		$webkd[1] = 'class="nav_li_active"';
		break;
	case 'community':
		$webkd[2] = 'class="nav_li_active"';
		break;
	case 'q':
		$webkd[3] = 'class="nav_li_active"';
		break;
	case 'h':
		$webkd[4] = 'class="nav_li_active"';
		break;
	case 'wall':
		$webkd[5] = 'class="nav_li_active"';
		break;
	default:
		break;
}



?>
<!-- top -->
<div id="d_top">
	<div id="top">
		<?php if( !isset($_COOKIE['user_id']) ){ ?>

		<span><a href="reg.php">注册</a></span>
		<span><a href="login.php">登陆</a></span>
		<?php }else{ ?>

		<span class="span_login">
			<a href="logout.php">登出</a>
		</span>
		<span class="span_login">
			<a href="#">
				<h3>Iam</h3>
				<img src="images/face/<?php echo $_COOKIE['user_face']; ?>">
			</a>
		</span>
		<?php } ?>

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
				<li <?php echo $webkd[0]; ?> ><a href="index.php">首页</a></li>
				<li <?php echo $webkd[1]; ?> ><a href="news.php">新闻公告</a></li>
				<li <?php echo $webkd[2]; ?> ><a href="community.php">交流社区</a></li>
				<li <?php echo $webkd[3]; ?> ><a href="#">问卷调查</a></li>
				<li <?php echo $webkd[4]; ?> ><a href="#">事件历史</a></li>
				<li <?php echo $webkd[5]; ?> ><a href="wall.php">留言墙</a></li>
			</ul>
		</span>
	</div>
</div>