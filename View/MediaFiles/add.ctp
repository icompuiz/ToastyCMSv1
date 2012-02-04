<?=$this->Actions->mediaFiles_add();?>
<?=$this->ContentBar->mediaFiles($mediaFiles)?>
<div class="mediaFiles form right">
<?php echo $this->Form->create('MediaFile', array('type'=>'file'));?>
	<fieldset>
		<legend><?php echo __('Upload Media'); ?></legend>
		<div class="media_file_upload">
			<ul class="tabs">
				<li class="tab1" class="tabs" tab="tab1" group="group1">
					<a href="#tab1">Upload File</a>
				</li>
			</ul>
			<div class="mainTabContent group1">
				<div class="tab1 tabContent text"> 
					<?=$this->Form->error('path')?>
					<?=$this->Form->label('Upload File')?>
					<?=$this->Multifile->makeFileArea('path', 'MediaFile', 100)?>
				</div>
			</div>
		</div>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>