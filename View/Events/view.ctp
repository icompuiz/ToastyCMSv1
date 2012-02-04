<? 
if ( isset($admin_mode) ) { 
	echo $this->Actions->events_view2($event);
} else { 
	echo $this->Actions->events_view($event);
} 
?>
<div class="event_view">
	<div class="event_title">
		<h1><?=$event['Event']['title']?></h1>
	</div>
	<div class="event_left">
		<div class="event_image">
			<?=$this->Html->image(substr($event['Event']['picture'],4))?>
		</div>
	</div>
	<div class="event_right">
		<div class="event_info">
			<div class="event_field">
				<div class="event_header">Time:</div>
				<div class="event_detail">
					<?=$this->TimeFormat->getTime($event['Event']['start_time'], $event['Event']['end_time'])?>
				</div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
			<div class="event_field">
				<div class="event_header">Owner:</div>
				<div class="event_detail">
					<?=$this->Html->link($event['User']['full_name'], array('action' => 'user', $event['User']['id']))?>
				</div>
				<div class="clear"></div>
			</div>
			<div class="event_field">
				<div class="event_header">Location:</div>
				<div class="event_detail">
					<?=$event['Event']['location']?>
				</div>
				<div class="clear"></div>

			</div>
			<div class="event_field event_description">
				<div class="event_detail">
					<?=$event['Event']['full_description']?>
				</div>
				<div class="clear"></div>
			</div>
			<? if ( $event['Event']['banner_image'] != "NOT FEATURED" ) { ?>
			<div class="event_banner">
				<?=$this->Html->image(substr($event['Event']['banner_image'],4))?>
			</div>
			<? } ?>
		</div>
		<div class="clear"></div>

	</div>
</div>
	