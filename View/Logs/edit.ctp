<div class="logs form">
<?php echo $this->Form->create('Log');?>
	<fieldset>
		<legend><?php echo __('Edit Log'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Log.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Log.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Log Entries'), array('controller' => 'logs', 'action' => 'view', $this->Form->value('Log.id'))); ?> </li>
	</ul>
</div>
