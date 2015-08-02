<?php

$userAgent = strtolower($_SERVER["HTTP_USER_AGENT"]);
if( @ereg("msie 7",$userAgent) || @ereg("msie 6",$userAgent) ){
}

// 定义个常量，用来授权调用includes里面的文件
define('IN_TG',true);
define('WEB_KIND','news');

//引入公共文件
require dirname(__FILE__).'/includes/common.inc.php'; 	// 转换成硬路径，速度更快 
require ROOT_PATH.'action/newsController.php';			// 引用 news 控制器

// 如果进入 action=add||del ，判断是否有登陆
if( count($_GET)==1 && ($_GET['action']=='add' || $_GET['action']=='del') ){
	if( !isset($_COOKIE['user_id']) || !isset($_COOKIE['user_name']) || !isset($_COOKIE['user_face']) ){
		_location("请先登陆！","login.php");
	}
}

// 添加一则新闻操作
if( count(@$_GET)==1 && $_GET['action']=='add' && count(@$_POST)>0 ){
	// echo "执行ADD news";
	$newsCon->AddOnenew($_POST);
}else{
	// echo "没有POST操作";
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
				<span class="d_cont_block_num">01<em></em></span>
				<span class="d_cont_block_name">新闻操作列表</span>
				<span class="d_cont_block_san"></span>
				<span class="d_cont_block_more"><a href="#">+</a></span>
			</div>
			<div class="d_cont_block_body">
				<ul id="ul_newsfunc" <?php if(@$_GET['action']=='add' || @$_GET['action']=='del') echo 'style="display:block"'; ?>>
					<li <?php if(@$_GET['action']=='add'){echo 'class="action"';}; ?> ><a href="news.php?action=add">添加新闻/公告</a></li>
					<li <?php if(@$_GET['action']=='del'){echo 'class="action"';}; ?> ><a href="news.php?action=del">开启删除按钮</a></li>
				</ul>
				<div id="slide_button"><em></em></div>
			</div>
		</div>
		<div class="d_cont_block news_func">
			<div class="d_cont_block_title">
				<span class="d_cont_block_num">03<em></em></span>
				<span class="d_cont_block_name">新闻/公告</span>
				<span class="d_cont_block_san"></span>
				<span class="d_cont_block_more"><a href="#">+</a></span>
			</div>
			<div class="d_cont_block_body">
				<ul id="ul_newsfunc" style="display:block;padding-bottom:1px;">
					<li><a href="news.php">新闻</a></li>
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
				<?php
				// 如果 $_GET 没有的话就正常输出 news 列表
				if( count(@$_GET)==0 ){ ?>

				<ul id="ul_newslist">
					<?php 
					$newsCon->SelTitle();
					foreach ($newsCon->arrdate as $value) {	?>

					<li><a href="newdetail.php?id=<?php echo $value['id'] ?>"><?php echo $value['title']; ?><em>[<?php echo $value['date']; ?>]</em></a></li>
					<?php } ?>
					
				</ul>
				<?php }
				// 新增新闻
				if( count(@$_GET)==1 && @$_GET['action']=='add' ){
				?>

				<div class="div_remind"><p>提醒：在这里面显示最多5条记录作为预览</p></div>
				<ul id="ul_newslist" style="padding-bottom:20px;border-bottom:1px #DDD solid;">
					<?php 
					$newsCon->SelTitle(5);
					foreach ($newsCon->arrdate as $value) {	?>

					<li><a href="newdetail.php?id=<?php echo $value['id'] ?>"><?php echo $value['title']; ?><em>[<?php echo $value['date']; ?>]</em></a></li>
					<?php } ?>

				</ul>
				<div class="div_remind"><p>提醒：在此输入相关信息提交新闻公告</p></div>
				<form id="form_addnew" method="post" action="news.php?action=add">
					<table id="table_addnew">
						<tbody>
							<tr>
								<td><b class="bred" style="padding-right:4px">*</b></td>
								<td>新闻/公告 标题 <b class="bred">：</b></td>
								<td><input type="text" name="title" style="width:520px;"></td>
							</tr>
							<tr>
								<td></td>
								<td>作者 <b class="bred">：</b></td>
								<td><input type="text" name="author" style="width:150px;"></td>
							</tr>
							<tr>
								<td></td>
								<td>来源网 <b class="bred">：</b></td>
								<td><input type="text" name="newfrom" style="width:220px;"></td>
							</tr>
							<tr>
								<td><b class="bred" style="padding-right:4px">*</b></td>
								<td>内容 <b class="bred">：</b></td>
								<td><div id="d_cont_container" name="cont"></div></td>
							</tr>
							<tr>
								<td colspan="3">
									<input class="in_submit" type="submit" value="确认并提交">
								</td>
							</tr>
						</tbody>
					</table>
				</form>
				<?php }
				// 开启删除新闻操作
				if( count(@$_GET)==1 && @$_GET['action']=='del' ){
				?>

				<div class="div_remind"><p>提醒：以开启 删除 修改 按钮，请谨慎操作！</p></div>
				<ul id="ul_newslist" style="padding-bottom:20px;border-bottom:1px #DDD solid;">
					<?php 
					$newsCon->SelTitle();
					foreach ($newsCon->arrdate as $value) {	?>

					<li style="width:682px;" newsid="<?php echo $value['id'] ?>">
						<a href="newdetail.php?id=<?php echo $value['id'] ?>"><?php echo $value['title']; ?><em>[<?php echo $value['date']; ?>]</em></a>
						<em class="em_cross"></em>
					</li>
					<?php } ?>

				</ul>
				<?php } ?>

			</div>
		</div>
	</div>
	<div class="d_clear"></div>
</div>

<!-- footer -->
<?php
	require ROOT_PATH.'includes/footer.inc.php';
?>

<?php if( @$_GET['action']=='add' ){ ?>
<!-- ueditor 配置文件 -->
<script type="text/javascript" src="ueditor/ueditor.config.js"></script>
<!-- ueditor 编辑器源码文件 -->
<script type="text/javascript" src="ueditor/ueditor.all.min.js"></script>
<?php } ?>

</body>
</html>