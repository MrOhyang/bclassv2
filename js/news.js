$(function(){

	// CSS 控制
	// 控制新闻列表的 li:last
	$("#ul_newslist li:last").css("border-bottom","none");
	$("#ul_newslist li:last").css("margin-bottom","0");

	// side_bar 中 slide_button 的按钮点击事件绑定
	if( $("ul#ul_newsfunc").css("display")=="block" ){
		var slide_flag = true;
	}else{
		var slide_flag = false;
	}
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

	// 删除 news 按钮
	$("ul#ul_newslist").delegate("li em.em_cross","click",function(){
		var newsid = $(this).parent().attr("newsid");
		var domobj = $(this).parent();
		$.ajax({
			type : 'POST',
			url : './ajax/delnews.php',
			data : {
				newsid : $(this).parent().attr("newsid")
			},
			// dataType : 'json',
			success : function(response, status, xhr){
				// console.log(response);

				if( response == true ){
					domobj.fadeOut(300);
					setTimeout(function(){
						domobj.remove();
					},300);
				}
			}
		});
		// console.log(newsid);
	});

})

$(function(){

	// $("#d_cont_container")

	if( $("form#form_addnew").length == 1 ){
		var ue = UE.getEditor('d_cont_container',{
								toolbars : [
									[
										'source', //源代码
								        'undo', //撤销
								        'redo', //重做
								        'bold', //加粗
								        'indent', //首行缩进
								        'italic', //斜体
								        'underline', //下划线
								        'superscript', //上标
								        'subscript', //下标
								        'strikethrough', //删除线
								        'fontborder', //字符边框
								        'formatmatch', //格式刷
								        'pasteplain', //纯文本粘贴模式
								        'selectall', //全选
								        'fontfamily', //字体
								        'fontsize' //字号
								    ],
								    [
								    	'justifyleft', //居左对齐
								        'justifyright', //居右对齐
								        'justifycenter', //居中对齐
								        'justifyjustify', //两端对齐
								        'removeformat', //清除格式
								        'cleardoc', //清空文档
								        'simpleupload', //单图上传
								        'insertimage', //多图上传
								        'link', //超链接
								        'unlink', //取消链接
								        'preview', //预览
								        'horizontal', //分隔线
								        'forecolor', //字体颜色
								        'backcolor', //背景色
								        'insertorderedlist', //有序列表
								        'insertunorderedlist', //无序列表
								        'edittip ' //编辑提示
									],
									[
										'imagenone', //默认
								        'imageleft', //左浮动
								        'imageright', //右浮动
								        'imagecenter', //居中
								        'lineheight', //行间距
										'emotion' //表情
									]
								]
							});
	}

})