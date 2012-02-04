<?=$this->Actions->siteLayouts_add()?>
<?=$this->ContentBar->siteLayouts($siteLayouts)?>

<div class="siteLayouts form right">
<?php echo $this->Form->create('SiteLayout', array('type' => 'file'));?>

	<fieldset>
		<legend><?php echo __('Add Site Layout'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('description');
	?>

<div class="inline_data tabarea">
		<ul class="tabs">
			<li class="tab1" class="tabs" tab="tab1" group="group1">
				<a href="#tab1">Edit Layout</a>
			</li>
			<li class="tab2" class="tabs" tab="tab2" group="group1">
				<a href="#tab2">Upload Media</a>
			</li>
			
		</ul>
		<div class="mainTabContent group1">
			<div class="tab1 tabContent text">
				<div id="toggleEditModeButton" class="actions">
					<ul>
						<li><a id="editModeButton">Edit Manually</a></li>
					</ul>
				</div>
				<?=$this->Form->error('layout')?>
				<?=$this->Form->error('uploaded_layout')?>
				<div class="input textarea">

				<?=$this->Form->label('layout','Create Layout')?>
				<?=$this->Form->textarea('layout')?>
				</div>
				<div class="input file">
				<?=$this->Form->label('uploaded_layout','Upload Layout')?>
				<?=$this->Multifile->makeFileArea('uploaded_layout', 'SiteLayout', 1, 'ctp')?>
				</div>
			</div>
			<div class="tab2 tabContent text">
				<?=$this->Form->label('uploaded_js_files','Upload Javascript Files')?>
				<?=$this->Multifile->makeFileArea('uploaded_js_files', 'SiteLayout', 10, 'js')?>
				<?=$this->Form->label('uploaded_css_files','Upload CSS Files')?>
				<?=$this->Multifile->makeFileArea('uploaded_css_files', 'SiteLayout', 10, 'css')?>
				<?=$this->Form->label('uploaded_images','Upload Images')?>
				<?=$this->Multifile->makeFileArea('uploaded_images', 'SiteLayout', 10, 'jpg, jpeg, png, gif')?>
			</div>
		</div>
	</div>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>