<?=$this->Actions->members_userEditMember()?>
<div class="memberGroups form">
<?php echo $this->Form->create('User',  array('type' => 'file', 'url' => array('controller' => 'members', 'action' => 'edit', $this->Form->value('User.member_id'))));?>
	<fieldset>
		<legend><?php echo __('Edit Member'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('member_id', array('type' => 'hidden'));
		echo $this->Form->input('full_name');
		echo $this->Form->input('email');
	?>
	<div class="password_edit">
		<div class="password_hider"><p>Change Password</p></div>
		<div class="password_field">
	<?php
		echo $this->Form->input('password');
		echo $this->Form->input('password_confirmation', array('type' => 'password'));
	?>
	</div>
	</div>
	<div class="avatar_edit">
	<div class="avatar_hider"><p>Change Avatar</p></div>
	<div class="avatar_field">
	<?=$this->Multifile->makeFileArea('avatar','User',1, 'jpg, jpeg, png,gif')?>
	<div class="old_avatar">
		<h3>Current Avatar</h3>
		<?=$this->Html->image(substr($this->Form->value('User.old_avatar'),4))?>
	</div>
	</div>
	</div>
	<?php
		echo $this->Form->hidden('old_avatar');
		echo $this->Form->error('Member.avatar');
		echo $this->Form->input('member_group_id', array('type' => 'hidden'));
		echo $this->Form->input('group_id', array('type' => 'hidden'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>