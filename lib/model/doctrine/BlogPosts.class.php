<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class BlogPosts extends BaseBlogPosts
{
	public function getTitleSlug()
	{
  		return DNS::slugify($this->getTitle());
	}
	public function getContent(){
		return sfMarkdown::doConvert($this->getBody());
	}
}