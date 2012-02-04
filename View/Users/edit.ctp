<?=$this->Actions->users_edit()?>
<?=$this->ContentBar->users($groups_)?>
<div class="users form right">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		if ( $this->Form->value('User.id') != 1 ) {
			echo $this->Form->input('username');
		} else {
			echo $this->Form->input('username', array('type'=>'hidden'));
			echo $this->Form->input('username', array('disabled'));
		}

		echo $this->Form->input('password');
		
		if ( $this->Form->value('User.id') != 1 ) {
			echo $this->Form->input('group_id');
		} else {
			echo $this->Form->input('group_id', array('disabled'));
		}
		echo $this->Form->input('full_name');
		echo $this->Form->input('email');
	?>
	</fieldset>
<?php 
	echo $this->Form->end(__('Submit'));
?>
</div>
