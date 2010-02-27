<?php
$css[] = 'style/' . $template . '/css/home.css';
include 'header.php';
?>
<div id="content_box">
	<?php if(isset($menu)){ ?>
    <div id="side_menu">
    	<div class="wrap">
            <h3><?php echo $menu[title]; ?></h3>
            <?php if(count($menu[items]) > 0){ ?>
            <ul>
            	<?php foreach($menu[items] as $item){ ?>
                	<li><a href="<?php echo $item[link]; ?>"><?php echo $item[title]; ?></a></li>
                <?php } ?>
            </ul>
			<?php } ?>
         </div>
         <div class="bot"></div>
    </div>
    <div id="content">
        <div class="wrap">
            <div class="top"></div>
            <div class="cont">
				<div class="main">
                	<?php if(isset($side_bar)){ ?>
                    <div class="side">
                    	<?php foreach($side_bar as $side_menu){ ?>
                        <h2><?php echo $side_menu[title]; ?></h2>
                        <?php foreach($side_menu[content] as $item){ ?>
                        <div class="item">
                            <h4><?php echo $item[title]; ?></h4>
                            <div><?php echo $item[comment]; ?></div>
                        </div>
                    <?php } } ?>
                    </div>
                    <?php } ?>
                    <?php foreach($items as $item){ ?>
                        <div class="item">
                            <h3><?php echo $item[title]; ?></h3>
                            <div><?php echo $item[content]; ?></div>
                        </div>
                    <?php } ?>
                    <div class="clear"></div>
                 </div>
            </div>
        </div>
        <div class="bot"></div>
    </div>
    <div class="clear">
    </div>
    <?php }else{ ?>
    <div id="full_content">
    	<div class="wrap">
            <div class="top"></div>
            <div class="cont">
            	<div class="main">
                    <?php if(isset($side_bar)){ ?>
                    <div class="side">
                    	<?php foreach($side_bar as $side_menu){ ?>
                        <h2><?php echo $side_menu[title]; ?></h2>
                        <?php foreach($side_menu[content] as $item){ ?>
                        <div class="item">
                            <h4><?php echo $item[title]; ?></h4>
                            <div><?php echo $item[comment]; ?></div>
                        </div>
                    <?php } } ?>
                    </div>
                    <?php }
                    if(count($items)>1){
                    foreach($items as $item){ ?>
                        <div class="item">
                            <h2><?php echo $item[title]; ?></h2>
                            <div><?php echo $item[content]; ?></div>
                        </div>
                    <?php } }else{ ?>
                    	<div class="item">
                            <h1><?php echo $items[0][title]; ?></h1>
                            <div><?php echo $items[0][content]; ?></div>
                        </div>
                    <?php } ?>
                    <div class="clear"></div>
                 </div>
            </div>
        </div>
        <div class="bot"></div>
    </div>
    <?php } ?>
</div>
<?
include "footer.php";
?>