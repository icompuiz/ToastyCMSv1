<?$this->Actions->profileLayouts_edit()?>
<?$this->ContentBar->profileLayouts($layouts)?>
<div class="profileLayouts form right">
<?php echo $this->Form->create('ProfileLayout', array('type'=>'file'));?>
	<fieldset>
		<legend><?php echo __('Edit Profile Layout'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	<div class="files tabarea">
		<ul class="tabs">
			<li class="tab4" class="tabs" tab="tab4" group="group2">
				<a href="#tab4">Javascript</a>
			</li>
			<li class="tab5" class="tabs" tab="tab5" group="group2">
				<a href="#tab5">CSS</a>
			</li>
		</ul>
		<div class="mainTabContent group2">
			<div class="tab4 tabContent text">
				<?=$this->Form->input('js_files', array('label'=>'Enter the name of existing Javascript files','type' => 'text'))?>
				<?=$this->Form->label('uploaded_js_files', "Upload New Javascript Files")?>
				<?=$this->Multifile->makeFileArea('uploaded_js_files', 'ProfileLayout', 10, 'js')?>
			</div>
			<div class="tab5 tabContent text">
				<?=$this->Form->input('css_files', array('label'=>'Enter the name of existing CSS files','type' => 'text'))?>
				<?=$this->Form->label('uploaded_css_files', "Upload New CSS Files")?>
				<?=$this->Multifile->makeFileArea('uploaded_css_files', 'ProfileLayout', 10,'css')?>
			</div>
		</div>
	</div>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ProfileLayout.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ProfileLayout.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Profile Layouts'), array('action' => 'index'));?></li>
	</ul>
</div>
