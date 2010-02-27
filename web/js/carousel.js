$(function(){
	$('#showcase').carousel({ 
		direction: "vertical", 
		loop: true, 
		nextBtn: '<div class="down"></div>', 
		prevBtn: '<div class="up"></div>', 
		autoSlide: true, 
		autoSlideInterval: 5000,
		effect: "fade"
	});
});