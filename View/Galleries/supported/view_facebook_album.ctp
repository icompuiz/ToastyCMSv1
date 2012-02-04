<?php
	$this->Html->addCrumb('Galleries', array("action" => "index"));
	$this->Html->addCrumb($gallery['Gallery']['name'], array("action" => "view", $gallery['Gallery']['id']), array('class' => 'fb_album'));
	$this->Html->addCrumb($pictures['name']);
?>
<div id="gallery">
	<h1><?=$pictures['name']?></h1>
	<ul class="gallery_list">
	<?php
		$counter = 1;
		foreach ($pictures['pictures'] as $picture)
		{	
			$pic = $this->Html->image
					(
						$picture['icon'],
						array
						(
							'alt' => $pictures['name'],
							'url' => $picture['source'],
							'class' => 'facebook_image',
							'id' => $picture['id'],
						)
					);
			$clear = $counter % 4 == 0 ? '<div class="clear"></div>' : '';
			if ( $counter == 0 ) $clear = '';

			echo "<li class='gallery_li'><div class='gallery_icon'><div class='img_wrap'>$pic</div></div></li>$clear";
			$counter++;
		}
	
	?>
	
	</ul>	<div class="clear"></div>

</div>
<div id="loading">
</div>