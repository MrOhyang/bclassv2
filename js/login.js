$(function(){		// 截取 li 长度大小的函数，用到了 MySubStr 函数

	// js 控制 input.next() => em 显示 or not

	if( $("form#form_login").find("input").eq(0).val() != "" ){
		$("form#form_login").find("input").eq(0).next().next().css("display","none");
	}

	if( $("form#form_login").find("input").eq(1).val() != "" ){
		$("form#form_login").find("input").eq(1).next().next().css("display","none");
	}

	// console.log('eheh');

	$("form#form_login").find("input").eq(0).keyup(function(){
		if( $(this).val() != '' ){
			$(this).next().next().css("display","none");
		}else{
			$(this).next().next().css("display","block");
		}
	});

	$("form#form_login").find("input").eq(1).keyup(function(){
		if( $(this).val() != '' ){
			$(this).next().next().css("display","none");
		}else{
			$(this).next().next().css("display","block");
		}
	});

})