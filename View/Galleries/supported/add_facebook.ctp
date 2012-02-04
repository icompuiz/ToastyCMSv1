<?=$this->Actions->galleries_add()?>
<?=$this->ContentBar->galleries($galleries)?>
<div class="gallery form right">
<?=$this->Form->create('Gallery', array('type' => 'file'))?>
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
				<?=$this->Form->label('picture', "Upload Gallery Cover Picture")?>
				<?=$this->Multifile->makeFileArea('picture', 'Gallery', 1, 'jpg, jpeg, png, gif')?>
				<?=$this->Form->error('picture')?>
			</div>
		</div>
	</div>
<?=$this->Form->hidden('source')?>
<?=$this->Form->end('Submit')?>
</div>