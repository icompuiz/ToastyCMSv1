<?=$this->Actions->contents_edit()?>
<?=$this->ContentBar->categories($categories_)?>

<div class="contents form right">
<?php echo $this->Form->create('Content', array('type'=>'file'));?>
	<fieldset>
		<legend><?php echo __('Edit Content'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('alias');
		echo $this->Form->input('category_id');
		echo $this->Form->hidden('key');
	?>
	<div class="input select">
		<?=$this->Form->label('parent')?>
		<?=$this->Form->select('parent', $parents)?>
	</div>
	<?=$this->Form->input('ordering')?>
	<div class="inline_data tabarea">
		<ul class="tabs">
			<li class="tab1" class="tabs" tab="tab1" group="group1">
				<a href="#tab1">HTML</a>
			</li>
			<li class="tab2" class="tabs" tab="tab2" group="group1">
				<a href="#tab2">Javascript</a>
			</li>
			<li class="tab3" class="tabs" tab="tab3" group="group1">
				<a href="#tab3">CSS</a>
			</li>
		</ul>
		<div class="mainTabContent group1">
			<div class="tab1 tabContent text">
				<?=$this->Form->input('html', array('class' => "mceEditor", "rows" => 10))?>
			</div>
			<div class="tab2 tabContent text">
				<?=$this->Form->input('js')?>
			</div>
			<div class="tab3 tabContent text">
				<?=$this->Form->input('css')?>
			</div>
		</div>
	</div>
	<div class="files tabarea">
		<ul class="tabs">
			<li class="tab4" class="tabs" tab="tab4" group="group2">
				<a href="#tab4">Javascript</a>
			</li>
			<li class="tab5" class="tabs" tab="tab5" group="group2">
				<a href="#tab5">CSS</a>
			</li>
			<li class="tab6" class="tabs" tab="tab6" group="group2">
				<a href="#tab6">Images</a>
			</li>
		</ul>
		<div class="mainTabContent group2">
			<div class="tab4 tabContent text">
				<?=$this->Form->input('js_files', array('label'=>'Enter the name of existing Javascript files','type' => 'text'))?>
				<?=$this->Form->label('uploaded_js_files', "Upload New Javascript Files")?>
				<?=$this->Multifile->makeFileArea('uploaded_js_files', 'Content', 10, 'js')?>
			</div>
			<div class="tab5 tabContent text">
				<?=$this->Form->input('css_files', array('label'=>'Enter the name of existing CSS files','type' => 'text'))?>
				<?=$this->Form->label('uploaded_css_files', "Upload New CSS Files")?>
				<?=$this->Multifile->makeFileArea('uploaded_css_files', 'Content', 10,'css')?>
			</div>
			<div class="tab6 tabContent text">
				<?=$this->Form->label('uploaded_images', 'Upload New Images')?>
				<?=$this->Multifile->makeFileArea('uploaded_images', 'Content', 10, 'png, jpg, jpeg, gif')?>
			</div>
		</div>
	</div>
	<?=$this->Form->input('redirect', array('type' => 'text'))?>
	
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>

