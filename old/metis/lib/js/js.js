function equalHeights(){
	var currentTallest = 0;
	$('.wrap').each(function(i){
		$(this).css({'min-height': '0'});
		if ($(this).height() > currentTallest) { currentTallest = $(this).height(); }
	});
	
	var myWidth = 0, myHeight = 0;
	if( typeof( window.innerWidth ) == 'number' ) {
		myWidth = window.innerWidth;
		myHeight = window.innerHeight;
	} else if( document.documentElement && ( document.documentElement.clientWidth || document.documentElement.clientHeight ) ) {
		myWidth = document.documentElement.clientWidth;
		myHeight = document.documentElement.clientHeight;
	} else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) {
		myWidth = document.body.clientWidth;
		myHeight = document.body.clientHeight;
	}
	if(currentTallest < myHeight - ($('#header').height() + ($("#content .bot").height()) + $("#foot").height())){
		currentTallest = myHeight - ($('#header').height() + ($("#content .bot").height()) + $("#foot").height());
	}
	
	if ($.browser.msie && $.browser.version == 6.0) { $('.wrap').css({'height': currentTallest}); }
	$('.wrap').css({'min-height': currentTallest}); 
}

function groupChecked(buttonGroup) {
	$(buttonGroup).each(function (){ 
		if($(this)[0].checked){
			return 0;
		}
	});
	return -1;
}

function define(){
	i=1;
	$("tr").each(function (){
		if($(this).parents("table").length == 1){
			if($(this).find('input').length > 0){
				$(this).attr("id","q_" + i);
				$(this).addClass("question");
				i++;
			}
		}
	});
}

function implode( glue, pieces ) {
    return ( ( pieces instanceof Array ) ? pieces.join ( glue ) : pieces );
}

function checkSurvey(){
	$(".error").removeClass("error");
	errormsg = '';
	error = false;
	$('.question').each(function(){
		if ( $(this).find('input:checked').length!=1){
			i = this.id.substr(2);
			errormsg += '<a href="#'+this.id+'">Fout bij vraag '+i+'</a><br />';
			error = true;
			$(this).addClass("error");
		}
	});
	if(errormsg!=''){
		$("#error").show();
		$("#error td div")[0].innerHTML = errormsg;
	}
	else{
		$("#survey")[0].submit();
	}
} 

$(document).ready(function() {
   	equalHeights();
   	$(".survey td").click(function (){
		if($(this).find("table").length != 1){
			$(this).find('input').attr("checked","checked");
		}
	});
	$(".survey span").each( function (){
		$(this)[0].innerHTML =	'u';
	});
	define();
	$("#error").show().hide();
});
$(window).resize(function() { 
   equalHeights();
});