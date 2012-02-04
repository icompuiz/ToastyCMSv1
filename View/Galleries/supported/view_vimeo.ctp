<?php
	echo $this->Html->addCrumb('Galleries', array("action" => "index"));
	echo $this->Html->addCrumb($gallery['Gallery']['name']);

?>
<div id="gallery">
	<ul class="gallery_list">
	<?php
		$counter = 1;
		foreach ($videos as $vid)
		{
			$icon = $this->Html->image
					(
						$vid['thumbnail_medium'], 
						array
						(  
								'alt'   => $vid['title'],
								'url'   => $vid['url'],
								'title' => $vid['title'],
								'class' => 'vimeo_image',
								'rel'   => $vid['title'],
								'id'    => $vid['id'],
								'link'	=> $vid['url']
						) 
					);
			$title = $vid['title'];
			$clear = $counter % 4 == 0 ? '<div class="clear"></div>' : '';
			if ( $counter == 0 ) $clear = '';
			echo "<li class='gallery_li'><div class='gallery_icon vm_album'><div class='img_wrap'>$icon</div></div><div class='item_title'>$title</div></li>$clear";
			$counter++;
		}
	?>
	</ul>
	<div class="clear"></div>
</div>
<div id="loading">
</div>