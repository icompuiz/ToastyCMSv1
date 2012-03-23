<?php

class ContentController extends AppController {

/**
 * Controller name
 *
 * @var string
 * @access public
 */
	var $name = 'Content';

/**
 * Default helper
 *
 * @var array
 * @access public
 */
	var $helpers = array('Html', 'TimeFormat', 'NivoSlider', 'Feed', 'BreadCrumbs');
	var $components = array('Tag', 'RssFeed');
	var $uses = array('Content', 'Event');

/**
 * This controller does not use a model
 *
 * @var array
 * @access public
 */

/**
 * Displays a view
 *
 * @param mixed What Content to display
 * @access public
 */
	public function index() {
		$this->redirect(array('action' => 'home'));
	}
	
	public function home() {
		
		$events = $this->Event->find('all', array('conditions'=>array('Event.end_time > NOW()'), 'order' => array('Event.start_time ASC')));
		
		$events_feed['title'] = __('Upcoming Events', true);
		
		foreach ($events as $event) {
		
			$tmp['title'] = $event['Event']['title'];
			$tmp['icon'] = substr($event['Event']['picture'], 4);
			$tmp['text'] = $event['Event']['description'];
			$tmp['link'] = array('controller' => 'events', 'action' => 'view', $event['Event']['id']);
			$events_feed[] = $tmp;
		
		}
		
		
		$news_feed = $this->RssFeed->bbcFeed();
		// $twitter_feed = $this->RssFeed->twitterFeed('ritglobalunion');
		
		
		$this->set(compact('events','events_feed','news_feed', 'twitter_feed'));
		
		$this->set('js_files', 'simpleSlider,jcarousellite,feed');
		
		$this->set('css_files', 'stylesheets/simpleSlider,stylesheets/feeds');
		$this->set('title_for_page', 'Home');

	}
	 
	public function display($alias=null) 
	{	
		if ($alias) {
			
			if ($Content = $this->Content->find('first', array('conditions' => array('Content.alias' => $alias)))) 
			{				
				if ( !isset($Content['Content']['redirect']) ||  '' == $Content['Content']['redirect'] ) { 
					$this->set('crumbs', $this->Content->GetCrumbs($Content['Content']['id']));
					$this->set('title_for_page', $Content['Content']['title']);
					
					$html = $this->Tag->parse($Content['Content']['html'], $this);
					
					$this->set('body', $html);
					$this->set('inline_js', $Content['Content']['js']);
					$this->set('inline_css', $Content['Content']['css']);
					$this->set('script_files', $Content['Content']['js_files']);
					$this->set('css_files', $Content['Content']['css_files']);
					
				} else {
					$this->redirect($Content['Content']['redirect']);
				}
			} else {
				$this->redirect(array('controller' => 'errors','action'=>'fourofour'));
			}
		}else {
			$this->redirect(array('controller' => 'errors','action'=>'fourofour'));
		}
	}
	 
	public function beforeFilter() {

		parent::beforeFilter();
		$this->Auth->allow('*');
	}
}
