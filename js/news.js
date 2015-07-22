$(function(){

	// CSS 控制
	// 控制新闻列表的 li:last
	$("#ul_newslist li:last").css("border-bottom","none");
	$("#ul_newslist li:last").css("margin-bottom","0");

	// side_bar 中 slide_button 的按钮点击事件绑定
	var slide_flag = false;
	$("#slide_button").click(function(){
		if( slide_flag ){
			$("ul#ul_newsfunc").slideUp();
			slide_flag = false;
			$("#slide_button em").removeAttr("class");
		}else{
			$("ul#ul_newsfunc").slideDown();
			slide_flag = true;
			$("#slide_button em").attr("class","active");
		}
	});

	// 对新闻列表 li 进行内容的字符截取
	$(function(){
		var len = $("ul#ul_newslist li").length;
		for( var i=0;i<len;i++ ){
			var temp = $("ul#ul_newslist li").eq(i).children("a");
			// var str_em = temp.html().match(/<em>\[\d+\-\d+\]<\/em>/g)[0];
			var str_em = temp.html().substring(temp.html().length-16,temp.html().length);
			// console.log(str_em);
			var str_cont = temp.html().substring(0,temp.html().length-str_em.length);
			str_cont = MySubStr(str_cont,41);
			temp.html( str_cont + str_em );
		}
	});

})