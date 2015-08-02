<?php

$userAgent = strtolower($_SERVER["HTTP_USER_AGENT"]);
if( @ereg("msie 7",$userAgent) || @ereg("msie 6",$userAgent) ){
}

// 定义个常量，用来授权调用includes里面的文件
define('IN_TG',true);
define('WEB_KIND','community');

//引入公共文件
require dirname(__FILE__).'/includes/common.inc.php'; 	// 转换成硬路径，速度更快 
require ROOT_PATH.'/action/communityController.php'; 	// 转换成硬路径，速度更快 

// 如果进入 action=add||del ，判断是否有登陆
if( !isset($_COOKIE['user_id']) || !isset($_COOKIE['user_name']) || !isset($_COOKIE['user_face']) ){
	_location("请先登陆！","login.php");
}

if( count(@$_GET==1) && @$_GET['action']=='addcom' && count(@$_POST)>0 ){
	$communityCon->AddTalk($_POST);
}

$communityCon->CalTalk($communityCon->SelTalk(10));

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
			<span><img src="images/face/<?php echo $_COOKIE['user_face']; ?>"></span>
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
					<form id="form_dsay" method="post" action="community.php?action=addcom">
						<div id="d_say_container" name="cont"></div>
						<input class="mybutton cont_say_button" type="submit" value="发表">
					</form>
				</div>
			</div>
			<div id="d_commu" class="d_cont_block">
				<div class="d_cont_block_title">
					<span class="d_cont_block_num">02<em></em></span>
					<span class="d_cont_block_name">全部动态</span>
					<span class="d_cont_block_san"></span>
					<span class="d_cont_block_more"><a href="#"></a></span>
				</div>
				<?php
				foreach ($communityCon->arrdata as $value) {	?>
				
				<div class="d_cont_block_body" talkid="<?php echo $value->info['id']; ?>"><!-- 动态列表 -->
					<div class="cont_main">
						<div class="cont_main_face">
							<div class="d_cont_faceimg"><a href="#"><img src="images/face/<?php echo $value->info['face']; ?>"></a></div>
							<h5><a href="#"><?php echo $value->info['name']; ?></a></h5>
							<h6><?php echo $value->info['first_date']; ?> 浏览了(<?php echo $value->info['viewnum']; ?>)</h6>
						</div>
						<div class="cont_main_cont"><?php echo $value->info['cont']; ?></div>
					</div>
					<div class="cont_func">
						<ul class="ul_contfunc">
							<li><em class="em_contfunc_comments"></em>评论(?)</li><b></b>
							<li><em class="em_contfunc_forward"></em>转发</li><b></b>
							<li><em class="em_contfunc_zan"></em>赞(<?php echo $value->info['zannum']; ?>)</li><b></b>
							<li><em class="em_contfunc_collection"></em>收藏</li>
						</ul>
						<ul class="ul_comments"><!-- 评论列表 -->
							<?php
							foreach ($value->com as $value2) {
								if( $value2['type'] == '评论' ){ ?>

							<li class="li_commu_yuan" comid="<?php echo $value2['id']; ?>" forcomid="<?php echo $value2['for_com_id']; ?>">
								<span class="sleft"><a href="#"><img src="images/face/<?php echo @$value2['face']; ?>"></a></span>
								<span class="sright">
									<h3 userid="<?php echo $value2['user_id']; ?>">
										<a href="#"><?php echo @$value2['name']; ?></a>
										 : <?php echo $value2['cont']; ?>

									</h3>
									<h4><?php echo $value2['last_date']; ?><em class="em_comments"></em></h4>
								</span>
								<div class="d_clear"></div>
							</li>
							<?php 	}else{ ?>

							<li class="li_commu_hui" comid="<?php echo $value2['id']; ?>" forcomid="<?php echo $value2['for_com_id']; ?>">
								<span class="sleft"><a href="#"><img src="images/face/<?php echo @$value2['face']; ?>"></a></span>
								<span class="sright">
									<h3 userid="<?php echo $value2['user_id']; ?>">
										<a href="#"><?php echo @$value2['name']; ?></a>
										回复
										<a href="#"><?php echo @$value2['for_name']; ?></a>
										 : <?php echo $value2['cont']; ?>

									</h3>
									<h4><?php echo $value2['last_date']; ?><em class="em_comments"></em></h4>
								</span>
								<div class="d_clear"></div>
							</li>
							<?php 	}
							} ?>

								<!--<li class="li_com_ajax_input">
									<input class="myinput comajax_input" type="text">
									<input class="mybutton comajax_button" type="button" value="回复">
								</li>-->

						</ul>
						<div class="cont_say">
							<input class="myinput cont_say_cont" type="text">
							<!-- <input class="mybutton cont_say_submit" type="button" value="发表"> -->
							<input type="hidden" talkid="<?php echo $value->info['id']; ?>">
							<div class="d_clear"></div>
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

<!-- ueditor 配置文件 -->
<script type="text/javascript" src="ueditor/ueditor.config.js"></script>
<!-- ueditor 编辑器源码文件 -->
<script type="text/javascript" src="ueditor/ueditor.all.min.js"></script>

</body>
</html>