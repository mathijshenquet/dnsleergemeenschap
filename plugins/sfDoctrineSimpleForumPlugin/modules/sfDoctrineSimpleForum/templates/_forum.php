<tr>
  <td class="forum_name">
	<?php echo image_tag("/sfDoctrineSimpleForumPlugin/images/forum_new.gif", array("style"=>"vertical-align: 50px; float: left; padding-bottom: 20px; margin-right: 10px;", "alt"=>'New'))?>    
	<?php echo link_to($forum->getName(), 'sf_doctrine_simple_forum_view_board', array("id"=>$forum->getId(), "slug"=>$forum->getSlug())) ?><br />
    <?php echo $forum->getDescription() ?>
  </td>
  <td class="forum_threads"><?php echo $forum->getTopicCount() ?></td>
  <td class="forum_posts"><?php echo $forum->getPostCount() ?></td>
  <td class="forum_recent">
    <?php if ($forum->getLastPost()): ?>
    	<?php echo image_tag("/sfDoctrineSimpleForumPlugin/images/convo.gif", array("style"=>"vertical-align: -5px; margin-right: 5px;", 'alt'=>'Forum'))?>
    	<?php echo link_to($forum->getLastPost()->getTopic()->getTitle(), "sf_doctrine_simple_forum_view_topic", array("id"=>$forum->getLastPost()->getTopicId(), "slug"=>$forum->getLastPost()->getTopic()->getSlug() ))?><br />
    	<?php echo __("by %user%", array('%user%'=>'<b>'.$forum->getLastPost()->getUser()->getUsername().'</b>'), 'sfDoctrineSimpleForum')?>
   	  	<br /><?php  echo timetools::dateTimeDiff($forum->getLastPost()->getCreatedAt('m-d-Y'))?> 		
	<?php endif;?>
  </td>
</tr>