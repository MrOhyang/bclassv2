<?php

$userAgent = strtolower($_SERVER["HTTP_USER_AGENT"]);
if( @ereg("msie 7",$userAgent) || @ereg("msie 6",$userAgent) ){
}

// 定义个常量，用来授权调用includes里面的文件
define('IN_TG',true);
define('WEB_KIND','login');

//引入公共文件
require dirname(__FILE__).'/includes/common.inc.php'; 	// 转换成硬路径，速度更快
require ROOT_PATH.'action/regController.php';			// 引用 login 控制器

// 进行注册操作
if( count(@$_GET)==1 && $_GET['action']=='reg' && count(@$_POST)>0 ){
	$regCon->Reg($_POST);
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
<link rel="stylesheet" type="text/css" href="style/reg.css">


<!-- js -->
<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="js/myjs.js"></script>
<script type="text/javascript" src="js/reg.js"></script>


</head>
<body>

<!-- header -->
<?php
	require ROOT_PATH.'includes/header.inc.php';
?>

<!-- content -->
<div id="d_reg">
	<div id="d_from">
		<form method="post" action="reg.php?action=reg">
			<table>
				<tbody>
					<tr class="tr_h">
						<td colspan="3"><h1><em class="em_h1">填写基本信息</em></h1></td>
					</tr>
					<tr>
						<td class="td1" width="190px;"><em class="em_red">* </em>学号（用作登录名）：</td>
						<td width="100px;"><input class="in_reg_text" type="text" name="stu_number"></td>
						<td width="120px;"><em class="em_red2">内容不能为空</em></td>
					</tr>
					<tr>
						<td class="td1"><em class="em_red">* </em>登陆密码：</td>
						<td><input class="in_reg_text" type="password" name="pwd"></td>
						<td><em class="em_red2">内容不能为空</em></td>
					</tr>
					<tr>
						<td class="td1"><em class="em_red">* </em>确认登陆密码：</td>
						<td><input class="in_reg_text" type="password" name="rpwd"></td>
						<td><em class="em_red2">两次密码不同</em></td>
					</tr>
					<tr class="tr_h">
						<td colspan="3"><h1><em class="em_h1">填写个人信息</em></h1></td>
					</tr>
					<tr>
						<td class="td1" width="190px;"><em class="em_red">* </em>真实姓名：</td>
						<td><input class="in_reg_text" type="text" name="rname" style="width:150px;"></td>
						<td><em class="em_red2">内容不能为空</em></td>
					</tr>
					<tr>
						<td class="td1">昵称：</td>
						<td colspan="2"><input class="in_reg_text" type="text" name="name" style="width:150px;"></td>
					</tr>
					<tr>
						<td class="td1">性别：</td>
						<td colspan="2">
							<select name="sex" style="min-width:62px;">
								<option value="男">男</option>
								<option value="女">女</option>
							</select>
						</td>
					</tr>
					<tr>
						<td class="td1"><em class="em_red">* </em>专业：</td>
						<td colspan="2">
							<select name="profe" style="min-width:174px;">
								<option value="计算机科学与技术">计算机科学与技术</option>
								<option value="网络工程">网络工程</option>
								<option value="信息管理">信息管理</option>
							</select>
						</td>
					</tr>
					<tr>
						<td class="td1"><em class="em_red">* </em>班级：</td>
						<td colspan="2">
							<select name="class" style="min-width:54px;">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select>
						</td>
					</tr>
					<tr>
						<td class="td1"><em class="em_red">* </em>届：</td>
						<td colspan="2">
							<select name="inschoolyear" style="min-width:82px;">
								<?php for($year=date("Y")-1;$year>=2012;$year--){ ?>

								<option value="<?php echo $year; ?>"><?php echo $year; ?></option>
								<?php } ?>
								
							</select>
						</td>
					</tr>
					<tr>
						<td class="td1">QQ：</td>
						<td colspan="2"><input class="in_reg_text" type="text" name="qq" style="width:160px;"></td>
					</tr>
					<tr>
						<td class="td1">生日：</td>
						<td colspan="2"><input class="in_reg_text" type="text" name="birthday" style="width:110px;"></td>
					</tr>
					<tr>
						<td class="td1">个人简介：</td>
						<td colspan="2"><textarea name="abstract"></textarea></td>
					</tr>
					<tr id="tr_last">
						<td colspan="3"><input type="submit" value="确认并注册" disabled="disabled"></td>
					</tr>
				</tbody>
			</table>
		</form>
	</div>
	<div id="d_word">
		<p>这里是卓越工程师班级注册页面</p>
		<br>
		<p>请根据提示填写以下信息，确认无误后提交注册。</p>
		<br>
		<p>当成为本站成员之后，应当遵守本站公约： </p>
		<p>1.要诚实友好交流,不辱骂欺诈他人。</p>
		<p>2.要增强自护意识,不随意约会网友。</p>
		<p>3.要维护网络安全,不破坏网络秩序。</p>
		<br>
		<p style="color:#F22;">提醒：带有*号的为必填！</p>
	</div>
	<div class="d_clear"></div>
</div>

<!-- footer -->
<?php
	require ROOT_PATH.'includes/footer.inc.php';
?>

</body>
</html>