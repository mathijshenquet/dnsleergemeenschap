<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class leerlijnEindterm extends BaseleerlijnEindterm
{
	function getNameSlug(){
		return DNS::Slugify($this->getName());
	}
}