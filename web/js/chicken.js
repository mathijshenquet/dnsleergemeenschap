$(function(){
	$("#header").bind("tripleclick", function(){
		//console.log("tripleclick");
		//$(this).find("*").fadeOut("slow", function(){
			$("#header").css({
				width: "100%"
			});
		//});
		
		$.get(chicken_url, function(chicken){
			flashembed(
				"header", "/flash/chicks.swf",
				{
					chickenNames: chicken
				}
			);
		})
		$("#userbar ul").html("<li><b style=\"color:white; font-size:11px\">Schiet de kippen!!!</b></li>")
	});
});