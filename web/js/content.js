$(function(){
	var items = $('#content .text h1, #content .text h2, #content .text h3, #content .text h4, #content .text h5, #content .text h6');
	if(items.size() > 4){
		$("#content .text").before('<div id="toc"><h6>Inhoudsopgaven</h6><ul></ul></div>');
		var toc = $("#content #toc");
		items.each(function(item) {
		    var el = $(this);
		    el.attr('id', 'item-'+item);
		    $(toc).find('ul').append("<li><a href='#item-"+item+"' title='" + el.html() + "'>" + 
		        el.html() + "</a></li>");
		});
		$('#toc a').click(function(event){
	    	$.scrollTo( $($(this).attr('href')), 800, {easing:'easeOutExpo'});
	    	window.location.hash = $($(this).attr('href').get());
	    	event.preventDefault();
	    });
		if(window.location.hash != ''){
			$.scrollTo( $(window.location.hash), 600, {easing:'easeOutExpo'});
		}
	}
});