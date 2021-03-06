// CSS 控制
$(function(){

	// cont_left 的每个 ul. 的 li:last CSS控制
	$(function(){
		var len = $("ul.ul_cont_left_block").length;
		for( var i=0;i<len;i++ ){
			$("ul.ul_cont_left_block").eq(i).children("li:last").css("margin-bottom","0");
		}
	});

	// 让动态内容的 .d_cont_block_body:first 的 border-top 为 none
	$("#d_commu .d_cont_block_body:first").css("border-top","none");
	
});

// 每个 block 的 input (我也说一句) 点击事件
$(function(){

	var cli1 = false;
	var num = -1;

	// 添加 我也说一句 input 及 color 控制
	var INPUT_SAY = "我也说一句";
	$("input.cont_say_cont").val(INPUT_SAY);
	$("input.cont_say_cont").css("color","#AAA");

	// input 我也说一句 click bulr 事件
	$("#d_commu").delegate("input.cont_say_cont","click",function(){
		cli1 = true;
		// num = $(this).parent().parent().parent().parent().index();
		// console.log(num);
		if( $(this).val() == INPUT_SAY ){
			$(this).val("");
		}
		$(this).css("color","#000");
		if( $(this).next().attr("type") != "button" ){
			$(this).after('<input class="mybutton cont_say_submit" type="button" value="发表">');
		}
	});
	$("#d_commu").delegate("input.cont_say_cont","blur",function(){
		if( $(this).val() == "" ){
			$(this).val(INPUT_SAY);
		}
		$(this).css("color","#AAA");
		// $(this).next().remove();
	});
	document.addEventListener("click",function(){
	},false);
})

// top 说点什么发表动态的 click 事件
$(function(){
	var flag = false;
	var cli1 = false;

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

	$("#d_say .d_cont_block_body").click(function(){
		cli1 = true;
		if( !flag ){
			$(this).children("p#say_p").hide();
			$(this).children("form#form_dsay").show();
			$(this).children("form#form_dsay").children("#d_say_container").show();
			
			flag = true;
			// console.log("执行显示top发表");
		}
	});

	$(document).click(function(){
		if( !cli1 && flag ){
			$("#d_say .d_cont_block_body p#say_p").show();
			$("#d_say .d_cont_block_body form").hide();
			flag = false;
			console.log("隐藏top发表");
		}
		// 初始化
		cli1 = false;
	})

	// document.addEventListener("click",function(){
	// 	if( !cli1 && flag ){
	// 		$("#d_say .d_cont_block_body p#say_p").show();
	// 		$("#d_say .d_cont_block_body #d_say_container").hide();
	// 		flag = false;
	// 		console.log("隐藏top发表");
	// 	}
	// 	// 初始化
	// 	cli1 = false;
	// },false);

});

// 评论 说说 的 ajax
$(function(){

	// 评论 说说表 的 submit 操作
	$(".d_cont_block_body").delegate("input.cont_say_submit","click",function(){
		
		var _cont = $(this).prev().val();
		var _talkid = $(this).next().attr("talkid");
		var dominput = $(this).prev();
		var domobj = $(this).parent().prev();

		// 做判断，看是否符合条件
		if( _cont != '' ){
			$.ajax({
				type : 'POST',
				url : './ajax/addcom.php',
				data : {
					talk_id : _talkid,
					type : '评论',
					cont : _cont
				},
				dataType : 'json',
				success : function(response, status, xhr){
					// 不完善
					// console.log(response);
					var str = 	'<li class="li_commu_yuan">'+
									'<span class="sleft"><a href="#"><img src="images/face/'+response.face+'"></a></span>'+
									'<span class="sright">'+
										'<h3><a href="#">'+response.name+'</a> : '+_cont+'</h3>'+
										'<h4>'+response.date+'<em class="em_comments"></em></h4>'+
									'</span>'+
									'<div class="d_clear"></div>'+
								'</li>';
					domobj.append(str);
					dominput.val('我也说一句');
				}
			});
		}else{
			// 条件不符合
		}		

	});

})

$(function(){

	var liobjbefore = null;

	$(".d_cont_block_body").delegate("em.em_comments","click",function(){
		var domem = $(this);
		var comid = -1;
		var liobj = null;
		var tempobj = $(this).parent().parent().parent();
		while( tempobj.index()<(tempobj.parent().children("li").length-1) && tempobj.next().attr("forcomid")!=0 ){
			tempobj = tempobj.next();
		}
		liobj = tempobj;
		while( tempobj.index()>0 && tempobj.attr("forcomid")!=0 ){
			tempobj = tempobj.prev();
		}
		comid = tempobj.attr("comid");

		// console.log(liobj.attr("comid"),liobj.attr("forcomid"));
		// console.log('comid = '+comid);

		// $("li.li_com_ajax_input").hide();
		if( liobjbefore!=null ){
			liobjbefore.children("li.li_com_ajax_input").hide();
		}

		if( liobj.children("li.li_com_ajax_input").length>=1 ){
			liobj.children("li.li_com_ajax_input").show();
		}else{
			liobjbefore = liobj;
			liobj.append(	'<li class="li_com_ajax_input" forcomid="'+comid+'">'+
								'<input class="myinput comajax_input" type="text" value="">'+
								'<input class="mybutton comajax_button" type="button" value="回复">'+
							'</li>');
			liobj.delegate("input.comajax_button","click",function(){
				if( $(this).prev().val() != '' ){
					var _talkid = liobj.parent().parent().parent().attr("talkid");
					var _foruserid = domem.parent().prev().attr("userid");
					// console.log(_talkid);
					$.ajax({
						type : 'POST',
						url : 'ajax/addcom.php?forcomid='+comid,
						data : {
							talk_id : _talkid,
							type : '回复',
							cont : $(this).prev().val(),
							for_user_id : _foruserid,
							for_com_id : comid
						},
						dataType : 'JSON',
						success : function(response, status, xhr){
							// 不完善
							console.log(response);
							var str = 	'<li class="li_commu_hui">'+
											'<span class="sleft"><a href="#"><img src="images/face/'+response.face+'"></a></span>'+
											'<span class="sright">'+
												'<h3 userid="'+response.user_id+'">'+
													'<a href="#">'+response.name+'</a>'+
													'回复'+
													'<a href="#">'+domem.parent().prev().children("a").eq(0).text()+'</a>'+
													' : '+response.cont+
												'</h3>'+
												'<h4>'+response.date+'<em class="em_comments"></em></h4>'+
											'</span>'+
											'<div class="d_clear"></div>'+
										'</li>';
							liobj.after(str);
						}
					});
				}else{
					alert("不能为空！");
				}
			});
		}
	});

})