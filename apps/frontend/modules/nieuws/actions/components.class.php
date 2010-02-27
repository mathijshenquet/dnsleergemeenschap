<?php
class nieuwsComponents extends sfComponents{
	public function newswidget(sfWebRequest $request){
		$this->posts = Doctrine::getTable('BlogPosts')
      		->createQuery('u')
     		->limit(5)
     		->execute();
	}
	public function executeInTheNews(sfWebRequest $request){
		//if(file_exists('http://news.google.com/news/search?pz=1&cf=all&ned=nl_nl&hl=nl&q=%22De+Nieuwste+School%22&output=rss')){
			$this->inTheNews = simplexml_load_file('http://news.google.com/news/search?pz=1&cf=all&ned=nl_nl&hl=nl&q=%22De+Nieuwste+School%22&output=rss');
		//}else{
			//$this->forward404();
		//}
	}
}
?>