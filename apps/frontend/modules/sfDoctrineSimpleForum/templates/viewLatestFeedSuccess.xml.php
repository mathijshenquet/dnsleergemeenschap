<?php echo '<?xml version="1.0" encoding="UTF-8" ?>' ?>
<feed xmlns="http://www.w3.org/2005/Atom" xml:lang="en">
  <title>Latest messages from the forum</title>
  <link rel="alternate" href="<?php echo url_for("@sf_doctrine_simple_forum_view_latest_feed", 'absolute=true')?>"></link>  
  <id><?php echo url_for("@sf_doctrine_simple_forum_view_latest_feed", 'absolute=true')?></id>
  <updated><?php echo date("Y-m-d") ?></updated>
 <?php foreach($latest_posts as $post):?>
<entry>
  <title type="html"><?php  echo $post->getTopic()->getTitle()?>: </title>
  <link rel="alternate" href="http://www.erepublik.com/en/forum/topic/123672/yes-you-saw-it-coming-from-a-mile-away/1"></link>
  <updated><?php echo $post->getCreatedAt()?></updated>
  <id><?php echo $post->getId()?></id>
  <summary type="html"><?php echo $post->getContent()?></summary>
  <content type="text/html"><![CDATA[<?php echo $post->getContent()?>]]></content>
</entry>
<?php endforeach;?>

</feed>
