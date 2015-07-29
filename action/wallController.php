<?php 

class wallController{
	public $arrdate = array();
	function SelWall($liminum=-1){
		if( $liminum != -1 ){
			$_result = _query("	SELECT wall.id,wall.cont,wall.user_id,user.face,user.name,wall.last_date
								FROM user,wall
								WHERE user.id=wall.user_id
								ORDER BY wall.last_date DESC
								LIMIT $liminum
								");
		}else{
			$_result = _query("	SELECT wall.id,wall.cont,wall.user_id,user.face,user.name,wall.last_date
								FROM user,wall
								WHERE user.id=wall.user_id
								ORDER BY wall.last_date DESC
								");
		}
		$this->arrdate = array();
		while( !!$_rows=mysql_fetch_array($_result,MYSQL_ASSOC) ){
			if( substr($_rows['last_date'], 5, 5) == date("m-d") ){
				$_date = substr($_rows['last_date'], 11, 5);
			}else{
				if( substr($_rows['last_date'], 0, 4) == date("Y") ){
					$_date = substr($_rows['last_date'], 5, 11);
				}else{
					$_date = substr($_rows['last_date'], 0, 10);
				}
			}
			array_push($this->arrdate, array(	'wall_id'=>$_rows['id'],
												'cont'=>$_rows['cont'],
												'user_id'=>$_rows['user_id'],
												'face'=>$_rows['face'],
												'name'=>$_rows['name'],
												'date'=>$_date
												));
		}
	}
}

$wallCon = new wallController();

?>