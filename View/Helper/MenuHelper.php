<?php
/* /app/View/Helper/LinkHelper.php */
App::uses('AppHelper', 'View/Helper');

class MenuHelper extends AppHelper {
	
	public $helpers = array('Html');
	
    public function output($items=null,$class=null) {
		$output = "";
		foreach ($items as $item) 
		{
			$childs = "";
			$parent = "";
			if (isset ($item['childs']) )
			{
				$submenu = "";
				$parent =  " class='dropdown-parent'";
				foreach ($item['childs'] as $child) 
				{
					$link = $this->Html->link($child['Content']['title'], array('controller' => 'content', 'action' => $child['Content']['alias']));
					$submenu .= "<li>$link</li>";
				}
				$childs .= "<ul class='dropdown'>$submenu</ul>";
			}
			$menuHead = $this->Html->link($item['Content']['title'], array('controller' => 'content', 'action' => $item['Content']['alias']));
			$output .= "<li$parent>${menuHead}${childs}</li>";
		}
		return "<ul class='menu $class'>$output</ul>";
	}
}