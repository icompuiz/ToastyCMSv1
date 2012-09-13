<?=$this->Actions->forms_edit()?>
<?=$this->ContentBar->forms($forms)?>

<div class="forms form right">
<?php 

	echo $this->Form->create('Form');

	echo $this->Form->input('id');
	
	echo $this->Form->input('name');
	?>
	
	<div class="inline_data tabarea">
		<ul class="tabs">
			<li class="tab1" class="tabs" tab="tab1" group="group1">
				<a href="#tab1">Add Fields</a>
			</li>
			<li class="tab2" class="tabs" tab="tab2" group="group1">
				<a href="#tab2">Fields XML</a>
			</li>
		</ul>
		<div class="mainTabContent group1">
			
			<div class="tab1 tabContent text">
				<?=$this->Form->textarea('tmp')?>
			</div>
			<div class="tab2 tabContent text">
				<?=$this->Form->input('fields')?>
			</div>
		</div>
	</div>
	<div class="inline_data tabarea">
		<ul class="tabs">
			<li class="tab1" class="tabs" tab="tab1" group="group2">
				<a href="#tab1">Javascript</a>
			</li>
			<li class="tab2" class="tabs" tab="tab2" group="group2">
				<a href="#tab2">CSS</a>
			</li>
		</ul>
		<div class="mainTabContent group2">
			
			<div class="tab1 tabContent text">
				<?=$this->Form->input('js')?>
			</div>
			<div class="tab2 tabContent text">
				<?=$this->Form->input('css')?>
			</div>
		</div>
	</div>
<?php
	
	echo $this->Form->end('Submit');
?>

</div>