<?php
	$members = $memberGroup['Member'];
	
	if ( isset($admin_mode) ) { 
		echo $this->Actions->memberGroups_view($memberGroup);
	} else { 
		$this->Html->addCrumb('About', array('controller' => 'content', 'action' => 'display', 'about'));
		$this->Html->addCrumb($memberGroup['Group']['name']);
	} 
?>
<div id="gallery">
	<h1><?=$memberGroup['Group']['name']?></h1>
	<ul class="gallery_list">
	<?php
		$counter = 1;
		foreach ($members as $member)
		{
			$icon = $this->Html->image
					(
						substr($member['Member']['avatar'],4),
						array(
							'alt' => $member['User']['full_name'],
							'url' => array('controller' => 'profiles', 'action' => 'view', $member['Member']['id']),
							'title' => $member['User']['full_name']
						)
					);
			$title = $member['User']['full_name'];
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