<?php
	$this->Html->addCrumb('Events', array('controller' => 'events', 'action' => 'index'));
	$this->Html->addCrumb('Calendar of Events');

	$current_month = $calendar[0][0];
	$first_day = $calendar[0][1];
	unset($calendar[0]);
	

	
	

?>
<div id="calendar">
	<div id="calendar_controls">
		<div id="previous_month" class="calendar_control">
			<?=$this->Html->link(date('M', $prev), array('action' => 'calendar', date('Y', $prev), date('m', $prev)))?>
		</div>
		<div id="current_month" class="calendar_control">
			<h1><?=$current_month?></h1>
		</div>
		<div id="next_month" class="calendar_control">
			<?=$this->Html->link(date('M', $next), array('action' => 'calendar', date('Y', $next), date('m', $next)))?>
		</div>
		<div class="clear"></div>
	</div>
	<div id="calendar_headers">
		<?=$this->Calendar->weekdays()?>
		<div class="clear"></div>
	</div>
	<div id="calendar_body">
		<?php
			$day_counter = 0;
			if ( $first_day != 0 ) {
			
				for ( $i = 0; $i < $first_day; $i++ ) {
					$days[] = $this->Calendar->blankDay($day_counter);
					$day_counter++;
					$day_counter %= 7;
				}
					
			} 
			foreach ( array_keys($calendar) as $day ) {
				
				if ( isset($calendar[$day]['Events']) ) {
					$days[] = $this->Calendar->eventDay($day_counter, $day, $calendar[$day]['Events'], isset($calendar[$day]['today']));
				} else {
					$days[] = $this->Calendar->regularDay($day_counter, $day, isset($calendar[$day]['today']));
				}
				$day_counter++;
				$day_counter %= 7;
				
				if ( $day_counter == 0 ) {
					$days[] = "week_end";
				}
			}
			
			echo "<ul class='days_list'>";
			
			foreach ( $days as $day ) {
			
				if ( $day != "week_end" )
					echo "<li class='day_li'>$day</li>\n";
				else 
					echo "<div class='clear'></div>";
			
			}
			echo "</ul>";
		?>
	</div>
	<div class="clear"></div>

</div>

</section>