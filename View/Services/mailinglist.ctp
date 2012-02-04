<?php
	$this->Html->addCrumb('Join Mailing List');
   echo $this->Form->create('ListservService', array('url' => array('controller' => 'services', 'action' => 'mailinglist')));
   echo $this->Form->inputs(array(
				'legend' => __('Join Our Email List', true)));
   echo $this->Form->end('Submit'); 
?>