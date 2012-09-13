<script language="JavaScript">
		
	var theImages = new Array() 

	theImages[0] = '<?=$this->Html->image('nyubalsa/home01.jpg', array('class'=>'home_random_img'))?>';
	theImages[1] = '<?=$this->Html->image('nyubalsa/home02.jpg', array('class'=>'home_random_img'))?>';
	theImages[2] = '<?=$this->Html->image('nyubalsa/home03.jpg', array('class'=>'home_random_img'))?>';
	theImages[3] = '<?=$this->Html->image('nyubalsa/home04.jpg', array('class'=>'home_random_img'))?>';
	theImages[4] = '<?=$this->Html->image('nyubalsa/home05.jpg', array('class'=>'home_random_img'))?>';
	theImages[5] = '<?=$this->Html->image('nyubalsa/home06.jpg', array('class'=>'home_random_img'))?>';
	theImages[6] = '<?=$this->Html->image('nyubalsa/home07.jpg', array('class'=>'home_random_img'))?>';
	theImages[7] = '<?=$this->Html->image('nyubalsa/home08.jpg', array('class'=>'home_random_img'))?>';
	theImages[8] = '<?=$this->Html->image('nyubalsa/home09.jpg', array('class'=>'home_random_img'))?>';
	theImages[9] = '<?=$this->Html->image('nyubalsa/home10.jpg', array('class'=>'home_random_img'))?>';

	var j = 0
	var p = theImages.length;
	var whichImage = Math.round(Math.random()*(p-1));
	function showImage(){
	document.write(theImages[whichImage]);
	}
</script>

<div class="page_heading">
	<?=$this->Html->image('nyubalsa/wallpaper.gif', array('class'=>'wallpaper'))?>
</div>
<div class="clear">&nbsp;</div>
<div class="page_picture">
<script language="javascript">
				showImage();
			</script>
	<?=$this->Html->image('nyubalsa/mediah.gif', array('class'=>'mediah'))?>
</div>
<div class="page_text">
<div class="instructions"><p>Click an image below to open a new window, then right click the image and select "Save Picture As":</p></div>
<div class="wallpapers">
<ul>
	<li><?=$this->Html->image('mediafiles/01.jpg', array('url' => "$url/webroot/img/mediafiles/01nyubalsa.jpg"))?></li>
	<li><?=$this->Html->image('mediafiles/02.jpg', array('url' => "$url/webroot/img/mediafiles/02nyubalsa.jpg"))?></li>
	<li><?=$this->Html->image('mediafiles/03.jpg', array('url' => "$url/webroot/img/mediafiles/03nyubalsa.jpg"))?></li>
	<li><?=$this->Html->image('mediafiles/04.jpg', array('url' => "$url/webroot/img/mediafiles/04nyubalsa.jpg"))?></li>
	<li><?=$this->Html->image('mediafiles/05.jpg', array('url' => "$url/webroot/img/mediafiles/05nyubalsa.jpg"))?></li>
	<li><?=$this->Html->image('mediafiles/06.jpg', array('url' => "$url/webroot/img/mediafiles/06nyubalsa.jpg"))?></li>
	<li><?=$this->Html->image('mediafiles/07.jpg', array('url' => "$url/webroot/img/mediafiles/07nyubalsa.jpg"))?></li>
	<li><?=$this->Html->image('mediafiles/08.jpg', array('url' => "$url/webroot/img/mediafiles/08nyubalsa.jpg"))?></li>
</ul>
<div class="clear">&nbsp;</div>
</div>
</div>
<div class="clear">&nbsp;</div>
<div class="clear"></div>



<div id="gallery">
	<div class="instructions"><p>Click the thumbnail below to open the album:</p></div>
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
								'url'   => array('controller' => 'galleries', 'action' => 'facebook', $gallery['Gallery']['id'], $album['id'], str_replace(" ", "_", $album['name'])),
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
			echo "<li class='gallery_li'><div class='gallery_icon fb_album'><div class='img_wrap'>$icon</div></div><div class='item_title'>".$this->Html->link($title, array('controller' => 'galleries', 'action' => 'facebook', $gallery['Gallery']['id'], $album['id'], str_replace(" ", "_", $album['name'])))."</div></li>$clear";
			$counter++;
		}
	?>
	</ul>
	<div class="clear"></div>
</div>
<div id="loading">
</div>
<?=$this->Html->image('nyubalsa/logodown.gif')?>
<div class="clear"></div>
<div class="logos">
<ul>
	<li>
		<p class="logo_name">NYU BALSA Shield - Full Color</p>
		<?=$this->Html->image('mediafiles/logo01.jpg', array('url' => "$url/webroot/img/mediafiles/logo01.jpg"))?>
		<p class="download_options"><?=$this->Html->link('JPG', "$url/webroot/img/mediafiles/logo01.jpg")?> | <?=$this->Html->link('PSD', "$url/webroot/mediafiles/nyubalsashieldfullcolor300dpi.psd")?></p>
	</li>
	<li>
		<p class="logo_name">NYU BALSA Shield - Black & White</p>
		<?=$this->Html->image('mediafiles/logo02.jpg', array('url' => "$url/webroot/img/mediafiles/logo02.jpg"))?>
		<p class="download_options"><?=$this->Html->link('JPG', "$url/webroot/img/mediafiles/logo02.jpg")?> | <?=$this->Html->link('EPS', "$url/webroot/mediafiles/nyubalsashield.eps")?></p>

	</li>
	<li>
		<p class="logo_name">NYU BALSA Shield - Black & White</p>
		<?=$this->Html->image('mediafiles/logo03.jpg', array('url' => "$url/webroot/img/mediafiles/logo03.jpg"))?>
		<p class="download_options"><?=$this->Html->link('JPG', "$url/webroot/img/mediafiles/logo03.jpg")?> | <?=$this->Html->link('EPS', "$url/webroot/mediafiles/nyubalsatextlogo.eps")?></p>
	</li>
	<li>
		<p class="logo_name">NYU Logo - Purple</p>
		<?=$this->Html->image('mediafiles/logo04.jpg', array('url' => "$url/webroot/img/mediafiles/logo04.jpg"))?>
		<p class="download_options"><?=$this->Html->link('JPG', "$url/webroot/img/mediafiles/logo04.jpg")?> | <?=$this->Html->link('EPS', "$url/webroot/mediafiles/nyulogopurple.eps")?></p>
	</li>
	<li>	
		<p class="logo_name">NYU Torch - Purple</p>
		<?=$this->Html->image('mediafiles/logo05.jpg', array('url' => "$url/webroot/img/mediafiles/logo05.jpg"))?>
		<p class="download_options"><?=$this->Html->link('JPG', "$url/webroot/img/mediafiles/logo05.jpg")?> | <?=$this->Html->link('EPS', "$url/webroot/mediafiles/nyutorchpurple.eps")?></p>
	</li>
	<li>
		<p class="logo_name">NYU Logo - Black</p>
		<?=$this->Html->image('mediafiles/logo06.jpg', array('url' => "$url/webroot/img/mediafiles/logo06.jpg"))?>
		<p class="download_options"><?=$this->Html->link('JPG', "$url/webroot/img/mediafiles/logo06.jpg")?> | <?=$this->Html->link('EPS', "$url/webroot/mediafiles/nyulogoblack.eps")?></p>
	</li>
	<li>
		<p class="logo_name">NYU Torch - Black</p>
		<?=$this->Html->image('mediafiles/logo07.jpg', array('url' => "$url/webroot/img/mediafiles/logo07.jpg"))?>
		<p class="download_options"><?=$this->Html->link('JPG', "$url/webroot/img/mediafiles/logo07.jpg")?> | <?=$this->Html->link('EPS', "$url/webroot/mediafiles/nyutorchblack.eps")?></p>
	</li>
</ul>
</div>
<div class="clear"></div>