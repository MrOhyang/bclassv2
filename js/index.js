$(function(){

	// Home page by the special effects => focus
	var focus_obj = $("#ul_focus");
	var innum = -1;
	var len = focus_obj.children("li").length;
	var OnTimer;
	var timecost = 2500;

	FocusPlay(1);
	OnTimer = setInterval(function(){FocusPlay(1)},timecost);

	$("#focus_left_b").click(function(){
		clearTimeout(OnTimer);
		FocusPlay(-1);
		OnTimer = setInterval(function(){FocusPlay(1)},timecost);
	});
	$("#focus_right_b").click(function(){
		clearTimeout(OnTimer);
		FocusPlay(1);
		OnTimer = setInterval(function(){FocusPlay(1)},timecost);
	});

	function FocusPlay(temp){
		innum = (innum+temp+len)%len;
		ShowEq(innum);
	}

	function ShowEq(number){
		HidAll();
		focus_obj.children("li").eq(number).fadeIn();
	}

	function HidAll(){
		focus_obj.children("li").css("display","none");
	}

})