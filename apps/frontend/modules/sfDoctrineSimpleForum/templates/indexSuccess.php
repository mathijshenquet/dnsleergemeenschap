  <?php use_helper("Date")?>
  <table id="thread_table">
  	<thead>
    <tr>
      <th class="forum_name"><?php echo 'Forum' ?></th>
      <th class="forum_threads"><?php echo 'Topics' ?></th>
      <th class="forum_posts"><?php echo 'Reacties' ?></th>
      <th class="forum_recent"><?php echo 'Laatste reactie' ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($categorys as $category): ?>
        <tr class="category">
          <td class="category_header" colspan="4"><?php echo $category->getName() ?></td>
        </tr>
        <?php foreach($category->getForums() as $forum): ?>
    		<?php include_partial('sfDoctrineSimpleForum/forum', array('forum' => $forum)) ?>
    	<?php endforeach;?>
    <?php endforeach; ?>
    </tbody>
  </table>