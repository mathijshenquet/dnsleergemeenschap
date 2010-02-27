<?php if(sfConfig::get('app_chicken_active', false)): ?>

<?php
if($sf_user->isAuthenticated()){
	
	use_helper('Javascript');	
	echo javascript_tag('
		var chicken_url = "'.url_for('extras/chicken').'";
	');

	use_javascript('jquerytools');
	use_javascript('tripleclick');
	use_javascript('chicken.js');
}
?>

<?php endif; ?>