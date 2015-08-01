// 控制CSS
$(function(){

	$("ul.wall_col:last").css("margin-right","0");

});

// 瀑布流显示
$(function(){

	var arrcol = [];
	var arrcol_h = [220,220];

	for( var i=0;i<$("ul.wall_col").length;i++ ){
		arrcol[i] = $("ul.wall_col").eq(i);
		if( i>=2 ){
			arrcol_h[i] = 0;
		}
	}

	$.ajax({
		type : 'POST',
		url : './ajax/selwall.php',
		data : {
		},
		dataType : 'json',
		success : function(response, status, xhr){
			// console.log(response);
			for(var i in response){
				var strdom = 	'<li id="wallid_'+response[i]['wall_id']+'">'+
									'<div class="d_wall_cont">'+response[i]['cont']+'</div>'+
									'<div class="d_wallimg_block">'+
										'<a href="#">'+
											'<img class="face_img" src="images/face/'+response[i]['face']+'">'+
										'</a>'+
										'<a class="dwallimg_name" href="#">'+
											'<h6>'+response[i]['name']+'</h6>'+
										'</a>'+
										'<h5>'+response[i]['date']+'</h5>'+
									'</div>'+
								'</li>';
				// console.log(strdom);
				// console.log("");
				arrcol[FindMinH()].append(strdom);

				var htemp = $('li#wallid_'+response[i]['wall_id']).css("height");
				var htemp = htemp.substring(0,htemp.length-2);
				// console.log(htemp);
				arrcol_h[FindMinH()] += htemp;
			}
			$("ul.wall_col").children("li").children(".d_wall_cont").children("p").children("img").eq(0).css("top","-4px");
		}
	});

	// 随机 20 个[100-530]高度的数据
	/*var data = [];
	for( var i=0;i<20;i++ ){
		data[i] = parseInt(Math.random()*430+101);
	}

	var str = "";
	for( var i=0;i<data.length;i++ ){
		str = '<li style="height:' + data[i] + 'px"></li>';
		arrcol[FindMinH()].append(str);
		arrcol_h[FindMinH()] += data[i];
	}*/

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