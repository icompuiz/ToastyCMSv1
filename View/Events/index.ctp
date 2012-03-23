<? 
function outputEvent($event,$past=false, $hack, $admin_mode=false) {
?>
<div class="event_post<?=$past==true ? " past" : ""?>">
			<div class="event_image">
				<?=$hack->Html->image(substr($event['Event']['picture'], 4))?>
			</div>
			<div class="event_info">
				<div class="event_title">
					<?=$hack->Html->link($event['Event']['title'], array('action' => 'view', $event['Event']['id']))?>
				</div>
				<div class="event_field">
					<div class="event_header">Time:</div>
					<div class="event_detail">
						<?=$hack->TimeFormat->getTime($event['Event']['start_time'], $event['Event']['end_time'])?>
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
				<? if ( $admin_mode ) {
					echo $hack->Actions->events_post($event);
				} ?>
			</div>
			<div class="clear"></div>
		</div>
<?
}

if ( isset($admin_mode) ) { 
	echo $this->Actions->events_index();
} ?>
<div class="events index">
	<div class="current_events">
	<h1 class="events_heading"><?php

		if (isset($owner)) {
			echo "${owner}'s ";
		}
		echo __('Upcoming Events');
		?>
	</h1>
	<?php
		foreach ($events as $event): 
		if ( $event['Event']['past'] )
		continue;
		outputEvent($event, false, $this, isset($admin_mode));
		endforeach ?>
	</div>
	<div class="past_events">
		<h1 class="events_heading"><?php
			if (isset($owner)) {
				echo "${owner}'s ";
			}
			echo __('Past Events');
			?>
		</h1>
		<?php
			foreach ($events as $event): 
			if ( !$event['Event']['past'] )
			continue;
			outputEvent($event, true, $this, isset($admin_mode));
			endforeach ?>
	</div>
</div>
