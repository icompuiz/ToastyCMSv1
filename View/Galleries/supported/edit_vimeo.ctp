<?=$this->Actions->galleries_edit()?>
<?=$this->ContentBar->galleries($galleries)?>
<div class="gallery form right">
<?=$this->Form->create('Gallery', array('type' => 'file'))?>
<?=$this->Form->input('id')?>
<?=$this->Form->input('name')?>
<?=$this->Form->input('Gallery.variables.account')?>
<?=$this->Form->input('description')?>
<div class="files tabarea">
		<ul class="tabs">
			<li class="tab1" class="tabs" tab="tab1" group="group1">
				<a href="#tab1">Cover Picture</a>
			</li>
		</ul>
		<div class="mainTabContent group1">
			<div class="tab1 tabContent text">
				<?=$this->Form->label('picture', "Upload New Gallery Cover Picture")?>
				<?=$this->Multifile->makeFileArea('picture', 'Gallery', 1, 'jpg, jpeg, png, gif')?>
				<?=$this->Form->error('picture')?>
				<?=$this->Form->hidden('old_picture')?>
				<div class="old_picture"><p>Current Cover Picture</p><?=$this->Html->image(substr($this->Form->value('Gallery.old_picture'),4));?></div>
			</div>
		</div>
	</div>
<?=$this->Form->hidden('source')?>
<?=$this->Form->end('Submit')?>
</div>