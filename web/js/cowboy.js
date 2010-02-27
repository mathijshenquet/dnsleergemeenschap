$(function(){
	$('#cowboy_trigger').click(function(){
		$('body').prepend('<div id="cowboy"><object height="100%" width="100%" id="gunshots" align="left"><param name="allowScriptAccess" value="sameDomain" /><param name="menu" value="false" /><param name="allowFullScreen" value="false" /><param name="movie" value="/flash/cowboy.swf" /><param name="quality" value="high" /><param name="salign" value="lt" /><param name="wmode" value="transparent" /><param name="bgcolor" value="#ffffff" />	<embed src="/flash/cowboy.swf" quality="high" salign="lt" wmode="transparent" bgcolor="#ffffff" width="100%" height="100%" name="gunshots" align="left" menu="false" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.adobe.com/go/getflashplayer" /></object></div>');
		$('#cowboy').css('height', $(document).height());
		$('body').css('background', '#ffffff');
	});
});