<?php
App::uses('AppController', 'Controller');
/**
 * Events Controller
 *
 * @property Event $Event
 */
class EventsController extends AppController {

	var $helpers = array('Multifile', 'TimeFormat', 'Actions', 'Calendar');
	var $uses = array('Event','MediaFile', 'Member');
	var $components = array('Strings');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Event->recursive = 0;
		$this->set('events', $this->paginate());
		$this->render('index');

	}
	

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {

		$this->Event->id = $id;
		if (!$this->Event->exists()) {
			throw new NotFoundException(__('Invalid event'));
		}
		$this->set('event', $this->Event->read(null, $id));
		$this->render('view');

	}
	
/**
 * add method
 *
 * @return void
 */
	public function add() {

		if ($this->request->is('post')) {

			$picture['path'] = array_shift($this->request->data['Event']['picture']);
			$picture_exists = $picture['path']['error'] == 0;
			
			if ( $picture_exists ) {
			
				// get extension
				
				$name = $picture['path']['name'];
				$ext = $this->Strings->getExt($name); 
							
				$picture['name'] = $this->request->data['Event']['title'].$ext;
				$picture = $this->MediaFile->upload($picture, 'events');
				
				$this->request->data['Event']['picture'] = $picture['MediaFile']['path']; 
				
				unset($name);
				unset($picture);
			} 

			$is_featured = $this->request->data['Event']['featured_event'];
			if ($is_featured) {
				// upload image
				$picture['path'] = array_shift($this->request->data['Event']['banner_image']);
				$picture_exists = $picture['path']['error'] == 0;
				
				if ( $picture_exists ) {
				
					// get extension
					$name = $picture['path']['name'];
					$ext = $this->Strings->getExt($name); 
					unset($name);
								
					$picture['name'] = $this->request->data['Event']['title'].$ext;
					$picture = $this->MediaFile->upload($picture, 'banners');
					
					// resize to 800px x 300px
					$this->resize($picture['MediaFile']['path']);
					
					$this->request->data['Event']['banner_image'] = $picture['MediaFile']['path']; 
				
					unset($picture_exists);
					unset($name);
					unset($picture);
				}
					
			} else {
			
				$this->request->data['Event']['banner_image'] = "NOT FEATURED";
			
			}
			
			// pr($this->request->data); exit;
			
			$this->Event->create();
			if ($this->Event->save($this->request->data)) {
				$this->Session->setFlash(__('The event has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event could not be saved. Please, try again.'));
			}
		}
		
		$tmp = $this->Event->User->find('all');
		foreach ( $tmp as $item ) {
		
			$owner[$item["User"]["id"]] = $item["User"]["full_name"];
		
		}
		$this->set(compact('owner'));

		$this->set('css_files', 'stylesheets/tab');
		$this->set('js_files', 'tab,tiny_mce/tiny_mce');
		$this->set('inline_js', '
		
			$("#EventTitle").keydown().keyup(function() {
		
				var title = $("#EventTitle").attr("value");
				title = title.toLowerCase();
				title = title.replace(/\s+/g,"_");
				 $("#EventAlias").val(title);
		
			});
			
			tinyMCE.init(
			{
				mode    : "textareas",
				theme   : "advanced",
				editor_selector : "mceEditor",
				plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
				
			});
			
			
			
		');
	}
	
	private function resize($path) {
		App::uses('SimpleImage','Vendor');
		$image = new SimpleImage();
		$image->load(APP . DS . 'webroot' . DS . $path);
		$image->resize(800,300);
		$image->save(APP . DS . 'webroot' . DS . $path);
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {

		$this->Event->id = $id;
		if (!$this->Event->exists()) {
			throw new NotFoundException(__('Invalid event'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {

			$picture['path'] = array_shift($this->request->data['Event']['picture']);
			$picture_exists = $picture['path']['error'] == 0;
			
			if ( $picture_exists ) {
			
				// get extension
				
				$name = $picture['path']['name'];
				$ext = $this->Strings->getExt($name); 
							
				$picture['name'] = $this->request->data['Event']['title'].$ext;
				$picture = $this->MediaFile->upload($picture, 'events');
				
				$this->request->data['Event']['picture'] = $picture['MediaFile']['path']; 
				
				unset($name);
				unset($picture);
				
			} else {
				if ( $this->request->data['Event']['old_picture'] )
					$this->request->data['Event']['picture'] = $this->request->data['Event']['old_picture'];
			}
			
			$is_featured = $this->request->data['Event']['featured_event'];
			if ($is_featured) {
				// upload image
				$picture['path'] = array_shift($this->request->data['Event']['banner_image']);
				$picture_exists = $picture['path']['error'] == 0;
				
				if ( $picture_exists ) {
				
					// get extension
					$name = $picture['path']['name'];
					$ext = $this->Strings->getExt($name); 
					unset($name);
								
					$picture['name'] = $this->request->data['Event']['title'].$ext;
					$picture = $this->MediaFile->upload($picture, 'banners');
					
					$this->resize($picture['MediaFile']['path']);
					
					$this->request->data['Event']['banner_image'] = $picture['MediaFile']['path']; 
				
					unset($picture_exists);
					unset($name);
					unset($picture);
				
				} else {
					
					$old  = $this->request->data['Event']['old_banner'];
				
					if ( $old && $old != "NOT FEATURED" ) {
						$this->resize($this->request->data['Event']['old_banner']);
						$this->request->data['Event']['banner_image'] = $this->request->data['Event']['old_banner'];
					}
				
				}	
			} else {
			
				$this->request->data['Event']['banner_image'] = "NOT FEATURED";
			
			}
			
			if ($this->Event->save($this->request->data)) {
				$this->Session->setFlash(__('The event has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Event->read(null, $id);
			$this->request->data['Event']['old_picture'] = $this->request->data['Event']['picture'];
			$this->request->data['Event']['old_banner'] = $this->request->data['Event']['banner_image'];
			
		}
		$tmp = $this->Event->User->find('all');
		foreach ( $tmp as $item ) {
		
			$owner[$item["User"]["id"]] = $item["User"]["full_name"];
		
		}
		$this->set(compact('owner'));
		$this->set('css_files', 'stylesheets/tab');
		$this->set('js_files', 'tab,tiny_mce/tiny_mce');
		$this->set('inline_css', '
		
			.preview_image img {
				
				height: 100px;
			
			}
		
		');
		$this->set('inline_js', '
		
			$("#EventTitle").keydown().keyup(function() {
		
				var title = $("#EventTitle").attr("value");
				title = title.toLowerCase();
				title = title.replace(/\s+/g,"_");
				 $("#EventAlias").val(title);
		
			});
			
			tinyMCE.init(
			{
				mode    : "textareas",
				theme   : "advanced",
				editor_selector : "mceEditor",
				plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
				
			});
			
			
			
		');
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Event->id = $id;
		if (!$this->Event->exists()) {
			throw new NotFoundException(__('Invalid event'));
		}
		if ($this->Event->delete()) {
			$this->Session->setFlash(__('Event deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Event was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	function calendar($year=null, $month=null) {
	
		// check to see if month and year are set
		// also validates that the month and year are valid values
		if ( !(intval($year) && intval($month )))
		{
			$month = date('m');
			$year = date('Y');
		}
		
		// if set generate a yyyy-mm-dd hh:mm:ss formatted date string for the first of that year and month
			$mktime = mktime(0,0,0, $month, 1, $year);
			$current = date("Y-m-d", $mktime);
			$maxdays = date('t', $mktime);
			$calendar[0][] = date("F Y", $mktime);
			$today = date("Y-m-d");
			
			//get the numeric representation of the first day of the month
			$calendar[0][] = date("w", $mktime);
			
			if ( intval($month) == 1 )
			{
				$prevmonth = 12;
				$prevyear = intval($year) - 1;
			} else {
				$prevmonth = intval($month) - 1;
				$prevyear = intval($year);
			}
			
			
			if ( intval($month) == 12 )
			{
				$nextmonth = 1;
				$nextyear = intval($year) + 1;
			} else {
				$nextmonth = intval($month) + 1;
				$nextyear = intval($year);
			}
			
			$prev = mktime(0,0,0, $prevmonth, 1, $prevyear);
			$next = mktime(0,0,0, $nextmonth, 1, $nextyear);
			$cur  = mktime(0,0,0, $month,     1, $year);
		
		
		// collect all the events at the current year and month ( where current is in $current )
		$events = $this->Event->find('all', array('conditions' => "Event.start_time >= $current"));

		// create the month array
		for ( $i = 1; $i <= $maxdays; $i++ ) 
		{
			$calendar[$i] = null;
			$mktime = mktime(0,0,0, $month, $i, $year);
			$current = date("Y-m-d", $mktime);
			
			if ( $current == $today ) {
				$calendar[$i]['today'] = true;
			}
			foreach ($events as $event) {
				
				if ( $this->isCurrent($current, $event['Event']['start_time'], $event['Event']['end_time']) )
				{
					$calendar[$i]['Events'][] = $event;
				} 
			}
			
			
		}
		
		$this->set(compact('calendar'));
		$this->set('css_files', 'stylesheets/calendar');
		$this->set('prev', $prev);
		$this->set('next', $next);
		$this->set('cur' , $cur);
		$this->set('title_for_layout', $this->name . " | Calendar of Events");

	
	}
	
	function isCurrent($current, $start, $endDate) {
	
		$cu_datetime = explode(" ", $current);
		$cu_date = explode("-", $cu_datetime[0]);
	
		$st_datetime = explode(" ", $start);
		$st_date = explode("-", $st_datetime[0]);
	
		$en_datetime = explode(" ", $endDate);
		$en_date = explode("-", $en_datetime[0]);

		$end = mktime(0,0,0, $en_date[1], $en_date[2], $en_date[0]);
		$end_date = date("F j, Y", $end);
		$current   = mktime(0,0,0, $cu_date[1], $cu_date[2], $cu_date[0]);
		$today   = date("F j, Y", $current);
		$start      = mktime(0,0,0, $st_date[1], $st_date[2], $st_date[0]);
		$start_date      = date("F j, Y", $start);
		
		$status = $current <= $end && $current >= $start;
		// echo "$start_date, $today, $end_date: $status <br/>";
		
		return $status;
	
	}
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->set('css_files', 'stylesheets/events');
		$this->Auth->allow('index', 'view', 'calendar', 'user');
		
		$this->authorize();
	}
	
	public function authorize() {
	
		return true;
		
	}
	
	/**
	 * Admin Functions
	 */
	public function manager_index() {
		$this->layout = 'management';
		$this->index();
		$this->render('index');
	}
	
	public function manager_view($id = null) {
		$this->layout = 'management';
		$this->view($id);
		$this->render('view');
	}
	public function manager_add() {
		$this->layout = 'management';
		$this->add();
		$this->render('add');
	}
	public function manager_edit($id=null) {
		$this->layout = 'management';
		$this->edit($id);
		$this->render('edit');
	}
	public function manager_delete($id=null) {
		$this->layout = 'management';
		$this->delete($id);
	}
	
	public function user_index() {
		$this->layout = 'user_management';
		$user = $this->Auth->user();
		
		$events = $this->Event->find('all', array('conditions' => array('Event.user_id' => $user['id'])));
		$this->set(compact('events'));
		$this->render('index');
	}
	
	public function user($id=null) {
	
		$events = $this->Event->find('all', array('conditions' => array('Event.user_id' => $id)));
		$this->set(compact('events'));
		
		$user = $this->Event->User->read('full_name', $id);
		$this->set('title_for_page', $user['User']['full_name'] . "'s Events" );
		$this->set('owner', $user['User']['full_name']);
		$this->render('index');
		
	}
	
	public function user_view($id = null) {
		$this->layout = 'user_management';
		$this->view($id);
		$this->render('view');
	}
	
	public function user_add() {
		$this->layout = 'user_management';
		$this->add();
		$this->render('add');
	}
	public function user_edit($id=null) {
		$this->layout = 'user_management';
		$this->edit();
		$this->render('edit');
	}
	public function user_delete($id=null) {
		$this->layout = 'user_management';
		$this->delete();
	}
	
}
