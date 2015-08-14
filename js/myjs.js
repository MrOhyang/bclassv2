/*
* 判断 a,b 两个数组里面的元素是否全部相等。
*/
function equalArrays(a,b){
	if( a.length != b.length )
		return false;
	for( var i=0 ; i<a.length ; i++ ){
		if( a[i] !== b[i] )
			return false;
	}
	return true;
}

/*
* _key 为名，_value 为值，_spedn 为存在时间，_str 为单位
* 设置一个 任意一生存周期的 Cookie 。
*/
function SetCookie(_key,_value,_spend,_str){
	if(_key != ""){
		var date = new Date();
		var expireT = 0;
		switch(_str){
		case "s":
		case "S":
			expireT = _spend * 1000;
			break;
		case "m":
		case "M":
			expireT = _spend * 60 * 1000;
			break;
		case "h":
		case "H":
			expireT = _spend * 3600 * 1000;
			break;
		case "d":
		case "D":
			expireT = _spend * 24 * 3600 * 1000;
			break;
		default:
			alert("SetCooke error.");
			break;
		}
		date.setTime(date.getTime()+expireT);
		document.cookie = _key + "=" + escape(_value) + ";expires=" + date.toGMTString();
	}
	document.write("finish.");
}

/*
* 读取 Cookie 的 key value
*
* author: 欧阳逸滨
* date: 2015-8-13 19:29:58
*/
function GetCookie(_key){
	var list = document.cookie.split("; ");
	for( var i in list ){
		var index = list[i].search(/\=/);
		if( list[i].substring(0,index) == _key )
			return list[i].substring(index+1);
	}
	return null;
}

// 检测浏览器是否支持 cookie 功能
function IsSupportCookie(){
	if(navigator.cookieEnabled){
		document.write("您的浏览器支持 cookie 功能");
	}else{
		document.write("您的浏览器不支持 cookie 功能");
	}
}

// 判断是否盗链
function HotLinking(){
	var frontURL = document.referrer;	// 上一个文档的URL
	var host = location.hostname;	// 当前主机域名
	if(frontURL != ""){
		var frontHost = frontURL.substring(7,host.length+7);
		if(host == frontHost){
			// 没有盗链
		}else{
			// 非法盗链
		}
	}else{
		// 是直接打开的文档
	}

	document.write("finish."+"<br />");
}

// 输出当前的时间
function GetNowTime(){
	var Time = new Date();
	/*
	* .getFullYear() = 年
	* .getMonth()+1 = 月
	* .getDate() = 日
	* .getDay() = 周几，[0]=>日，[1]=>一，[6]=>六
	*/
	document.write( Time.getFullYear() + '/' + (Time.getMonth()+1) + '/' + Time.getDate() );
}

// str 截取长度为 len
function MySubStr(str,len){
	var len2 = len;
	var str2 = "";
	var ch = '';
	var flag = 0;
	for( var i=0;i<len && !!str.charAt(i);i++ ){
		ch = str.charAt(i);
		str2 += ch;
		// if( this.MyStrMatch(ch,"numchar`~!@#$%^&*()-_=+[{]};:\'\"\\|,<.>/?") ){
		if( /[\w\`\~\!\@\#\$\%\&\_\+\-\*\=\:\;\'\"\\\|\/\(\)\[\]\{\}\<\^\>\,\.\?]/.test(ch) ){
			flag++;
			if( flag%2==0 ){
				len++;
			}
		}
	}
	if( i>=len )
		str2 += "...";
	return str2;
}

/*
* 从 str1 中若有与 str2 相同的字符
* 返回 1，否则返回 0
* str2 含前缀 "num" 意思是：0-9 数字
* str2 含前缀 "char" 意思是：a-z,A-Z 字母
* str2 含前缀 "numchar" 意思是：上面两个之和
*/
function MyStrMatch(str1,str2){
	var numflag = 0;
	var charflag = 0;
	var j = 0;
	if( str2.substring(0,3) == "num" ){
		numflag = 1;
		j += 3;
	}
	if( str2.substring(j,j+4) == "char" ){
		charflag = 1;
		j += 4;
	}
	for( var i=0;i<str1.length;i++ ){
		if( numflag ){
			if( str1.charAt(i)>'0' && str1.charAt(i)<'9' )
				return 1;
		}
		if( charflag ){
			if( str1.charAt(i)>'a' && str1.charAt(i)<'z' )
				return 1;
			if( str1.charAt(i)>'A' && str1.charAt(i)<'Z' )
				return 1;
		}
		for( var k=j;k<str2.length-1;k++ ){
			if( str1.charAt(i) == str2.charAt(k) )
				return 1;
		}
	}
	return 0;
}
