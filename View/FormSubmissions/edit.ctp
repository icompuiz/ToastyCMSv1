<div class="formSubmissions form">
<?php echo $this->Form->create('FormSubmission'); ?>
	<fieldset>
		<legend><?php echo __('Edit Form Submission'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('unique_id');
		echo $this->Form->input('form_id');
		echo $this->Form->input('data');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('FormSubmission.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('FormSubmission.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Form Submissions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Forms'), array('controller' => 'forms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Form'), array('controller' => 'forms', 'action' => 'add')); ?> </li>
	</ul>
</div>
