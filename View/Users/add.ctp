<?=$this->Actions->users_add()?>
<?=$this->ContentBar->users($groups_)?>

<div class="users form right">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('group_id');
		echo $this->Form->input('full_name');
		echo $this->Form->input('email');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>