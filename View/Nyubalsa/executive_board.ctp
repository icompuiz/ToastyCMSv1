<?php
	$members = $execboard['Member'];
	$executiveBoardMembers = $execboard['Member'];
	$committeeMembers = $committees['Member'];
	
	$members = array_merge($executiveBoardMembers, $committeeMembers);
	
?>
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
	<?=$this->Html->image('nyubalsa/balsahist.gif', array('class'=>'balsahist'))?>
</div>
<div class="clear">&nbsp;</div>
<div class="page_picture">
<script language="javascript">
				showImage();
			</script>
	<?=$this->Html->image('nyubalsa/execboardh.gif', array('class'=>'execboardh'))?>
</div>
<div class="page_text">
<p style="width: 240px;">BALSA was founded on the campus of NYU and the founding chapter of BALSA has flourished for 40 years. With over 100 members, NYU BALSA continues to touch and enhance the lives of not only its members, but the students of NYU and the community at large.</p>
<img src="../../../../cms/webroot/img/nyubalsa/shield.gif" alt="" width="98" height="115" />
<p>&nbsp;</p>
<p>The NYU Black Allied Law Students Association exists to articulate and promote the needs and goals of Black law students, increase the professional competence among Black attorneys, prepare and encourage secondary and collegiate students for entry into law school, and increase the awareness and answer the needs of the Black community. &nbsp;&nbsp;&nbsp;</p>
</div>
<div class="clear">&nbsp;</div>
	<div class="clear"></div>

<?=$this->Html->image('nyubalsa/execboard.gif', array('class'=>'execboardh'))?>
<div id="gallery">
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
							'title' => $member['User']['full_name']
						)
					);
			$title = $member['User']['full_name'];
			$position = $this->ProfileField->viewParse($member['Profile']['fields']['position']);
			$clear = $counter % 6 == 0 ? '<div class="clear"></div>' : '';
			if ( $counter == 0 ) $clear = '';
			?>
				<li class='gallery_li'>
					<div class='img_wrap'>
						<?=$icon?>
					</div>
					<div class='item_title'><?=$title?></div>
					<div class='item_position'><?=$position?></div>
				</li>
			<?
			echo $clear;
			$counter++;
		}
		
		
	?>
	</ul>
	<div class="clear"></div>
</div>