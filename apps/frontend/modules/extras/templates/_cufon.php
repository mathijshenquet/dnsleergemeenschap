<?php
if(sfConfig::get('app_cufon_active', true)){
	use_javascript('cufon2.lib.js');
	use_javascript('officina.font.js');
	use_javascript('cufon.loader.js');
}