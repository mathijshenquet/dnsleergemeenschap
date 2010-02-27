<?php use_helper('I18N'); ?>

<h3 class="toolbar"><?php echo $forum->getName()?></h3>
<p><?php echo $forum->getDescription() ?></p>
<ul id="crumbs">
	<li><?php echo link_to("Forum Index", "sf_doctrine_simple_forum_index")?></li>
	<li><?php echo $forum->getName(); ?></li>
</ul>
<br />

<?php if(count($board)==0 && $sf_user->isAuthenticated()):?>
	<div class="info"><?php echo __("Oooops! There are no topics for this board. ", null, 'sfDoctrineSimpleForum')?><br /><?php echo __("Why not create one?", null, 'sfDoctrineSimpleForum')?></div>
<?php endif?>

<table id="thread_table">	
	<thead>
		<tr>
			<th><?php echo __("Thread", null, 'sfDoctrineSimpleForum')?></th>
			<th><?php echo __("Posts", null, 'sfDoctrineSimpleForum')?></th>
			<th><?php echo __("Views", null, 'sfDoctrineSimpleForum')?></th>
			<th><?php echo __("Last Post", null, 'sfDoctrineSimpleForum')?></th>	
		</tr>
	</thead>
	<tbody>
	<?php if(count($stickies)>0):?>
	<?php foreach($stickies as $topic):?>
		<tr>
			<td style="width: 70%">
				<?php if($topic->getIsLocked()):?>
						<?php echo image_tag("/sfDoctrineSimpleForumPlugin/images/thread_lock.gif", array("style"=>"vertical-align: -8px; margin-right: 5px;", "alt"=>"Lock"))?>
				<?php endif;?>
				<?php echo image_tag("/sfDoctrineSimpleForumPlugin/images/sticky.gif", array("style"=>"vertical-align: -3px; margin-right: 5px;", "alt"=>"Sticky"))?>
				<?php echo image_tag("/sfDoctrineSimpleForumPlugin/images/new.gif", array("style"=>"vertical-align: -3px; margin-right: 5px;", "alt"=>"New"))?>
				<b><?php echo __("Sticky", null, 'sfDoctrineSimpleForum')?>: <?php echo link_to($topic->getTitle(), "sf_doctrine_simple_forum_view_topic",  array("id"=>$topic->getId(), "slug"=>$topic->getSlug()))?></b>
			</td>
			<td><?php echo $topic->getPostCount()?></td>
			<td><?php echo $topic->getNbViews()?></td>
			<td>by <b><?php echo $topic->getLastPost()->getUser()->getUsername()?></b><br />
			<?php echo timetools::dateTimeDiff($topic->getLastPost()->getCreatedAt());?>
			</td>
		</tr>
	<?php endforeach;?>
	<?php endif?>
	
	<?php if(count($board)>0):?>
	<?php foreach($board as $topic):?>
		<tr>
			<td style="width:450px">
			<?php echo image_tag("/sfDoctrineSimpleForumPlugin/images/new.gif", array("style"=>"vertical-align: -2px; margin-right: 5px;", "alt"=>"New"))?>
				<b><?php echo link_to($topic->getTitle(), "sf_doctrine_simple_forum_view_topic",  array("id"=>$topic->getId(), "slug"=>$topic->getSlug()))?></b>
				<br /><?php echo $topic->getUser()->getUsername()?>
			</td>
			<td><?php echo $topic->getPostCount()?></td>
			<td><?php echo $topic->getNbViews()?></td>
			<td><?php echo __("door %user%", array('%user%'=>'<b>'.$topic->getLastPost()->getUser()->getUsername().'</b>'), 'sfDoctrineSimpleForum')?><br />
			<?php echo timetools::dateTimeDiff($topic->getLastPost()->getCreatedAt());?>
			</td>
		</tr>
	<?php endforeach;?>
	<?php endif?>
	</tbody>
</table>
<?php if($sf_user->isAuthenticated()):?>
<? echo link_to(__("Create Topic", null, 'sfDoctrineSimpleForum'), "sf_doctrine_simple_forum_create_topic", array("id"=>$forum->getId()), array("class"=>"medium awesome"))?>
<?php endif;?>