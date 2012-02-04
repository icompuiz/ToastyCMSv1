<?=$this->Actions->categories_edit()?>
<?=$this->ContentBar->categories($categories)?>

<div class="categories form right">
<?php echo $this->Form->create('Category');?>
	<fieldset>
		<legend><?php echo __('Edit Category'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		if ( $this->Form->value('Group.id') > 4 ) {
			echo $this->Form->input('description');
		} else {
			echo $this->Form->input('description', array("disabled"));
			
		}
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>