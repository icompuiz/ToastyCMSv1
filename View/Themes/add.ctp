<div class="themes form">
<?php echo $this->Form->create('Theme', array('type'=>'file'));?>
	<fieldset>
		<legend><?php echo __('Add Theme'); ?></legend>
		
		<ul class="tabs">
			<li class="tab1" class="tabs" tab="tab1">
				<a href="#tab1">Layout</a>
			</li>
		</ul>
		<div id="mainTabContent">
			<div class="tab1 tabContent text"> 
				<div class="formElement"><?=$this->Form->input('name', array('label'=>"Enter Name of Theme"))?></div>
				<div class="formElement"><?=$this->Form->input('layout', array("type"=>"file","label"=>"Upload Theme Layout File"))?></div>
			</div>
			
		</div>
		
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Themes'), array('action' => 'index'));?></li>
	</ul>
</div>


