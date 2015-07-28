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

class newsController{
	public $arrdate = array();
	function SelTitle($num = null){
		if( !!$num ){
			$_result = _query("	SELECT id,title,last_date
								FROM news
								ORDER BY id DESC
								LIMIT $num
								");
		}else{
			$_result = _query("	SELECT id,title,last_date
								FROM news
								ORDER BY id DESC
								");
		}
		$this->arrdate = array();
		while( !!$_rows=mysql_fetch_array($_result,MYSQL_ASSOC) ){
			$d = substr($_rows['last_date'],5,5);
			array_push($this->arrdate, array( 'id'=>$_rows['id'],'title'=>$_rows['title'],'date'=>$d ) );
		}
	}
	function SelOnenew($_id){
		$_rows = _fetch_array("	SELECT author,title,cont,last_date
									FROM news
									WHERE id=$_id
									");
		if( !!$_rows ){
			$this->arrdate = array();
			if( substr($_rows['last_date'],0,4) == date("Y") ){
				// m-d H:i
				$date = substr($_rows['last_date'],5,11);
			}else{
				// Y-m-d H:i
				$date = substr($_rows['last_date'],0,16);
			}
			array_push($this->arrdate, array( 'author'=>$_rows['author'],
											  'title'=>$_rows['title'],
											  'cont'=>$_rows['cont'],
											  'date'=>$date
											  ));
		}else{
			_location("没有此新闻","news.php");
		}
	}
	function AddOnenew($arrPost){
		if( $arrPost['title']=='' || $arrPost['cont']=='' ){
			_alert_back("标题和内容不能为空！");
		}else{
			// 创建 今年 的文件夹，用来存放上传新闻中的图片
			$dir = './images/news/' . date('Y');
			if( !file_exists($dir) ){
				mkdir($dir);
			}
			$arrclear = $arrPost;
			// 如果作者为空 则 作者为 操作者
			if( $arrclear['author'] == '' ){
				$arrclear['author'] = $_COOKIE['user_name'];
			}

			$arrimgdom = array();	// array( [0]=> array(
									//			[0]=> <img src=".." title=".." alt="..",
									//			[1]=> <img src=".." title=".." alt="..",
									//			) /> 
									//		)
			$arrimgsrc;				// ../bclassv2/images/temp/20150728/1438066491485742.jpg 路径
			$arrimg;				// 1438066491485742.jpg 文件名

			preg_match_all("/<img[^>]+\>/", $arrclear['cont'], $arrimgdom);
			foreach ($arrimgdom[0] as $value) {
				$temp = array();
				preg_match("/..\/bclassv2\/images\/temp\/[^\"]+/", $value, $temp);
				$arrimgsrc = $temp[0];	// ../bclassv2/images/temp/20150728/1438066491485742.jpg 路径
				$arrimg = substr($arrimgsrc,33);	// 1438066491485742.jpg 文件名
				rename( '.'.substr($arrimgsrc,11) , $dir.'/'.$arrimg );
				$arrclear['cont'] = str_replace($arrimgsrc, $dir.'/'.$arrimg, $arrclear['cont']);
			}

			_query("INSERT INTO news(	title,
										author,
										cont,
										first_date,
										last_date
										)
					VALUE(	'{$arrclear['title']}',
							'{$arrclear['author']}',
							'{$arrclear['cont']}',
							NOW(),
							NOW()
							)
					");
			_location("添加成功","news.php?action=add");
			
		}
	}
	function DelOnenew($arrPost){
		$_result = _query("	DELETE FROM news
							WHERE id='{$arrPost['newsid']}'
							");
		echo true;
	}
}

$newsCon = new newsController();

?>