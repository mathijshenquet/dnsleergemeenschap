<?php

/**
 * BlogPosts form.
 *
 * @package    form
 * @subpackage BlogPosts
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class BlogPostsForm extends BaseBlogPostsForm
{
  public function configure()
  {
  	unset($this['created_at'], $this['updated_at']);
  }
}