<h1>Ideabox List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Title</th>
      <th>Body</th>
      <th>Type</th>
      <th>Parent</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($idea_item_list as $idea_item): ?>
    <tr>
      <td><a href="<?php echo url_for('ideabox/edit?id='.$idea_item->getId()) ?>"><?php echo $idea_item->getId() ?></a></td>
      <td><?php echo $idea_item->getTitle() ?></td>
      <td><?php echo $idea_item->getBody() ?></td>
      <td><?php echo $idea_item->getType() ?></td>
      <td><?php echo $idea_item->getParentId() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('ideabox/new') ?>">New</a>
