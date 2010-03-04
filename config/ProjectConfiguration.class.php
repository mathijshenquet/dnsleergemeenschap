<?php

require_once dirname(__FILE__).'/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
	public function setup()
	{
    sfYaml::setSpecVersion('1.1');
	  $this->enableAllPluginsExcept(array('sfPropelPlugin'));
	  $this->enablePlugins('sfFormExtraPlugin');
    $this->enablePlugins('sfDoctrineJCroppablePlugin');
    $this->enablePlugins('sfThumbnailPlugin');
  }
}
