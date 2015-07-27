<?php

$userAgent = strtolower($_SERVER["HTTP_USER_AGENT"]);
if( @ereg("msie 7",$userAgent) || @ereg("msie 6",$userAgent) ){
}

// 定义个常量，用来授权调用includes里面的文件
define('IN_TG',true);
// define('WEB_KIND','login');

//引入公共文件
require dirname(__FILE__).'/includes/common.inc.php'; 	// 转换成硬路径，速度更快

setcookie('user_id','',time()-1);
setcookie('user_name','',time()-1);
setcookie('user_face','',time()-1);

_location("成功登出！","index.php");

?>