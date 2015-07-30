<?php 

class regController{
	function Reg($arrPost){
		$arrclear = $arrPost;
		$arrclear['pwd'] = sha1($arrclear['pwd']);
		if( $arrclear['name'] == '' ){
			$arrclear['name'] = $arrclear['rname'];
		}
		// if( $arrclear['face'] == '' ){
			$arrclear['face'] = '_deface.png';
		// }
		if( $arrclear['birthday'] == '' ){
			$arrclear['birthday'] = '0000-00-00';
		}

		$rows = _fetch_array("	SELECT stu_number
								FROM user
								WHERE stu_number='{$arrclear['stu_number']}'
								");

		if( !$rows ){
			// 没有相同的 学号
			_query("INSERT INTO user(	stu_number,
										name,
										rname,
										pwd,
										sex,
										face,
										birthday,
										inschoolyear,
										profe,
										class,
										qq,
										abstract,
										first_date,
										last_date
										)
					VALUES(	'{$arrclear['stu_number']}',
							'{$arrclear['name']}',
							'{$arrclear['rname']}',
							'{$arrclear['pwd']}',
							'{$arrclear['sex']}',
							'{$arrclear['face']}',
							'{$arrclear['birthday']}',
							'{$arrclear['inschoolyear']}',
							'{$arrclear['profe']}',
							'{$arrclear['class']}',
							'{$arrclear['qq']}',
							'{$arrclear['abstract']}',
							NOW(),
							NOW()
							)
					",true);
			if( !file_exists('./images/user/'.$arrclear['stu_number']) ){
				mkdir('./images/user/'.$arrclear['stu_number']);
			}
			_location("注册成功！","login.php");
		}else{
			// 重复的 学号
			_alert_back("该学号已被注册，请联系管理员！");
		}

	}
}

$regCon = new regController();

?>