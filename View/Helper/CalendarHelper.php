<?php

class CalendarHelper extends AppHelper {

	public $helpers = array('Html', 'Form');
	public $weekdays = array ('Sunday','Monday', 'Tuesday','Wednesday',
								 'Thursday', 'Friday','Saturday');
	
	function blankDay($current) {
	
		$weekday = $this->weekdays[$current];
		return "<div class='$weekday blank calendar_day'></div>";
		
	}
	
	function regularDay($current,$day, $today=false) {
	
		if ($today) {
			$today = "today";
		}
	
		$weekday = $this->weekdays[$current];

		return "<div class='$today $weekday regular calendar_day'><div class='day_num'>$day</div></div>";
		
		
	}
	
	function eventDay($current, $day, $events, $today=false) {
		
		$weekday = $this->weekdays[$current];
		
		if ($today) {
			$today = "today";
		}
	
		$event_list ="";
		foreach($events as $event) {
			$event_list .= "<li class='event'>".$this->Html->link($event['Event']['title'], array('controller' => 'events', 'action' => 'view', $event['Event']['id']), array('title' => $event['Event']['description']))
			."</li>";
		}
		$event_list ="<ul class='event_list'>$event_list</ul>";
		
		
		return "<div class='$today $weekday event calendar_day'><div class='day_num'>$day</div>$event_list</div>";
		
		
	}
	
	function weekdays() {
	
		$string = "";
		foreach ($this->weekdays as $item) {
		
			$string .= "<li class='weekday_li'><div class='weekday'>$item</div></li>";
			
		}
		return "<ul class='weekday_list'>$string</ul>";
	
	}
	
}
