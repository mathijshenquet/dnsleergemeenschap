jQuery.preloadImages = function()
{
	for(var i = 0; i<arguments.length; i++)
	{
		jQuery("<img>").attr("src", arguments[i]);
	}
};

$.preloadImages("/images/menu_hover.png");

var adminBarState = $.cookie('admin_bar')=='true' ? true : false;

$(function(){
//	if((typeof(Cufon)!='undefined')){
//		Cufon.now();
//	}
	$('.clickable').click(function(){
		window.location = $(this).find("a:not([rel='prettyPhoto'])").attr('href');
	});
	$('.expertbank .clickable').hover(function(){
		$(this).find('span.type').removeClass('hidden');
	}, function(){
		$(this).find('span.type').addClass('hidden');
	});
	$("a[rel^='prettyPhoto']").prettyPhoto({
		animationSpeed: 'normal', /* fast/slow/normal */
		padding: 35, /* padding for each side of the picture */
		opacity: 0.35, /* Value betwee 0 and 1 */
		showTitle: false, /* true/false */
		allowresize: false, /* true/false */
		counter_separator_label: '/', /* The separator for the gallery counter 1 "of" 2 */
		theme: 'light_rounded', /* light_rounded / dark_rounded / light_square / dark_square */
		callback: function(){}
	});
	$('#showcase li').css('display', 'block');
	$('#footer .gravity').click(function(){
		if($.browser.msie){
			alert('Gefeliciteerd, Je hebt een easter egg gevonden! Helaas werkt deze niet met Internet Explorer. Gebruik een andere browser (Google Chrome zorgt voor het beste effect).');
		}else{
			gravity();
		}
	});
	$('#admin_bar .show').click(function(){
		$('#admin_bar').removeClass('hidden');
		adminBarState = true;
	});
	$('#admin_bar .hide').click(function(){
		$('#admin_bar').addClass('hidden');
		adminBarState = false;
	});
	if(adminBarState){
		$('#admin_bar').removeClass('hidden');
	}else{
		$('#admin_bar').addClass('hidden');
	}
});
$(window).unload( function () {
	$.cookie('admin_bar', adminBarState, {path: '/'});
});