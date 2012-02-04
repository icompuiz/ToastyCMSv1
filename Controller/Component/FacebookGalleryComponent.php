<?php
App::uses('HttpSocket', 'Network/Http');
class FacebookGalleryComponent extends Component {

	function getAlbums($account = null) {
		
		$facebookAlbums = "https://graph.facebook.com/$account/albums";
		
		$results = $this->Http->get($facebookAlbums);
		$albums = json_decode($results, true);
		
		
		$albums = isset($albums['data']) ? $albums['data'] : array();
		
		// pr($albums); exit;
		
		$album_info = array();
		
		foreach($albums as $album) {
		
			if ( $album['name'] != "Profile Pictures")
			{
				$cur = array();
				$cur['id'] = $album['id'];
				$cur['name'] = $album['name'];
				$cur['link'] = $album['link'];
				$cur['icon'] = $this->getIcon($cur['id']);
				$album_info[] = $cur;
				// break;
			}
		}
		
		return $album_info;

	}
	
	function getPhotos($aid=null, $albumName = null) 
	{
		if ( $aid) 
		{
			
			$facebookAlbum = "https://graph.facebook.com/$aid/photos?limit=300";
			$results = $this->Http->get($facebookAlbum);
			$pictures = json_decode($results, true);			
			$pictures = $albums = isset($pictures['data']) ? $pictures['data']: array();
			$pictures_info = array();
						
			foreach ($pictures as $picture)
			{
				$cur['id'] = $picture['id'];
				$cur['link'] = $picture['link'];
				$cur['source'] = $picture['source'];
				$cur['icon'] = $picture['picture'];
				$pictures_info[] = $cur;
			}
			
			$retVal['name']		= $albumName;
			$retVal['count'] 	= count($pictures);
			$retVal['aid']		= $aid;
			$retVal['pictures'] = $pictures_info;
			
			return $retVal;
		}
	}
	
	
	function getPhotoSource($pid) {
	
		$base = "https://graph.facebook.com/$pid";
		$pic = $this->Http->get($base);
		$pic = json_decode($pic, true);
		$pic = $pic['source'];
		
		return $pic;

	}
	
	private function getIcon($aid) {
	
		return "https://graph.facebook.com/$aid/picture";

	}
	
	public function initialize($controller) {
		$this->Http = new HttpSocket();
	}

}