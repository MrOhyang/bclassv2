<?php 

class loginController{
	function Login($arrPost){
		$arrclear = $arrPost;
		$arrclear['pwd'] = sha1($arrclear['pwd']);
		$_rows = _fetch_array("	SELECT id,name,face,stu_number
								FROM user
								WHERE stu_number='{$arrclear['name']}' AND pwd='{$arrclear['pwd']}'
								");
		if( !!$_rows ){
			// UPdate 用户的 last_date
			_query("UPDATE user SET last_date=NOW() WHERE id='{$_rows['id']}'");
			setcookie('user_id',$_rows['id'],time()+86400);
			setcookie('user_name',$_rows['name'],time()+86400);
			setcookie('user_face',$_rows['face'],time()+86400);
			setcookie('stu_number',$_rows['stu_number'],time()+86400);
			_location("登陆成功！页面即将跳转","index.php");
		}else{
			_alert_back("输入用户名或密码错误");
		}
	}
}

$loginCon = new loginController();

?>