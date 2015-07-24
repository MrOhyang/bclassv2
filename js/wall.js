// 控制CSS
$(function(){

	$(".wall_col:last").css("margin-right","0");

});

// 瀑布流显示
$(function(){

	var arrcol = [];
	var arrcol_h = [];

	for( var i=0;i<$("ul.wall_col").length;i++ ){
		arrcol[i] = $("ul.wall_col").eq(i);
		arrcol_h[i] = 0;
	}

	// 随机 20 个[100-530]高度的数据
	var data = [];
	for( var i=0;i<20;i++ ){
		data[i] = parseInt(Math.random()*430+101);
	}

	var str = "";
	for( var i=0;i<data.length;i++ ){
		str = '<li style="height:' + data[i] + 'px"></li>';
		arrcol[FindMinH()].append(str);
		arrcol_h[FindMinH()] += data[i];
	}

	function FindMinH(){
		num = 0;
		minh = arrcol_h[0];
		for( var i=1;i<arrcol_h.length;i++ ){
			if( minh > arrcol_h[i] ){
				num = i;
				minh = arrcol_h[i];
			}
		}
		return num;
	}

	// console.log(arrcol);

})