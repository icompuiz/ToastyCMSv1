<div class="contact form">
	<?=$this->Form->create('EmailService', array('url' => array('controller' => 'services', 'action' => 'contact', $member_group_id)))?>
<fieldset>
	<legend><?=__("Contact Us"); ?></legend>
	<div>
	<?=
		__('Have a question, comment, or suggestion? Please fill out the following form to contact the 
		RIT Global Union. We will respond to you as soon as possible.');
		?>
	<p id="required_field"><?=
		__('* = Required Field');
	?></p>
	</div>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('recipient', array('options' => $recipients));
		echo $this->Form->error('recipient');
		echo $this->Form->input('sender');
		echo $this->Form->input('subject');
		echo $this->Form->input('message', array('type'=>'textarea'));
	?>
</fieldset>
	   <?=$this->Form->end(__('Send Message'))?>
</div>