<?$this->Actions->profileLayouts_add()?>
<?$this->ContentBar->profileLayouts($layouts)?>
<div class="profileLayouts form right">
<?php echo $this->Form->create('ProfileLayout', array('type'=>'file'));?>
	<fieldset>
		<legend><?php echo __('Add Profile Layout'); ?></legend>
	<?php
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
				<?=$this->Form->input('js_files', array('label'=>'Include existing Javascript files','type' => 'text'))?>
				<?=$this->Form->label('uploaded_js_files', "Upload New Javascript Files")?>
				<?=$this->Multifile->makeFileArea('uploaded_js_files', 'ProfileLayout', 10, 'js')?>
			</div>
			<div class="tab5 tabContent text">
				<?=$this->Form->input('css_files', array('label'=>'Include existing CSS files','type' => 'text'))?>
				<?=$this->Form->label('uploaded_css_files', "Upload New CSS Files")?>
				<?=$this->Multifile->makeFileArea('uploaded_css_files', 'ProfileLayout', 10,'css')?>
			</div>
		</div>
	</div>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>