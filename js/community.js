$(function(){

	// CSS 控制
	// cont_left 的每个 ul. 的 li:last CSS控制
	$(function(){
		var len = $("ul.ul_cont_left_block").length;
		for( var i=0;i<len;i++ ){
			$("ul.ul_cont_left_block").eq(i).children("li:last").css("margin-bottom","0");
		}
	});

	// 让动态内容的 .d_cont_block_body:first 的 border-top 为 none
	$("#d_commu .d_cont_block_body:first").css("border-top","none");

	// 添加 我也说一句 input 及 color 控制
	var INPUT_SAY = "我也说一句";
	$("input.cont_say_cont").val(INPUT_SAY);
	$("input.cont_say_cont").css("color","#AAA");

	// input 我也说一句 click bulr 事件
	$("#d_commu").delegate("input.myinput","click",function(){
		if( $(this).val() == INPUT_SAY ){
			$(this).val("");
		}
		$(this).css("color","#000");
		if( $(this).next().attr("type") != "submit" ){
			$(this).after('<input class="mybutton cont_say_submit" type="submit" value="发表">');
		}
	});
	$("#d_commu").delegate("input.myinput","blur",function(){
		if( $(this).val() == "" ){
			$(this).val(INPUT_SAY);
		}
		$(this).css("color","#AAA");
		// $(this).next().remove();
	});

});

$(function(){

	$("#d_say .d_cont_block_body").click(function(){
		$(this).children("p#say_p").remove();
		$(this).append('<div id="d_say_container"></div>');
		var ue = UE.getEditor('d_say_container',{
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
			        'fontsize', //字号
			        '|',
			        'emotion' //表情
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
			        'imagenone', //默认
			        'imageleft', //左浮动
			        'imageright', //右浮动
			        'imagecenter', //居中
			        'lineheight', //行间距
			        'edittip ', //编辑提示
				]
			]
		});
	});

	

});