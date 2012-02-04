<?php
	echo $this->Html->addCrumb('Galleries', array("action" => "index"));
	echo $this->Html->addCrumb($gallery['Gallery']['name']);

?>



<div id="gallery">
	<ul class="gallery_list">
	<?php
		$counter = 1;
		foreach ($albums as $album)
		{
			$icon = $this->Html->image
					(
						$album['icon'], 
						array
						(  
								'alt'   => $album['name'],
								'url'   => array('action' => 'facebook', $gallery['Gallery']['id'], $album['id'], str_replace(" ", "_", $album['name'])),
								'title' => $album['name'],
								'class' => 'facebook_image',
								'rel'   => $album['name'],
								'id'    => $album['id'],
								'link'	=> $album['link']
						) 
					);
			$title = $album['name'];
			$clear = $counter % 4 == 0 ? '<div class="clear"></div>' : '';
			if ( $counter == 0 ) $clear = '';
			echo "<li class='gallery_li'><div class='gallery_icon fb_album'><div class='img_wrap'>$icon</div></div><div class='item_title'>$title</div></li>$clear";
			$counter++;
		}
	?>
	</ul>
	<div class="clear"></div>
</div>
<div id="loading">
</div>