<?php

class RssFeedComponent extends Component
{

	
	public function getFeed($url) {
	
		$xmlArray = Xml::toArray(Xml::build($url));
		return $xmlArray;
	
	}
	
	public function bbcFeed($count=10) {
	
		// title
		// icon
		// text
		// link
		
		$feed = $this->getFeed("http://feeds.bbci.co.uk/news/rss.xml");
		$retArray['title'] = "BBC International News";
		$feed = $feed['rss'];
		$items = $feed['channel']['item'];
		
		$counter = 0;
		foreach ($items as $item) {
		
			$counter++;
			if ($counter > $count)
				break;
			
			
			if ( !isset($item['media:thumbnail'][1] ) ) {
				$tmp['icon'] = $item['media:thumbnail']['@url'];
			
			} else {
				$tmp['icon'] = $item['media:thumbnail'][1]['@url'];
			
			}
			
			$tmp['title'] = $item['title'];
			$tmp['text'] = $item['description'];
			$tmp['link'] = $item['link'];
			$retArray[] = $tmp;
			
			
		}
		
		return $retArray;
	
	}
	
	function twitterFeed($screenName, $count=10) {
	
		$url = "http://api.twitter.com/1/statuses/user_timeline.rss?screen_name=$screenName";
		$feed = $this->getFeed($url);
		$feed = $feed['rss'];
		$items = $feed['channel']['item'];
		$retArray['title']  = 'RIT Global Union Twitter';
		
		$counter = 0;
		foreach ($items as $item) {
		
			$counter++;
			if ($counter > $count)
				break;
			
			$date = strtotime($item['pubDate']);			
			$date = date("F d, Y", $date);
			
			$tmp['icon'] = "http://a0.twimg.com/profile_images/1124040897/at-twitter.png";			
			$tmp['title'] = $date;
			$tmp['text'] = $item['description'];
			$tmp['link'] = $item['link'];
			$retArray[] = $tmp;
			
			
		}
		
		return $retArray;
	
	}
	


}