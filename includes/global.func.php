<?php

// 执行耗时所需函数
function _runtime() {
	$_mtime = explode(' ',microtime());
	return $_mtime[1] + $_mtime[0];
}

// 弹窗并 history.back()
function _alert_back($_info) {
	echo "<script type='text/javascript'>alert('".$_info."');history.back();</script>";
	exit();
}

// 本页面跳转
function _location($_info,$_url) {
	if ( empty($_info) ) {
		//header('Location:'.$_url);
		echo "<script type='text/javascript'>location.href='$_url';</script>";
	}else{
		echo "<script type='text/javascript'>alert('$_info');location.href='$_url';</script>";
		exit();
	}
}

function _setcookies(	$_uid,
						$_urname,
						$_uniqid,
						$_uface){
	setcookie('uid',$_uid,time()+86400);
	setcookie('urname',$_urname,time()+86400);
	setcookie('uniqid',$_uniqid,time()+86400);
	setcookie('uface',$_uface,time()+86400);
}

function _login_state(){
	if(isset($_COOKIE['uname'])){
		_alert_back('登录状态无法进行本操作');
	}
}

function _session_destroy(){
	session_destroy();
}

function _unsetcookies(){
	setcookie('uid','',time()-1);
	setcookie('urname','',time()-1);
	setcookie('uniqid','',time()-1);
	setcookie('uface','',time()-1);
	_session_destroy();
	_location(NULL,'index.php');
}

function _sha1_uniqid() {
	return sha1(uniqid(rand(),true));
}

// 判断 mysql 是否能够自动转义
function _mysql_string($_str){		// 是否转义
	if( !GPC ){
		return @mysql_real_escape_string($_str);
	}else{
		return $_str;
	}
}

// 查找显示的页码 的 左边界
function FundPL($_allpage,$_pageindex,$_page){
	FundPLRindexcheck($_pageindex);
	$_pleft = 1;
	if( $_allpage > $_pageindex ){
		if( $_page >= 5 ){
			// 判断 $_pleft;
			$_pleft = $_page - 1;
			if( $_pleft >= ($_allpage-($_pageindex-3)) )
				$_pleft = ($_allpage-($_pageindex-3));
		}
	}
	return $_pleft;
}

// 查找显示的页码 的 右边界
function FundPR($_allpage,$_pageindex,$_page){
	FundPLRindexcheck($_pageindex);
	if( $_allpage > $_pageindex ){
		$_pright = $_pageindex - 2;
		if( $_page >= 5 ){
			// 判断 $_pright; 8->6 , 9->7
			$_pright = $_page + ($_pageindex-6);
			if( $_pright > $_allpage )
				$_pright = $_allpage;
		}
	}else{
		$_pright = $_allpage;
	}
	return $_pright;
}

function FundPLRindexcheck($_pageindex){
	if( $_pageindex<7 )
		exit("pageindex error,check please.");
}

//验证码类
class ValidateCode {
	private $charset = 'abcdefghkmnprstuvwxyzABCDEFGHKMNPRSTUVWXYZ23456789';//随机因子
	private $code;			//验证码
	private $codelen = 4;	//验证码长度
	private $width = 100;	//宽度
	private $height = 30;	//高度
	private $img;			//图形资源句柄
	private $font;			//指定的字体
	private $fontsize = 16;	//指定字体大小
	private $fontcolor;		//指定字体颜色
	//构造方法初始化
	public function __construct() {
		$this->font = "font/Elephant.ttf";//注意字体路径要写对，否则显示不了图片
	}
	//生成随机码
	private function createCode() {
		$_len = strlen($this->charset)-1;
		for ($i=0;$i<$this->codelen;$i++) {
			$this->code .= $this->charset[mt_rand(0,$_len)];
		}
	}
	//生成背景
	private function createBg() {
		$this->img = imagecreatetruecolor($this->width, $this->height);
		$color = imagecolorallocate($this->img, mt_rand(157,255), mt_rand(157,255), mt_rand(157,255));
		imagefilledrectangle($this->img,0,$this->height,$this->width,0,$color);
	}
	//生成文字
	private function createFont() {
		$this->fontcolor = imagecolorallocate($this->img,0,0,0);
		$_x = $this->width / $this->codelen;
		for ($i=0;$i<$this->codelen;$i++) {
			$this->fontcolor = imagecolorallocate($this->img,mt_rand(0,156),mt_rand(0,156),mt_rand(0,156));
			imagettftext($this->img,
						 $this->fontsize,
						 mt_rand(-30,30),
						 $_x*$i+mt_rand(1,5),
						 $this->height / 1.4,
						 $this->fontcolor,
						 $this->font,
						 $this->code[$i]);
		}
	}
	//生成线条、雪花
	private function createLine() {
		//线条
		for ($i=0;$i<6;$i++) {
			$color = imagecolorallocate($this->img,mt_rand(0,156),mt_rand(0,156),mt_rand(0,156));
			imageline($this->img,mt_rand(0,$this->width),mt_rand(0,$this->height),mt_rand(0,$this->width),mt_rand(0,$this->height),$color);
		}
		//雪花
		for ($i=0;$i<100;$i++) {
			$color = imagecolorallocate($this->img,mt_rand(200,255),mt_rand(200,255),mt_rand(200,255));
			imagestring($this->img,mt_rand(1,5),mt_rand(0,$this->width),mt_rand(0,$this->height),'*',$color);
		}
	}
	//输出
	private function outPut() {
		header('Content-type:image/png');
		imagepng($this->img);
		imagedestroy($this->img);
	}
	//对外生成
	public function doimg() {
		$this->createBg();
		$this->createCode();
		$this->createLine();
		$this->createFont();
		$this->outPut();
	}
	//获取验证码
	public function getCode() {
		return strtolower($this->code);
	}
}

function _check_code($_first_code,$_end_code) {
	if (strtolower($_first_code) != $_end_code) {
		_alert_back('验证码不正确!');
	}
}

// 以下函数未使用
// 以下函数未使用
// 以下函数未使用
// 以下函数未使用
// 以下函数未使用
// 以下函数未使用
// 以下函数未使用
// 以下函数未使用
// 以下函数未使用
// 以下函数未使用
// 以下函数未使用
// 以下函数未使用
// 以下函数未使用
// 以下函数未使用
// 以下函数未使用

function _Check_Press1($_str){		// 数据前后有空格去掉
	return trim($_str);
}

function _Check_Press2($_str){		// 数据中不能含有空格 ( 未完成 )
	$_flag = 1;
	$_i = 0;
	$_length = strlen($_str);
	for( ;$_i<$_length;$_i++ ){
		if( $_str[$_i] == ' ' ){
			$_flag = 0;
			break;
		}
	}
	if( $_flag==0 )
		_alert_back('不能含有空格');
}

/*
input 数据前后有空格去掉
      function _Check_Press1($_str){}
input 数据中间不能含有空格
      function _Check_Press2($_str){ _alert_back(); }
input 数据转义 return mysql_real_escape_string(..)
*/

?>