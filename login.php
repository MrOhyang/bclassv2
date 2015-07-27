<?php

$userAgent = strtolower($_SERVER["HTTP_USER_AGENT"]);
if( @ereg("msie 7",$userAgent) || @ereg("msie 6",$userAgent) ){
}

// 定义个常量，用来授权调用includes里面的文件
define('IN_TG',true);
define('WEB_KIND','login');

//引入公共文件
require dirname(__FILE__).'/includes/common.inc.php'; 	// 转换成硬路径，速度更快
require ROOT_PATH.'action/loginController.php';			// 引用 login 控制器

if( count(@$_GET)==1 && @$_GET['action']=='login' && count(@$_POST)>0 ){
	$loginCon->Login($_POST);
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
<title>卓越班——登陆</title>

<!-- css -->
<link rel="stylesheet" type="text/css" href="style/headfoot.css">
<link rel="stylesheet" type="text/css" href="style/login.css">


<!-- js -->
<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="js/myjs.js"></script>
<script type="text/javascript" src="js/login.js"></script>


</head>
<body>

<!-- header -->
<?php
	require ROOT_PATH.'includes/header.inc.php';
?>

<!-- content -->
<div id="dd_login">
	<div id="login">
		<form id="form_login" method="post" action="login.php?action=login">
			<table>
				<thead>
					<tr>
						<td>
							<h1>用户账户登陆</h1>
						</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td colspan="2">
							<input type="text" name="name">
							<em class="em_name_img"></em>
							<em class="em_name">用户名</em>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<input type="password" name="pwd">
							<em class="em_pwd_img"></em>
							<em class="em_pwd">密码</em>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<a id="abtn_forgot" href="#">忘记密码了？</a>
						</td>
					</tr>
					<tr>
						<td width="50%">
							<input id="in_sub" type="submit" value="登 陆">
						</td>
						<td width="50%">
							<a id="abtn_reg" href="reg.php">注 册</a>
						</td>
					</tr>
				</tbody>
			</table>
		</form>
	</div>
	<div class="d_clear"></div>
</div>


<!-- footer -->
<?php
	require ROOT_PATH.'includes/footer.inc.php';
?>

</body>
</html>