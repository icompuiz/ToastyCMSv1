<div class="galleries form right">
<?php echo $this->Form->create('Gallery');?>
	<fieldset>
		<legend><?php echo __('Add Gallery'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('variables');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Galleries'), array('action' => 'index'));?></li>
	</ul>
</div>
