<?=$this->Actions->mediaFiles_edit();?>
<?=$this->ContentBar->mediaFiles($mediaFiles)?>

<div class="mediaFiles form right">
<?php echo $this->Form->create('MediaFile');?>
	<fieldset>
		<legend><?php echo __('Edit Media File'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('path');
		echo $this->Form->input('fileType');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>