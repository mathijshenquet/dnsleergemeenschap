<?php use_helper("Date", "I18N", "Javascript")?>

<?php echo javascript_tag('
$(function(){

	$(".comment-reply-link").click(function(){
	  $(".comment-reply.link").html();
	  var reply_el = "#reply-form-comment-" + this.id;
	  $(reply_el).slideToggle("slow");
	  $(this).toggleClass("active");
	});

});
'); ?>
 
<div id="respond" style="display:none">

</div>
<h3 class="toolbar"><?php echo $topic->getTitle()?></h3>
	<ul id="crumbs">
		<li><?php echo link_to("Forum Index", "sf_doctrine_simple_forum_index")?></li>
		<li><?php echo link_to($topic->getForum()->getCategories()->getName(), "sf_doctrine_simple_forum_view_board", array("id"=>$topic->getForumId(), "slug"=>$topic->getForum()->getSlug()))?></li>
		<li><?php echo $topic->getTitle()?></li>
	</ul>
<br />
<?php if($topic->getIsLocked()):?>
<p class="notice">
	<?php echo image_tag("/sfDoctrineSimpleForumPlugin/images/lock.png", array("style"=>"vertical-align: -3px; margin-right: 5px;"))?> 
	<?php echo __("This thread is closed for posting.", null, 'sfDoctrineSimpleForum'); ?>
</p>
<?php endif;?>
<?php if($sf_user->hasFlash('success')): ?>
        <p class="success">
				<?php echo $sf_user->getFlash('success'); ?>
		</p>
<?php endif; ?>

<ol class="commentlist">
	<?php  $count = 0 ?>
	<?php foreach($topic->getUnrepliedPosts() as $post):?>
	<?php $count ++ ?>
	<li class="comment even thread-even depth-1 <?php echo (!($count % 2))? "odd" : ""?>" id="li-comment-<?php echo $post->getId()?>">
		<div id="comment-<?php echo $post->getId()?>">
			<div class="comment-author vcard">
             	<div class="avatar avatar-32">
         			<img alt='' src='http://www.gravatar.com/avatar/86d4d7ab1f67a450b74b7ec8a85cb759?s=32&amp;d=%3Cpath_to_url%3E&amp;r=G' class='avatar avatar-32 photo' height='32' width='32' />
    			</div>
         		<cite class="fn"><? echo $post->getUser()->getUsername() ?></cite> <span class="says"><?php echo __("says", null, 'sfDoctrineSimpleForum'); ?>:</span><br />    
         	</div>
            <div class="comment-meta commentmetadata">
            	<a href="http://nspeaks.com/32/get-threaded-comments-on-your-blog/#comment-10770"><?php echo $post->getCreatedAt('U')?></a>
            </div>
      		<p><?php echo $post->getContent()?></p>
      		
      		<?php if(!$topic->getIsLocked()):?>
      		<div class="reply">
         		<a rel='nofollow' class='comment-reply-link' id="reply-link-<?php echo $post->getId()?>"><?php echo __("Reply", null, 'sfDoctrineSimpleForum'); ?></a>
         	</div>
     		<div id="reply-form-comment-reply-link-<? echo $post->getId()?>" style="height: 250px; display:none">
	     		<form action="" method="post" class="reply_form">
					<h4><?php echo __("Leave a Reply", null, 'sfDoctrineSimpleForum'); ?></h4>
					<p>
						<?php echo __("Logged in as %user%", array('%user%'=>'<b>'.$sf_user->getGuardUser()->getUsername().'</b>'), 'sfDoctrineSimpleForum'); ?><br />
						<textarea name="comment" class="comment af" cols="50%" rows="8" tabindex="6" ></textarea><br />
						<input name="submit" type="submit" value="submit" class="st submit" alt="submit" />
						<input type='hidden' name='comment_post_id' value='<?php echo $post->getId()?>' class='comment_post_id' />
						<input type='hidden' name='comment_parent' class='comment_parent' value='0' />
					</p>
				</form>
     		</div>
     		<?php endif;?>

     	</div>
     	<?php include_partial('post_replies', array('replies'=>$post->getReplies(), 'topic'=>$topic)); ?>
	</li>
	<?endforeach; ?>
</ol>
<?php if($sf_user->isAuthenticated() && !$topic->getIsLocked()):?>
	<form method="post" action="">
		<h3><?php echo __("Reply", null, 'sfDoctrineSimpleForum'); ?></h3>
	
	<ul style="list-style-type: none">
		<li><textarea rows="10" cols="10" name="thread_reply" style="height: 75px"></textarea></li>
		<li><button type="submit"><?php echo __("Do Reply", null, 'sfDoctrineSimpleForum'); ?></button></li>
	</ul>
	</form>
<?php endif?>


