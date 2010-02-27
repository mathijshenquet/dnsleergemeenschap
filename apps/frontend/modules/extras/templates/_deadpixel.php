<?php if(sfConfig::get('app_deadpixel_active', false)): ?>

<?php use_javascript('deadpixel.js'); ?>
<div id="pixel">
	<div></div>
</div>

<?php endif;?>