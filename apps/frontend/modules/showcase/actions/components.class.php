<?php

/**
 * showcase actions.
 *
 * @package    dns
 * @subpackage showcase
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class showcaseComponents extends sfComponents
{
  public function executeSlideshow(sfWebRequest $request)
  {
    $this->items = Doctrine::getTable('showcase')
      ->createQuery('a')
      ->where('a.is_active = ?', '1')
      ->execute();
      
    if($this->items->count() == 0){
    	return sfView::NONE;
    }
  }
}
