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