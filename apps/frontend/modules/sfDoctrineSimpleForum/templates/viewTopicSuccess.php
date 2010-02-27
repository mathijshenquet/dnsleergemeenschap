<?php use_helper("Date")?>


<script type="text/javascript">

$(function(){

	$(".comment-reply-link").click(function(){
	  $(".comment-reply.link").html();
	  var reply_el = "#reply-form-comment-" + this.id;
	  $(reply_el).slideToggle("slow");
	  $(this).toggleClass("active");
	});

});
 </script>
 
 <div id="respond" style="display:none">


</div>
<h3 class="toolbar"><?php echo $topic->getTitle()?></h3>
<ul id="crumbs">
	<li><?php echo link_to("Forum Index", "sf_doctrine_simple_forum_index")?></li>
	<li><?php echo link_to($topic->getForum()->getName(), "sf_doctrine_simple_forum_view_board", array("id"=>$topic->getForumId(), "slug"=>$topic->getForum()->getSlug()))?></li>
	<li><?php echo $topic->getTitle()?></li>
</ul>
<?php if($topic->getIsLocked()):?>
<p class="notice">
	<?php echo image_tag("/sfDoctrineSimpleForumPlugin/images/lock.png", array("style"=>"vertical-align: -3px; margin-right: 5px;"))?> 
	This thread is closed for posting.
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
         		<img alt='' src='http://www.gravatar.com/avatar/86d4d7ab1f67a450b74b7ec8a85cb759?s=32&amp;d=%3Cpath_to_url%3E&amp;r=G' class='avatar avatar-32 photo' height='32' width='32' />
         		<cite class="fn"><? echo $post->getUser()->getUsername() ?></cite> <span class="says">zegt:</span>		 <br />      
         	</div>
            <div class="comment-meta commentmetadata">
            	<a href="http://nspeaks.com/32/get-threaded-comments-on-your-blog/#comment-9471"><?php echo $post->getCreatedAt('U')?></a>
            </div>
      		<p><?php echo $post->getContent() ?></p>
      		<?php if(!$topic->getIsLocked()):?>
      		<div class="reply">
         		<a rel='nofollow' class='comment-reply-link' id="reply-link-<?php echo $post->getId()?>">Reageer</a>      </div>
     			<div id="reply-form-comment-reply-link-<? echo $post->getId()?>" style="height: 250px; display:none">
     				<form action="" method="post" id="reply_form">
						<br />
						<h4>Leave a Reply</h4>
							<p>Logged in as <b><?php echo $sf_user->getGuardUser()->getFullname()?></b></p>
							<p>
								<textarea name="comment" id="comment" cols="50%" rows="8" class="af" tabindex="6" ></textarea>
							</p>
						<input name="submit" type="submit" class="st" value="submit" id="submit" alt="submit" />
						<input type='hidden' name='comment_post_id' value='<?php echo $post->getId()?>' id='comment_post_id' />
						<input type='hidden' name='comment_parent' id='comment_parent' value='0' />
						</form>
     			</div>
     		<?php endif;?>

     		</div>
      		<?php if(count($post->getReplies())>0):?>
     			<?php foreach($post->getReplies() as $reply):?>
		     		<ul class='children'>
		   				<li class="comment byuser comment-author-<?php echo $reply->getUserId()?> odd alt depth-2" id="li-comment-<?php echo $reply->getId()?>">
		     				<div id="comment-<?php echo $reply->getId()?>">
		      				<div class="comment-author vcard">
		             			<div class="avatar avatar-32">
         							<img alt='' src='http://www.gravatar.com/avatar/86d4d7ab1f67a450b74b7ec8a85cb759?s=32&amp;d=%3Cpath_to_url%3E&amp;r=G' class='avatar avatar-32 photo' height='32' width='32' />
		    					</div>
		         				<cite class="fn"><?php echo $reply->getUser()->getFullname()?></cite> <span class="says">zegt:</span>		 <br />      
		         			</div>
		         			<br />
		            		<div class="comment-meta commentmetadata"><a href="http://nspeaks.com/32/get-threaded-comments-on-your-blog/#comment-10770"><?php echo $reply->getCreatedAt()?></a></div>
		      				<p><?php echo $reply->getContent()?></p>
				      		<?php if(!$topic->getIsLocked()):?>
				      		<div class="reply">
				         		<a rel='nofollow' class='comment-reply-link' id="reply-link-<?php echo $reply->getId()?>">Reageer</a>      </div>
				     			<div id="reply-form-comment-reply-link-<? echo $reply->getId()?>" style="height: 250px; display:none">
				     				<form action="" method="post" id="reply_form">
										<br />
										<h4>Leave a Reply</h4>
											<p>Logged in as <b><?php echo $sf_user->getGuardUser()->getFullname()?></b></p>
											<p>
												<textarea name="comment" id="comment" cols="50%" rows="8" class="af" tabindex="6" ></textarea>
											</p>
										<input name="submit" type="submit" class="st" value="submit" id="submit" alt="submit" />
										<input type='hidden' name='comment_post_id' value='<?php echo $reply->getId()?>' id='comment_post_id' />
										<input type='hidden' name='comment_parent' id='comment_parent' value='0' />
										</form>
				     			</div>
				     		<?php endif;?>
		     				<?php if(count($reply->getReplies())>0):?>
		     					<?php foreach($reply->getReplies() as $reply):?>
				     			<ul class='children'>
				   				<li class="comment byuser comment-author-<?php echo $reply->getUserId()?> odd alt depth-3" id="li-comment-<?php echo $reply->getId()?>">
						     		<div id="comment-<?php echo $reply->getId()?>">
				      				<div class="comment-author vcard">
				             			<div class="avatar avatar-32">
		         							<img alt='' src='http://www.gravatar.com/avatar/86d4d7ab1f67a450b74b7ec8a85cb759?s=32&amp;d=%3Cpath_to_url%3E&amp;r=G' class='avatar avatar-32 photo' height='32' width='32' />
				    					</div>
				         				<cite class="fn"><?php echo $reply->getUser()->getFullname()?></cite> <span class="says">zegt:</span>		 <br />      
				         			</div>
				         			<br />
				            		<div class="comment-meta commentmetadata"><a href="http://nspeaks.com/32/get-threaded-comments-on-your-blog/#comment-10770"><?php echo $reply->getCreatedAt()?></a></div>
				      				<p><?php echo $reply->getContent()?></p>
				      				<?php if(!$topic->getIsLocked()):?>
						      		<div class="reply">
						         		<a rel='nofollow' class='comment-reply-link' id="reply-link-<?php echo $reply->getId()?>">Reageer</a>      </div>
						     			<div id="reply-form-comment-reply-link-<? echo $reply->getId()?>" style="height: 250px; display:none">
						     				<form action="" method="post" id="reply_form">
												<br />
												<h4>Geef een reactie</h4>
													<p>als <b><?php echo $sf_user->getGuardUser()->getFullname()?></b></p>
													<p>
														<textarea name="comment" id="comment" cols="50%" rows="8" class="af" tabindex="6" ></textarea>
													</p>
												<input name="submit" type="submit" class="st" value="submit" id="submit" alt="submit" />
												<input type='hidden' name='comment_post_id' value='<?php echo $reply->getId()?>' id='comment_post_id' />
												<input type='hidden' name='comment_parent' id='comment_parent' value='0' />
												</form>
						     			</div>
						     			<?php endif;?>
				     				<?php if(count($reply->getReplies())>0):?>
				     					<?php foreach($reply->getReplies() as $reply):?>
					     				<ul class='children'>
						   				<li class="comment byuser comment-author-<?php echo $reply->getUserId()?> odd alt depth-4" id="li-comment-<?php echo $reply->getId()?>">
								     		<div id="comment-<?php echo $reply->getId()?>">
						      				<div class="comment-author vcard">
						             			<div class="avatar avatar-32">
				         							<img alt='' src='http://www.gravatar.com/avatar/86d4d7ab1f67a450b74b7ec8a85cb759?s=32&amp;d=%3Cpath_to_url%3E&amp;r=G' class='avatar avatar-32 photo' height='32' width='32' />
						    					</div>
						         				<cite class="fn"><?php echo $reply->getUser()->getFullname()?></cite> <span class="says">says:</span>		 <br />      
						         			</div>
						         			<br />
						            		<div class="comment-meta commentmetadata"><a href="http://nspeaks.com/32/get-threaded-comments-on-your-blog/#comment-10770"><?php echo $reply->getCreatedAt()?></a></div>
						      				<p><?php echo $reply->getContent()?></p>
								     		</div>
						     			</ul>
						     			<?php endforeach;?>
					     			<?php endif;?>
				     			</ul>
				     			<?php endforeach;?>
			     			<?php endif?>
		     		</ul>
     			<?php endforeach;?>
			<?php endif;?>
		</li>
	<?endforeach; ?>
	</ol>
<?php if($sf_user->isAuthenticated()):?>
	<?php if(!$topic->getIsLocked()):?>
	<form method="POST" action="">
		<h3>Reageer</h3>
	
	<ul style="list-style-type: none">
		<li><textarea name="thread_reply" style="height: 75px" ></textarea></li>
		<li><button type="submit">Reageer</button></li>
	</ul>
	</form>
	<?php endif;?>
<?php endif?>


