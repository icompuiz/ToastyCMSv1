<?php
App::uses('HttpSocket', 'Network/Http');
class VimeoGalleryComponent extends Component {

	function getVideos($account = null) {
		
		$vimeoVideos = "http://vimeo.com/api/v2/$account/videos.json";
		
		$results = $this->Http->get($vimeoVideos);
		$videos = json_decode($results, true);
		
		
		return $videos;

	}
	
	public function initialize($controller) {
		$this->Http = new HttpSocket();
	}
	
}