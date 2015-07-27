<?php 

/*

class myData{
	public $_date = "";
	public $_items = array();
	function myRever(){
		$this->_items = array_reverse($this->_items);
	}
}

*/

class loginController{
	function Login($arrPost){
		$arrclear = $arrPost;
		$arrclear['pwd'] = sha1($arrclear['pwd']);
		$_rows = _fetch_array("	SELECT id,name,face
								FROM user
								WHERE stu_number='{$arrclear['name']}' AND pwd='{$arrclear['pwd']}'
								");
		if( !!$_rows ){
			setcookie('user_id',$_rows['id'],time()+86400);
			setcookie('user_name',$_rows['name'],time()+86400);
			setcookie('user_face',$_rows['face'],time()+86400);
			_location("登陆成功！页面即将跳转","index.php");
		}else{
			_alert_back("输入用户名或密码错误");
		}
	}
}

$loginCon = new loginController();

?>