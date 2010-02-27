<?php 
use_javascript('carousel_lib'); 
use_javascript('carousel'); 
?>

<?php if($items->count() > 0): ?>
<div id="showcase">
	<ul class="slideshow">
		<?php foreach($items as $item): ?>
		<li>
			<img src="/uploads/showcase/125x125/<?php echo $item->getImage();?>" alt="<?php echo $item->getShortTitle(); ?>" />
		</li>
		<?php endforeach;?>
	</ul>
</div>
<?php endif; ?>