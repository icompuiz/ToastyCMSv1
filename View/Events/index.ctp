<? if ( isset($admin_mode) ) { 
	echo $this->Actions->events_index();
} ?>
<div class="events index">
	<h2><?php
		if (isset($owner)) {
			echo "${owner}'s ";
		}
		echo __('Events');
		?>
	</h2>
	<?php
		$i = 0;
		foreach ($events as $event): ?>
		<div class="event_post">
			<div class="event_image">
				<?=$this->Html->image(substr($event['Event']['picture'], 4))?>
			</div>
			<div class="event_info">
				<div class="event_title">
					<?=$this->Html->link($event['Event']['title'], array('action' => 'view', $event['Event']['id']))?>
				</div>
				<div class="event_field">
					<div class="event_header">Time:</div>
					<div class="event_detail">
						<?=$this->TimeFormat->getTime($event['Event']['start_time'], $event['Event']['end_time'])?>
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
						<?=$event['Event']['description']?>
					</div>
					<div class="clear"></div>
				</div>
				<? if ( isset($admin_mode) ) {
					echo $this->Actions->events_post($event);
				} ?>
			</div>
			<div class="clear"></div>
		</div>
	<?php endforeach ?>
</div>
