<?php

//防止恶意调用
if (!defined('IN_TG')) {
	exit('Access Defined!');
}

if (!function_exists('_alert_back')) {
	exit('_alert_back()函数不存在，请检查!');
}

if (!function_exists('_mysql_string')) {
	exit('_mysql_string()函数不存在，请检查!');
}

function _check_uniqid($_first_uniqid,$_end_uniqid) {
	
	if ((strlen($_first_uniqid) != 40) || ($_first_uniqid != $_end_uniqid)) {
		_alert_back('唯一标识符异常');
	}
	return $_first_uniqid;
}

/**
 * _check_username表示检测并过滤用户名
 * @access public 
 * @param string $_string 受污染的用户名
 * @param int $_min_num  最小位数
 * @param int $_max_num 最大位数
 * @return string  过滤后的用户名 
 */
function _check_username($_string,$_min_num,$_max_num) {
	//去掉两边的空格
	$_string = trim($_string);
	
	//长度小于两位或者大于20位
	if (mb_strlen($_string,'utf-8') < $_min_num || mb_strlen($_string,'utf-8') > $_max_num) {
		_alert_back('昵称长度不得小于'.$_min_num.'位或者大于'.$_max_num.'位');
	}
	
	//限制敏感字符
	$_char_pattern = '/[<>\'\"\ \　]/';
	if (preg_match($_char_pattern,$_string)) {
		_alert_back('用户名不得包含敏感字符');
	}
	
	//限制敏感用户名
	$_mg[0] = '超级管理员';
	$_mg[1] = '老师';
	$_mg[2] = '学生';
	//这里采用的绝对匹配
	if (in_array($_string,$_mg)) {
		_alert_back('包含敏感字符不得注册');
	}
	
	//将用户名转义输入
	return _mysql_string($_string);
}

/*
* $_first_pass 为登陆密码
* $_end_pass 为确认密码
* $_min_num 为最小多少位
* 注：没有验证密码重复
*/
function _check_password($_pass,$_min_num){
	//判断密码
	if (strlen($_pass) < $_min_num) {
		_alert_back('密码不得小于'.$_min_num.'位！');
	}
	
	//将密码返回
	return sha1($_pass);
}

/*
* $_first_pass 为登陆密码
* $_end_pass 为确认密码
* $_min_num 为最小多少位
* 注：验证了密码重复
*/
function _check_password2($_first_pass,$_end_pass,$_min_num){
	//判断密码
	if (strlen($_first_pass) < $_min_num) {
		_alert_back('密码不得小于'.$_min_num.'位！');
	}
	
	//密码和密码确认必须一致
	if ($_first_pass != $_end_pass) {
		_alert_back('密码和确认密码不一致！');
	}
	
	//将密码返回
	return sha1($_first_pass);
}

?>