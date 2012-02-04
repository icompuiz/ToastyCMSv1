<?php

	$event_name = $events["Event"]["title"];
	$event_id = $events["Event"]["id"];

?>
<div class="registrants form">
<?php echo $this->Form->create('Registrant', array('url'=>array('controller'=>'events', 'action'=>'register', $event_id)));?>
	<fieldset>
 		<legend><?php __('Register for '); echo $event_name ?></legend>
		<?php
		
			echo $form->hidden('event_id', array('value' => $event_id));
			echo $form->input('name');
			echo $form->input('email');
			
			if (isset($categories)) {
				echo $form->label('category');
				echo $form->select('category', $categories, null);
				echo $form->error('category', 'Please select a category', array('wrap', 'class'=> 'error'));
			}
			
			echo "<br/>";
			
			//echo $form->checkbox('optout');
			//echo $form->label('Opt Out of Mailing List');
		?>
		<?php echo $this->Form->end(__('Submit Registration', true));?>
	</fieldset>
</div>