<?php
	echo $this->Html->addCrumb('Galleries');
?>
<div id="gallery">
	<ul class="gallery_list">
	<?php
		$counter = 1;
		foreach ($galleries as $gallery)
		{
			$icon = $this->Html->image
					(
						substr($gallery['Gallery']['picture'],4), 
						array
						(  
								'alt'   => $gallery['Gallery']['name'],
								'url'   => array('action' => 'view', $gallery['Gallery']['id']),
								'title' => $gallery['Gallery']['name'],
								'class' => 'gallery_image',
								'rel'   => $gallery['Gallery']['name'],
								'id'    => $gallery['Gallery']['id'],
						) 
					);
			$title = $gallery['Gallery']['name'];
			$clear = $counter % 4 == 0 ? '<div class="clear"></div>' : '';
			if ( $counter == 0 ) $clear = '';
			echo "<li class='gallery_li'><div class='gallery_icon gal'><div class='img_wrap'>$icon</div></div><div class='item_title'>$title</div></li>$clear";
			$counter++;
		}
	?>
	</ul>
	<div class="clear"></div>
</div>
<div id="loading">
</div>