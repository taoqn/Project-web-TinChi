
function getPosition(btn,event){
	//alert(event)
	//alert(value_rep)
	//console.log(btn.x);
	//console.log(btn.y);
	mc_width=btn.nominalBounds.width/2;
	mc_height=btn.nominalBounds.height/2;
	
	mc_x1=btn.x-mc_width;
	mc_y1=btn.y-mc_height;
	
	mc_x2=btn.x+mc_width;
	mc_y2=btn.y+mc_height;
	
	//console.log(mc_x1+"-"+mc_y1+"-"+mc_x2+"-"+mc_y2);

	var x = new Number();
	var y = new Number();
	if (event.offsetX != undefined && event.offsetY != undefined)
	{
	  x = event.offsetX;
	  y = event.offsetY;
	}
	else
	{
		x = event.layerX;
		y = event.layerY;
	}
	
/*	 var out = '';
   for (var p in event) {
     out += p + ': ' + event[p] + '\n';
   }
   alert(out);*/
   
	x -= canvas.offsetLeft;
	y -= canvas.offsetTop;
	
	if (x>=mc_x1&&x<=mc_x2&&y>=mc_y1&&y<=mc_y2){
			//alert("vao")
		return true;
	}else{
		
		//alert("ko")
		return false
	}
	
}
function trackClickHtml5()
{
	 window.open("http://google.com");
}