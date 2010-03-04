<?php 
use_javascript('jquery.cycle.min.js'); 
use_javascript('cycle'); 
?>

<?php if($items->count() > 0): ?>
<div id="showcase">
	<div class="slideshow">
		<?php foreach($items as $item): ?>
		<img src="/uploads/showcase/125x125/<?php echo $item->getImage();?>" alt="<?php echo $item->getShortTitle(); ?>" />
		<?php endforeach;?>
	</div>
</div>
<?php endif; ?>