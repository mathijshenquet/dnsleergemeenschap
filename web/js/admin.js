jQuery.preload = function()
{
  for(var i = 0; i<arguments.length; i++)
  {
    jQuery("<img>").attr("src", arguments[i]);
  }
}

$(function(){
	$.preload('../images/backend_menu_hover.png', '../images/backend_menu_hover.png');
	$('.sf_admin_row').click(function(){
		$(this).find('.sf_admin_batch_checkbox').toggleCheckboxes();
	});
});