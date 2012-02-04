<?php

class MenuComponent extends Component {

	function getMenu($category=null, $content=null) {
		
		if ($category && $content) {
			$menu = $content->Category->find('first', array('conditions'=>array('Category.title' => $category)));
			$parent = $content->find('all', array('conditions' => array('Content.category_id' => $menu['Category']['id'], 'Content.parent' => ''), 'order' => 'Content.ordering ASC'));
			$current = array();
			foreach ( $parent as $item ) 
			{
				$childs = $content->find('all', array('conditions' => array('Content.parent' => $item['Content']['id']), 'order' => 'Content.ordering ASC'));
				if ( count($childs) > 0 ) {
					$current[] = array_merge( $item, array ("childs" =>  $childs));
				} else {
					$current[] = $item;
				}
				
			}
			return $current;
		}
		return false;
	}
}