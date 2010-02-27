<h1>Help List</h1>

<ul>
    <?php foreach ($articles as $article): ?>
    <li>
    	<a href="<?php echo url_for('help/show?id='.$article->getId()) ?>"><?php echo $article->getTitle() ?></a>
    </li>
    <?php endforeach; ?>
</ul>

<a href="<?php echo url_for('help/new') ?>">New</a>