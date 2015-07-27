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
	function SelTitle(){
		$_result = _query("	SELECT id,title,last_date
							FROM news
							ORDER BY id DESC
							");
		$this->arrdate = array();
		while( !!$_rows=mysql_fetch_array($_result,MYSQL_ASSOC) ){
			// date($_rows['last_date']);
			echo date($_rows['last_date']) . "<br />";

			$t = time();

			echo date("Y-m-d H:i:s") . "<br />";

			array_push($this->arrdate, array( 'id'=>$_rows['id'],'title'=>$_rows['title'],'date'=>$_rows['last_date'] ) );
		}
		print_r($this->arrdate);
	}
}

$newsCon = new newsController();

?>