<<?php echo '?'; ?>xml version="1.0" encoding="utf-8"?>
<progress>
<?php foreach ($sleutelinzichten as $sleutelinzicht): ?>
  <sleutelinzicht state="<?php echo $sleutelinzicht->getStatus()->get(0)->getUser() ?>" niveau="<?php echo $sleutelinzicht->getNiveau(); ?>">
  </sleutelinzicht>
<?php endforeach; ?>
</progress>