<?php

	class BreadCrumbsHelper extends AppHelper {
	
		public $helpers = array('Html');
		
		public function getCrumbs($crumbs=array()) {
		
		
			if (!empty($crumbs)) {
			
				foreach ($crumbs as $crumb) {
				
				
					if (isset($crumb['alias'])) {
						$this->Html->addCrumb($crumb['title'], array('controller' => 'content', 'action' => 'display', $crumb['alias']));
					} else {
						$this->Html->addCrumb($crumb['title']);
					
					}
				
				}
			
			}
		
		
		}
	
	}