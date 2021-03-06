<?php 

class talkDC{
	public $info = array();
	public $com = array();
	public function talkDC($arg1){
		$this->info = $arg1;
	}
}

// 在数组中查找是否 有 $num 的值，如果有 返回true
function FindArrId($arr,$num){
	foreach ($arr as $value) {
		if( $value == $num ){
			return false;
		}
	}
	return true;
}

class communityController{
	public $arrdata = array();
	// 计算 说说表 返回 block 对象信息输出
	public function CalTalk($arrinfo){

		$strtalkid = '(';
		$arrtalkDC = array();

		foreach ($arrinfo as $value) {
			$strtalkid .= '\''.$value['id'].'\',';

			$temp = new talkDC($value);
			$arrtalkDC[$value['id']] = $temp;
		}

		$strtalkid = substr($strtalkid, 0,strlen($strtalkid)-1);
		$strtalkid .= ')';	// eg : ('1','2','4')

		$this->SelComment($strtalkid);

		$arruserid = array();	// 所有评论表中的 user.id 的数组 eg : Array(2,9)

		// 为 arrtalkDC 添加 ->com 的信息
		foreach ($this->arrdata as $value) {
			$temp = $value;
			if( FindArrId($arruserid,$temp['user_id']) ){
				array_push($arruserid, $temp['user_id']);
			}
			if( $temp['for_user_id']!=0 && FindArrId($arruserid,$temp['for_user_id']) ){
				array_push($arruserid, $temp['for_user_id']);
			}
		}
		sort($arruserid);

		$struserid = '('.implode(',', $arruserid).')';

		$_result = _query("	SELECT id,name,face
							FROM user
							WHERE id in ".$struserid."
							");
		$arruseridforname = array();
		$arruseridforface = array();
		while( !!$_rows=mysql_fetch_array($_result) ){
			$arruseridforname[$_rows['id']] = $_rows['name'];
			$arruseridforface[$_rows['id']] = $_rows['face'];
		}

		// 为 talkDC[]->com 添加 评论 和 回复
		foreach ($this->arrdata as $value) {
			if( $value['type'] == '评论' ){
				$temp = $value;
				$temp['name'] = $arruseridforname[$value['user_id']];
				$temp['face'] = $arruseridforface[$value['user_id']];
				array_push( $arrtalkDC[$value['talk_id']]->com, $temp);
			}
		}
		foreach ($this->arrdata as $value) {
			if( $value['type'] == '回复' ){
				$temp = $value;
				$temp['name'] = $arruseridforname[$value['user_id']];
				$temp['face'] = $arruseridforface[$value['user_id']];
				$temp['for_name'] = $arruseridforname[$value['for_user_id']];
				$n = 0;
				foreach ($arrtalkDC[$value['talk_id']]->com as $value2) {
					if( $value2['type']=='评论' && $value2['id'] > $temp['for_com_id'] ){
						break;
					}
					$n++;
				}
				$arrtalkDC[$value['talk_id']]->com = array_merge(	array_slice($arrtalkDC[$value['talk_id']]->com,
																				0,
																				$n),
																	array($temp),
																	array_slice($arrtalkDC[$value['talk_id']]->com,
																				$n)
																	);
			}
		}

		// print_r( array_slice($arrtalkDC[1]->com, 0) );

		$this->arrdata = $arrtalkDC;

		// echo "\$arrtalkDC:";
		// print_r($arrtalkDC);
	}
	// SELECT 说说表
	public function SelTalk($num = null){
		if( !!$num ){
			$_result = _query("	SELECT talks.id,
									   talks.user_id,
									   user.name,
									   user.face,
									   talks.type,
									   talks.trans_talk_id,
									   talks.viewnum,
									   talks.zannum,
									   talks.cont,
									   talks.first_date
								FROM talks,user
								WHERE user.id=talks.user_id
								ORDER BY first_date DESC
								LIMIT $num
								");
		}else{
			$_result = _query("	SELECT talks.id,
									   talks.user_id,
									   user.name,
									   user.face,
									   talks.type,
									   talks.trans_talk_id,
									   talks.viewnum,
									   talks.zannum,
									   talks.cont,
									   talks.first_date
								FROM talks,user
								WHERE user.id=talks.user_id
								ORDER BY first_date DESC
								");
		}
		$this->arrdata = array();
		while( !!$_rows=mysql_fetch_array($_result,MYSQL_ASSOC) ){
			$temp = $_rows;
			if( substr($temp['first_date'], 5, 5) == date("m-d") ){
				$temp['first_date'] = substr($temp['first_date'], 11,5);
			}else{
				if( substr($temp['first_date'], 0, 4) == date("Y") ){
					$temp['first_date'] = substr($temp['first_date'], 5,11);
				}
			}
			array_push($this->arrdata, $temp);
		}

		return $this->arrdata;
	}
	// SELECT 评论表
	public function SelComment($arrtalkid){
		$_result = _query("	SELECT id,
								   talk_id,
								   user_id,
								   type,
								   for_user_id,
								   for_com_id,
								   cont,
								   last_date
							FROM comments
							WHERE talk_id in ".$arrtalkid."
							ORDER BY comments.last_date ASC
							");
		$this->arrdata = array();
		while( !!$_rows=mysql_fetch_array($_result,MYSQL_ASSOC) ){
			$temp = $_rows;
			// 处理时间
			if( substr($temp['last_date'], 5, 5) == date("m-d") ){
				// 同一天
				$temp['last_date'] = substr($temp['last_date'], 11,5);
			}else{
				if( substr($temp['last_date'], 0, 4) == date("Y") ){
					// 同一年

					if( substr($temp['last_date'], 5, 5) == date("m-d",time()-86400) ){
						$temp['last_date'] = '昨天 '.substr($temp['last_date'], 11,5);
					}else{
						$temp['last_date'] = substr($temp['last_date'], 5,11);
					}
				}else{
					// 不同年
				}
			}
			array_push($this->arrdata, $temp);
		}
		return $this->arrdata;
	}
	// 添加 说说
	public function AddTalk($arrPost){
		if( $arrPost['cont'] != '' ){

			$arrclear = $arrPost;

			$arrimgdom = array();	// array( [0]=> array(
									//			[0]=> <img src=".." title=".." alt="..">,
									//			[1]=> <img src=".." title=".." alt="..">,
									//			) /> 
									//		)
			$arrimgsrc;				// ../bclassv2/images/temp/20150728/1438066491485742.jpg 路径
			$arrimg;				// 1438066491485742.jpg 文件名
			$dir = './images/user/'.$_COOKIE['stu_number'];

			preg_match_all("/<img src=\"..\/[^>]+\>/", $arrclear['cont'], $arrimgdom);

			foreach ($arrimgdom[0] as $value) {
				$temp = array();
				preg_match("/..\/bclassv2\/images\/temp\/[^\"]+/", $value, $temp);
				$arrimgsrc = $temp[0];	// ../bclassv2/images/temp/20150728/1438066491485742.jpg 路径
				$arrimg = substr($arrimgsrc,33);	// 1438066491485742.jpg 文件名
				rename( '.'.substr($arrimgsrc,11) , $dir.'/'.$arrimg );
				$arrclear['cont'] = str_replace($arrimgsrc, $dir.'/'.$arrimg, $arrclear['cont']);
			}

			$arrclear['user_id'] = $_COOKIE['user_id'];
			$arrclear['type'] = '原创';

			_query("INSERT INTO talks(	user_id,
										type,
										cont,
										first_date,
										last_date
										)
					VALUES(	'{$arrclear['user_id']}',
							'{$arrclear['type']}',
							'{$arrclear['cont']}',
							NOW(),
							NOW()
							)
					");
			_location("发表成功！","community.php");
		}else{
			// cont 不能为空
		}
	}
	// 添加 评论
	public function AddCom($arrPost){
		$arrclear = $arrPost;
		$arrclear['user_id'] = $_COOKIE['user_id'];

		_query("INSERT INTO comments(	talk_id,
										user_id,
										type,
										cont,
										last_date
										)
				VALUES(	'{$arrclear['talk_id']}',
						'{$arrclear['user_id']}',
						'{$arrclear['type']}',
						'{$arrclear['cont']}',
						NOW()
						)
				");
		echo json_encode(array(	'name' => $_COOKIE['user_name'],
								'face' => $_COOKIE['user_face'],
								'user_id' => $_COOKIE['user_id'],
								'date' => date("H:i")
								));
	}
	// 添加 回复 评论
	public function AddForCom($arrPost,$forcomid){
		$arrclear = $arrPost;
		$arrclear['user_id'] = $_COOKIE['user_id'];

		// _query("INSERT INTO comments(	talk_id,
		// 								user_id,
		// 								type,
		// 								cont,
		// 								last_date
		// 								)
		// 		VALUES(	'{$arrclear['talk_id']}',
		// 				'{$arrclear['user_id']}',
		// 				'{$arrclear['type']}',
		// 				'{$arrclear['cont']}',
		// 				'{$arrclear['for_user_id']}',
		// 				'{$arrclear['for_com_id']}',
		// 				NOW()
		// 				)
		// 		");
		echo json_encode(array(	'name' => $_COOKIE['user_name'],
								'face' => $_COOKIE['user_face'],
								'user_id' => $_COOKIE['user_id'],
								'date' => date("H:i"),
								'cont' => $arrclear['cont']
								));
	}
}

$communityCon = new communityController();

?>