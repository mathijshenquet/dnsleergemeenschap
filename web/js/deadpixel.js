$(function(){	
	$('#pixel')
	.click(function(){
		$(this)
			.css('display', 'none')
			.css('top', Math.round(Math.random() * $(window).height()))
			.css('left', Math.round(Math.random() * $(window).width()));
		
		
		var state = 0;
		
		var pixel = this;
		
		var animate = setInterval(function(){
			if(Math.round(state/3) % 3 == 0){
				$('body').css('background-color', '#ff0000');
			}else if(Math.round(state/3) % 3 == 1){
				$('body').css('background-color', '#00ff00');
			}else if(Math.round(state/3) % 3 == 2){
				$('body').css('background-color', '#0000ff');
			}
			
			$('p, img, h1, h2, h3, h4, h5, h6')
				.css('-moz-transform', 'rotate('+state*8%360+'deg)')
				.css('-webkit-transform', 'rotate('+state*8%360+'deg)');
			
			state++;
			
			if(state*4 > 360){
				clearInterval(animate);
				$(pixel)
					.css('display', 'block');
				$('body').css('background-color', '#ffffff');
			}
		}, 50);
		
		
		setTimeout(function(){ 
			state = -1;
			clearInterval(animate);
		}, 10000);
	})
	.css('top', Math.round(Math.random() * $(window).height()))
	.css('left', Math.round(Math.random() * $(window).width()))
	.find('div')
		.css('background-color', "#000000");
});