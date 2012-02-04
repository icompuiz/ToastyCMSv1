<?=$this->Actions->profiles_edit_user_profile()?>
<div class="form profile right">
	<?=$this->Form->create('Profile', array('type'=>'file'))?>
	<fieldset>
		<legend><?php echo __('Edit Profile'); ?></legend>
		<?php
			echo $this->Form->input('id');
			echo $this->Form->hidden('member_id');
			echo $this->ProfileField->parse($fields, 'Profile');
			echo $this->Form->hidden('raw');
		?>
	</fieldset>
	<? echo $this->Form->end(__('Submit'))?>
</div>