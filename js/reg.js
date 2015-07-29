$(function(){

	// js 控制 em 是否显示
	$("tr").eq(1).find("input").blur(function(){
		if( $(this).val() == '' ){
			$(this).parent().next().children("em").css("display","block");
		}else{
			$(this).parent().next().children("em").css("display","none");
		}
	});
	$("tr").eq(2).find("input").blur(function(){
		if( $(this).val() == '' ){
			$(this).parent().next().children("em").css("display","block");
		}else{
			$(this).parent().next().children("em").css("display","none");
		}
		// 判断两次密码是否相等
		if( $("tr").eq(3).find("input").val() != '' && $("tr").eq(3).find("input").val() != $(this).val() ){
			$("tr").eq(3).find("input").parent().next().children("em").css("display","block");
		}else{
			$("tr").eq(3).find("input").parent().next().children("em").css("display","none");
		}
	});
	$("tr").eq(3).find("input").blur(function(){
		if( $(this).val() != $("tr").eq(2).find("input").val() ){
			$(this).parent().next().children("em").css("display","block");
		}else{
			$(this).parent().next().children("em").css("display","none");
		}
	});

	$("form").delegate("input","blur",function(){
		CherkAll();
	});

	function CherkAll(){
		var tf = true;
		if( $(':input[name=stu_number]').val() == '' )
			tf = false;
		if( $(':input[name=pwd]').val() == '' )
			tf = false;
		if( $(':input[name=rpwd]').val() == '' )
			tf = false;
		if( $(':input[name=rname]').val() == '' )
			tf = false;
		if( tf ){
			$("tr#tr_last").find("input").eq(0).removeAttr("disabled");
		}else{
			$("tr#tr_last").find("input").eq(0).attr("disabled","disabled");
		}
	}

})