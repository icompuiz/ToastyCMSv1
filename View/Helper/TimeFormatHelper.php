<?php

class TimeFormatHelper extends AppHelper {

	public function getTime($st_datetime, $en_datetime) {
	
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
	
	function isCurrent($current, $start, $endDate) {
	
		$cu_datetime = explode(" ", $current);
		$cu_date = explode("-", $cu_datetime[0]);
		$cu_time = explode(":", $cu_datetime[1]);
	
		$st_datetime = explode(" ", $start);
		$st_date = explode("-", $st_datetime[0]);
		$st_time = explode(":", $st_datetime[1]);
	
		$en_datetime = explode(" ", $endDate);
		$en_date = explode("-", $en_datetime[0]);
		$en_time = explode(":", $en_datetime[1]);

		$en_date = date("F j, Y", mktime(0,0,0, $en_date[1], $en_date[2], $en_date[0]));
		$today   = date("F j, Y", mktime(0,0,0, $cu_date[1], $cu_date[2], $cu_date[0]));
		$st      = date("F j, Y", mktime(0,0,0, $st_date[1], $st_date[2], $st_date[0]));
		
		return $today < $en_date && $today > $st;
	
	}
	
}
?>
