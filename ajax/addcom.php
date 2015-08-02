<?php

$userAgent = strtolower($_SERVER["HTTP_USER_AGENT"]);
if( @ereg("msie 7",$userAgent) || @ereg("msie 6",$userAgent) ){
}

// 定义个常量，用来授权调用includes里面的文件
define('IN_TG',true);

//引入公共文件
require dirname(__FILE__).'/../includes/common.inc.php'; 	// 转换成硬路径，速度更快 
require ROOT_PATH.'action/communityController.php';			// 引用 news 控制器

if( count(@$_GET)>0 && !!@$_GET['forcomid'] ){
	// 添加回复评论
	$communityCon->AddForCom($_POST,$_GET['forcomid']);
}else{
	// 添加评论
	// $communityCon->AddCom($_POST);
}

?>