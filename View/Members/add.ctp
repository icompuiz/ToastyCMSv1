<?=$this->Actions->memberGroups_add()?>
<?=$this->ContentBar->memberGroups($memberGroups)?>
<div class="memberGroups form right">
<?php echo $this->Form->create('User',  array( 'type' => 'file', 'url' => array('controller' => 'members', 'action' => 'add', $this->Form->value('User.memberGroup_id'))));?>
	<fieldset>
		<legend><?php echo __('Add Member to Group'); ?></legend>
	<?php
		echo $this->Form->input('full_name');
		echo $this->Form->input('email');
		echo $this->Form->input('password');
		echo $this->Form->input('password_confirmation', array('type' => 'password'));
		echo $this->Multifile->makeFileArea('avatar','User',1, 'jpg, jpeg, png,gif');
		echo $this->Form->error('Member.avatar');
		echo $this->Form->input('group_id', array('type' => 'hidden'));
		echo $this->Form->input('memberGroup_id', array('type' => 'hidden'));
	?>
	
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>