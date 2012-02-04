<?=$this->Actions->groups_edit()?>
<?=$this->ContentBar->users($groups_)?>
<div class="groups form right">
<?php echo $this->Form->create('Group');?>
	<fieldset>
		<legend><?php 
			
		if ( $this->Form->value('Group.id') > 3 ) {			
			echo __('Edit Group'); 
		} else {
			echo __('View Group'); 
		}
		
		?></legend>
	<?php
		echo $this->Form->input('id');
		if ( $this->Form->value('Group.id') > 3 ) {  
			echo $this->Form->input('name');
		} else {
			echo $this->Form->input('name', array('disabled'));
		}
		if ( $this->Form->value('Group.id') > 3 ) {
			echo $this->Form->input('description');
		} else {
			echo $this->Form->input('description', array("disabled"));
			
		}
	?>
	</fieldset>
	
<?php 
	if ( $this->Form->value('Group.id') > 3 ) {
		echo $this->Form->end(__('Submit'));
	}
?>
</div>