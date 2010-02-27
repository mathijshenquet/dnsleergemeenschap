$(function(){
	$('#walloffame li').hover(function(){
		if($(this).find("h6, div").queue("fx").length < 2){
			$(this).find("h6, div").slideDown();
		}
	},function(){
		$(this).find("h6, div").slideUp();
	});
});