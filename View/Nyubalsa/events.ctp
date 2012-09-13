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
	<?=$this->Html->image('nyubalsa/upcoming.gif', array('class'=>'upcoming'))?>
</div>
<div class="clear">&nbsp;</div>
<div class="page_picture">
<script language="javascript">
				showImage();
			</script>
	<?=$this->Html->image('nyubalsa/eventsh.gif', array('class'=>'eventsh'))?>
</div>
<div class="page_text">
<div class="current_events">
	<?php
		foreach ($events as $event): 
		if ( $event['Event']['past'] )
		continue;
		outputEvent($event, false, $this, isset($admin_mode));
		endforeach ?>
	</div>
</div>
<div class="clear">&nbsp;</div>
	<div class="clear"></div>
	
<? 
function outputEvent($event,$past=false, $hack, $admin_mode=false) {
?>
<div class="event_post">
			<div class="event_info">
				<div class="event_title">
					<?=$event['Event']['title']?>
				</div>
				<div class="event_time">
					<?=$hack->TimeFormat->getTime($event['Event']['start_time'], $event['Event']['end_time'])?>
				</div>
				<div class="event_location">
						<?=$event['Event']['location']?>
				</div>
			</div>
			<div class="clear"></div>
		</div>
<?
}
 ?>