<div class="fields form">
<?php echo $this->Form->create('Field');?>
	<fieldset>
		<legend><?php echo __('Add Field'); ?></legend>
	<?php
		echo $this->Form->input('field_name');
		echo $this->Form->input('field_value');
		echo $this->Form->input('field_type');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Fields'), array('action' => 'index'));?></li>
	</ul>
</div>
