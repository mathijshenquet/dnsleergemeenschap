<?php foreach($posts as $post): ?>
<?php include_partial('list_item', array('post'=>$post)); ?>
<?php endforeach?>
<?php include_partial('load_next', array('page'=>$page)); ?>