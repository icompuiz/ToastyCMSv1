<?php

$group_id = $this->Session->read('Auth.User.group_id');
$user_id = $this->Session->read('Auth.User.id');

if ( $group_id == 1 || $group_id == 2 ) {
	$admin = true;
} else {
	$admin = false;
}

function getTime($st_datetime, $en_datetime) {
	
	$st_datetime = explode(" ", $st_datetime);
	$st_date = explode("-", $st_datetime[0]);
	$st_time = explode(":", $st_datetime[1]);

	$en_datetime = explode(" ", $en_datetime);
	$en_date = explode("-", $en_datetime[0]);
	$en_time = explode(":", $en_datetime[1]);

	$st_date = date("F j, Y", mktime(0,0,0, $st_date[1], $st_date[2], $st_date[0]));
	$en_date = date("F j, Y", mktime(0,0,0, $en_date[1], $en_date[2], $en_date[0]));

	$st_time = date("h:i a", mktime($st_time[0], $st_time[1], $st_time[2],0,0,0));
	$en_time = date("h:i a", mktime($en_time[0], $en_time[1], $en_time[2],0,0,0));

	$sten_date = $st_date == $en_date;
	$sten_time = $st_time == $en_time;		

	// handle date
	$date_out = "";
	if ($sten_date) {
		$date_out .= $st_date;
		
		if ( $sten_time ) {
			$date_out .= " ${st_time}";
		} else {
			$date_out .= " ${st_time} - ${en_time}";
		}
	} else {
		$date_out .= " ${st_date} ${st_time}";
		$date_out .= " - ";
		$date_out .= " ${en_date} ${en_time}";
	}
	
	return $date_out;
	
}

function isPast($endDate) {

	$en_datetime = explode(" ", $endDate);
	$en_date = explode("-", $en_datetime[0]);
	$en_time = explode(":", $en_datetime[1]);

	$en_date = date("F j, Y", mktime(0,0,0, $en_date[1], $en_date[2], $en_date[0]));
	$today = date("F j, Y");
	
	return $today > $en_date;
}
?>

<?=$this->Html->addCrumb('Affiliates', array('controller' => 'affiliates','action' => 'index'))?>
<?=$this->Html->addCrumb($affiliate['Affiliate']['name'], array('controller' => 'affiliates','action' => 'view', $affiliate['Affiliate']['id']))?>
<?=$this->Html->addCrumb($affiliate['Affiliate']['name'] . "'s Events")?>


<?php

if ( count($events) > 0 )
{
$output = '';
foreach ($events as $event)
{
	$line = "<li>";
	if (isPast($event['Event']['end_time']))
	{
		$line .= "<section class='event past'>";
	
	} else {
		$line .= "<section class='event'>";
	}
	$line .= "<h2>".$html->link($event['Event']['title'], array('action' => 'view', $event['Event']['id']))."</h2>";
	$line .= "<h3>".getTime($event['Event']['start_time'],$event['Event']['end_time'])."</h3>";
	$line .= "<p>".$event['Event']['description']."</p>";
	
	if ( $admin || $event['User']['id'] == $user_id ) 
	{
		$line .= "<div class='action'><ul><li>" .$html->link('Edit', array('action' => 'edit', $event['Event']['id']))."</li><li>" .$this->Html->link(__('Delete', true), array('action' => 'delete', $event['Event']['id']), null, sprintf(__('Are you sure you want to delete %s?', true), $event['Event']['title']))."</li></ul></div>";

	}
	
	$line .= "</section>";
	$line .= "</li>";
	
	$output .= $line;
}
echo "<section id='event_list'><ul>$output</ul></section>";
} else {
 echo "<div class='message'>". $affiliate['Affiliate']['name'] . " has no events</div>";
}
?>