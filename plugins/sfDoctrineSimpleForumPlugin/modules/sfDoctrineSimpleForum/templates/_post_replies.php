<?php if(count($replies)>0):?>
<?php foreach($replies as $reply):?>
<ul class='children'>
   	<li class="comment byuser comment-author-<?php echo $reply->getUserId()?> odd alt depth-2" id="li-comment-<?php echo $reply->getId()?>">
     	<div id="comment-<?php echo $reply->getId()?>">
      		<div class="comment-author vcard">
             	<div class="avatar avatar-32">
         			<img alt='' src='http://www.gravatar.com/avatar/86d4d7ab1f67a450b74b7ec8a85cb759?s=32&amp;d=%3Cpath_to_url%3E&amp;r=G' class='avatar avatar-32 photo' height='32' width='32' />
    			</div>
         		<cite class="fn"><? echo $reply->getUser()->getUsername() ?></cite> <span class="says"><?php echo __("says", null, 'sfDoctrineSimpleForum'); ?>:</span><br />    
         	</div>
            <div class="comment-meta commentmetadata">
            	<a href="http://nspeaks.com/32/get-threaded-comments-on-your-blog/#comment-10770"><?php echo $reply->getCreatedAt('U')?></a>
            </div>
      		<p><?php echo $reply->getContent()?></p>
      		
      		<?php if(!$topic->getIsLocked()):?>
      		<div class="reply">
         		<a rel='nofollow' class='comment-reply-link' id="reply-link-<?php echo $reply->getId()?>"><?php echo __("Reply", null, 'sfDoctrineSimpleForum'); ?></a>
         	</div>
     		<div id="reply-form-comment-reply-link-<? echo $reply->getId()?>" style="height: 250px; display:none">
	     		<form action="" method="post" class="reply_form">
	     			<h4><?php echo __("Leave a Reply", null, 'sfDoctrineSimpleForum'); ?></h4>
					<p>
						<?php echo __("Logged in as %user%", array('%user%'=>'<b>'.$sf_user->getGuardUser()->getUsername().'</b>'), 'sfDoctrineSimpleForum'); ?><br />
						<textarea name="comment" class="comment af" cols="50%" rows="8" tabindex="6" ></textarea><br />
						<input name="submit" type="submit" value="submit" class="st submit" alt="submit" />
						<input type='hidden' name='comment_post_id' value='<?php echo $reply->getId()?>' class='comment_post_id' />
						<input type='hidden' name='comment_parent' class='comment_parent' value='0' />
					</p>
				</form>
     		</div>
     		<?php endif;?>
     		<?php include_partial('post_replies', array('replies'=>$reply->getReplies(), 'topic'=>$topic ))?>
     	</div>
	</li>
</ul>
<?php endforeach;?>
<?php endif;?>